<?php
//Class that will contain the entirety of it
class Book_model extends CI_Model {
    
    public $isbn;
    public $editore;
    public $autore;
    public $descrizione;
    public $prezzo;
    public $quantita;
    public $importo;
    
    public function __construct()
    {
        $this->isbn = "99921-58-10-7";
        $this->editore = "editorexx";
        $this->autore = "autorexx";
        $this->descrizione = "descrizione del libroxx xxx xxx";
        $this->prezzo = 50;
        $this->quantita = 20;
        $this->importo = $this->prezzo * $this->quantita;
    }
}

?>