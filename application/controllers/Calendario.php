<?php
defined('BASEPATH') or exit('Error!');
/**
* 
*/
class Calendario extends CI_Controller{
	
	private $data;

	public function __construct(){
		
		parent::__construct();
		$this->load->library(array('session','form_validation','mydateconverter'));
		$this->load->helper(array('url'));
		$this->load->model('calendario_model');
	
	}

	public function index(){
		$this->data['page_title'] = "CalendarIO &raquo; DailyTasker ! ";
                
               $filtro = $this->input->get('filter');
                
		$this->data['tasks']=$this->calendario_model->allTask($filtro);
                
                $this->load->view('calendario',$this->data);
                
	}

	//ajax event!
	public function addtask(){
                    
                  $old_date_start = strtotime($this->input->post('dateStart'));
                  $new_date_start = date('Y-m-d H:i:s', $old_date_start);
                  
                  $old_date_end = strtotime($this->input->post('dateEnd'));
                  $new_date_end = date('Y-m-d H:i:s', $old_date_end);
            
                        $response = $this->calendario_model->addTask($this->input->post('title'),
                                $this->input->post('description'),
                                $this->input->post('dove'),
                                $this->mydateconverter->convertDate($this->input->post('date')),
                                $new_date_start,
                                $new_date_end,
                                $this->input->post('colore'),
                                $this->input->post('tipologia'));
			echo $response;

	}
	//ajax event!

	public function deletetask(){
           // var_dump($this->input->get('id'));die();
		$response = $this->calendario_model->deleteTask($this->input->get('id'));
		echo $response;
	}

	//ajax event!
	public function editask(){
            
           // var_dump($this->input->post());
            
            
		$response = $this->calendario_model->editTask(
                        $this->input->post('title'),
			$this->input->post('description'),
			$this->input->post('dove'),
			$this->input->post('id'),
                        $this->input->post('dateStart'),
                        $this->input->post('dateEnd'),
                        $this->input->post('colore'),
                        $this->input->post('tipologia')
                        
			);
			echo $response;
	}

}