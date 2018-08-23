<?php

class Item_model extends CI_Model {
    
    public $nome;
    public $descrizione;
    public $quantita;
    public $iva;
    public $prezzo;
    public $sconto;
    public $totale;

    function __construct() {

        $this->nome = "AMD Athlon X2DC-7450";
        $this->descrizione = "2.4GHz/1GB/160GB/SMP-DVD/VB";
        $this->quantita = 6;
        $this->iva = 0;
        $this->prezzo = 580;
        $this->sconto = 0;
        $this->totale = 3480;
    }
    
}

?>