<?php

class Cliente_model extends CI_Model {
    
    public $ragione_sociale;
    public $indirizzo;
    public $cap;
    public $comune;
    public $partita_iva;
    public $telefono;
    public $email;
    public $rappresentante;


    function __construct()
    {
        $this->ragione_sociale = 'PAVIA E ANSA LDO STUDIO LEGALE ROMA';
        $this->indirizzo = 'VIA BOCCA DI LEONE, 78';
        $this->cap = '00100';
        $this->comune = 'ROMA';
        $this->partita_iva = '08648741000';
        $this->telefono = '3456669647';
        $this->email = 'cliente@cliente.it';    
    }

    public function creaDocumento($doc, $azienda, $numero_doc, $data_doc, $array_libri) 
    {


        // Get a reference to the controller object
        $CI = get_instance();

        //load models
        $CI->load->model('Doc_model');
        $CI->load->model('Azienda_model');
        $CI->load->model('Book_model');
        $CI->load->library('pdf');

        $invoice = new Pdf();
        //$invoice = new phpinvoice();
        /* Header Settings */
        $invoice->setLogo(base_url('assets/img/'.$azienda-> logo));
        $invoice->setColor("#007fff");
        //$invoice->setType($doc->tipologia);

        $str_azienda = 
            $azienda->nome."\n".$azienda->indirizzo."\nTel. ".$azienda->telefono
            ."\nPartita IVA n. ".$azienda->partita_iva."\nCF ".$azienda->codice_fiscale
            ."\nRegistro imprese ".$azienda->registro_imprese."\n".$azienda->email;
   
        $invoice->setAzienda($str_azienda);
        

        //possibilmente?
        //$invoice->setTo($doc->tipologia.' '.$numero_doc);

        //  $invoice->setDate(date('M dS ,Y',time()));
        //  $invoice->setTime(date('h:i:s A',time()));
        //  $invoice->setDue(date('M dS ,Y',strtotime('+3 months')));
        //$invoice->setFrom($doc->tipologia.'\\'.$data_doc);
        //$invoice->Cell(0,$lineheight,strtoupper($doc->tipologia.' '.$numero_doc.'\\'.$data_doc),0,0,'L');
        
        $invoice->setDoctype($doc->tipologia.' '.$numero_doc.' '.$data_doc);

        $str_cliente = 
            $doc->campo_nominativo.$this->ragione_sociale.
            $doc->campo_indirizzo.$this->indirizzo.
            $doc->campo_cittacap.$this->cap.' '.$this->comune;
        
        switch($doc->codice)
        {
            case 1:
                $str_cliente .= $doc->campo_pivaotel.$this->telefono
                .$doc->campo_email.$this->email;
            break;
            
            case 2:
                $str_cliente .= $doc->campo_pivaotel.$this->telefono
                .$doc->campo_email.$this->email;
            break;
            
            case 3:    
                $str_cliente .= $doc->campo_pivaotel.$this->telefono
                .$doc->campo_email.$this->email;
            break;
            
            case 4:
                $str_cliente .= $doc->campo_pivaotel.$this->partita_iva;
            break;

            case 5:
                $str_cliente .= $doc->campo_pivaotel.$this->partita_iva
                .$doc->campo_rappresentante.$this->rappresentante
                .$doc->campo_data.$this->data;    
            break;
            
            default:
                $str_cliente .= $doc->campo_pivaotel.$this->partita_iva
                .$doc->campo_rappresentante.$this->rappresentante
                .$doc->campo_data.$this->data;
            break;
        }
        $invoice->setTo($str_cliente);

        $prezzo_totale = 0;

        /* Adding Items in table */
        foreach ($array_libri as $ogg) {
            $invoice->addItem($ogg->isbn, $ogg->editore, $ogg->autore, $ogg->descrizione, $ogg->prezzo, $ogg->quantita, $ogg->importo);
            $prezzo_totale = $prezzo_totale + $ogg->importo;
        } 
        $vat = $prezzo_totale*0.21;
        $invoice->addTotal("Total", $prezzo_totale);
        $invoice->addTotal("VAT 21%",$vat);
        $invoice->addTotal("Total due",$vat+$prezzo_totale);
        /* Set badge */ 
        $invoice->addBadge("Amount Paid");
        
        /* Add firma */
        $invoice->addDataFirma("Roma ".date('d/m/Y',time()));

        /* Add title */
        //  $invoice->addTitle("Important Notice");
        //  /* Add Paragraph */
        $invoice->addParagraph("\n\nNo item will be replaced or refunded if you don't have the invoice with you. You can refund within 2 days of purchase.");
  
        /* Set footer note */
        $invoice->setFooternote("My Company Name Here");
        /* Render */
        $invoice->render($data_doc.'_'.$doc->tipologia.'_'.$numero_doc.'.pdf','I'); /* I => Display on browser, D => Force Download, F => local path save, S => return document path */

    }

}

?>