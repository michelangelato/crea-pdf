<?php

/**
 * invoice data model
 *
 * @package PersonalData
 * @version 1.0
 * @copyright Schema31 s.p.a - 2015
 */
class Rest_api_model extends CI_Model {

    public function __construct() {
        parent::__construct();

        $this->result = new stdClass();
        $this->result->validation = true;
        $this->result->message = '';
        $this->result->data = null;
        $this->result->httpResponse = 200;
        $this->result->errorNum = '';
        $this->result->errorText = '';
    }

    public function getLogin($username, $password) {


        $this->db->select('id, nome, cognome, email, distributore, provincia, cap');
        $this->db->from('venditore');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->limit(1);

        $query = $this->db->get();

        $ret = $query->result();

        if (count($ret) == 1) {

            $this->result->validation = TRUE;
            $this->result->message = 'Dati recuperati con successo!!';
            $this->result->httpResponse = 200;
            $this->result->data = $ret;
        } else {

            $this->result->validation = FALSE;
            $this->result->errorNum = '0701';
            $this->result->errorText = 'Attenzione errore!!';
            $this->result->message = 'Errore';
            $this->result->httpResponse = 417;
        }
        return $this->result;
    }

    public function getPostiDisponibili($idCorso, $gruppo) {


        $this->load->model('corsi_model');

        $postiPrenotati = $this->corsi_model->getNumeroPostiConfermatiByIdCorsoAndGruppo($idCorso, $gruppo);

        //print_r($postiPrenotati);

        $this->db->select('corso.numeroPartecipantiMax, corso.numeroPartecipantiOverbooking');
        $this->db->from('corso');
        $this->db->where('corso.id', $idCorso);

        $query = $this->db->get();

        $ret = $query->result();


        $postiDisponibili = ($ret[0]->numeroPartecipantiMax + $ret[0]->numeroPartecipantiOverbooking) - $postiPrenotati;

        // print_r($ret);
        $posti = new stdClass();
        $posti->postiDisponibili = $postiDisponibili;

        //print_r($posti);


        if (count($ret) == 1) {

            $this->result->validation = TRUE;
            $this->result->message = 'Dati recuperati con successo!!';
            $this->result->httpResponse = 200;
            $this->result->data = $posti;
        } else {

            $this->result->validation = FALSE;
            $this->result->errorNum = '0701';
            $this->result->errorText = 'Attenzione errore!!';
            $this->result->message = 'Errore';
            $this->result->httpResponse = 417;
        }
        return $this->result;
    }

