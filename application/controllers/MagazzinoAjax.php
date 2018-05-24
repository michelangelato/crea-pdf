<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MagazzinoAjax extends CI_Controller {

    function index() {
        $this->load->view("magazzinoAjax");
    }

    function pagination() {
        
        $this->load->model("magazzino_model");
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = "#";
        $config["total_rows"] = $this->magazzino_model->count_all();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $config["use_page_numbers"] = TRUE;
        $config["full_tag_open"] = '<ul class="pagination">';
        $config["full_tag_close"] = '</ul>';
        $config["first_tag_open"] = '<li>';
        $config["first_tag_close"] = '</li>';
        $config["last_tag_open"] = '<li>';
        $config["last_tag_close"] = '</li>';
        $config['next_link'] = '&gt;';
        $config["next_tag_open"] = '<li>';
        $config["next_tag_close"] = '</li>';
        $config["prev_link"] = "&lt;";
        $config["prev_tag_open"] = "<li>";
        $config["prev_tag_close"] = "</li>";
        $config["cur_tag_open"] = "<li class='active'><a href='#'>";
        $config["cur_tag_close"] = "</a></li>";
        $config["num_tag_open"] = "<li>";
        $config["num_tag_close"] = "</li>";
        $config["num_links"] = 1;
        $this->pagination->initialize($config);
        //$page = $this->uri->segment(3);

        $page = $this->uri->segment(3);

        $start = ($page - 1) * $config["per_page"];

        $isbn = $this->input->post('isbn');
        $titolo = $this->input->post('titolo');
        $prezzo = $this->input->post('prezzo');
        $documentoCarico = $this->input->post('documentoCarico');

        $output = array(
            'pagination_link' => $this->pagination->create_links(),
            'country_table' => $this->magazzino_model->fetch_details($config["per_page"], $start, $isbn, $titolo, $prezzo, $documentoCarico)
        );
        echo json_encode($output);
    }

}
