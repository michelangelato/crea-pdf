<?php
//Class that will contain the entirety of it
class Doc_model extends CI_Model {
    
    public $codice;
    public $interessato;
    public $tipologia;
    public $campo_nominativo;
    public $campo_indirizzo;
    public $campo_cittacap;
    public $campo_pivaotel;
    public $campo_email;
    public $campo_rappresentante;
    public $campo_data;
    
    
    public function __construct()
    {
        $this->interessato = "Cliente";
        $this->tipologia = "Documento di Vendita N. "; 
        $this->campo_nominativo = "Cod. Nominativo o Rag. Sociale: ";
        $this->campo_indirizzo = "\nIndirizzo: ";
        $this->campo_cittacap = "\nCittà (CAP): ";
        $this->campo_pivaotel = "\nC.F. / P.IVA: ";
        $this->campo_rappresentante = "\nRappresentante: ";
        $this->campo_data = "\nData: ";
        
        /*
        $this->campo_nominativo = $this->spacing($this->$campo_nominativo, 35);
        $this->campo_indirizzo = $this->spacing($this->$campo_indirizzo, 35);
        $this->campo_cittacap = $this->spacing($this->$campo_cittacap, 35);
        $this->campo_pivaotel = $this->spacing($this->$campo_pivaotel, 35);
        $this->campo_emailotel = $this->spacing($this->$campo_extra, 35);
        $this->campo_data = $this->spacing($this->$campo_extra2, 35);*/

    }

    public function definetype($codicetipologia)
    {
        $this->campo_indirizzo = "\nIndirizzo: ";
        $this->campo_cittacap = "\nCittà (CAP): ";
        $this->codice = $codicetipologia;
        switch ($this->codice)
        {
            case 1: //Doc Reso Post Vendita
                $this->interessato = "Cliente";
                $this->campo_nominativo = "Cognome Nome: ";
                $this->tipologia = "Doc. Reso Post Vendita N. "; 
                $this->campo_pivaotel = "\nCellulare: ";
                $this->campo_email = "\nEmail: ";
                break;

            case 2: //Doc Resa Fornitore
                $this->interessato = "Rappresentante";
                $this->campo_nominativo = "Cognome Nome: ";
                $this->tipologia = "Documento di Resa al Fornitore N. "; 
                $this->campo_pivaotel = "\nCellulare: ";
                $this->campo_email = "\nEmail: ";
                break;
            
            case 3: //Doc Resa di Carico al Rappresentante
                $this->interessato = "Rappresentante";
                $this->campo_nominativo = "Cognome Nome: ";
                $this->tipologia = "Doc. di resa da carica al Rappresentante N. "; 
                $this->campo_pivaotel = "\nCellulare: ";
                $this->campo_email = "\nEmail: ";
                break;

            case 4: //Doc Nota di Credito
                $this->interessato = "Cliente";
                $this->campo_nominativo = "Cognome Nome: ";
                $this->tipologia = "Nota di Credito N. "; 
                $this->campo_pivaotel = "\nP.IVA: ";
                break;

            case 5: //Doc Vendita
                $this->interessato = "Cliente";
                $this->campo_nominativo = "Cognome Nome: ";
                $this->tipologia = "Documento di Vendita N. "; 
                $this->campo_pivaotel = "\nC.F. / P.IVA: ";
                $this->campo_rappresentante = "\nRappresentante: ";
                $this->campo_data = "\nData: ";
                break;
            
            default: //default Doc Vendita
                $this->interessato = "Cliente";
                $this->campo_nominativo = "Cod. Nominativo o Rag. Sociale: ";
                $this->tipologia = "Documento di Vendita N. "; 
                $this->campo_pivaotel = "\nC.F. / P.IVA: ";
                $this->campo_rappresentante = "\nRappresentante: ";
                $this->campo_data = "\nData: ";
                break;
        }

        /*
        $this->campo_nominativo = $this->spacing($this->$campo_nominativo, 35);
        $this->campo_indirizzo = $this->spacing($this->$campo_indirizzo, 35);
        $this->campo_cittacap = $this->spacing($this->$campo_cittacap, 35);
        $this->campo_pivaotel = $this->spacing($this->$campo_pivaotel, 35);
        $this->campo_emailotel = $this->spacing($this->$campo_extra, 35);
        $this->campo_data = $this->spacing($this->$campo_extra2, 35);
        */
    }

    public function spacing($str_value, $str_spacing)
    {
        die(strlen($str_value));
        //adds white spaces to align text 
        if(!(strlen($str_value) > $str_spacing))
        {
            $str_value .= str_repeat("&nbsp;", $str_spacing - strlen($str_value));

        }
        return $str_value;
    }

}

?>