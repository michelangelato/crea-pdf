<?php

/**
 * invoice data model
 *
 * @package PersonalData
 * @version 1.0
 * @copyright Schema31 s.p.a - 2015
 */

class Cliente_model extends CI_Model {

    function count_all() {
        $query = $this->db->get("clienti");
        return $query->num_rows();
    }

    function fetch_details($limit, $start, $search) {
        $output = '';
        $this->db->select("*");
        $this->db->from("clienti");

        if ($search != "") {
            $this->db->like('nome', $search);
            $this->db->or_like('cognome', $search);
            $this->db->or_like('p_iva', $search);
        }


        $this->db->order_by("nome", "ASC");
        $this->db->limit($limit, $start);

        $query = $this->db->get();
        $output .= '
  <table class="table table-bordered">
   <tr>
    <th>Codice Ipa</th>
    <th>Nome</th>
    <th>Cognome</th>
    <th>P. Iva</th>
    <th>Codice Fiscale</th>
    <th></th>
   </tr>
  ';
        foreach ($query->result() as $row) {
            $output .= '
   <tr>
    <td>' . $row->codice_ipa . '</td>
    <td>' . $row->nome . '</td>
    <td>' . $row->cognome . '</td>
    <td>' . $row->p_iva . '</td>
    <td>' . $row->codice_fiscale . '</td>
    <td><button type="button"  style="margin-top: 5px;" class="btn btn-primary btn-xs" onclick="portaInVisione(' . $row->id . ')">Porta In Visione</button></td>
   </tr>
   ';
        }
        $output .= '</table>';
        return $output;
    }

    public function getClienteById($idCliente) {

        $this->db->select('*');
        $this->db->from('clienti');
        $this->db->where('id', $idCliente);
        $query = $this->db->get();
        $res = $query->result();

        
       // echo $this->db->last_query();die();
        
        return $res;
    }
    
    
    
      public function getMaxBollaInVisione() {

        $this->db->select('id');
        $this->db->from('index_bolla_visione');
        $query = $this->db->get();
        $res = $query->result();

        return $res;
    }

    
    
    // per pagin lista clienti
    
    public function getElencoClienti($limit, $id, $nome_txt) {
       
        if ($limit != "") {
            $this->db->limit($limit, $id);
        }

        $this->db->select('clienti.id, codice_sap, clienti.nome , clienti.cognome, clienti.p_iva, clienti.indirizzo, clienti.citta, CONCAT(rappresentante.cognome, " ", rappresentante.nome) as rappresentante, clienti.data_inserimento_riga');
        
        $this->db->from('clienti');
         $this->db->join('rappresentante', 'clienti.id_rappresentante = rappresentante.id');

        if ($nome_txt != "") {
            $this->db->like('clienti.nome', $nome_txt);
        }

//        $this->db->group_by('trim(nome)');
        $this->db->order_by('id');

        $query = $this->db->get();
        
        
        
        //echo $this->db->last_query();die();
        
        
        $res = $query->result();
        return $res;
    }

    public function getElencoClienti_count($nome_txt) {

        $this->db->select('id, trim(nome) as nome');
        $this->db->from('clienti');
        
         if ($nome_txt != "") {
            $this->db->like('nome', $nome_txt);
        }
        
        $this->db->group_by('trim(nome)');
        $this->db->order_by('nome');

        $query = $this->db->get();
        return $query->num_rows();
    }

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
