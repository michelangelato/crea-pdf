<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

    function __construct() {
        
        parent::__construct();
        $this->load->model('user_model');
    }

    function index() {
        
        //This method will have the credentials validation
        $this->load->library('form_validation');

        
        //get the posted values
        $username = $this->input->post("username");
        $password = $this->input->post("password");

        $this->form_validation->set_rules("username", "Username", "trim|required");
        $this->form_validation->set_rules("password", "Password", "trim|required");
        
        
         
        
        if ($this->form_validation->run() == FALSE) {
          
            //Field validation failed.  User redirected to login page
            $this->load->view('login');
        } else {
             
           //echo "xxxxxx" . $username . "----" .$password;

            $result = $this->user_model->logins($username, $password);

            if ($result) {
                $sess_array = array();
                foreach ($result as $row) {
                    $sess_array = array(
                        'id' => $row->id,
                        'username' => $row->username,
                        'ruolo' => $row->ruolo
                    );
                    
                    $this->session->set_userdata('loggedAdmin_in', $sess_array);
                    
                    
                    redirect('dashboard', 'refresh');
                }
            } else {

                $this->load->view('login');
            }
        }
    }

    
    function logout() {

        $this->session->unset_userdata('loggedAdmin_in');
        session_destroy();

        redirect('Login', 'refresh');
    }
    


}
