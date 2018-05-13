<?php

/**
 * 
 */
defined('BASEPATH') or exit('Error!');

class Calendario_model extends CI_Model {

    public function __construct() {
        # code...
        parent::__construct();
        $this->load->database();
    }

    public function addTask($title, $details, $dove, $date, $dateStart, $dateEnd, $colore, $tipologia) {


        //echo $dateStart; die();
        $task_details = array('task_name' => $title,
            'task_details' => $details,
            'task_dove' => $dove,
            'date' => $date,
            'start' => $dateStart,
            'end' => $dateEnd,
            'colore' => $colore,
            'tipologia' => $tipologia
        );
        return $this->db->insert('task', $task_details);

        //echo $this->db->last_query();die();
    }

    public function allTask($filtro) {


        $this->db->select("id, task_name, task_details,task_dove, start, end , colore, tipologia, corso_id, gruppo");

        if ($filtro != "all") {
            $this->db->where('tipologia', $filtro);
        }
        $sql = $this->db->get("task");



        //aìvioglio far vedere la disponibilita dei posti nel calendario

        $array = $sql->result_array();
        //echo $this->db->last_query();die();
//        echo "prima:: ";
//        var_dump($array);
        //$array['zaza']= 1;
        //array_push($array['inAttesa'], "444");


        foreach ($array as &$value) {
            //$age = getUserAge($user['userid']);

            $value['postiInAttesa'] = null;
            $value['postiConfermati'] = null;
            $value['postiRifiutati'] = null;
            $value['postiMax'] = null;


            if ($value['tipologia'] == "jacademy" && $value['corso_id'] != 'null') {

                $this->load->model('corsi_model');
                $ret = $this->corsi_model->getCorsoById($value['corso_id']);

                $value['postiInAttesa'] = $this->corsi_model->getNumeroPostiInAttesaByIdCorsoAndGruppo($value['corso_id'], $value['gruppo']);
                $value['postiConfermati'] = $this->corsi_model->getNumeroPostiConfermatiByIdCorsoAndGruppo($value['corso_id'], $value['gruppo']);
                $value['postiRifiutati'] = $this->corsi_model->getNumeroPostiConfermatiByIdCorsoAndGruppo($value['corso_id'], $value['gruppo']);

                if (isSet($ret) && count($ret) > 0) {
                    $value['postiMax'] = $ret[0]->numeroPartecipantiMax + $ret[0]->numeroPartecipantiOverbooking;
                }
            }
        }


        return $array;
    }

    public function deleteTask($id) {

        $this->db->where('id', $id);
        return $this->db->delete('task');
    }

    public function editTask($title, $details, $dove, $id, $dateStart, $dateEnd, $colore, $tipologia) {
        $new_taskdetails = array('task_name' => $title, 'task_details' => $details, 'task_dove' => $dove, 'start' => $dateStart, 'end' => $dateEnd, 'colore' => $colore, 'tipologia' => $tipologia);
        //$this->db->where('task.task_id',$id);
        $this->db->where('task.id', $id);
        return $this->db->update('task', $new_taskdetails);
        //echo $this->db->last_query();die();
    }

}
