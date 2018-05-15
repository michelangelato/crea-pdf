<?php

/**
 * invoice data model
 *
 * @package PersonalData
 * @version 1.0
 * @copyright Schema31 s.p.a - 2015
 */
class Magazzino_model extends CI_Model {

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

    public function listaMagazzino($limit, $id) {
        $this->db->limit($limit, $id);
        $this->db->select('contenuti.id as id_contenuto, 
			   contenuti.isbn, 
                           contenuti.titolo, 
						contenuti.descrizione, 
						contenuti.prezzo,
						contenuti.edizione,
						contenuti.image, 
						magazzino.id,
						magazzino.id as id_magazzino,
						magazzino.id_tipo_presa_carico,  
						magazzino.percentuale_sconto, 
						magazzino.copie_omaggio, 
						magazzino.data_carico, 
						magazzino.quantita,
						magazzino.quantita_caricata,
						magazzino.documento_carico, 
						magazzino.data_inserimento_riga,
						magazzino.data_modifica_riga,  
						tipo_presa_carico.id as id_tipo_presa_carico, 
						tipo_presa_carico.nome, 
						distributore.id as id_distributore, 
						distributore.nome as distributore, 
						autori.nome as autore, 
						casa_editrice.nome as casa_editrice, 
						contenuti_tipo.id as id_contenuto_tipo,
						contenuti_tipo.tipo as contenuto_tipo');
        $this->db->from('magazzino');
        $this->db->join('contenuti', 'magazzino.id_contenuto = contenuti.id');
        $this->db->join('tipo_presa_carico', 'magazzino.id_tipo_presa_carico = tipo_presa_carico.id');
        $this->db->join('distributore', 'magazzino.id_distributore = distributore.id');
        $this->db->join('casa_editrice', 'contenuti.id_casa_editrice = casa_editrice.id');
        $this->db->join('autori', 'contenuti.id_autore = autori.id');
        $this->db->join('contenuti_tipo', 'contenuti.id_contenuto_tipo = contenuti_tipo.id');
        $this->db->where('magazzino.is_active', '1');
        $this->db->where('magazzino.quantita > 0');
        $this->db->where(' magazzino.is_active', '1');

        $this->db->order_by('data_carico', 'DESC');
        $query = $this->db->get();

//echo $this->db->last_query();die();
        $res = $query->result();

        return $res;
    }

    public function listaMagazzino_count() {

        $this->db->select('contenuti.id as id_contenuto, 
			   contenuti.isbn, 
                           contenuti.titolo, 
						contenuti.descrizione, 
						contenuti.prezzo,
						contenuti.edizione,
						contenuti.image, 
						magazzino.id,
						magazzino.id as id_magazzino,
						magazzino.id_tipo_presa_carico,  
						magazzino.percentuale_sconto, 
						magazzino.copie_omaggio, 
						magazzino.data_carico, 
						magazzino.quantita,
						magazzino.quantita_caricata,
						magazzino.documento_carico, 
						magazzino.data_inserimento_riga,
						magazzino.data_modifica_riga,  
						tipo_presa_carico.id as id_tipo_presa_carico, 
						tipo_presa_carico.nome, 
						distributore.id as id_distributore, 
						distributore.nome as distributore, 
						autori.nome as autore, 
						casa_editrice.nome as casa_editrice, 
						contenuti_tipo.id as id_contenuto_tipo,
						contenuti_tipo.tipo as contenuto_tipo');
        $this->db->from('magazzino');
        $this->db->join('contenuti', 'magazzino.id_contenuto = contenuti.id');
        $this->db->join('tipo_presa_carico', 'magazzino.id_tipo_presa_carico = tipo_presa_carico.id');
        $this->db->join('distributore', 'magazzino.id_distributore = distributore.id');
        $this->db->join('casa_editrice', 'contenuti.id_casa_editrice = casa_editrice.id');
        $this->db->join('autori', 'contenuti.id_autore = autori.id');
        $this->db->join('contenuti_tipo', 'contenuti.id_contenuto_tipo = contenuti_tipo.id');
        $this->db->where('magazzino.is_active', '1');
        $this->db->where('magazzino.quantita > 0');


        $query = $this->db->get();

        return $query->num_rows();
    }

    public function listaCaricoMagazzino($limit, $id) {
        $this->db->limit($limit, $id);
        $this->db->select('contenuti.id as id_contenuto, 
						contenuti.isbn, 
						contenuti.titolo, 
						contenuti.descrizione, 
						contenuti.prezzo, 
						contenuti.image, 
						carico_magazzino.id,
						carico_magazzino.id as id_carico_magazzino, 
						carico_magazzino.quantita,
						carico_magazzino.codice_sap, 
						carico_magazzino.documento_carico, 
						carico_magazzino.percentuale_sconto, 
						carico_magazzino.copie_omaggio, 
						carico_magazzino.data_carico, 
						carico_magazzino.quantita,
						carico_magazzino.quantita_caricata,
						carico_magazzino.data_inserimento_riga,
						carico_magazzino.data_modifica_riga,  
						tipo_presa_carico.id as id_tipo_presa_carico, 
						tipo_presa_carico.nome, 
						distributore.id as id_distributore, 
						distributore.nome as distributore, 
						autori.nome as autore, 
						casa_editrice.nome as casa_editrice, 
						contenuti_tipo.id as id_contenuto_tipo,
						contenuti_tipo.tipo as contenuto_tipo');
        $this->db->from('carico_magazzino');
        $this->db->join('contenuti', 'carico_magazzino.id_contenuto = contenuti.id');
        $this->db->join('tipo_presa_carico', 'carico_magazzino.id_tipo_presa_carico = tipo_presa_carico.id');
        $this->db->join('distributore', 'carico_magazzino.id_distributore = distributore.id');
        $this->db->join('casa_editrice', 'contenuti.id_casa_editrice = casa_editrice.id');
        $this->db->join('autori', 'contenuti.id_autore = autori.id');
        $this->db->join('contenuti_tipo', 'contenuti.id_contenuto_tipo = contenuti_tipo.id');
        $this->db->where('carico_magazzino.is_active', '1');
        $this->db->where('carico_magazzino.quantita > 0');

        $this->db->order_by('data_carico', 'DESC');
        $query = $this->db->get();

//echo $this->db->last_query();die();
        $res = $query->result();

        return $res;
    }

    public function listaCaricoMagazzino_count() {

        $this->db->select('contenuti.id as id_contenuto, 
						contenuti.isbn, 
						contenuti.titolo, 
						contenuti.descrizione, 
						contenuti.prezzo, 
						contenuti.image, 
						carico_magazzino.id,
						carico_magazzino.id as id_carico_magazzino, 
						carico_magazzino.quantita,
						carico_magazzino.codice_sap, 
						carico_magazzino.documento_carico, 
						carico_magazzino.percentuale_sconto, 
						carico_magazzino.copie_omaggio, 
						carico_magazzino.data_carico, 
						carico_magazzino.quantita,
						carico_magazzino.quantita_caricata,
						carico_magazzino.data_inserimento_riga,
						carico_magazzino.data_modifica_riga,  
						tipo_presa_carico.id as id_tipo_presa_carico, 
						tipo_presa_carico.nome, 
						distributore.id as id_distributore, 
						distributore.nome as distributore, 
						autori.nome as autore, 
						casa_editrice.nome as casa_editrice, 
						contenuti_tipo.id as id_contenuto_tipo,
						contenuti_tipo.tipo as contenuto_tipo');
        $this->db->from('carico_magazzino');
        $this->db->join('contenuti', 'carico_magazzino.id_contenuto = contenuti.id');
        $this->db->join('tipo_presa_carico', 'carico_magazzino.id_tipo_presa_carico = tipo_presa_carico.id');
        $this->db->join('distributore', 'carico_magazzino.id_distributore = distributore.id');
        $this->db->join('casa_editrice', 'contenuti.id_casa_editrice = casa_editrice.id');
        $this->db->join('autori', 'contenuti.id_autore = autori.id');
        $this->db->join('contenuti_tipo', 'contenuti.id_contenuto_tipo = contenuti_tipo.id');
        $this->db->where('carico_magazzino.is_active', '1');
        $this->db->where('carico_magazzino.quantita > 0');


        $query = $this->db->get();

        return $query->num_rows();
    }

    public function distributoreAdd($data) {

        $this->db->insert("distributore", $data);

        // echo $this->db->last_query();

        $res = ($this->db->affected_rows() != 1) ? false : true;

        if ($res) {
            $this->result->validation = TRUE;
            $this->result->message = 'insert distributore ok';
            $this->result->httpResponse = 200;
        } else {
            $this->result->validation = FALSE;
            $this->result->errorNum = '0701';
            $this->result->errorText = 'Errore in insert distributore';
            $this->result->message = 'Errore';
            $this->result->httpResponse = 417;
        }

        return $this->result;
    }

    public function getElencoDistributori($id) {
        
        
        $this->db->select('id, nome');
        $this->db->from('distributore');
        
         if ($id != "") {
            $this->db->where('id', $id);
        }
        
        $this->db->order_by('nome');
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }

    
    
    public function getElencoContenutiTipo($id) {
        
        $this->db->select('id, tipo');
        $this->db->from('contenuti_tipo');
        $this->db->where('is_active','1');
        
        if ($id != "") {
            $this->db->where('id', $id);
        }
        
        $this->db->order_by('tipo');
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }

    
    
    
    
    
    
    
    
    
    
//    
//
//    public function getElencoCorsiArchivio($categoriaCorso) {
//
//        $this->db->select('corso.id, (select MIN(data) as d from datecorso where corso_id = `corso`.id) as `dataMin`, '
//                . '(select MAX(data) as d from datecorso where corso_id = `corso`.id) as `dataMax`,`titolo_ITA`, '
//                . '`persona`.`cognome` as `trainer`, categoriacorso.`nome_ITA` as categoria, destinatariocorso.nome_ITA as destinatari');
//        $this->db->from('corso');
//        $this->db->join('categoriacorso', 'corso.categoria_id = categoriacorso.id');
//        $this->db->join('destinatariocorso', 'corso.destinatario_id = destinatariocorso.id');
//        $this->db->join('persona', 'corso.trainer_id = persona.id');
//        $this->db->where('(CURDATE() > (select MAX(data) as d from datecorso where corso_id = `corso`.id))');
//        //$this->db->group_by('corso.id');
//
//        if (isset($categoriaCorso) && $categoriaCorso != "")
//            $this->db->where('categoriacorso.id', $categoriaCorso);
//
//        $this->db->order_by('dataMin', 'asc');
//        $query = $this->db->get();
//
//        //echo $this->db->last_query();die();
//        $res = $query->result();
//
//        $response = array();
//
//        foreach ($res as $item) {
//
//            $corso = new stdClass();
//            $corso->id = $item->id;
//
//            $corso->titolo = $item->titolo_ITA;
//            $corso->categoria = $item->categoria;
//            $corso->destinatari = $item->destinatari;
//            $corso->saveTheDate = $this->getSaveTheDate($item->id);
//            $corso->prenotazioni = $this->getCheckPrenotazioni($item->id);
//            $corso->trainer = $item->trainer;
//
//            $corso->data = ($item->dataMin == null) ? '-' : date("d-m-Y", strtotime($item->dataMin));
//
//            $response[] = $corso;
//        }
//        return $response;
//    }
//
//    public function getCorsoById($idCorso) {
//
//        $this->db->select('corso.*');
//        $this->db->from('corso');
//        $this->db->join('categoriacorso', 'corso.categoria_id = categoriacorso.id');
//        $this->db->join('destinatariocorso', 'corso.destinatario_id = destinatariocorso.id');
//        $this->db->join('persona', 'corso.trainer_id = persona.id');
//        $this->db->where('corso.id', $idCorso);
//        $query = $this->db->get();
//        $res = $query->result();
//
//
//        //var_dump($res);
//
//        return $res;
//    }
//
//    public function getMaxGruppoByIdCorso($idCorso) {
//
//        $this->db->select('MAX(gruppo) as gruppo');
//        $this->db->from('datecorso');
//        $this->db->where('corso_id', $idCorso);
//        $query = $this->db->get();
//        $res = $query->result();
//
//        return $res;
//    }
//
//    public function getSaveTheDate($idCorso) {
//
//        $this->db->select('GROUP_CONCAT(DATE_FORMAT(data, "%d-%m-%Y" ) ORDER BY data ASC) as saveTheDate, gruppo');
//        $this->db->from('datecorso');
//        $this->db->where('corso_id', $idCorso);
//        $this->db->group_by('gruppo');
//        $this->db->order_by('data');
//
//        $query = $this->db->get();
//        $res = $query->result();
//        return $res;
//    }
//
//    public function getDateByIdCorsoAndGruppo($idCorso, $gruppo) {
//
//        $this->db->select('GROUP_CONCAT(DATE_FORMAT(data, "%d-%m-%Y" ) ORDER BY data ASC) as date');
//        $this->db->from('datecorso');
//        $this->db->where('corso_id', $idCorso);
//        $this->db->where('gruppo', $gruppo);
//        $this->db->order_by('data');
//
//        $query = $this->db->get();
//        $res = $query->result();
//        return $res;
//    }
//
//    public function getCheckPrenotazioni($idCorso) {
//
//        $this->db->select('count(id) as prenotazioni');
//        $this->db->from('prenotazione');
//        $this->db->where('corso_id', $idCorso);
//        $this->db->where('stato_id', 1);
//
//        $query = $this->db->get();
//        $res = $query->result();
//        return $res;
//    }
//
//    public function getDateCorsoModale($idCorso, $gruppo) {
//
//        $this->db->select('GROUP_CONCAT(DATE_FORMAT(data, "%d-%m-%Y" )) as myDate, gruppo');
//        $this->db->from('datecorso');
//        $this->db->where('corso_id', $idCorso);
//        $this->db->where('gruppo', $gruppo);
//        $query = $this->db->get();
//        $res = $query->result();
//        return $res;
//    }
//
//    public function getElencoCategoria() {
//
//        $this->db->from('categoriacorso');
//        $this->db->order_by('nome_ITA');
//        $query = $this->db->get();
//        $res = $query->result();
//        return $res;
//    }
//
//    public function getElencoAule() {
//
//        $this->db->from('aula');
//        $this->db->order_by('nome_ITA');
//        $query = $this->db->get();
//        $res = $query->result();
//
//        return $res;
//    }
//
//    public function getElencoLocation() {
//
//        $this->db->from('location');
//        $this->db->order_by('nome');
//        $query = $this->db->get();
//        $res = $query->result();
//
//        return $res;
//    }
//
//    public function getElencoTrainer() {
//
//        $this->db->from('persona');
//        $this->db->order_by('cognome');
//        $query = $this->db->get();
//        $res = $query->result();
//
//        return $res;
//    }
//
//    public function getElencoVenditori() {
//        $this->db->select('id, CONCAT(venditore.cognome, " ", venditore.nome) AS agente');
//        $this->db->from('venditore');
//        $this->db->order_by('cognome');
//        $query = $this->db->get();
//        $res = $query->result();
//
//        return $res;
//    }
//
//    public function getElencoDistributori() {
//        $this->db->select('distinct(distributore) AS distributore');
//        $this->db->from('venditore');
//        $this->db->join('prenotazione', 'venditore.id = prenotazione.venditore_id');
//        $this->db->order_by('distributore');
//        $query = $this->db->get();
//        $res = $query->result();
//
//        return $res;
//    }
//
//    public function getElencoDestinatarioCorso() {
//
//        $this->db->from('destinatariocorso');
//        $this->db->order_by('nome_ITA');
//        $query = $this->db->get();
//        $res = $query->result();
//
//        return $res;
//    }
//
//    public function setCorso($data, $idCorso) {
//
//        if ($idCorso) {
//
//            $this->db->where('id', $idCorso);
//            $this->db->update("corso", $data);
//
//            $this->funzioneUpdate('corso');
//
//            $this->db->set('task_name', $data['titolo_ITA']);
//            $this->db->set('task_details', $data['titolo_ITA']);
//            $this->db->where('corso_id', $idCorso);
//            $this->db->update('task');
//
//            $res = ($this->db->affected_rows() != 1) ? false : true;
//        } else {
//
//            $this->funzioneUpdate('corso');
//
//            $this->db->insert("corso", $data);
//
//            $res = ($this->db->affected_rows() != 1) ? false : true;
//        }
//
//
//        if ($res) {
//
//            $this->result->validation = TRUE;
//            $this->result->message = 'insert corso ok';
//            $this->result->httpResponse = 200;
//            $this->result->data = $this->db->insert_id();
//        } else {
//            $this->result->validation = FALSE;
//            $this->result->errorNum = '0701';
//            $this->result->errorText = 'Errore in insert corso';
//            $this->result->message = 'Errore';
//            $this->result->httpResponse = 417;
//        }
//
//        return $this->result;
//    }
//
//    public function setCorsiInCalendario($arrayGiorno, $idCorso, $gruppo, $action) {
//
////        echo "<pre>::::::::";
////        print_r($arrayGiorno);
//        //prendo il titolo del corso per inserirlo in calendario
//        $ret = $this->getCorsoById($idCorso);
//
//        //var_dump($ret);
//
//        $titolo = $ret[0]->titolo_ITA;
//        $descrizione = $ret[0]->descrizione_ITA;
//
//
//
//        if ($action == "insert") {
//            $retGruppo = $this->getMaxGruppoByIdCorso($idCorso);
//            $gruppo = $retGruppo[0]->gruppo;
//        }
//
//
//        if ($action == "update") {
//
//            $this->db->where('gruppo', $gruppo);
//            $this->db->where('corso_id', $idCorso);
//            $this->db->delete('task');
//        }
//
//
//
//
//
//        $gg = array();
//        foreach ($arrayGiorno as $gg) {
//
//            $dates[] = $gg;
//        }
//
//        $conseq = array();
//        $ii = 0;
//        $max = count($dates);
//
//        // echo "max::" . $max . PHP_EOL;
//
//        for ($i = 0; $i < count($dates); $i++) {
//            $conseq[$ii][] = date('Y-m-d', strtotime($dates[$i]));
//
//            if ($i + 1 < $max) {
//                $dif = strtotime($dates[$i + 1]) - strtotime($dates[$i]);
//                if ($dif >= 90000) {
//                    $ii++;
//                }
//            }
//        }
//
//        if (count($conseq) > 0) {
//            foreach ($conseq as $value) {
//                if (count($value) > 0) {
//
//                    $old_date_start = strtotime($value[0]);
//                    $new_date_start = date('Y-m-d H:i:s', $old_date_start);
//
//                    $old_date_end = strtotime(end($value));
//                    $new_date_end = date('Y-m-d H:i:s', strtotime('+1 days', $old_date_end));
//
//                    $task_details = array('task_name' => $titolo,
//                        'task_details' => $titolo,
//                        //'task_details' => $descrizione,
//                        'date' => $new_date_start,
//                        'start' => $new_date_start,
//                        'end' => $new_date_end,
//                        'colore' => '#78145f',
//                        'tipologia' => 'jacademy',
//                        'corso_id' => $idCorso,
//                        'gruppo' => $gruppo
//                    );
//                } else {
//
//                    $old_date_start = strtotime($value[0]);
//                    $new_date_start = date('Y-m-d H:i:s', $old_date_start);
//
//                    $task_details = array('task_name' => $titolo,
//                        'task_details' => $titolo,
//                        //'task_details' => $descrizione,
//                        'date' => $new_date_start,
//                        'start' => $new_date_start,
//                        'end' => $new_date_start,
//                        'colore' => '#78145f',
//                        'tipologia' => 'jacademy',
//                        'corso_id' => $idCorso,
//                        'gruppo' => $gruppo
//                    );
//                }
//
//
//
//                $this->db->insert('task', $task_details);
//                $this->funzioneUpdate('corso');
//                //  echo "<br><br><br>sql: " . $this->db->last_query();
//            }
//        }
//
//        //echo "<HR><BR><BR><pre>";
//        //print_r($conseq);
//    }
//
//    public function setDateCorso($arrayDate, $arrayGiorno, $idCorso) {
//
//        $this->db->from('datecorso');
//        $this->db->where('corso_id', $idCorso);
//        $this->db->where_in('data', $arrayGiorno);
//
//        $query = $this->db->get();
//
//        //echo "<br><br><br>sql: " . $this->db->last_query();
//        $res = $query->result();
//
//
//        // può succedere che si stiano sovrascrivendo dei giorni già settati per lo stesso corso
//        // allora blocchiamo
//        if ($res > 0 && !empty($res)) {
//            $controllaDate = array();
//            foreach ($res as $value) {
//                $myData = date("d-m-Y", strtotime($value->data));
//                $controllaDate[] = $myData;
//            }
//
//            $controllaDate_string = implode(", ", $controllaDate);
//            $msg = "attenzione stai sovrascrivendo una data già esistente... controlla: " . $controllaDate_string;
//            //echo "<br><br><br>" . $msg;
//
//            $this->result->validation = FALSE;
//            $this->result->errorNum = '0701';
//            $this->result->errorText = $msg;
//            $this->result->message = $msg;
//            $this->result->httpResponse = 417;
//
//            //print_r($this->result);
//
//            return $this->result;
//        } else {
//            // altrimenti andiamo avanti e
//            // controllo se già ci sono dei gionri settati per questo id corso
//            //echo "<br><br><br> continua::: <br>";
//
//            $this->db->select_max('gruppo');
//            $this->db->from('datecorso');
//            $this->db->where('corso_id', $idCorso);
//            $query = $this->db->get();
//
//
//            // echo "<br><br><br>sql: " . $this->db->last_query();
//
//            $res = $query->result();
//            // se ci sono prendo il gruppo e lo incremento di 1;
//            if ($res > 0 && !empty($res)) {
//                $myGruppo = $res[0]->gruppo + 1;
//            }
//
//            $giorniUnivoci = array();
//
//            //$arrayDateUnivoche = array_unique($arrayDate, SORT_REGULAR);
//
//            foreach ($arrayDate as $value) {
//                $giorniUnivoci[] = $value['data'];
//                $giorno = array_unique($giorniUnivoci);
//            }
//
//            $this->db->trans_begin();
//
//            foreach ($giorno as $myGiorno) {
//
//                // print "GGGGGGGGGGIORNOOO::::::: " . $myGiorno . "<br>";
////                
//                $this->db->set('data', $myGiorno);
//                $this->db->set('corso_id', $idCorso);
//                $this->db->set('gruppo', $myGruppo);
//                $this->db->insert('datecorso');
////                
//                foreach ($arrayDate as $value) {
//
//                    if ($value['data'] == $myGiorno) {
//
//                        //mi prendo datecorso_id per inserirlo negli orari
//                        $this->db->select('id');
//                        $this->db->from('datecorso');
//                        $this->db->where('data', $myGiorno);
//                        $this->db->where('corso_id', $idCorso);
//                        $query = $this->db->get();
//                        $res = $query->result();
//
//                        //Inserisco orari titolo_ITA, titolo_ENG
//                        $this->db->set('ora', $value['ora']);
//                        $this->db->set('titolo_ITA', $value['titolo_ITA']);
//                        $this->db->set('titolo_ENG', $value['titolo_ENG']);
//                        $this->db->set('datecorso_id', $res[0]->id);
//                        $this->db->insert('oraricorso');
//                    }
//                }
//            }
//
//            //inserisco giorni nel calendario
//            $this->setCorsiInCalendario($arrayGiorno, $idCorso, '', 'insert');
//        }
//
//
//        $this->db->trans_complete();
//
//
//        if ($this->db->trans_status() === FALSE) {
//
//            $this->result->validation = FALSE;
//            $this->result->errorNum = '0701';
//            $this->result->errorText = 'Errore in insert date corso';
//            $this->result->message = 'Errore';
//            $this->result->httpResponse = 417;
//        } else {
//            $this->funzioneUpdate('corso');
//
//            $this->result->validation = TRUE;
//            $this->result->message = 'insert date corso ok';
//            $this->result->httpResponse = 200;
//            $this->result->data = $this->db->insert_id();
//            $this->result->gruppo = $myGruppo;
//        }
//
//        //print_r($this->result);
//
//        return $this->result;
//    }
//
//    public function updateDateCorsoNuoviGiorni($arrayGiorno, $idCorso, $gruppo) {
//
//        //controllo se sono stati aggiunti nuovi giorni
//        $this->db->select('data');
//        $this->db->from('datecorso');
//        $this->db->where('datecorso.corso_id', $idCorso);
//        $this->db->where('gruppo', $gruppo);
//
//        $queryGruppo = $this->db->get();
//
//        $resGruppo = $queryGruppo->result_array();
//
//        $arrayGiornoDB = array();
//        foreach ($resGruppo as $value) {
//
//            $arrayGiornoDB[] = $value['data'];
//        }
//
//        $nuoviGiorni = array_diff($arrayGiorno, $arrayGiornoDB);
//        if (count($nuoviGiorni) > 0) {
//
//            foreach ($nuoviGiorni as $valueNuovi) {
//
//                $this->db->set('data', $valueNuovi);
//                $this->db->set('corso_id', $idCorso);
//                $this->db->set('gruppo', $gruppo);
//                $this->db->insert('datecorso');
//
//                // echo "sql data " . $this->db->last_query(). PHP_EOL;
//            }
//        }
//
//        if ($this->db->affected_rows()) {
//           $this->result->validation = TRUE;
//        } else {
//            $this->result->validation = FALSE;
//        }
//
//        return $this->result;
//    }
//    
//    
//    
//    
//
//    public function updateDateCorso($arrayDate, $arrayGiorno, $idCorso, $gruppo) {
//
////        echo "<br><br>arrayDate::";
////        echo "<pre>";
////
////        print_r($arrayGiorno);
////        die();
//
//        $this->db->trans_begin();
//
//        //controllo se sono stati aggiunti nuovi giorni
//        $this->db->select('data');
//        $this->db->from('datecorso');
//        //$this->db->join('oraricorso', 'datecorso.id = oraricorso.datecorso_id');
//        $this->db->where('datecorso.corso_id', $idCorso);
//        $this->db->where('gruppo', $gruppo);
//
//        $queryGruppo = $this->db->get();
//
//        $resGruppo = $queryGruppo->result_array();
//
////         echo "sql giorni database: " . $this->db->last_query(). PHP_EOL;
////        
////        print_r($resGruppo);
//
//        $arrayGiornoDB = array();
//        foreach ($resGruppo as $value) {
//
//            $arrayGiornoDB[] = $value['data'];
//        }
//
////        echo "<br><br>arrayGiornoDB::";
////        echo "<pre>";
////        print_r($arrayGiornoDB);
////        echo "<br><br>arrayGiorno::";
////        echo "<pre>";
////        print_r($arrayGiorno);
////        echo "<br><br>nuoviGiorni::";
////        echo "<pre>";
//
//        $nuoviGiorni = array_diff($arrayGiorno, $arrayGiornoDB);
////       echo "<pre>";
////       print_r($nuoviGiorni);
//
//
//        if (count($nuoviGiorni) > 0) {
//
//            foreach ($nuoviGiorni as $valueNuovi) {
//
//                $this->db->set('data', $valueNuovi);
//                $this->db->set('corso_id', $idCorso);
//                $this->db->set('gruppo', $gruppo);
//                $this->db->insert('datecorso');
//
////                  echo "sql data " . $this->db->last_query(). PHP_EOL;
//            }
//        }
//        //---------------------------------
//        //altrimenti vado avanti ad aggiornare o inserire gli orari delle vari giorni esitenti 
////        echo "SSSS: <pre>";
//        //print_r($arrayDate);
//
//
//
//        foreach ($arrayDate as $value) {
//
//            $this->db->from('datecorso');
//            $this->db->join('oraricorso', 'datecorso.id = oraricorso.datecorso_id');
//            $this->db->where('datecorso.corso_id', $idCorso);
//            $this->db->where('data', $value['data']);
//            $this->db->where('oraricorso.id', $value['idOrario']);
//            $query = $this->db->get();
//
//            $res = $query->result();
////            echo "sql date: " . $this->db->last_query(). PHP_EOL;
//            //print_r($res);
//
//            if (count($res) > 0) {
//
//                $this->db->set('ora', $value['ora']);
//                $this->db->set('titolo_ITA', $value['titolo_ITA']);
//                $this->db->set('titolo_ENG', $value['titolo_ENG']);
//                $this->db->where('id', $value['idOrario']);
//                $this->db->update('oraricorso');
////                echo "sql UPDATE0000 " . $this->db->last_query(). PHP_EOL;
//            } else {
//
//                $this->db->from('datecorso');
//                $this->db->where('datecorso.corso_id', $idCorso);
//                $this->db->where('data', $value['data']);
//                $query = $this->db->get();
//                $res = $query->result();
//
//                //echo "sql UPDATE111: " . $this->db->last_query() . PHP_EOL;
//
//                if (count($res) > 0) {
//                    //Inserisco orari titolo_ITA, titolo_ENG
//                    $this->db->set('ora', $value['ora']);
//                    $this->db->set('titolo_ITA', $value['titolo_ITA']);
//                    $this->db->set('titolo_ENG', $value['titolo_ENG']);
//                    $this->db->set('datecorso_id', $res[0]->id);
//                    $this->db->insert('oraricorso');
////                    echo "sql UPDATE22222: " . $this->db->last_query() . PHP_EOL;
//                }
//            }
//        }
//
//        //aggiorno giorni nel calendario
//        $this->setCorsiInCalendario($arrayGiorno, $idCorso, $gruppo, 'update');
//
//        $this->db->trans_complete();
//        if ($this->db->trans_status() === FALSE) {
//
//            $this->result->validation = FALSE;
//            $this->result->errorNum = '0701';
//            $this->result->errorText = 'Errore in insert date corso';
//            $this->result->message = 'Errore';
//            $this->result->httpResponse = 417;
//        } else {
//
//            $this->funzioneUpdate('corso');
//
//            $this->result->validation = TRUE;
//            $this->result->message = 'insert date corso ok';
//            $this->result->httpResponse = 200;
//            $this->result->data = $this->db->insert_id();
//        }
//
//        return $this->result;
//    }
//
//    /**
//     * extract full record list
//     * @param int $limit
//     * @param int $offset
//     * @return array of objects
//     */
//    public function getDateOrariByIdCorso($idCorso, $gruppo) {
//
//
//        //prendo le domande
//        $this->db->from('datecorso');
//        $this->db->where('datecorso.corso_id', $idCorso);
//        $this->db->where('datecorso.gruppo', $gruppo);
//
//        $this->db->order_by('data', 'ASC');
//
//        $query_datecorso = $this->db->get();
//
//
//        // echo "<br><br><br>sql: " . $this->db->last_query();
//        // print_r($query_datecorso->result());
//
//        $response = array();
//
//        foreach ($query_datecorso->result() as $row_datecorso) {
//
//            $date = new stdClass();
//            $date->corso_id = $row_datecorso->id;
//
//            $giorno = date("d-m-Y", strtotime($row_datecorso->data));
//
//
//            $date->giorno = $giorno;
//
//
//
//            //prendo gli orario per ogni data
//            $this->db->from('oraricorso');
//            $this->db->where('oraricorso.datecorso_id', $row_datecorso->id);
//            $this->db->order_by('ora', 'ASC');
//            $query_oraricorso = $this->db->get();
//
//            $date->oraricorso = array();
//
//            //per aula
//            foreach ($query_oraricorso->result() as $row_oraricorso) {
//                $oraricorso = new stdClass();
//                $oraricorso->idOrariCorso = $row_oraricorso->id;
//                $ora = date("H:i", strtotime($row_oraricorso->ora));
//                $oraricorso->ora = $ora;
//                $oraricorso->titolo_ITA = $row_oraricorso->titolo_ITA;
//                $oraricorso->titolo_ENG = $row_oraricorso->titolo_ENG;
//
//                $date->oraricorso[] = $oraricorso;
//            }
//            //$questionario->date[] = $domanda;
//
//            $response[] = $date;
//        }
//
//        //print_r($date);
//
//
//        if ($idCorso == "")
//            $date = array();
//
//
//
//        //print_r($response);
//
//
//        return $response;
//    }
//
//    /**
//     * extract full record list
//     * @param int $limit
//     * @param int $offset
//     * @return array of objects
//     */
//    public function getIdOrario() {
//
//
//        //prendo le domande
//        $this->db->select('max(id) as numLi');
//        $this->db->from('oraricorso');
//
//        $query_datecorso = $this->db->get();
//
//        $ret = $query_datecorso->result();
//
//        $ret = $ret[0]->numLi + 1;
//
//        //print_r($ret);
//
//        return $ret;
//    }
//
//    //da finire
//    public function giornoDelete($giorno, $gruppo, $idCorso) {
//
//        $giorno = strtotime($giorno);
//        $giorno = date('Y-m-d', $giorno);
//
//
//        $this->db->where("datecorso_id IN (select id from datecorso where gruppo = $gruppo and corso_id = $idCorso  and data ='" . $giorno . "')");
//        $this->db->delete('oraricorso');
//
////        if ($this->db->affected_rows()) {
//        $this->db->where('corso_id', $idCorso);
//        $this->db->where('gruppo', $gruppo);
//        $this->db->where('data', $giorno);
//        $this->db->delete('datecorso');
//
//        if ($this->db->affected_rows()) {
//
//
//            $this->db->from('datecorso');
//            $this->db->where('datecorso.corso_id', $idCorso);
//            $this->db->where('datecorso.gruppo', $gruppo);
//            $query_datecorso = $this->db->get();
//            $ret = $query_datecorso->result();
//            $arrayGiorno = array();
//            foreach ($ret as $value) {
//                $arrayGiorno[] = $value->data;
//            }
//
//            //aggiorno giorni nel calendario
//            $this->setCorsiInCalendario($arrayGiorno, $idCorso, $gruppo, 'update');
//            $this->funzioneUpdate('corso');
//
//
//
//            return TRUE;
//        } else {
//            return FALSE;
//        }
////        }
//    }
//
//    //da finire
//    public function saveTheDateDelete($date, $gruppo, $idCorso) {
//
//        $date = explode(",", $date);
//        $mioArray = array();
//        foreach ($date as $value) {
//            $myData = date("Y-m-d", strtotime($value));
//            $mioArray[] = $myData;
//        }
//
//        $miaData = implode("','", $mioArray);
//
//        $this->db->where("datecorso_id IN (select id from datecorso where gruppo = $gruppo and corso_id = $idCorso  and data IN ('" . $miaData . "'))");
//        $this->db->delete('oraricorso');
//        //echo "<br><br><br>sql: " . $this->db->last_query() . PHP_EOL;
//        //if ($this->db->affected_rows()) {
//        $this->db->where('corso_id', $idCorso);
//        $this->db->where('gruppo', $gruppo);
//        $this->db->where("data IN ('" . $miaData . "')");
//        $this->db->delete('datecorso');
//
//        //echo "<br><br><br>sql: " . $this->db->last_query(). PHP_EOL;
//
//
//        $this->db->where('gruppo', $gruppo);
//        $this->db->where('corso_id', $idCorso);
//        $this->db->delete('task');
//
//
//
//
//
//
//        if ($this->db->affected_rows()) {
//            return TRUE;
//        } else {
//            return FALSE;
//        }
//        // }
//    }
//
//    //da finire
//    public function corsoDelete($idCorso) {
//
//        $this->db->where('datecorso_id IN (select id from datecorso where corso_id = ' . $idCorso . ')');
//        $this->db->delete('oraricorso');
//
////        if ($this->db->affected_rows()) {
//        $this->db->where('corso_id', $idCorso);
//        $this->db->delete('datecorso');
//
//        $this->db->where('id', $idCorso);
//        $this->db->delete('corso');
//
//
//        $this->db->where('corso_id', $idCorso);
//        $this->db->delete('task');
//
//
//
//        if ($this->db->affected_rows()) {
//            $this->funzioneUpdate('corso');
//
//            return TRUE;
//        } else {
//            return FALSE;
//        }
////            }
////        }
//    }
//
//    public function orarioDelete($idOrario) {
//
//        $this->db->where('id', $idOrario);
//        $this->db->delete('oraricorso');
//
//        // echo $this->db->last_query();
//
//        if ($this->db->affected_rows()) {
//
//            $this->funzioneUpdate('corso');
//
//            return TRUE;
//        } else {
//            return FALSE;
//        }
//    }
//
//    /**
//     * extract full record list
//     * @param int $limit
//     * @param int $offset
//     * @return array of objects
//     */
//    public function getPrenotazioni($idCorso) {
//
//        $ret = $this->getSaveTheDate($idCorso);
//
////        var_dump($ret);
//        //die();
//
//        $response = array();
//
//        foreach ($ret as $value) {
//
//            $prenotazione = new stdClass();
//            $prenotazione->saveTheDate = $value->saveTheDate;
//            $prenotazione->gruppo = $value->gruppo;
//            $prenotazione->numeroPostiInAttesa = $this->getNumeroPostiInAttesaByIdCorsoAndGruppo($idCorso, $value->gruppo);
//            $prenotazione->numeroPostiConfermati = $this->getNumeroPostiConfermatiByIdCorsoAndGruppo($idCorso, $value->gruppo);
//            $prenotazione->numeroPostiRifiutati = $this->getNumeroPostiRifiutatiByIdCorsoAndGruppo($idCorso, $value->gruppo);
//
//
//
//            //prendo le prenotazioni
//            $this->db->select('prenotazione.id, numeroPosti, CONCAT(venditore.nome, " ", venditore.cognome) AS agente, distributore, stato.id as statoId, stato.nome as stato');
//            $this->db->from('prenotazione');
//            $this->db->join('venditore', 'prenotazione.venditore_id = venditore.id');
//            $this->db->join('stato', 'prenotazione.stato_id = stato.id');
//            $this->db->where('corso_id', $idCorso);
//            $this->db->where('datecorso_gruppo', $value->gruppo);
//            $this->db->order_by('prenotazione.id');
//            $query_prenotazioni = $this->db->get();
////
////
//            $prenotazione->elenco = array();
//            //echo "<br><br><br>sql: " . $this->db->last_query() . PHP_EOL;
//            //var_dump($query_prenotazioni->result());
//
//
//            foreach ($query_prenotazioni->result() as $row_prenotazione) {
//
//                $elenco = new stdClass();
//
//                $elenco->id = $row_prenotazione->id;
//                $elenco->numeroPosti = $row_prenotazione->numeroPosti;
//                $elenco->agente = $row_prenotazione->agente;
//                $elenco->distributore = $row_prenotazione->distributore;
//                $elenco->stato = $row_prenotazione->stato;
//                $elenco->statoId = $row_prenotazione->statoId;
//
//                $prenotazione->elenco[] = $elenco;
//            }
//            $response[] = $prenotazione;
//        }
//
////        echo "<pre>";
////       print_r($response);
//        return $response;
//    }
//
//    public function getPrenotazioniById($idPrenotazione) {
//
//        //$response = array();
//        //prendo le prenotazioni
//        $this->db->select('prenotazione.id, numeroPosti, CONCAT(venditore.nome, " ", venditore.cognome) AS agente, distributore, salone, stato.id as statoId, stato.nome as stato');
//        $this->db->from('prenotazione');
//        $this->db->join('venditore', 'prenotazione.venditore_id = venditore.id');
//        $this->db->join('stato', 'prenotazione.stato_id = stato.id');
////            $this->db->where('corso_id', $idCorso);
//        $this->db->where('prenotazione.id', $idPrenotazione);
//
//        $query_prenotazioni = $this->db->get();
//        $ret = $query_prenotazioni->result();
//
////            echo "<pre>";
////            print_r($ret);
////
////                $elenco->id = $row_prenotazione->id;
////                $elenco->numeroPosti = $row_prenotazione->numeroPosti;
////                $elenco->agente = $row_prenotazione->agente;
////                $elenco->distributore = $row_prenotazione->distributore;
////                $elenco->stato = $row_prenotazione->stato;
////                $elenco->statoId = $row_prenotazione->statoId;
////
////                $prenotazione->elenco[] = $elenco;
//        //$response[] = $prenotazione;
////        echo "<pre>";
////        print_r($response);
//        return $ret;
//    }
//
//    public function getDistributoreByIdVenditore($idVenditore) {
//
//        $this->db->select('distributore');
//        $this->db->from('venditore', 'prenotazione.venditore_id = venditore.id');
//        $this->db->where('id', $idVenditore);
//
//        $query_venditore = $this->db->get();
//
//        $ret = $query_venditore->result();
//
//        return $ret;
//    }
//
//    public function getNumeroPostiInAttesaByIdCorsoAndGruppo($idCorso, $gruppo) {
//
//        $this->db->select('sum(numeroPosti) as numero');
//        $this->db->from('prenotazione');
//        $this->db->where('stato_id', 1);
//        $this->db->where('corso_id', $idCorso);
//        $this->db->where('datecorso_gruppo', $gruppo);
//        $query_datecorso = $this->db->get();
//        $ret = $query_datecorso->result();
//
//        return $ret[0]->numero;
//    }
//
//    public function getNumeroPostiConfermatiByIdCorsoAndGruppo($idCorso, $gruppo) {
//
//        $this->db->select('sum(numeroPosti) as numero');
//        $this->db->from('prenotazione');
//        $this->db->where('stato_id', 2);
//        $this->db->where('corso_id', $idCorso);
//        $this->db->where('datecorso_gruppo', $gruppo);
//        $query_datecorso = $this->db->get();
//        $ret = $query_datecorso->result();
//
//       if($ret[0]->numero==""){
//            $ret[0]->numero = 0;
//        }
//        return $ret[0]->numero;
//    }
//
//    public function getNumeroPostiRifiutatiByIdCorsoAndGruppo($idCorso, $gruppo) {
//
//        $this->db->select('sum(numeroPosti) as numero');
//        $this->db->from('prenotazione');
//        $this->db->where('stato_id', 3);
//        $this->db->where('corso_id', $idCorso);
//        $this->db->where('datecorso_gruppo', $gruppo);
//        $query_datecorso = $this->db->get();
//        $ret = $query_datecorso->result();
//        if($ret[0]->numero==""){
//            $ret[0]->numero = 0;
//        }
//        
//        return $ret[0]->numero;
//    }
//
//    public function statoPrenotazioneUpdate($idPrenotazione, $stato) {
//
//        $this->result = new stdClass();
//        $this->result->validation = false;
//
//        $this->db->where('id', $idPrenotazione);
//        $this->db->update("prenotazione", array('stato_id' => $stato));
//
//        if ($this->db->affected_rows()) {
//            $this->result->validation = TRUE;
//        } else {
//            $this->result->validation = FALSE;
//        }
//        return $this->result;
//    }
//
//    public function setPrenotazione($prenotazione) {
//
//        $this->result = new stdClass();
//        $this->result->validation = false;
//
//        $this->db->insert('prenotazione', $prenotazione);
//
//        if ($this->db->affected_rows()) {
//
//
//            $this->result->validation = TRUE;
//        } else {
//            $this->result->validation = FALSE;
//        }
//
//        return $this->result;
//    }
//
//    public function getCercaPrenotazioni($distributore, $da, $a) {
//
//        $this->db->select('sum(prenotazione.`numeroPosti`) as posti, corso.prezzo, prenotazione.`corso_id`, corso.`titolo_ITA`');
//        $this->db->from('prenotazione');
//        $this->db->join('corso', 'prenotazione.corso_id = corso.id');
//        $this->db->join('venditore', 'prenotazione.venditore_id = venditore.id');
//        $this->db->where('venditore.distributore', $distributore);
//        $this->db->where("prenotazione.corso_id in (select corso_id from datecorso where datecorso.`data` >= '$da' and datecorso.`data` <= '$a')");
//        $this->db->group_by('prenotazione.`corso_id`, prenotazione.`corso_id`');
//
//        $query_prenotazioni = $this->db->get();
//        $ret = $query_prenotazioni->result();
//
//        //echo "<br><br><br>sql: " . $this->db->last_query() . PHP_EOL;
//
//        $response = array();
//
//        $sum = 0;
//        foreach ($ret as $value) {
//
//            $prenotazione = new stdClass();
//
//            $prenotazione->posti = $value->posti;
//            $prenotazione->prezzo = $value->prezzo;
//            $prenotazione->titolo_ITA = $value->titolo_ITA;
//            $sum += ($value->prezzo * $value->posti);
//
//            $prenotazione->prezzoCorsoTotale = number_format((float) ($value->prezzo * $value->posti), 2, '.', '');
//
//            //$prenotazione->totaleDistributore = $sum;
//
//            $response['prenotazioni'][] = $prenotazione;
//        }
//        $response['totaleDistributore'] = number_format((float) $sum, 2, '.', '');
//
//        return $response;
//    }
//
//    public function funzioneUpdate($funzione) {
//
//        $dataUpdate = array('funzione' => $funzione);
//
//        $sql = $this->db->insert_string('checkUpdate', $dataUpdate) . " "
//                . "ON DUPLICATE KEY UPDATE "
//                . "funzione ='" . $funzione . "', dataUpdate = '" . date('Y-m-d H:i:s') . "'";
//
//
//        $res = $this->db->query($sql);
//
//
//        //echo "<br><br><br>sql: " . $this->db->last_query() . PHP_EOL;
//
//        return $this->db->affected_rows();
//    }
}
