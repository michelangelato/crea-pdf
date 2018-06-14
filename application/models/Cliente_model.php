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

        $this->db->select('clienti.*');
        $this->db->from('clienti');
        $this->db->where('id', $idCliente);
        $query = $this->db->get();
        $res = $query->result();

        $cliente = new stdClass();
        $cliente->id = $res[0]->id;
        $cliente->nome = $res[0]->nome;
        $cliente->cognome = $res[0]->cognome;
        $cliente->codice_fiscale = $res[0]->codice_fiscale;
        $cliente->p_iva = $res[0]->p_iva;
        $cliente->indirizzo = $res[0]->indirizzo;
        $cliente->cap = $res[0]->cap;
        $cliente->citta = $res[0]->citta;
        $cliente->indirizzo_spedizione = $res[0]->indirizzo_spedizione;
        $cliente->cap_spedizione = $res[0]->cap_spedizione;
        $cliente->citta_spedizione = $res[0]->citta_spedizione;
        $cliente->fisso = $res[0]->fisso;
        $cliente->cellulare = $res[0]->cellulare;
        $cliente->ragione_sociale = $res[0]->ragione_sociale;
        $cliente->percentuale_sconto = $res[0]->percentuale_sconto;
        $cliente->codice_sap = $res[0]->codice_sap;
        $cliente->codice_ipa = $res[0]->codice_ipa;
        $cliente->id_rappresentante = $res[0]->id_rappresentante;
        $cliente->rata_da_ritirare = $res[0]->rata_da_ritirare;
        $cliente->is_blocked = $res[0]->is_blocked;
        $cliente->iban = $res[0]->iban;
        $cliente->banca = $res[0]->banca;
        $cliente->is_blocked = $res[0]->is_blocked;


        $cliente->referenti = array();

        $resReferenti = $this->getElencoReferentiClienti($res[0]->id);
        
        
//        echo "<pre>";
//        print_r($resReferenti);
        
        foreach ($resReferenti as $row) {

            $referenti = new stdClass();
            $referenti->id = $row->id;
            $referenti->email = $row->email;
            $referenti->nome = $row->nome;
            $referenti->telefono = $row->telefono;
            $referenti->referr_type = $row->referr_type;
            
            
             $cliente->referenti[] = $referenti;
        }

        return $cliente;
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

        // echo $this->db->last_query();die();

        $res = $query->result();
        return $res;
    }

    public function getElencoReferentiClienti($idCliente) {

        $this->db->select('id, email, nome, telefono, referr_type');
        $this->db->from('referers');
        $this->db->join('referers_clienti', 'referers.id = referers_clienti.id_referer');
        $this->db->where('referers_clienti.id_cliente', $idCliente);
        $this->db->where('referers.is_active', 1);

        $this->db->group_by('id');
        $this->db->order_by('nome');

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
