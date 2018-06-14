<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Cliente extends BaseController {

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
        $this->isLoggedIn();   
        $this->idMagazzino = null;

        $this->result = new stdClass();
        $this->result->validation = true;
        $this->result->message = '';
        $this->result->data = null;
        $this->result->httpResponse = 200;
        $this->result->errorNum = '';
        $this->result->errorText = '';
    }

   

    public function listaCLienti() {

        
        $cod_cliente_txt = $this->input->post('cod_cliente_txt');
        $cod_sap_txt = $this->input->post('cod_sap_txt');
        $cognome_nome_txt = $this->input->post('cognome_nome_txt');
        $p_iva_txt = $this->input->post('p_iva_txt');

        $obj['cod_cliente_txt'] = $cod_cliente_txt;
        $obj['cod_sap_txt'] = $cod_sap_txt;
        $obj['cognome_nome_txt'] = $cognome_nome_txt;
        $obj['p_iva_txt'] = $p_iva_txt;
        
        $this->load->library('pagination');
        $this->load->model('cliente_model');

        
        //pagination settings
        $config['base_url'] = site_url('cliente/listaClienti');
        $config['total_rows'] = $this->cliente_model->getElencoClienti_count($cod_cliente_txt);

        
        $config['per_page'] = "320";
        
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

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

        //$config['page_query_string']=true;

        $this->pagination->initialize($config);
        $obj['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $obj['totali'] = $config["total_rows"];
        $obj["data"] = $this->cliente_model->getElencoClienti($config["per_page"], $obj['page'], $cod_cliente_txt);
        $obj['pagination'] = $this->pagination->create_links();
        
        $obj['global'] = $this->global;
        
        
        
        
        
        

        $this->load->view('cliente/listaclienti', $obj);
    }
    
    
    public function autoreAdd() {

        $this->load->model('magazzino_model');

        $dataAutore = array(
             'nome' => $this->input->post('nome'),
            'descrizione' => $this->input->post('descrizione'),
            'data_inserimento_riga' => date("Y-m-d"),
            'data_modifica_riga' => date("Y-m-d"),
            'operatore' => 'Pippo Baudo',
        );

        $ret = $this->magazzino_model->autoreAdd($dataAutore);

        if ($ret->validation) {
            $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($ret));
        }
    }
    
    
      public function autoreUpdate() {

        $this->load->model('magazzino_model');
        $dataAutore = array(
            'nome' => $this->input->post('nome'),
            'descrizione' => $this->input->post('descrizione'),
             'data_modifica_riga' => date("Y-m-d"),
        );
    
        $this->magazzino_model->autoreUpdate($this->input->post('idAutore'), $dataAutore);
        echo json_encode(array("status" => TRUE));
    
    }

     public function getAutoreById($idAutore) {

        $this->load->model('magazzino_model');
        
        $ret = $this->magazzino_model->getAutoreById($idAutore);

        //print_r($ret);
        if ($ret->validation) {
            $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($ret->data));
        } else {

            $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($ret));
        }
    }
    
    
    public function autoreDelete($idAutore) {

        $this->load->model('magazzino_model');
        $ret = $this->magazzino_model->autoreDelete($idAutore);

        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($ret));
    }
    
    
    public function dettaglio() {
          
        $idCliente =  $this->input->get('idCliente');
        
        $this->load->model('cliente_model');
        $this->load->model('setup_model');
        $this->load->model('rappresentanti_model');
        
        $obj["data"] = $this->cliente_model->getClienteById($idCliente);
        
        $obj['global'] = $this->global;
        
        $obj["percentuale"] = $this->setup_model->getElencoSetupByFieldName('percentuale_sconto');
        $obj['rapprensentati'] = $this->rappresentanti_model->getElencoRapprentanti($id = NULL);
        
        $obj["referrer_type"] = $this->setup_model->getElencoSetupByFieldName('referrer_type');
                
        
        $this->load->view('cliente/dettaglio', $obj);
    }
    
     public function portaInVisione() {

        $this->load->model('cliente_model');
        $this->load->model('magazzino_model');
        $this->load->model('rappresentanti_model');

        $idCliente = $this->input->get('idCliente');
        $idMagazzino = $this->input->get('idMagazzino');
        $isbnDelete = $this->input->get('isbnDelete');

        $obj['cliente'] = $this->cliente_model->getClienteById($idCliente);

        $obj['rapprensentati'] = $this->rappresentanti_model->getElencoRapprentanti($id = NULL);

        $obj['numBollaVisione'] = $this->cliente_model->getMaxBollaInVisione();

        //print_r($obj['numBollaVisione']);
        //METTO IN SESSIONE I LIBRI CHE HO SELEZIONATO PER LA PRESA VISIONE
        $obj['articoloMagazzino'] = $this->magazzino_model->getArticoloInMagazzinoById($idMagazzino);



        $old_que_ans_session = (count($this->session->userdata('que_ans_session')) > 0) ? array_filter($this->session->userdata('que_ans_session')) : $this->session->userdata('que_ans_session');

        //delete articolo in visione
        if ($isbnDelete != "") {
            //$array = array_filter($this->session->userdata('que_ans_session'));

            foreach ($old_que_ans_session as $elementKey => $element) {

                foreach ($element[0] as $valueKey => $value) {
                    if ($valueKey == 'isbn' && $value == $isbnDelete) {
                        //delete this particular object from the $array
                        unset($old_que_ans_session[$elementKey]);
                    }
                }
            }
        }

        //print_r($old_que_ans_session);die();
        if (count($old_que_ans_session) == 0) {
            $old_que_ans_session[] = $obj['articoloMagazzino'];
        } else {
            if (!in_array($obj['articoloMagazzino'], $old_que_ans_session)) {
                array_push($old_que_ans_session, $obj['articoloMagazzino']);
            }
        }

        $this->session->set_userdata('que_ans_session', $old_que_ans_session);
        
        $obj['global'] = $this->global;
        

        $this->load->view('cliente/portaInVisione', $obj);
    }
    
    
    
    
    function getLibriSelezionatiPerVisione() {

        $obj['selezioneLibriInVisione'] = array_filter($this->session->userdata('que_ans_session'));

        if (count($obj['selezioneLibriInVisione']) > 0) {
            $this->result->validation = TRUE;
            $this->result->message = 'Articolo in magazzino recuperato!!';
            $this->result->httpResponse = 200;
            $this->result->data = $obj['selezioneLibriInVisione'];
        } else {
            $this->result->validation = FALSE;
            $this->result->errorNum = '0701';
            //$this->result->errorText = 'articolo non trovato per idMagazzino: ' . $idMagazzino;
            $this->result->message = 'Errore';
            $this->result->httpResponse = 417;
        }

        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($this->result));
    }

    
    
    
    
}