    public function getCorsi($language) {

        // categorie nei corsi futuri
        $this->db->select('categoriacorso.id, categoriacorso.nome_' . $language . ' as categoria, categoriacorso.image ');
        $this->db->from('categoriacorso');
        $this->db->join('corso', 'categoriacorso.id = corso.categoria_id');
        // $this->db->where('categoriacorso.id in (select categoria_id from corso)');
        $this->db->where('(CURDATE() <= (select MAX(data) as d from datecorso where corso_id = `corso`.id))');
        $this->db->group_by('categoriacorso.nome_' . $language);
        $this->db->order_by('categoriacorso.nome_' . $language);

        $queryCategoria = $this->db->get();
        $resCategoria = $queryCategoria->result();

        $response = array();

        foreach ($resCategoria as $item) {

            $categoria = new stdClass();
            $categoria->id = $item->id;
            $categoria->categoria = $item->categoria;
            $categoria->image = $item->image;

            $this->db->select('corso.id, (select MIN(data) as d from datecorso where corso_id = `corso`.id) as `dataMin`, CONCAT(`persona`.`cognome`, " ", `persona`.`nome`) AS trainer, categoriacorso.nome_' . $language . ' as categoria, destinatariocorso.nome_' . $language . ' as destinatari');
            $this->db->select('corso.shooting, corso.internazionale, corso.durata, corso.numeroPartecipantiMin, corso.numeroPartecipantiMax, corso.numeroPartecipantiOverbooking');
            $this->db->select('corso.titolo_' . $language . ' as titolo, corso.sottotitolo_' . $language . ' as sottotitolo, corso.incluso_' . $language . ' as incluso,  corso.escluso_' . $language . ' as escluso');
            $this->db->from('corso');
            $this->db->join('categoriacorso', 'corso.categoria_id = categoriacorso.id');
            $this->db->join('destinatariocorso', 'corso.destinatario_id = destinatariocorso.id');
            $this->db->join('persona', 'corso.trainer_id = persona.id');
            $this->db->where('(CURDATE() <= (select MAX(data) as d from datecorso where corso_id = `corso`.id) or (select MAX(data) as d from datecorso where corso_id = `corso`.id) is NULL)');
            $this->db->where('categoriacorso.id', $item->id);
            $this->db->order_by('dataMin', 'asc');
            $queryCorsi = $this->db->get();

            //echo $this->db->last_query();die();
            $resCorsi = $queryCorsi->result();

            $categoria->corso = array();
            foreach ($resCorsi as $itemCorsi) {
                $corso = new stdClass();

                $corso->id = $itemCorsi->id;
                $corso->trainer = $itemCorsi->trainer;
                $corso->categoria = $itemCorsi->categoria;
                $corso->destinatari = $itemCorsi->destinatari;
                $corso->shooting = $itemCorsi->shooting;
                $corso->internazionale = $itemCorsi->internazionale;
                $corso->durata = $itemCorsi->durata;
                $corso->numeroPartecipantiMin = $itemCorsi->numeroPartecipantiMin;
                $corso->numeroPartecipantiMax = $itemCorsi->numeroPartecipantiMax;
                $corso->numeroPartecipantiOverbooking = $itemCorsi->numeroPartecipantiOverbooking;
                $corso->titolo = $itemCorsi->titolo;
                $corso->sottotitolo = $itemCorsi->sottotitolo;
                $corso->incluso = $itemCorsi->incluso;
                $corso->escluso = $itemCorsi->escluso;

                $this->db->select('gruppo');
                $this->db->from('datecorso');
                $this->db->where('corso_id', $itemCorsi->id);
                $this->db->order_by('gruppo');
                $this->db->group_by('gruppo');
                $queryGruppo = $this->db->get();
                $resGruppo = $queryGruppo->result();

                //echo $this->db->last_query();
                //echo "<br><pre>";
                $categoria->gruppo = array();

                foreach ($resGruppo as $itemGruppo) {

                    $gruppo = new stdClass();
                    $gruppo->gruppo = $itemGruppo->gruppo;

                    $this->db->select('id, data');
                    $this->db->from('datecorso');
                    $this->db->where('corso_id', $itemCorsi->id);
                    $this->db->where('gruppo', $itemGruppo->gruppo);

                    $this->db->order_by('data');
                    $queryDateGruppo = $this->db->get();
                    $resDateGruppo = $queryDateGruppo->result();


                    $gruppo->dateGruppo = array();
                    foreach ($resDateGruppo as $itemDateGruppo) {

                        $dateGruppo = new stdClass();
                        $dateGruppo->data = $itemDateGruppo->data;


                        $this->db->select('ora, titolo_' . $language . ' as titolo');
                        $this->db->from('oraricorso');
                        $this->db->where('datecorso_id', $itemDateGruppo->id);
                        $this->db->order_by('ora');
                        $queryOrari = $this->db->get();
                        $resOrari = $queryOrari->result();


                        //echo $this->db->last_query();

                        $dateGruppo->orari = array();

                        foreach ($resOrari as $itemOrari) {

                            $orari = new stdClass();
                            $orari->ora = $itemOrari->ora;
                            $orari->titolo = $itemOrari->titolo;



                            $dateGruppo->orari[] = $orari;
                        }

                        $gruppo->dateGruppo[] = $dateGruppo;
                    }

                    $categoria->gruppo[] = $gruppo;
                }

                $categoria->corso[] = $corso;
            }

            $response[] = $categoria;
        }


        //return $response;


        if (count($response) > 0) {
            $this->result->validation = true;
            $this->result->message = 'categorie e corsi trovati';
            $this->result->httpResponse = 200;
            $this->result->data = $response;
        } else {
            $this->result->validation = FALSE;
            $this->result->errorNum = '0701';
            //$this->result->data = $response;
        }

        return $this->result;
    }

    public function setPrenota($datecorso_gruppo, $corso_id, $venditore_id, $salone, $numeroPosti) {

        $this->db->insert("prenotazione", array('datecorso_gruppo' => $datecorso_gruppo, 'corso_id' => $corso_id, 'venditore_id' => $venditore_id, 'salone' => $salone, 'numeroPosti' => $numeroPosti, 'stato_id' => 1));
        
        
        if ($this->db->affected_rows() == true) {
            
            $prenotazione = new stdClass();
            $prenotazione->prenotazione = $this->db->affected_rows();
            
            $this->result->validation = true;
            $this->result->message = 'Prenotazione inserita con successo';
            $this->result->httpResponse = 200;
            $this->result->data = $prenotazione;
        } else {

            $this->result->validation = FALSE;
            $this->result->errorNum = '0701';
        }

        return $this->result;
    }

    public function getToUpdate() {
        $this->db->select('funzione, dataUpdate');
        $this->db->from('checkUpdate');
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }

}
