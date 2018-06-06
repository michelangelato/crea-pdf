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

        
        die('sssssss');
        $nome_txt = $this->input->post('nome_txt');

        $obj['nome_txt'] = $nome_txt;
        
        $this->load->library('pagination');
        $this->load->model('cliente_model');

        
        //pagination settings
        $config['base_url'] = site_url('cliente/listaClienti');
        $config['total_rows'] = $this->cliente_model->getElencoClienti_count($nome_txt);

        
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
        $obj["data"] = $this->cliente_model->getElencoClienti($config["per_page"], $obj['page'], $nome_txt);
        $obj['pagination'] = $this->pagination->create_links();
        
        $obj['global'] = $this->global;

        $this->load->view('cliente/listaCLienti.php', $obj);
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
    
}
