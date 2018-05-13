<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Magazzino extends CI_Controller {

    function __construct() {
        parent::__construct();
//
//        if ($this->session->userdata('loggedAdmin_in')) {
//            $session_data = $this->session->userdata('loggedAdmin_in');
//
//            $data['username'] = $session_data['username'];
//
//            if ($session_data['ruolo'] != "admin") {
//                redirect('Login', 'refresh');
//            }
//        } else {
//            //If no session, redirect to login page
//            redirect('Login', 'refresh');
//        }
    }

    public function listaMagazzino() {
        
        
        
     $this->load->library('pagination');
        $this->load->model('magazzino_model');
        
        //pagination settings
        $config['base_url'] = site_url('magazzino/listaMagazzino');
        $config['total_rows'] = $this->magazzino_model->listaMagazzinoCount();
        
        
        
       // echo $config['total_rows']; die();
        
        
        
        
        $config['per_page'] = "100";
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        
        //echo $config["num_links"];die();
        
        //config for bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

//        if (count($_GET) > 0)
//            $config['suffix'] = '?' . http_build_query($_GET, '', "&");


        //$config['page_query_string']=true;

        $this->pagination->initialize($config);
        $obj['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        
        $obj['totali'] = $config["total_rows"];

        $obj["data"] = $this->magazzino_model->listaMagazzino($config["per_page"], $obj['page']);

        $obj['pagination'] = $this->pagination->create_links();
        
        
        
       // $obj['data'] = $this->magazzino_model->listaMagazzino();

        $this->load->view('magazzino/listaMagazzino.php', $obj);
    }





    
//    public function dateCorso($idCorso, $gruppo) {
//
//        
//        $this->load->model('corsi_model');
//
//        $obj['corso'] = $this->corsi_model->getCorsoById($idCorso);
//        
//        if($gruppo!="0"){
//            
//          $obj['gruppo'] = $gruppo;
//          $obj['nextId'] = $this->corsi_model->getIdOrario();
//          $obj['date'] = $this->corsi_model->getDateByIdCorsoAndGruppo($idCorso,$gruppo);
//            
//        }
//        
//        //var_dump($obj);
//        $this->load->view('newDateCorso', $obj);
//    }
//
//    
//    
//
//    public function cercaPrenotazioni() {
//
//        $this->load->model('corsi_model');
//
//        $distributore = $this->input->post('distributore');
//        $da = $this->input->post('da');
//        $a = $this->input->post('a');
//
//
//        $obj['distributori'] = $this->corsi_model->getElencoDistributori();
//        $obj['distributoreFiltro'] = $distributore;
//        $obj['daFiltro'] = $da;
//        $obj['aFiltro'] = $a;
//        $obj['prenotazioni'] = array();
//        $obj['prenotazioni']['totaleDistributore'] = "0.00";
//        
//        if ($distributore != "" && $da != "" && $a != "") {
//
//            $da = str_replace("/", "-", $da);
//            $da = date("Y-m-d", strtotime($da));
//            
//            $a = str_replace("/", "-", $a);
//            $a = date("Y-m-d", strtotime($a));
//
//            $obj['prenotazioni'] = $this->corsi_model->getCercaPrenotazioni($distributore, $da, $a);
//
//        }
//
//        $this->load->view('cercaPrenotazioni', $obj);
//    }
//
//    public function archivio() {
//
//        $this->load->model('corsi_model');
//
//        $categoriaCorso = $this->input->post('categoria');
//
//        //echo $categoriaCorso; 
//
//        $obj['data'] = $this->corsi_model->getElencoCorsiArchivio($categoriaCorso);
//
//        $obj['categoria'] = $this->corsi_model->getElencoCategoria();
//
//        $obj['categoriaFiltro'] = $categoriaCorso;
//
//        $this->load->view('elencoCorsiArchivio', $obj);
//    }
//
//    public function newCorso() {
//
//        $this->load->model('corsi_model');
//        //elenco aule
//        $obj['aula'] = $this->corsi_model->getElencoAule();
//        //elenco categoaria
//        $obj['trainer'] = $this->corsi_model->getElencoTrainer();
//
//        //elenco destinatari
//        $obj['destinatari'] = $this->corsi_model->getElencoDestinatarioCorso();
//
//        //elenco categoria
//        $obj['categoria'] = $this->corsi_model->getElencoCategoria();
//
//        //elenco location
//        $obj['location'] = $this->corsi_model->getElencoLocation();
//
//        $this->load->view('newCorso', $obj);
//    }
//
//    public function setCorso() {
//
//        $this->load->model('corsi_model');
//
//        $data = array(
//            'prezzo' => $this->input->post('prezzo'),
//            'aula_id' => $this->input->post('aula_id'),
//            'categoria_id' => $this->input->post('categoria_id'),
//            'destinatario_id' => $this->input->post('destinatario_id'),
//            'trainer_id' => $this->input->post('trainer_id'),
//            'mostraTrainer' => ($this->input->post('mostraTrainer') == true) ? $this->input->post('mostraTrainer') : 0,
//            'shooting' => ($this->input->post('shooting') == true) ? $this->input->post('shooting') : 0,
//            'internazionale' => ($this->input->post('internazionale') == true) ? $this->input->post('internazionale') : 0,
//            'durata' => $this->input->post('durata'),
//            'numeroPartecipantiMin' => $this->input->post('numeroPartecipantiMin'),
//            'numeroPartecipantiMax' => $this->input->post('numeroPartecipantiMax'),
//            'numeroPartecipantiOverbooking' => $this->input->post('numeroPartecipantiOverbooking'),
//            'location_id' => $this->input->post('location_id'),
//            'titolo_ITA' => $this->input->post('titolo_ITA'),
//            'titolo_ENG' => $this->input->post('titolo_ENG'),
//            'sottotitolo_ITA' => $this->input->post('sottotitolo_ITA'),
//            'sottotitolo_ENG' => $this->input->post('sottotitolo_ENG'),
//            'descrizione_ITA' => $this->input->post('descrizione_ITA'),
//            'descrizione_ENG' => $this->input->post('descrizione_ENG'),
//            'incluso_ITA' => $this->input->post('incluso_ITA'),
//            'incluso_ENG' => $this->input->post('incluso_ENG'),
//            'escluso_ITA' => $this->input->post('escluso_ITA'),
//            'escluso_ENG' => $this->input->post('escluso_ENG'),
//            'programma_titolo_ITA' => $this->input->post('programma_titolo_ITA'),
//            'programma_titolo_ENG' => $this->input->post('programma_titolo_ENG'),
//            'programma_footer_ITA' => $this->input->post('programma_footer_ITA'),
//            'programma_footer_ENG' => $this->input->post('programma_footer_ENG')
//        );
//        
//        $idCorso = $this->input->post('idCorso');
//
//        $obj['inserito'] = $this->corsi_model->setCorso($data, $idCorso);
//
//        
//        if ($obj['inserito']->data != "") {
//
//            $obj['corso'] = $this->corsi_model->getCorsoById($obj['inserito']->data);
//        } else {
//            $obj['corso'] = $this->corsi_model->getCorsoById($idCorso);
//        }
//
//        if (!isSet($idCorso) && $idCorso == "") {
//            $idCorso = $obj['inserito']->data;
//        }
//
//        redirect('/corsi/edit/' . $obj['corso'][0]->id);
//    }
//
//    public function edit($idCorso = null, $gruppo = '0') {
//
//        $this->load->model('corsi_model');
//
//
//        //die();
//        //elenco aule
//        $obj['aula'] = $this->corsi_model->getElencoAule();
//        //elenco categoaria
//        $obj['trainer'] = $this->corsi_model->getElencoTrainer();
//
//        //elenco destinatari
//        $obj['destinatari'] = $this->corsi_model->getElencoDestinatarioCorso();
//
//        //elenco categoria
//        $obj['categoria'] = $this->corsi_model->getElencoCategoria();
//
//        //elenco location
//        $obj['location'] = $this->corsi_model->getElencoLocation();
//
//        $obj['corso'] = $this->corsi_model->getCorsoById($idCorso);
//
//
//        if ($gruppo != 0) {
//            $obj['myDateModale'] = $this->corsi_model->getDateCorsoModale($idCorso, $gruppo);
//            $obj['gruppoModale'] = $gruppo;
//        } else {
//            $obj['gruppoModale'] = '0';
//        }
//
//        $obj['saveTheDate'] = $this->corsi_model->getSaveTheDate($idCorso);
//
//
//        $this->load->view('editCorso', $obj);
//    }
//
//    public function prenotazioni($idCorso) {
//
//        $this->load->model('corsi_model');
//
//        $obj['corso'] = $this->corsi_model->getCorsoById($idCorso);
//
//        $obj['prenotazioni'] = $this->corsi_model->getPrenotazioni($idCorso);
//
//        // per nuova prenotazione
//        $obj['venditori'] = $this->corsi_model->getElencoVenditori();
//        $obj['saveTheDate'] = $this->corsi_model->getSaveTheDate($idCorso);
//
//        $this->load->view('elencoPrenotazioni', $obj);
//    }
//
//    public function getPrenotazioneById($idPrenotazione) {
//
//        $this->load->model('corsi_model');
//
//        //$obj['corso'] = $this->corsi_model->getCorsoById($idCorso);
//
//        $ret = $this->corsi_model->getPrenotazioniById($idPrenotazione);
//
//        $this->output
//                ->set_content_type('application/json')
//                ->set_output(json_encode($ret));
//    }
//
//    public function getDistributoreByIdVenditore($idVenditore) {
//
//        $this->load->model('corsi_model');
//
//        $ret = $this->corsi_model->getDistributoreByIdVenditore($idVenditore);
//
//        $this->output
//                ->set_content_type('application/json')
//                ->set_output(json_encode($ret));
//    }
//
//    public function addDate() {
//
//        $this->load->model('corsi_model');
//
//        //print_r($this->input->post());
//
//        $corso = array(
//            'idCorso' => $this->input->post('idCorso'),
//            'date' => $this->input->post('date')
//        );
//
//        $arrayDate = array();
//        $arrayGiorno = array();
//
//
//        //var_dump($corso);die();
//
//        foreach ($corso['date'] as $value) {
//
//            $value = explode("|", $value);
//
//            $originalDate = substr($value[0], -10);
//            $myData = date("Y-m-d", strtotime($originalDate));
//
//            $arrayDate[] = array('data' => $myData, 'ora' => $value[1], 'titolo_ITA' => $value[2], 'titolo_ENG' => $value[3]);
//            $arrayGiorno[] = $myData;
//        }
//
//        $arrayGiorno = array_unique($arrayGiorno);
//        //var_dump($arrayGiorno);die();
//
//
//        $ret = $this->corsi_model->setDateCorso($arrayDate, $arrayGiorno, $corso['idCorso']);
//
//        $this->output
//                ->set_content_type('application/json')
//                ->set_output(json_encode($ret));
//    }
//    
//    
//    
//    
//    
//    
//    
//    public function updateDateNuoviGiorni() {
//        
//         $this->load->model('corsi_model');
//
//        
//        $corso = array(
//            'idCorso' => $this->input->post('idCorso'),
//            'gruppo' => $this->input->post('gruppo'),
//            'date' => $this->input->post('date')
//        );
//        
//        $myArray = explode(',', $corso['date'] );
//        
//        
//         //print_r($myArray);
//        
//        
//        
//        $arrayGiorno = array();
//
//        foreach ($myArray as $value) {
//
//            $myData = date("Y-m-d", strtotime($value));
//            $arrayGiorno[] = $myData;
//        }
//        
//        //print_r($corso);
//        
//        $ret = $this->corsi_model->updateDateCorsoNuoviGiorni($arrayGiorno, $corso['idCorso'], $corso['gruppo']);
//     
//        $this->output
//                ->set_content_type('application/json')
//                ->set_output(json_encode($ret));
//        
//        }
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//    public function updateDate() {
//
//        $this->load->model('corsi_model');
//
//        //normale update
//
//        $corso = array(
//            'idCorso' => $this->input->post('idCorso'),
//            'gruppo' => $this->input->post('gruppo'),
//            'date' => $this->input->post('date')
//        );
//
//        $arrayDate = array();
//        $arrayGiorno = array();
//
//        foreach ($corso['date'] as $value) {
//
//            $value = explode("|", $value);
//
//            $originalDate = substr($value[0], -10);
//            $myData = date("Y-m-d", strtotime($originalDate));
//
//            $arrayDate[] = array('data' => $myData, 'idOrario' => $value[1], 'ora' => $value[2], 'titolo_ITA' => $value[3], 'titolo_ENG' => $value[4]);
//            $arrayGiorno[] = $myData;
//        }
//
//        $arrayGiorno = array_unique($arrayGiorno);
//
//        $ret = $this->corsi_model->updateDateCorso($arrayDate, $arrayGiorno, $corso['idCorso'], $corso['gruppo']);
//
//        $this->output
//                ->set_content_type('application/json')
//                ->set_output(json_encode($ret));
//    }
//
//    function getDateOrariByIdCorso($idCorso, $gruppo) {
//
//        $this->load->model('corsi_model');
//
//        $this->result = new stdClass();
//        $this->result->validation = true;
//        $this->result->message = '';
//        $this->result->data = null;
//        $this->result->httpResponse = 200;
//        $this->result->errorNum = '';
//        $this->result->errorText = '';
//
//        $ret = $this->corsi_model->getDateOrariByIdCorso($idCorso, $gruppo);
//
//        //print("<pre>");print_r($ret);die();
//
//        if ($ret) {
//            $this->result->validation = TRUE;
//            $this->result->message = 'orari recuperati!!';
//            $this->result->httpResponse = 200;
//            $this->result->data = $ret;
//        } else {
//            $this->result->validation = FALSE;
//            $this->result->errorNum = '0701';
//            $this->result->errorText = 'orari non trovato per idCorso: ' . $idCorso;
//            $this->result->message = 'Errore';
//            $this->result->httpResponse = 417;
//        }
//
//        $this->output
//                ->set_content_type('application/json')
//                ->set_output(json_encode($this->result));
//    }
//
//    function getIdOrario() {
//
//        $this->load->model('corsi_model');
//
//        $this->result = new stdClass();
//
//        $ret = $this->corsi_model->getIdOrario();
//
//        if ($ret) {
//            $this->result->validation = TRUE;
//            $this->result->message = 'prossimo id recuperato';
//            $this->result->httpResponse = 200;
//            $this->result->data = $ret;
//        } else {
//            $this->result->validation = FALSE;
//            $this->result->errorNum = '0701';
//            $this->result->errorText = 'prossimo id recuperato non trovato';
//            $this->result->message = 'Errore';
//            $this->result->httpResponse = 417;
//        }
//
//        $this->output
//                ->set_content_type('application/json')
//                ->set_output(json_encode($this->result));
//    }
//
////    public function edit($idCorso) {
////
////        $this->load->model('corsi_model');
////
////        //elenco categoaria
////        $obj['categoria'] = $this->corsi_model->getElencoCategoria();
////
////        //elenco aule
////        $obj['aule'] = $this->corsi_model->getElencoAule();
////
////        //elenco categoaria
////        $obj['trainer'] = $this->corsi_model->getElencoTrainer();
////
////        //elenco categoaria
////        $obj['destinatari'] = $this->corsi_model->getElencoDestinatarioCorso();
////
////        $obj['data'] = $this->corsi_model->getCorsoById($idCorso);
////
////        $this->load->view('editCorso', $obj);
////    
////        
////    }
//
//    public function corsoDelete($idCorso) {
//
//        $this->load->model('corsi_model');
//        $ret = $this->corsi_model->corsoDelete($idCorso);
//
//        $this->output
//                ->set_content_type('application/json')
//                ->set_output(json_encode($ret));
//    }
//
//    public function giornoDelete() {
//
//
//        $idCorso = $this->input->post('idCorso');
//        $gruppo = $this->input->post('gruppo');
//        $giorno = $this->input->post('giorno');
//
//        $this->load->model('corsi_model');
//        $ret = $this->corsi_model->giornoDelete($giorno, $gruppo, $idCorso);
//
//        $this->output
//                ->set_content_type('application/json')
//                ->set_output(json_encode($ret));
//    }
//
//    public function saveTheDateDelete() {
//
//
//        $idCorso = $this->input->post('idCorso');
//        $gruppo = $this->input->post('gruppo');
//        $date = $this->input->post('date');
//
//
//
//
//
//        $this->load->model('corsi_model');
//        $ret = $this->corsi_model->saveTheDateDelete($date, $gruppo, $idCorso);
//
//        $this->output
//                ->set_content_type('application/json')
//                ->set_output(json_encode($ret));
//    }
//
//    public function getAulaById($idAula) {
//
//        $this->load->model('corsi_model');
//        $ret = $this->corsi_model->getAulaById($idAula);
//
//        if ($ret->validation) {
//            $this->output
//                    ->set_content_type('application/json')
//                    ->set_output(json_encode($ret->data));
//        } else {
//
//            $this->output
//                    ->set_content_type('application/json')
//                    ->set_output(json_encode($ret));
//        }
//    }
//
//    public function orarioDelete($idOrario) {
//
//        $this->load->model('corsi_model');
//        $ret = $this->corsi_model->orarioDelete($idOrario);
//
//        $this->output
//                ->set_content_type('application/json')
//                ->set_output(json_encode($ret));
//    }
//
//    public function statoPrenotazioneUpdate() {
//
//        $this->load->model('corsi_model');
//        $idPrenotazione = $this->input->post('idPrenotazione');
//        $stato = $this->input->post('stato');
//
//        $ret = $this->corsi_model->statoPrenotazioneUpdate($idPrenotazione, $stato);
//
//        $this->output
//                ->set_content_type('application/json')
//                ->set_output(json_encode($ret));
//    }
//
//    public function addPrenotazione() {
//
//        $this->load->model('corsi_model');
//
//
//
//        $prenotazione = array(
//            'datecorso_gruppo' => $this->input->post('gruppo'),
//            'corso_id' => $this->input->post('idCorso'),
//            'venditore_id' => $this->input->post('venditore_id'),
//            'salone' => $this->input->post('salone'),
//            'numeroPosti' => $this->input->post('numeroPosti'),
//            'stato_id' => $this->input->post('stato'),
//        );
//
//        // var_dump($prenotazione);die();
//
//        $ret = $this->corsi_model->setPrenotazione($prenotazione);
//
//        $this->output
//                ->set_content_type('application/json')
//                ->set_output(json_encode($ret));
//    }
}
