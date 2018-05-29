<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

    function __construct() {
        parent::__construct();

        
    }

    public function index() {

        $this->load->view('index');
    }

    public function listaMagazzino() {
        
        $isbn_txt = $this->input->post('isbn_txt');
        $titolo_txt = $this->input->post('titolo_txt');
        $casa_editrice_txt = $this->input->post('casa_editrice_txt');
        $edizione_txt = $this->input->post('edizione_txt');
        $autore_txt = $this->input->post('autore_txt');
        $quantita_txt = $this->input->post('quantita_txt');
        $prezzo_txt = $this->input->post('prezzo_txt');
        
        $this->load->model('magazzino_model');
        $result= $this->magazzino_model->listaMagazzinoReport($isbn_txt, $titolo_txt, $casa_editrice_txt, $edizione_txt, $autore_txt, $quantita_txt, $prezzo_txt);
        
        $i = 2;
        
        $this->load->library('excel');

        $filename = 'listaMagazzino_' . date('dMy_HHmm') . '.xls';

        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache

        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle('Lista Magazzino');


        $this->excel->getActiveSheet()->setCellValue('A1', 'Isbn');

        $this->excel->getActiveSheet()->setCellValue('B1', 'Titolo');

        $this->excel->getActiveSheet()->setCellValue('C1', 'Prezzo');

        $this->excel->getActiveSheet()->setCellValue('D1', 'Quantità');
        $this->excel->getActiveSheet()->setCellValue('E1', 'Documento di carico');
        $this->excel->getActiveSheet()->setCellValue('F1', 'Tipo presa carico');
        $this->excel->getActiveSheet()->setCellValue('G1', 'Distributore');
        $this->excel->getActiveSheet()->setCellValue('H1', 'Autore');
        $this->excel->getActiveSheet()->setCellValue('I1', 'Casa Editrice');
        $this->excel->getActiveSheet()->setCellValue('J1', 'Tipo Contenuto');

        foreach ($result as $value) {


            $this->excel->getActiveSheet()->setCellValue('A' . $i, $value->isbn);
            $this->excel->getActiveSheet()->setCellValue('B' . $i, $value->titolo);
            $this->excel->getActiveSheet()->setCellValue('C' . $i, $value->prezzo);
            $this->excel->getActiveSheet()->setCellValue('D' . $i, $value->quantita);
            $this->excel->getActiveSheet()->setCellValue('E' . $i, $value->documento_carico);
            $this->excel->getActiveSheet()->setCellValue('F' . $i, $value->nome);
            $this->excel->getActiveSheet()->setCellValue('G' . $i, $value->distributore);
            $this->excel->getActiveSheet()->setCellValue('H' . $i, $value->autore);
            $this->excel->getActiveSheet()->setCellValue('I' . $i, $value->casa_editrice);
            $this->excel->getActiveSheet()->setCellValue('J' . $i, $value->contenuto_tipo);
            $i++;
        }

        $this->excel->getProperties()->setCreator("Mediaedit");
        $this->excel->getProperties()->setLastModifiedBy("Mediaedit");
        $this->excel->getProperties()->setTitle($filename);
        $this->excel->getProperties()->setSubject("");
        $this->excel->getProperties()->setDescription(base_url());
        $this->excel->getProperties()->setCategory("ListaMagazzino");

        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        $objWriter->save('php://output');
        exit;
    }

    
    
     public function listaCaricoMagazzino() {
        
        $isbn_txt = $this->input->post('isbn_txt');
        $titolo_txt = $this->input->post('titolo_txt');
        $casa_editrice_txt = $this->input->post('casa_editrice_txt');
        $distributore_txt = $this->input->post('distributore_txt');
        $autore_txt = $this->input->post('autore_txt');
        $quantita_txt = $this->input->post('quantita_txt');
        $prezzo_txt = $this->input->post('prezzo_txt');
        $documentoCarico_txt = $this->input->post('documentoCarico_txt');
        
        $this->load->model('magazzino_model');
        $result= $this->magazzino_model->listaCaricoMagazzinoReport($isbn_txt, $distributore_txt,  $titolo_txt, $casa_editrice_txt, $autore_txt, $quantita_txt, $prezzo_txt, $documentoCarico_txt);
        
        $i = 2;
        
        $this->load->library('excel');

        $filename = 'listaCaricoMagazzino_' . date('dMy_HHmm') . '.xls';

        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache

        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle('Storico Magazzino');


        $this->excel->getActiveSheet()->setCellValue('A1', 'Isbn');

        $this->excel->getActiveSheet()->setCellValue('B1', 'Titolo');

        $this->excel->getActiveSheet()->setCellValue('C1', 'Prezzo');

        $this->excel->getActiveSheet()->setCellValue('D1', 'Quantità');
        $this->excel->getActiveSheet()->setCellValue('E1', 'Documento di carico');
        $this->excel->getActiveSheet()->setCellValue('F1', 'Tipo presa carico');
        $this->excel->getActiveSheet()->setCellValue('G1', 'Distributore');
        $this->excel->getActiveSheet()->setCellValue('H1', 'Autore');
        $this->excel->getActiveSheet()->setCellValue('I1', 'Casa Editrice');
        $this->excel->getActiveSheet()->setCellValue('J1', 'Tipo Contenuto');

        foreach ($result as $value) {


            $this->excel->getActiveSheet()->setCellValue('A' . $i, $value->isbn);
            $this->excel->getActiveSheet()->setCellValue('B' . $i, $value->titolo);
            $this->excel->getActiveSheet()->setCellValue('C' . $i, $value->prezzo);
            $this->excel->getActiveSheet()->setCellValue('D' . $i, $value->quantita);
            $this->excel->getActiveSheet()->setCellValue('E' . $i, $value->documento_carico);
            $this->excel->getActiveSheet()->setCellValue('F' . $i, $value->nome);
            $this->excel->getActiveSheet()->setCellValue('G' . $i, $value->distributore);
            $this->excel->getActiveSheet()->setCellValue('H' . $i, $value->autore);
            $this->excel->getActiveSheet()->setCellValue('I' . $i, $value->casa_editrice);
            $this->excel->getActiveSheet()->setCellValue('J' . $i, $value->contenuto_tipo);
            $i++;
        }

        $this->excel->getProperties()->setCreator("Mediaedit");
        $this->excel->getProperties()->setLastModifiedBy("Mediaedit");
        $this->excel->getProperties()->setTitle($filename);
        $this->excel->getProperties()->setSubject("");
        $this->excel->getProperties()->setDescription(base_url());
        $this->excel->getProperties()->setCategory("SoricoMagazzino");

        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        $objWriter->save('php://output');
        exit;
    }
}
