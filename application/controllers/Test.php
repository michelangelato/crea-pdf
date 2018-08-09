<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

    function __construct() {
        
        parent::__construct();

        $this->load->model('Azienda_model');
        $this->load->model('Cliente_model');
        $this->load->model('Item_model');
        $this->load->model('Doc_model');

        $this->load->helper('invoice_helper');
    }

	public function index() {

        $data['page'] = 'home';
        $data['title'] = 'Home';

		$this->load->view('_layout/header', $data);
		$this->load->view('test/index', $data);
	}

    public function documento()
	{
        /*code goes from 1 to 5:
        1 - Doc Reso Post Vendita
        2 - Doc Resa Fornitore
        3 - Doc Resa di Carico al Rappresentante
        4 - Doc Nota di Credito
        5 - Doc Vendita
        */

        $tipo = $this->input->get('tipo');
        $documento = new Doc_model();
        $documento->definetype($tipo);

        $azienda = new Azienda_model();
        $cliente = new Cliente_model();

        $items = [];
        for ($i = 0; $i < 30; $i++) {
            $items[$i] = new Item_model();
        }
        
        createPdf($documento, $azienda, $cliente, 'MEDIAEDIT-LOGO.jpg', '3', $items, '', '');
    }
}
