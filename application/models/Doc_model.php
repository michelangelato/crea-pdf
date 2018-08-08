<?php
//Class that will contain the entirety of it
class Doc_model extends CI_Model {
    
    public $interessato;
    public $tipologia;
    public $campo_nominativo;
    public $campo_indirizzo;
    public $campo_cittacap;
    public $campo_pivaotel;
    public $campo_extra;
    public $campo_extra2;

    function __construct($codicetipologia)
    {
        $this->$campo_indirizzo = 'Indirizzo:';
        $this->$campo_cittacap = 'Città (CAP):';

        switch ($codicetipologia)
        {
            case 1: //Doc Reso Post Vendita
                $this->$interessato = 'Cliente';
                $this->$campo_nominativo = 'Cognome Nome:';
                $this->$tipologia = 'Doc. Reso Post Vendita N. '; 
                $this->$campo_pivaotel = 'Cellulare:';
                $this->$campo_extra = 'Email:';
                break;

            case 2: //Doc Resa Fornitore
                $this->$interessato = 'Rappresentante';
                $this->$campo_nominativo = 'Cognome Nome:';
                $this->$tipologia = 'Documento di Resa al Fornitore N. '; 
                $this->$campo_pivaotel = 'Cellulare:';
                $this->$campo_extra = 'Email:';
                break;
            
            case 3: //Doc Resa di Carico al Rappresentante
                $this->$interessato = 'Rappresentante';
                $this->$campo_nominativo = 'Cognome Nome:';
                $this->$tipologia = 'Doc. di resa da carica al Rappresentante N. '; 
                $this->$campo_pivaotel = 'Cellulare:';
                $this->$campo_extra = 'Email:';
                break;

            case 4: //Doc Nota di Credito
                $this->$interessato = 'Cliente';
                $this->$campo_nominativo = 'Cognome Nome:';
                $this->$tipologia = 'Nota di Credito N. '; 
                $this->$campo_pivaotel = 'P.IVA:';
                break;

            case 5: //Doc Vendita
                $this->$interessato = 'Cliente';
                $this->$campo_nominativo = 'Cognome Nome:';
                $this->$tipologia = 'Documento di Vendita N. '; 
                $this->$campo_pivaotel = 'Cellulare:';
                $this->$campo_extra = 'C.F. / P.IVA:';
                $this->$campo_extra2 = 'Data:';
                break;
            
            default: //default Doc Vendita
                $this->$interessato = 'Cliente';
                $this->$campo_nominativo = 'Cod. Nominativo o Rag. Sociale:';
                $this->$tipologia = 'Documento di Vendita N. '; 
                $this->$campo_pivaotel = 'Cellulare:';
                $this->$campo_extra = 'C.F. / P.IVA:';
                $this->$campo_extra2 = 'Data:';
                break;
        }

        $this->$campo_nominativo = spacing($this->$campo_nominativo, 35);
        $this->$campo_indirizzo = spacing($this->$campo_indirizzo, 35);
        $this->$campo_cittacap = spacing($this->$campo_cittacap, 35);
        $this->$campo_pivaotel = spacing($this->$campo_pivaotel, 35);
        $this->$campo_extra = spacing($this->$campo_extra, 35);
        $this->$campo_extra2 = spacing($this->$campo_extra2, 35);


    }

    function spacing($str_value, $str_spacing)
    {
        //adds white spaces to align text 
        if(!(strlen($str_value) > $str_spacing))
            $str_value += str_repeat('&nbsp;', $str_spacing - strlen($str_value));
        return $str_value;
    }

}

?>