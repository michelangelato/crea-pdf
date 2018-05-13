<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Rest_api extends REST_Controller {

    function __construct() {
        // Construct the parent class
        parent::__construct();

        $this->load->model('rest_api_model');
    }

    private function generateError($codeError, $shortMessage) {

        $errorResponse = array(
            'error' => array(
                'code' => $codeError,
                'shortMessage' => $shortMessage
            )
        );

        return $errorResponse;
    }

    public function login_get() {

        $username = $this->get('username');
        $password = $this->get('password');

        $ret = $this->rest_api_model->getLogin($username, $password);

        if (!$ret->validation) {
            $this->response($this->generateError($ret->errorNum, $ret->errorText), $ret->httpResponse);
        } else {
            $this->response($ret->data, $ret->httpResponse);
        }
    }

    public function corsi_get() {

        $language = $this->get('language');

        $ret = $this->rest_api_model->getCorsi($language);

        if (!$ret->validation) {
            $this->response($this->generateError($ret->errorNum, $ret->errorText), $ret->httpResponse);
        } else {
            $this->response($ret->data, $ret->httpResponse);
        }
    }

    public function postiDisponibili_get() {

        $idCorso = $this->get('idCorso');
        $gruppo = $this->get('gruppo');

        $ret = $this->rest_api_model->getPostiDisponibili($idCorso, $gruppo);
        
        
        

        if (!$ret->validation) {
            $this->response($this->generateError($ret->errorNum, $ret->errorText), $ret->httpResponse);
        } else {
            $this->response($ret->data, $ret->httpResponse);
        }
    }

    public function prenota_post() {

        $datecorso_gruppo = $this->post('datecorso_gruppo');
        $corso_id = $this->post('corso_id');
        $venditore_id = $this->post('venditore_id');
        $salone = $this->post('salone');
        $numeroPosti = $this->post('numeroPosti');
        
        //echo $datecorso_gruppo; die();
        $ret = $this->rest_api_model->setPrenota($datecorso_gruppo, $corso_id, $venditore_id, $salone, $numeroPosti);

        if (!$ret->validation) {
            $this->response($this->generateError($ret->errorNum, $ret->errorText), $ret->httpResponse);
        } else {
            $this->response($ret->data, $ret->httpResponse);
        }
    }

    public function toUpdate_get() {

        $ret = $this->rest_api_model->getToUpdate();

        $this->response($ret);
    }

}
