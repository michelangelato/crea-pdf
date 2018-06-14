<?php

/**
 * invoice data model
 *
 * @package PersonalData
 * @version 1.0
 * @copyright Schema31 s.p.a - 2015
 */
class Setup_model extends CI_Model {

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

   
    public function getElencoSetupByFieldName($fieldName) {
        
        if($fieldName == 'percentuale_sconto'){
            $this->db->select('id, CAST(name as SIGNED) AS name');
        }else{
             $this->db->select('id, name');
        }
        $this->db->from('setup');
        
        $this->db->where('field_name', $fieldName);
        $this->db->order_by('name');
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }
    
    

    
}
