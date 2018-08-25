<?php
//Class that will contain the entirety of it
class Doc_model extends CI_Model {
    
    public $codice; //codice del documento (da 0 a 4)
    public $interessato;
    public $tipologia;
    public $campo_nominativo;
    public $campo_indirizzo;
    public $campo_cittacap;
    public $campo_piva;
    public $campo_tel;
    public $campo_email;
    public $campo_rappresentante;
    public $campo_data;
    public $modo_pagamento;
    
    public function __construct()
    {
        $this->interessato = "Cliente";
        $this->tipologia = "Documento di Vendita N. "; 
        $this->campo_nominativo = "Cognome Nome: ";
        $this->campo_indirizzo = "\nIndirizzo: ";
        $this->campo_cittacap = "\nCittà (CAP): ";
        $this->campo_piva = "\nC.F. / P.IVA: ";
        $this->campo_tel = "\nCellulare: ";
        $this->campo_email = "\nEmail: ";
        $this->campo_rappresentante = "\nRappresentante: ";
        $this->campo_data = "\nData: ";
        $this->modo_pagamento = "Pagamento effettuato tramite: ";

    }

    public function definetype($codicetipologia)
    {
        $this->codice = $codicetipologia;
        switch ($this->codice)
        {
            case 0: //Doc Vendita
                $this->campo_nominativo = "Cod. Nominativo o Rag. Sociale: ";
                $this->tipologia = "Documento di Vendita N "; 
                break;

            case 1: //Doc Reso Post Vendita
                $this->tipologia = "Doc. Reso Post Vendita N "; 
                break;

            case 2: //Doc Resa Fornitore
                $this->interessato = "Rappresentante";
                $this->tipologia = "Documento di Resa al Fornitore N ";
                break;
            
            case 3: //Doc Resa di Carico al Rappresentante
                $this->interessato = "Rappresentante";
                $this->tipologia = "Doc. di resa da carica al Rappresentante N ";
                break;

            case 4: //Doc Nota di Credito
                $this->tipologia = "Nota di Credito N "; 
                break;

            
            default: //default Doc Vendita
                $this->campo_nominativo = "Cod. Nominativo o Rag. Sociale: ";
                $this->tipologia = "Documento di Vendita N ";
                break;
        }
    }
}

?>