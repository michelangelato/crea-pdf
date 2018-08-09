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
}

?>