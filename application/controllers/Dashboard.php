<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();

        if ($this->session->userdata('loggedAdmin_in')) {
            $session_data = $this->session->userdata('loggedAdmin_in');
            
            $data['username'] = $session_data['username'];
            
            if ($session_data['ruolo'] != "admin") {
                redirect('Login', 'refresh');
            }
        } else {
            //If no session, redirect to login page
            redirect('Login', 'refresh');
        }
    }

    
    
    
    
    public function index() {
        $this->load->view('dashboard');
    }

    
        public function elencoCorsi() {


        
    }
    
    
    
    
    
    
    
//    public function congressoAdd() {
//        $this->load->model('congresso_model');
//
//        $data = array(
//            'codice' => $this->input->post('codice'),
//            'titolo' => $this->input->post('titolo'),
//            'dataInizio' => $this->input->post('dataInizio'),
//            'dataFine' => $this->input->post('dataFine'),
//            'rilasciaAttestato' => $this->input->post('rilasciaAttestato')
//        );
//
//        $ret = $this->congresso_model->setCongresso($data);
//
//        if ($ret->validation) {
//            $this->output
//                    ->set_content_type('application/json')
//                    ->set_output(json_encode($ret));
//        }
//    }
//
//    public function aulaAdd() {
//        $this->load->model('congresso_model');
//        $data = array(
//            'idCongresso' => $this->input->post('idCongresso'),
//            'aula' => $this->input->post('aula')
//        );
//
//        //print_r($data);die();
//        $ret = $this->congresso_model->setAula($this->input->post('idCongresso'), $data);
//
//        if ($ret->validation) {
//            $this->output
//                    ->set_content_type('application/json')
//                    ->set_output(json_encode($ret));
//        }
//    }
//
//    public function sessioneAdd() {
//        $this->load->model('congresso_model');
//
//        $data = array(
//            'idCongresso' => $this->input->post('idCongresso'),
//            'idAula' => $this->input->post('aula'),
//            'sessione' => $this->input->post('sessione'),
//            'noIntervento' => $this->input->post('noIntervento'),
//            'moderatori' => $this->input->post('moderatori'),
//            'dataOraInizio' => date('Y-m-d H:i:s', strtotime($this->input->post('dataInizio'))),
//            'dataOraFine' => date('Y-m-d H:i:s', strtotime($this->input->post('dataFine')))
//        );
//
//        $ret = $this->congresso_model->setSessione($data);
//
//        if ($ret->validation) {
//            $this->output
//                    ->set_content_type('application/json')
//                    ->set_output(json_encode($ret));
//        }
//    }
//
//    public function relatoreAdd() {
//        $this->load->model('congresso_model');
//
//        $data = array(
//            'idCongresso' => $this->input->post('idCongresso'),
//            'nome' => $this->input->post('nome'),
//            'cognome' => $this->input->post('cognome'),
//            'note' => $this->input->post('note')
//        );
//
//        $ret = $this->congresso_model->setRelatore($data);
//
//        if ($ret->validation) {
//            $this->output
//                    ->set_content_type('application/json')
//                    ->set_output(json_encode($ret));
//        }
//    }
//
//    public function interventoAdd() {
//
//        $this->load->model('congresso_model');
//
//        $dataIntervento = array(
//            'idCongresso' => $this->input->post('idCongresso'),
//            'idAula' => $this->input->post('aula'),
//            'idSessione' => $this->input->post('sessione'),
//            'titolo' => $this->input->post('titolo'),
//            'dataOraInizio' => date('Y-m-d H:i:s', strtotime($this->input->post('dataInizio'))),
//            'dataOraFine' => date('Y-m-d H:i:s', strtotime($this->input->post('dataFine')))
//        );
//
//        $dataRelatore = array(
//            'relatore1' => $this->input->post('relatore1'),
//            'relatore2' => $this->input->post('relatore2'),
//            'relatore3' => $this->input->post('relatore3'),
//            'relatore4' => $this->input->post('relatore4'),
//            'relatore5' => $this->input->post('relatore5'),
//            'relatore6' => $this->input->post('relatore6'),
//            'relatore7' => $this->input->post('relatore7'),
//            'relatore8' => $this->input->post('relatore8'),
//            'relatore9' => $this->input->post('relatore9'),
//            'relatore10' => $this->input->post('relatore10'),
//            'relatore11' => $this->input->post('relatore11'),
//            'relatore12' => $this->input->post('relatore12'),
//            'relatore13' => $this->input->post('relatore13'),
//            'relatore14' => $this->input->post('relatore14'),
//            'relatore15' => $this->input->post('relatore15'),
//            'relatore16' => $this->input->post('relatore16'),
//            'relatore17' => $this->input->post('relatore17'),
//            'relatore18' => $this->input->post('relatore18'),
//            'relatore19' => $this->input->post('relatore19'),
//            'relatore20' => $this->input->post('relatore20'),
//            'relatore21' => $this->input->post('relatore21'),
//            'relatore22' => $this->input->post('relatore22'),
//            'relatore23' => $this->input->post('relatore23'),
//            'relatore24' => $this->input->post('relatore24'),
//            'relatore25' => $this->input->post('relatore25'),
//            'relatore26' => $this->input->post('relatore26'),
//            'relatore27' => $this->input->post('relatore27'),
//            'relatore28' => $this->input->post('relatore28'),
//            'relatore29' => $this->input->post('relatore29'),
//            'relatore30' => $this->input->post('relatore30'),
//            'relatore31' => $this->input->post('relatore31'),
//            'relatore32' => $this->input->post('relatore32'),
//            'relatore33' => $this->input->post('relatore33'),
//            'relatore34' => $this->input->post('relatore34'),
//            'relatore35' => $this->input->post('relatore35'),
//            'relatore36' => $this->input->post('relatore36'),
//            'relatore37' => $this->input->post('relatore37'),
//            'relatore38' => $this->input->post('relatore38'),
//            'relatore39' => $this->input->post('relatore39'),
//            'relatore40' => $this->input->post('relatore40'),
//            'relatore41' => $this->input->post('relatore41'),
//            'relatore42' => $this->input->post('relatore42'),
//            'relatore43' => $this->input->post('relatore43'),
//            'relatore44' => $this->input->post('relatore44'),
//            'relatore45' => $this->input->post('relatore45'),
//            'relatore46' => $this->input->post('relatore46'),
//            'relatore47' => $this->input->post('relatore47'),
//            'relatore48' => $this->input->post('relatore48'),
//            'relatore49' => $this->input->post('relatore49'),
//            'relatore50' => $this->input->post('relatore50'),
//            'relatore51' => $this->input->post('relatore51'),
//            'relatore52' => $this->input->post('relatore52'),
//            'relatore53' => $this->input->post('relatore53'),
//            'relatore54' => $this->input->post('relatore54'),
//            'relatore55' => $this->input->post('relatore55'),
//            'relatore56' => $this->input->post('relatore56'),
//            'relatore57' => $this->input->post('relatore57'),
//            'relatore58' => $this->input->post('relatore58'),
//            'relatore59' => $this->input->post('relatore59'),
//            'relatore60' => $this->input->post('relatore60'),
//        );
//
//        $ret = $this->congresso_model->setIntervento($dataIntervento, $dataRelatore, $this->input->post('idCongresso'));
//
//        if ($ret->validation) {
//            $this->output
//                    ->set_content_type('application/json')
//                    ->set_output(json_encode($ret));
//        }
//    }
//
//    public function luogoInteresseAdd() {
//
//        $this->load->model('congresso_model');
//
//        $dataLuogoInteresse = array(
//            'idCongresso' => $this->input->post('idCongresso'),
//            'tipologia' => $this->input->post('tipologia'),
//            'titolo' => $this->input->post('titolo'),
//            'indirizzo' => $this->input->post('indirizzo'),
//            'testo' => $this->input->post('testo'),
//            'latitudine' => $this->input->post('latitudine'),
//            'longitudine' => $this->input->post('longitudine')
//        );
//
//        $ret = $this->congresso_model->setLuogoInteresse($this->input->post('idCongresso'), $dataLuogoInteresse);
//
//        if ($ret->validation) {
//            $this->output
//                    ->set_content_type('application/json')
//                    ->set_output(json_encode($ret));
//        }
//    }
//
//    public function luogoInteresseUpdate() {
//
//        $this->load->model('congresso_model');
//
//        $dataIntervento = array(
//            'idCongresso' => $this->input->post('idCongresso'),
//            'tipologia' => $this->input->post('tipologia'),
//            'titolo' => $this->input->post('titolo'),
//            'indirizzo' => $this->input->post('indirizzo'),
//            'testo' => $this->input->post('testo'),
//            'latitudine' => $this->input->post('latitudine'),
//            'longitudine' => $this->input->post('longitudine')
//        );
//
//        $this->congresso_model->luogoInteresseUpdate($this->input->post('idLuogoInteresse'), $this->input->post('idCongresso'), $dataIntervento);
//        echo json_encode(array("status" => TRUE));
//    }
//
//    public function luogoInteresseDelete($idCongresso, $idLuogoInteresse) {
//
//        $this->load->model('congresso_model');
//
//        $ret = $this->congresso_model->luogoInteresseDelete($idCongresso, $idLuogoInteresse);
//
//        $this->output
//                ->set_content_type('application/json')
//                ->set_output(json_encode($ret));
//    }
//
//    public function getCongressoById($idCongresso) {
//
//        $this->load->model('congresso_model');
//        $ret = $this->congresso_model->getCongressoById($idCongresso);
//
//        if ($ret->validation) {
//
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
//    public function dettaglioCongresso($idCongresso) {
//
//        $this->load->model('congresso_model');
//        $obj['data'] = $this->congresso_model->getCongressoById($idCongresso);
//
//
//        //echo "<pre>";
//        //print_r($obj['data']);die();
//
//        $this->load->view('dettaglioCongresso', $obj);
//    }
//
//    public function getAulaById($idAula) {
//
//        $this->load->model('congresso_model');
//        $ret = $this->congresso_model->getAulaById($idAula);
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
//    public function getSessioneById($idSessione) {
//
//        $this->load->model('congresso_model');
//        $ret = $this->congresso_model->getSessioneById($idSessione);
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
//    public function getLuogoInteresseById($idLuogoIntervento) {
//
//        $this->load->model('congresso_model');
//        $ret = $this->congresso_model->getLuogoInteresseById($idLuogoIntervento);
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
//    public function getRelatoreById($idRelatore) {
//
//        $this->load->model('congresso_model');
//        $ret = $this->congresso_model->getRelatoreById($idRelatore);
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
//    public function getInterventoById($idIntervento) {
//
//        $this->load->model('congresso_model');
//        $ret = $this->congresso_model->getInterventoById($idIntervento);
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
//    public function congressoUpdate() {
//
//        $this->load->model('congresso_model');
//        $data = array(
//            'codice' => $this->input->post('codice'),
//            'titolo' => $this->input->post('titolo'),
//            'dataInizio' => $this->input->post('dataInizio'),
//            'dataFine' => $this->input->post('dataFine'),
//            'rilasciaAttestato' => $this->input->post('rilasciaAttestato')
//        );
//
//        $this->congresso_model->congressoUpdate($this->input->post('codice'), $data);
//        echo json_encode(array("status" => TRUE));
//    }
//
//    public function aulaUpdate() {
//
//        $this->load->model('congresso_model');
//
//        $data = array(
//            'aula' => $this->input->post('aula')
//        );
//
//        $this->congresso_model->aulaUpdate($this->input->post('id'), $this->input->post('idCongresso'), $data);
//
//        // die();
//
//        echo json_encode(array("status" => TRUE));
//    }
//
//    public function sessioneUpdate() {
//
//        $this->load->model('congresso_model');
//        $data = array(
//            'idCongresso' => $this->input->post('idCongresso'),
//            'idAula' => $this->input->post('aula'),
//            'sessione' => $this->input->post('sessione'),
//            'noIntervento' => $this->input->post('noIntervento'),
//            'moderatori' => $this->input->post('moderatori'),
//            'dataOraInizio' => date('Y-m-d H:i:s', strtotime($this->input->post('dataInizio'))),
//            'dataOraFine' => date('Y-m-d H:i:s', strtotime($this->input->post('dataFine')))
//        );
//
//
//        //print_r($data);die();
//        $this->congresso_model->sessioneUpdate($this->input->post('idSessione'), $this->input->post('idCongresso'), $data);
//        echo json_encode(array("status" => TRUE));
//    }
//
//    public function relatoreUpdate() {
//
//        $this->load->model('congresso_model');
//        $data = array(
//            'idCongresso' => $this->input->post('idCongresso'),
//            'nome' => $this->input->post('nome'),
//            'cognome' => $this->input->post('cognome'),
//            'note' => $this->input->post('note')
//        );
//
//        $this->congresso_model->relatoreUpdate($this->input->post('idRelatore'), $this->input->post('idCongresso'), $data);
//        echo json_encode(array("status" => TRUE));
//    }
//
//    public function interventoUpdate() {
//
//        $this->load->model('congresso_model');
//        $dataIntervento = array(
//            'idCongresso' => $this->input->post('idCongresso'),
//            'idAula' => $this->input->post('aula'),
//            'idSessione' => $this->input->post('sessione'),
//            'titolo' => $this->input->post('titolo'),
//            'dataOraInizio' => date('Y-m-d H:i:s', strtotime($this->input->post('dataInizio'))),
//            'dataOraFine' => date('Y-m-d H:i:s', strtotime($this->input->post('dataFine')))
//        );
//
//        $dataRelatore = array(
//            'relatore1' => $this->input->post('relatore1'),
//            'relatore2' => $this->input->post('relatore2'),
//            'relatore3' => $this->input->post('relatore3'),
//            'relatore4' => $this->input->post('relatore4'),
//            'relatore5' => $this->input->post('relatore5'),
//            'relatore6' => $this->input->post('relatore6'),
//            'relatore7' => $this->input->post('relatore7'),
//            'relatore8' => $this->input->post('relatore8'),
//            'relatore9' => $this->input->post('relatore9'),
//            'relatore10' => $this->input->post('relatore10'),
//            'relatore11' => $this->input->post('relatore11'),
//            'relatore12' => $this->input->post('relatore12'),
//            'relatore13' => $this->input->post('relatore13'),
//            'relatore14' => $this->input->post('relatore14'),
//            'relatore15' => $this->input->post('relatore15'),
//            'relatore16' => $this->input->post('relatore16'),
//            'relatore17' => $this->input->post('relatore17'),
//            'relatore18' => $this->input->post('relatore18'),
//            'relatore19' => $this->input->post('relatore19'),
//            'relatore20' => $this->input->post('relatore20'),
//            'relatore21' => $this->input->post('relatore21'),
//            'relatore22' => $this->input->post('relatore22'),
//            'relatore23' => $this->input->post('relatore23'),
//            'relatore24' => $this->input->post('relatore24'),
//            'relatore25' => $this->input->post('relatore25'),
//            'relatore26' => $this->input->post('relatore26'),
//            'relatore27' => $this->input->post('relatore27'),
//            'relatore28' => $this->input->post('relatore28'),
//            'relatore29' => $this->input->post('relatore29'),
//            'relatore30' => $this->input->post('relatore30'),
//            'relatore31' => $this->input->post('relatore31'),
//            'relatore32' => $this->input->post('relatore32'),
//            'relatore33' => $this->input->post('relatore33'),
//            'relatore34' => $this->input->post('relatore34'),
//            'relatore35' => $this->input->post('relatore35'),
//            'relatore36' => $this->input->post('relatore36'),
//            'relatore37' => $this->input->post('relatore37'),
//            'relatore38' => $this->input->post('relatore38'),
//            'relatore39' => $this->input->post('relatore39'),
//            'relatore40' => $this->input->post('relatore40'),
//            'relatore41' => $this->input->post('relatore41'),
//            'relatore42' => $this->input->post('relatore42'),
//            'relatore43' => $this->input->post('relatore43'),
//            'relatore44' => $this->input->post('relatore44'),
//            'relatore45' => $this->input->post('relatore45'),
//            'relatore46' => $this->input->post('relatore46'),
//            'relatore47' => $this->input->post('relatore47'),
//            'relatore48' => $this->input->post('relatore48'),
//            'relatore49' => $this->input->post('relatore49'),
//            'relatore50' => $this->input->post('relatore50'),
//            'relatore51' => $this->input->post('relatore51'),
//            'relatore52' => $this->input->post('relatore52'),
//            'relatore53' => $this->input->post('relatore53'),
//            'relatore54' => $this->input->post('relatore54'),
//            'relatore55' => $this->input->post('relatore55'),
//            'relatore56' => $this->input->post('relatore56'),
//            'relatore57' => $this->input->post('relatore57'),
//            'relatore58' => $this->input->post('relatore58'),
//            'relatore59' => $this->input->post('relatore59'),
//            'relatore60' => $this->input->post('relatore60'),
//        );
//
//
//        $this->congresso_model->interventoUpdate($this->input->post('idIntervento'), $dataIntervento, $dataRelatore, $this->input->post('idCongresso'));
//        echo json_encode(array("status" => TRUE));
//    }
//
//    public function congressoDelete($idCongresso) {
//
//        $this->load->model('congresso_model');
//        $ret = $this->congresso_model->congressoDelete($idCongresso);
//        $this->output
//                ->set_content_type('application/json')
//                ->set_output(json_encode($ret));
//    }
//
//    public function aulaDelete($idCongresso, $idAula) {
//
//        $this->load->model('congresso_model');
//
//        $ret = $this->congresso_model->aulaDelete($idCongresso, $idAula);
//
//        $this->output
//                ->set_content_type('application/json')
//                ->set_output(json_encode($ret));
//    }
//
//    public function sessioneDelete($idCongresso, $idSessione) {
//
//        $this->load->model('congresso_model');
//        $ret = $this->congresso_model->sessioneDelete($idCongresso, $idSessione);
//
//        $this->output
//                ->set_content_type('application/json')
//                ->set_output(json_encode($ret));
//    }
//
//    public function attestatoDelete($idCongresso, $idAttestato, $tipo) {
//
//        $this->load->model('congresso_model');
//
//        $upload_dir = APPPATH . '../file/' . $idCongresso;
//
////        if (unlink($upload_dir . "/" . $tipo . ".jpg")) {
////
////            $ret = $this->congresso_model->attestatoDelete($idCongresso, $idAttestato);
////        }
//
//        unlink($upload_dir . "/" . $tipo . ".jpg");
//        $ret = $this->congresso_model->attestatoDelete($idCongresso, $idAttestato);
//
//
//
//        $this->output
//                ->set_content_type('application/json')
//                ->set_output(json_encode($ret));
//    }
//
//    public function relatoreDelete($idCongresso, $idRelatore) {
//
//        $this->load->model('congresso_model');
//        $ret = $this->congresso_model->relatoreDelete($idCongresso, $idRelatore);
//
//        $this->output
//                ->set_content_type('application/json')
//                ->set_output(json_encode($ret));
//    }
//    
//    
//    
//    public function notificaDelete($idCongresso, $idNotifica) {
//
//        $this->load->model('congresso_model');
//        $ret = $this->congresso_model->notificaDelete($idCongresso, $idNotifica);
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
//    public function interventoDelete($idIntervento) {
//
//        $this->load->model('congresso_model');
//        $ret = $this->congresso_model->interventoDelete($idIntervento);
//
//        $this->output
//                ->set_content_type('application/json')
//                ->set_output(json_encode($ret));
//    }
//
//    public function elencoCongressi() {
//
//
//        $this->load->model('congresso_model');
//
//        $session_data = $this->session->userdata('loggedAdmin_in');
//
//        $obj['sessione_ruolo'] = $session_data['role'];
//        $obj['sessione_congressi_visibili'] = '';
//
//
//
//        if ($session_data['congressi'] != NULL) {
//            if (strpos($session_data['congressi'], ',') == false) {
//                $obj['sessione_congressi_visibili'] = array($session_data['congressi']);
//            } else {
//                $obj['sessione_congressi_visibili'] = explode(',', $session_data['congressi']);
//            }
//        }
//
//        $obj['data'] = $this->congresso_model->getElenco($obj['sessione_congressi_visibili']);
//
//        $this->load->view('elencoCongressi', $obj);
//    }
//
//    public function elencoAule($idCongresso) {
//
//        $session_data = $this->session->userdata('loggedAdmin_in');
//        if ($session_data['role'] != "admin") {
//            redirect('Login', 'refresh');
//        }
//
//        $this->load->model('congresso_model');
//
//        $ret = $this->congresso_model->getCongressoById($idCongresso);
//        $obj['congresso'] = $ret->data;
//
//
//        $obj['data'] = $this->congresso_model->getElencoAule($idCongresso);
//
//
//
//        $this->load->view('elencoAule', $obj);
//    }
//
//    public function elencoSessioni($idCongresso) {
//
//        $session_data = $this->session->userdata('loggedAdmin_in');
//        if ($session_data['role'] != "admin") {
//            redirect('Login', 'refresh');
//        }
//
//
//        $this->load->model('congresso_model');
//
//        $obj['aula'] = $this->congresso_model->getElencoAule($idCongresso);
//
//
//        $ret = $this->congresso_model->getCongressoById($idCongresso);
//        $obj['congresso'] = $ret->data;
//
//
//        $obj['data'] = $this->congresso_model->getElencoSessioni($idCongresso);
//
//
//        //echo "<pre>";
//        //print_r($obj);
//        $this->load->view('elencoSessioni', $obj);
//    }
//
//    public function elencoAttestati($idCongresso) {
//
//
//        $session_data = $this->session->userdata('loggedAdmin_in');
//        if ($session_data['role'] != "admin") {
//            redirect('Login', 'refresh');
//        }
//
//        $this->load->model('congresso_model');
//
//
//        $ret = $this->congresso_model->getCongressoById($idCongresso);
//        $obj['congresso'] = $ret->data;
//
//
//        $obj['data'] = $this->congresso_model->getElencoAttestati($idCongresso);
//
//        $this->load->view('elencoAttestati', $obj);
//    }
//
//    public function elencoLuoghiInteresse($idCongresso) {
//
//        $session_data = $this->session->userdata('loggedAdmin_in');
//        if ($session_data['role'] != "admin") {
//            redirect('Login', 'refresh');
//        }
//
//
//        $this->load->model('congresso_model');
//
//
//        $obj['tipologiaLuoghiInteresse'] = $this->congresso_model->getElencoTipologiaLuoghiInteresse();
//
//
//        $obj['luoghi'] = $this->congresso_model->getElencoLuoghiInteresse($idCongresso);
//
//        $ret = $this->congresso_model->getCongressoById($idCongresso);
//        $obj['congresso'] = $ret->data;
//
//        $this->load->view('elencoLuoghiInteresse', $obj);
//    }
//
//    public function attestatoUpload() {
//        $this->load->model('congresso_model');
//
//
//        /*         * ******************************* */
////        cancello le prove
////        $upload_dir = APPPATH . '../file/' . $this->input->post('idCongresso');
////        
////        if (unlink($upload_dir . "/PAR3.png"))
////            echo "cancellato";
////        else
////            echo "NON cancellato";
////
////        die();
//        /*         * ******************************* */
//
//
//        $status = "";
//        $msg = "";
//        $file_element_name = 'userfile';
//
//        if (empty($this->input->post('tipo'))) {
//            $status = "error";
//            $msg = "Please enter a title";
//        }
//
//        if ($status != "error") {
//
//            $upload_dir = APPPATH . '../file/' . $this->input->post('idCongresso');
//
//            if (!file_exists($upload_dir)) {
//
//                if (!mkdir($upload_dir, 0777, true)) {
//                    $status = "error";
//                    $msg = "Failed to create folders...";
//                }
//            }
//
//            $config['upload_path'] = $upload_dir;
//            $config['allowed_types'] = 'jpg';
//            $config['encrypt_name'] = FALSE;
//            $config['max_size'] = '30000';
//            $config['file_name'] = $this->input->post('tipo');
//
//            $this->load->library('upload', $config);
//            $this->load->helper(array('form', 'url'));
//
//            if (file_exists($upload_dir . "/" . $this->input->post('tipo') . ".jpg")) {
//                unlink($upload_dir . "/" . $this->input->post('tipo') . ".jpg");
//            }
//
//            if (!$this->upload->do_upload($file_element_name)) {
//
//                $status = 'error';
//                $msg = $this->upload->display_errors('', '');
//            } else {
//
//                $data = $this->upload->data();
//
//                $file_id = $this->congresso_model->setAttestato($this->input->post('tipo'), $this->input->post('idCongresso'));
//
//                if ($file_id) {
//                    $status = "success";
//                    $msg = "File successfully uploaded";
//                } else {
//                    unlink($data['full_path']);
//                    $status = "error";
//                    $msg = "Something went wrong when saving the file, please try again.";
//                }
//            }
//            @unlink($_FILES[$file_element_name]);
//        }
//
//        echo json_encode(array('status' => $status, 'msg' => $msg));
//    }
//
//    public function elencoRelatori($idCongresso) {
//
//        $session_data = $this->session->userdata('loggedAdmin_in');
//        if ($session_data['role'] != "admin") {
//            redirect('Login', 'refresh');
//        }
//
//        $this->load->model('congresso_model');
//
//        $ret = $this->congresso_model->getCongressoById($idCongresso);
//        $obj['congresso'] = $ret->data;
//
//        $obj['data'] = $this->congresso_model->getElencoRelatori($idCongresso);
//
//        $this->load->view('elencoRelatori', $obj);
//    }
//
//    public function elencoInterventi($idCongresso) {
//
//        $session_data = $this->session->userdata('loggedAdmin_in');
//        if ($session_data['role'] != "admin") {
//            redirect('Login', 'refresh');
//        }
//
//
//
//        $this->load->model('congresso_model');
//
//        $ret = $this->congresso_model->getCongressoById($idCongresso);
//        $obj['congresso'] = $ret->data;
//
//        //prendo aule per combo
//        $obj['aula'] = $this->congresso_model->getElencoAule($idCongresso);
//
//        //prendo sessioni per combo
//        $obj['sessione'] = $this->congresso_model->getElencoSessioni($idCongresso);
//
//        //prendo relatori per combo
//        $obj['relatori'] = $this->congresso_model->getRelatoreByIdIdCongresso($idCongresso);
//
//        //elenco interventi
//        $obj['data'] = $this->congresso_model->getElencoInterventi($idCongresso, $idSessione = "");
//
//        //echo "<pre>";
//        //print_r($obj);die();
//
//        $this->load->view('elencoInterventi', $obj);
//    }
//
//    public function rilasciaAttestato($codice) {
//        $this->load->model('congresso_model');
//        if ($this->congresso_model->rilasciaAttestato($codice))
//            $this->elenco();
//        else
//            echo "errore";
//    }
//
//    public function informazioniGenerali($idCongresso) {
//
//        $session_data = $this->session->userdata('loggedAdmin_in');
//        if ($session_data['role'] != "admin") {
//            redirect('Login', 'refresh');
//        }
//
//        $this->load->model('congresso_model');
//        $obj['data'] = $this->congresso_model->getCongressoById($idCongresso);
//
//        $this->load->view('informazioniGenerali', $obj);
//    }
//
//    public function informazioniScientifiche($idCongresso) {
//
//        $session_data = $this->session->userdata('loggedAdmin_in');
//        if ($session_data['role'] != "admin") {
//            redirect('Login', 'refresh');
//        }
//
//        $this->load->model('congresso_model');
//        $obj['data'] = $this->congresso_model->getCongressoById($idCongresso);
//
//        $this->load->view('informazioniScientifiche', $obj);
//    }
//
//    public function informazioniGeneraliUpdate() {
//
//        $this->load->model('congresso_model');
//
//        $data = array(
//            'informazioniGenerali' => $this->input->post('informazioniGenerali')
//        );
//
//        $this->congresso_model->informazioniGeneraliUpdate($this->input->post('idCongresso'), $data);
//
//        echo json_encode(array("status" => TRUE));
//    }
//
//    public function informazioniScientificheUpdate() {
//
//        $this->load->model('congresso_model');
//
//        $data = array(
//            'informazioniScientifiche' => $this->input->post('informazioniScientifiche')
//        );
//
//        $this->congresso_model->informazioniScientificheUpdate($this->input->post('idCongresso'), $data);
//
//        echo json_encode(array("status" => TRUE));
//    }
//
//    function situazione($codice) {
//
//        $this->load->model('evento_area_model');
//        //lunch
//        $obj['lunch'] = $this->evento_area_model->eventoSituazioneLunch($codice);
//
//        //aree
//        $obj['presenza'] = $this->evento_area_model->eventoSituazionePresenze($codice);
//
//
//
//        $this->load->model('evento_presenza_model');
//        //presenze
//        $obj['presenzaEvento'] = $this->evento_presenza_model->eventoSituazionePresenzaEvento($codice);
//
//
//        $this->load->view('eventoSituazione', $obj);
//    }
//
//    public function inviaNotificaPush() {
//
//        $session_data = $this->session->userdata('loggedAdmin_in');
//        if ($session_data['role'] != "admin") {
//            redirect('Login', 'refresh');
//        }
//
//
//        $this->risposta = new stdClass();
//        $this->risposta->validation = true;
//        $this->load->model('congresso_model');
//
//
//
//        $idCongresso = $this->input->post('idCongresso');
//        $titolo = $this->input->post('titolo');
//        $messaggio = $this->input->post('messaggio');
//        $tipologiaUtente = $this->input->post('tipologiaUtente');
//
//        // print_r($this->input->post());die();
//
//        $obj['utenti'] = $this->congresso_model->getUtentiPerTipologia($idCongresso, $tipologiaUtente);
//
//        //print_r($obj); 
//
//        $pushIdentifier = array();
//
//        
//        
////     $content['en'] = array();
//        
//        
//        foreach ($obj['utenti'] as $utente) {
//
//            $pushIdentifier[] = $utente->pushIdentifier;
//        
//          // echo "Hi " . $utente->nome . ", " . $messaggio;
//            
//         }
//         
//         
//         
//         
//         
//        $heading = array(
//            "en" => $titolo
//        );
//
//        $content = array(
//            "en" => $messaggio
//        );
//        
////        $content['en'][] = "Hi " . $utente->nome . ", " . $messaggio;
////        
////        //$content['en'] = "Hi " . $utente->nome . " " . $messaggio; 
//
//       
//        
//        
////        print_r($content);
////        die();
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
//        $fields = array(
//            'app_id' => APP_ID,
//            //'included_segments' => array('All'),
//            'include_player_ids' => $pushIdentifier,
//            //'data' => array("codSalone" => $codSalone),
//            'contents' => $content,
//            'headings' => $heading,
//            'isIos' => true,
//            'ios_badgeType' => 'Increase',
//            'ios_badgeCount' => 1,
//            'content_available' => 1
//        );
//
//
//        //echo "<pre>";
//        
//        //print_r($fields);
//        //die();
//        
//        $fields = json_encode($fields);
//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
//        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
//            'Authorization: Basic ' . AUTH_KEY));
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
//        curl_setopt($ch, CURLOPT_HEADER, FALSE);
//        curl_setopt($ch, CURLOPT_POST, TRUE);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
//
//        $risposta = curl_exec($ch);
//        curl_close($ch);
//
//
//        $obj = json_decode($risposta);
//
//        if (isset($obj->errors) && count($obj->errors) > 0) {
//
//            $obj->send = "false";
//            $this->risposta->validation = false;
//            $this->risposta->errorText = "400";
//            $this->risposta->httpResponse = 400;
//            //$this->risposta->message = "Errore nell'invio della notifica push";
//            $this->risposta->message = $obj;
//        } else {
//            $obj->send = "true";
//            $this->risposta->httpResponse = 200;
//            $this->risposta->message = $obj;
//        }
//
////        print_r($obj) . PHP_EOL;
////        print_r($pushIdentifier) . PHP_EOL;
//
//
//
//
//
//
//
//        if ($obj->send) {
//
//            $data = array(
//                'idCongresso' => $idCongresso,
//                'titolo' => $titolo,
//                'messaggio' => $messaggio,
//                'target' => $tipologiaUtente,
//                'dataOraInvio' => date('Y-m-d H:i:s')
//            );
//
//            $this->db->insert('appNotifichePush', $data);
//        }
//
//
//        unset($pushIdentifier);
//
//
//        $this->output
//                ->set_content_type('application/json')
//                ->set_output(json_encode($this->risposta->validation));
//    }
//
//    public function getContaUtentiPerTipologia($idCongresso, $tipologiaUtente) {
//
//        $this->load->model('congresso_model');
//
//        $totUtenti = $this->congresso_model->getContaUtentiPerTipologia($idCongresso, $tipologiaUtente);
//
//        echo $totUtenti;die();
//        
//        $this->output
//                ->set_content_type('application/json')
//                ->set_output(json_encode($totUtenti));
//    }
//
//    public function elencoNotifichePush($idCongresso) {
//
//        $session_data = $this->session->userdata('loggedAdmin_in');
//        if ($session_data['role'] != "admin") {
//            redirect('Login', 'refresh');
//        }
//
//        $this->load->model('congresso_model');
//
//        $ret = $this->congresso_model->getCongressoById($idCongresso);
//        $obj['congresso'] = $ret->data;
//
//        $obj['data'] = $this->congresso_model->getElencoNotifichePush($idCongresso);
//
//
//        $obj['tipologia'] = $this->congresso_model->getTipologiaUtente($idCongresso);
//
//
//        $this->load->view('elencoNotifichePush', $obj);
//    }
//
//    
//    
//    public function report($idCongresso) {
//
//        $session_data = $this->session->userdata('loggedAdmin_in');
//        if ($session_data['role'] != "admin") {
//            redirect('Login', 'refresh');
//        }
//
//        $this->load->model('congresso_model');
//
//        $ret = $this->congresso_model->getCongressoById($idCongresso);
//        $obj['congresso'] = $ret->data;
//
//
//        //$obj['data'] = $this->congresso_model->getElencoAule($idCongresso);
//
//
//
//        $this->load->view('report', $obj);
//    }
//    
//    
//    
//    
//    function test() {
//
//        $this->load->view('AAAnuovolayout');
//    }

}
