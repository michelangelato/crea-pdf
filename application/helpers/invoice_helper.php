<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( !function_exists('createPdf'))
{
    function createPdf($doc, $azienda, $cliente, $logo, $numeroDoc, $arrayCliente, $arrayItem, $sconto, $iva)
    {
        // Get a reference to the controller object
        $CI = get_instance();
        
        //da aggiungere parametro al costruttore Doc_model (?) 
        //altrimenti si crea una funzioncina e si richiama e si impostano le variabili da li
        $CI->load->model('Doc_model');
        $CI->load->model('Azienda_model');
        $CI->load->model('Cliente_model');
        $CI->load->library('pdf');
        
        $invoice = new Pdf();
        //$invoice = new phpinvoice();

        /* Header Settings */
        $invoice->setLogo(base_url('assets/img/'.$logo));
        $invoice->setColor("#007fff");
        $invoice->setType($doc->tipologia.' '.$numeroDoc);

        $str_azienda = 
            $azienda->nome."\n".$azienda->indirizzo."\nTel. ".$azienda->telefono
            ."\nPartita IVA n. ".$azienda->partita_iva."\nCF ".$azienda->codice_fiscale
            ."\nRegistro imprese ".$azienda->registro_imprese."\n".$azienda->email;
   
        $invoice->setAzienda($str_azienda);
        
        //possibilmente?
        //$invoice->setTo($doc->tipologia.' '.$numeroDoc);

        //  $invoice->setDate(date('M dS ,Y',time()));
        //  $invoice->setTime(date('h:i:s A',time()));
        //  $invoice->setDue(date('M dS ,Y',strtotime('+3 months')));
        //  $invoice->setFrom(array("Seller Name","Sample Company Name","128 AA Juanita Ave","Glendora , CA 91740","United States of America"));
        
        //da cambiare le stringhe "cognome" etc con i valori di Doc_Model.php per renderlo variabile
        $str_cliente = 
            $doc->campo_nominativo.$cliente->ragione_sociale.
            $doc->campo_indirizzo.$cliente->indirizzo.
            $doc->campo_cittacap.$cliente->cap.' '.$cliente->comune;
        
        switch($doc->codice)
        {
            case 1:
                $str_cliente .= $doc->campo_pivaotel.$cliente->telefono
                .$doc->campo_email.$cliente->email;
            break;
            
            case 2:
                $str_cliente .= $doc->campo_pivaotel.$cliente->telefono
                .$doc->campo_email.$cliente->email;
            break;
            
            case 3:    
                $str_cliente .= $doc->campo_pivaotel.$cliente->telefono
                .$doc->campo_email.$cliente->email;
            break;
            
            case 4:
                $str_cliente .= $doc->campo_pivaotel.$cliente->partita_iva;
            break;

            case 5:
                $str_cliente .= $doc->campo_pivaotel.$cliente->partita_iva
                .$doc->campo_rappresentante.$cliente->rappresentante
                .$doc->campo_data.$cliente->data;    
            break;
            
            default:
                $str_cliente .= $doc->campo_pivaotel.$cliente->partita_iva
                .$doc->campo_rappresentante.$cliente->rappresentante
                .$doc->campo_data.$cliente->data;
            break;
        }
        $invoice->setTo($str_cliente);
  
        /* Adding Items in table
        foreach ($arrayItem as $ogg) {
            $invoice->addItem($ogg->nome, $ogg->descrizione, $ogg->quantita, $ogg->iva, $ogg->prezzo, $ogg->sconto, $ogg->totale);
        } */
        $invoice->addItem("AMD Athlon X2DC-7450", "2.4GHz/1GB/160GB/SMP-DVD/VB", 6, 0, 580, 0, 3480);
        $invoice->addItem("PDC-E5300","2.6GHz/1GB/320GB/SMP-DVD/FDD/VB",4,0,645,0,2580);
        $invoice->addItem('LG 18.5" WLCD',"",10,0,230,0,2300);
        $invoice->addItem("HP LaserJet 5200","",1,0,1100,0,1100);
        $invoice->addItem("PDC-E5300","2.6GHz/1GB/320GB/SMP-DVD/FDD/VB",4,0,645,0,2580);
        $invoice->addItem('LG 18.5" WLCD',"",10,0,230,0,2300);
        $invoice->addItem("HP LaserJet 5200","",1,0,1100,0,1100);
        $invoice->addItem("PDC-E5300","2.6GHz/1GB/320GB/SMP-DVD/FDD/VB",4,0,645,0,2580);
        $invoice->addItem('LG 18.5" WLCD',"",10,0,230,0,2300);
        $invoice->addItem("HP LaserJet 5200","",1,0,1100,0,1100);
        $invoice->addItem("PDC-E5300","2.6GHz/1GB/320GB/SMP-DVD/FDD/VB",4,0,645,0,2580);
        $invoice->addItem('LG 18.5" WLCD',"",10,0,230,0,2300);
        $invoice->addItem("HP LaserJet 5200","",1,0,1100,0,1100);
        $invoice->addItem("PDC-E5300","2.6GHz/1GB/320GB/SMP-DVD/FDD/VB",4,0,645,0,2580);
        $invoice->addItem('LG 18.5" WLCD',"",10,0,230,0,2300);
        $invoice->addItem("HP LaserJet 5200","",1,0,1100,0,1100);
        $invoice->addItem("PDC-E5300","2.6GHz/1GB/320GB/SMP-DVD/FDD/VB",4,0,645,0,2580);
        $invoice->addItem('LG 18.5" WLCD',"",10,0,230,0,2300);
        $invoice->addItem("HP LaserJet 5200","",1,0,1100,0,1100);
        $invoice->addItem("PDC-E5300","2.6GHz/1GB/320GB/SMP-DVD/FDD/VB",4,0,645,0,2580);
        $invoice->addItem('LG 18.5" WLCD',"",10,0,230,0,2300);
        $invoice->addItem("HP LaserJet 5200","",1,0,1100,0,1100);
        $invoice->addItem("PDC-E5300","2.6GHz/1GB/320GB/SMP-DVD/FDD/VB",4,0,645,0,2580);
        $invoice->addItem('LG 18.5" WLCD',"",10,0,230,0,2300);
        $invoice->addItem("HP LaserJet 5200","",1,0,1100,0,1100);
        $invoice->addItem("PDC-E5300","2.6GHz/1GB/320GB/SMP-DVD/FDD/VB",4,0,645,0,2580);
        $invoice->addItem('LG 18.5" WLCD',"",10,0,230,0,2300);
        $invoice->addItem("HP LaserJet 5200","",1,0,1100,0,1100);
        $invoice->addItem("PDC-E5300","2.6GHz/1GB/320GB/SMP-DVD/FDD/VB",4,0,645,0,2580);
        $invoice->addItem('LG 18.5" WLCD',"",10,0,230,0,2300);
        $invoice->addItem("HP LaserJet 5200","",1,0,1100,0,1100);
        $invoice->addItem("PDC-E5300","2.6GHz/1GB/320GB/SMP-DVD/FDD/VB",4,0,645,0,2580);
        $invoice->addItem('LG 18.5" WLCD',"",10,0,230,0,2300);
        $invoice->addItem("HP LaserJet 5200","",1,0,1100,0,1100);
        $invoice->addItem("PDC-E5300","2.6GHz/1GB/320GB/SMP-DVD/FDD/VB",4,0,645,0,2580);
        $invoice->addItem('LG 18.5" WLCD',"",10,0,230,0,2300);
        $invoice->addItem("HP LaserJet 5200","",1,0,1100,0,1100);
        $invoice->addItem("PDC-E5300","2.6GHz/1GB/320GB/SMP-DVD/FDD/VB",4,0,645,0,2580);
        $invoice->addItem('LG 18.5" WLCD',"",10,0,230,0,2300);
        $invoice->addItem("HP LaserJet 5200","",1,0,1100,0,1100);
        $invoice->addItem("PDC-E5300","2.6GHz/1GB/320GB/SMP-DVD/FDD/VB",4,0,645,0,2580);
        $invoice->addItem('LG 18.5" WLCD',"",10,0,230,0,2300);
        $invoice->addItem("HP LaserJet 5200","",1,0,1100,0,1100);
        $invoice->addItem("PDC-E5300","2.6GHz/1GB/320GB/SMP-DVD/FDD/VB",4,0,645,0,2580);
        $invoice->addItem('LG 18.5" WLCD',"",10,0,230,0,2300);
        $invoice->addItem("HP LaserJet 5200","",1,0,1100,0,1100);
        /* Add totals */
        $invoice->addTotal("Total",9460);
        $invoice->addTotal("VAT 21%",1986.6);
        $invoice->addTotal("Total due",11446.6,true);
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
        $invoice->render('example1.pdf','I'); /* I => Display on browser, D => Force Download, F => local path save, S => return document path */
    }
}
