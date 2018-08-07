<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Azienda_model');
        $this->load->model('Cliente_model');
        $this->load->helper('invoice_helper');
    }

	public function index()
	{
        $data['page'] = 'home';
        $data['title'] = 'Home';

		$this->load->view('_layout/header', $data);
		$this->load->view('test/index', $data);
	}

    public function pdfDocumentoVisione()
	{
        $azienda = new Azienda_model();
        $cliente = new Cliente_model();

        $cliente->ragione_sociale = 'PAVIA E ANSA LDO STUDIO LEGALE ROMA';
        $cliente->indirizzo = 'VIA BOCCA DI LEONE, 78';
        $cliente->cap = '00100';
        $cliente->comune = 'ROMA';
        $cliente->partita_iva = '08648741000';

        createPdf('', $azienda, $cliente, 'MEDIAEDIT-LOGO.jpg', '', '', '', '', '');
	}
	
}
