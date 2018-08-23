<?php

class Azienda_model extends CI_Model {

    public $nome;
    public $indirizzo;
    public $telefono;
    public $partita_iva;
    public $codice_fiscale;
    public $registro_imprese;
    public $email;
    public $logo;

    function __construct()
    {
        $this->nome = "MEDIAEDIT di Dario Muscatello";
        $this->indirizzo = "Via degli Scipioni, 292 -00192 Roma";
        $this->telefono = "06 45491243 – 0697252500";
        $this->partita_iva = "08648741000";
        $this->codice_fiscale = "MSCDRA75P01H501T";
        $this->registro_imprese = "1110250";
        $this->email = "mediaedit@mediaedit.it";
        $this->logo = 'MEDIAEDIT-LOGO.jpg';
    }
}

?>