<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->load->library('form_validation');
        $this->load->view('login');
    }

}

?>