<?php

/**
 * 
 */
defined('BASEPATH') or exit('Error!');

class Rappresentanti_model extends CI_Model {

    public function __construct() {
        # code...
        parent::__construct();
    }

    

     public function getElencoRapprentanti($id) {


        $this->db->select("id, CONCAT(nome, ' ', cognome) AS nome");
        $this->db->from('rappresentante');
         $this->db->where('is_active', 1);

        if ($id != "") {
            $this->db->where('id', $id);
        }

        $this->db->order_by('nome');
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }
}
