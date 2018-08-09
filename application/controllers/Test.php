<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Azienda_model');
        $this->load->model('Cliente_model');
        $this->load->model('Doc_model');
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
        /*code goes from 1 to 5:
        1 - Doc Reso Post Vendita
        2 - Doc Resa Fornitore
        3 - Doc Resa di Carico al Rappresentante
        4 - Doc Nota di Credito
        5 - Doc Vendita
        */

        $tipo = 1;
        if (isset($_GET['doctype'])) {
            $tipo = $_GET['doctype'];
        }
        $azienda = new Azienda_model();
        $cliente = new Cliente_model();
        $documento = new Doc_model();
        $documento->definetype($tipo);

        createPdf($documento, $azienda, $cliente, 'MEDIAEDIT-LOGO.jpg', '', '', '', '', '');
    }
    
    
    
	
}
