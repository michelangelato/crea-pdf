<?php

class User_model extends CI_Model {

    public $id = null;
    public $idAula = null;
    public $idSessione = null;
    public $titolo = null;
    public $relatore = null;
    public $dataOraInizio = null;
    public $dataOraFine = null;

    public function __construct() {
        parent::__construct();

        $this->result = new stdClass();
        $this->result->validation = true;
        $this->result->message = '';
        $this->result->data = null;
        $this->result->httpResponse = 200;
        $this->result->errorNum = '';
        $this->result->errorText = '';
    }

    
    
    function logins($username, $password) {

        $this->db->select('id, username, password,ruolo');
        $this->db->from('utente');
        $this->db->where('username', $username);
        $this->db->where('password', MD5($password));
        $this->db->limit(1);

        
          $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
    

}
