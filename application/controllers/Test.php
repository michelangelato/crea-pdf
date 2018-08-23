<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Azienda_model');
        $this->load->model('Cliente_model');
        $this->load->model('Book_model');
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
        $documento = new Doc_model();
        $documento->definetype($tipo);

        $azienda = new Azienda_model();

        $numero_doc = "3333";

        $data = date("Y");

        $array = array();

        $libro = new Book_model();

        //caricamento array
        $n = 10;
        for($i=0; $i<$n; $i++)
        {
            array_push($array, $libro);
        }

        $cliente = new Cliente_model();  

        $cliente->creaDocumento($documento, $azienda, $numero_doc, $data, $array);
    }
    
    
    
	
}

?>