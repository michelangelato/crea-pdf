<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

    function __construct() {
        parent::__construct();
       
    }

    public  function createPdfDocumentoVisione()
	{
		
         $this->load->library('pdf');
        
                $invoice = new Pdf();
                //$invoice = new phpinvoice();
  /* Header Settings */
  $invoice->setLogo(base_url('assets/img/MEDIAEDIT-LOGO.jpg'));
  $invoice->setColor("#007fff");
  //$invoice->setType("Sale Invoice");
 
  $azienda = "MEDIAEDIT di Dario Muscatello\n";
$azienda .= "Via degli Scipioni, 292 -00192 Roma\n";
$azienda .= "Tel. 06 45491243 – 0697252500\n";
$azienda .= "Partita I.V.A. n.08648741000\n";
$azienda .= "c.f. MSCDRA75P01H501T\n";
$azienda .= "Registro imprese 1110250\n";
$azienda .= "mediaedit@mediaedit.it";
  
  
  
  
  
  
   $invoice->setAzienda($azienda);
//  $invoice->setDate(date('M dS ,Y',time()));
//  $invoice->setTime(date('h:i:s A',time()));
//  $invoice->setDue(date('M dS ,Y',strtotime('+3 months')));
//  $invoice->setFrom(array("Seller Name","Sample Company Name","128 AA Juanita Ave","Glendora , CA 91740","United States of America"));
  
$cliente = "Cognome Nome o Rag Sociale: PAVIA E ANSA LDO STUDIO LEGALE ROMA\n";
$cliente .= "Indirizzo Sede: VIA BOCCA DI LEONE, 78\n";
$cliente .= "CAP: 00100\n";
$cliente .= "Città: ROMA\n";
$cliente .= "C.F. o P.IVA: 08648741000\n";

 $invoice->setTo($cliente);
  
  
  /* Adding Items in table */
  $invoice->addItem("AMD Athlon X2DC-7450","2.4GHz/1GB/160GB/SMP-DVD/VB",6,0,580,0,3480);
  $invoice->addItem("PDC-E5300","2.6GHz/1GB/320GB/SMP-DVD/FDD/VB",4,0,645,0,2580);
  $invoice->addItem('LG 18.5" WLCD',"",10,0,230,0,2300);
  $invoice->addItem("HP LaserJet 5200","",1,0,1100,0,1100);
  /* Add totals */
  $invoice->addTotal("Total",9460);
  $invoice->addTotal("VAT 21%",1986.6);
  $invoice->addTotal("Total due",11446.6,true);
  /* Set badge */ 
  $invoice->addBadge("Payment Paid");
  
  /* Add firma */
  $invoice->addDataFirma("Roma 21/05/2018");
  
  
  /* Add title */
//  $invoice->addTitle("Important Notice");
//  /* Add Paragraph */
//  $invoice->addParagraph("No item will be replaced or refunded if you don't have the invoice with you. You can refund within 2 days of purchase.");
//  
  
  
  /* Set footer note */
  $invoice->setFooternote("My Company Name Here");
  /* Render */
  $invoice->render('example1.pdf','I'); /* I => Display on browser, D => Force Download, F => local path save, S => return document path */

  
  
  
			
	}
	
}
