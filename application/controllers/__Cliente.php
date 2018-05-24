<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Posts Management class created by CodexWorld
 */
class Cliente extends CI_Controller {
    
    public function __construct() {
        
        parent::__construct();
        
    }

    public function index() {
        
        $data['post_title'] = 'Blog';
        
//        $this->load->view('templates/header', $data);
        //$this->load->view('magazzino/index', $data);
//        $this->load->view('templates/footer');
        
    }
    
    public function index_display() {
        
        // $this->output->enable_profiler(TRUE);
        
        // Set default variables
        $msg = '';
        
        if($this->input->post('page')){
            
            $pag_container = '';
            $where = '';
            
            // Sanitize the received page   
            $page = $this->input->post('page');
            $cur_page = $page;  
            $page -= 1;
            // Set the number of results to display
            $per_page = 10;
            $previous_btn = true;
            $next_btn = true;
            $first_btn = true;
            $last_btn = true;
            $start = $page * $per_page;
            
            if(!empty($this->input->post('search'))){
                $where = ' AND (nome LIKE "%%' . $this->input->post('search') . '%%" OR cognome LIKE "%%' . $this->input->post('search') . '%%" OR p_iva LIKE "%%' . $this->input->post('search') . '%%") ';
            }
            
            // Set the table where we will be querying data
            $table_name = "clienti";
            
            // Query the necessary posts
            $all_blog_posts = $this->db->query("
                SELECT * FROM " . $table_name . " 
                WHERE is_active = '1' AND is_blocked = '0'".$where."
                ORDER BY nome 
                LIMIT ?, ?", array($start, $per_page) );
            
            // At the same time, count the number of queried posts
            $blogs_count = $this->db->query("
                SELECT COUNT(ID) as blog_count FROM " . $table_name . " 
                WHERE is_active = '1' AND is_blocked = '0'");
            
            
            
             $msg .= '
  <table class="table table-bordered">
   <tr>
    <th style=\'width:9%\'>Cod. Ipa</th>
    <th>Nome</th>
    <th>Cognome</th>
    <th>P. Iva</th>
    <th>Cod. Fiscale</th>
    <th></th>
   </tr>
  ';
            
   foreach ($all_blog_posts->result() as $row) {
            $msg .= '
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
        $msg .= '</table>';
        //return $output;
            
            
            
//            // Loop into all the posts
//            foreach($all_blog_posts->result() as $key => $post): 
//                
//                // Set the desired output into a variable
//                $msg .= '
//                <div class = "col-md-12">       
//                    <h2><a href="' . base_url('cliente/' . $post->nome) . '">' . $post->cognome . '</a></h2>
//                    <p>' . $post->p_iva . '</p>
//                </div>';
//                
//            endforeach;
        
        
        
        
        
        
        
            
            // Optional, wrap the output into a container
            //$msg = "<div class='cvf-universal-content'>" . $msg . "</div><br class = 'clear' />";
                    
            // This is where the magic happens
            $count = $blogs_count->row();
            
            //print_r($count);
            $no_of_paginations = ceil($count->blog_count / $per_page);

            if ($cur_page >= 7) {
                $start_loop = $cur_page - 3;
                if ($no_of_paginations > $cur_page + 3)
                    $end_loop = $cur_page + 3;
                else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
                    $start_loop = $no_of_paginations - 6;
                    $end_loop = $no_of_paginations;
                } else {
                    $end_loop = $no_of_paginations;
                }
            } else {
                $start_loop = 1;
                if ($no_of_paginations > 7)
                    $end_loop = 7;
                else
                    $end_loop = $no_of_paginations;
            }
            
            // Pagination Buttons logic         
            $pag_container .= "
            <div class='cvf-universal-pagination'>
                <ul>";

            if ($first_btn && $cur_page > 1) {
                $pag_container .= "<li p='1' class='active'>First</li>";
            } else if ($first_btn) {
                $pag_container .= "<li p='1' class='inactive'>First</li>";
            }

            if ($previous_btn && $cur_page > 1) {
                $pre = $cur_page - 1;
                $pag_container .= "<li p='$pre' class='active'>Previous</li>";
            } else if ($previous_btn) {
                $pag_container .= "<li class='inactive'>Previous</li>";
            }
            for ($i = $start_loop; $i <= $end_loop; $i++) {

                if ($cur_page == $i)
                    $pag_container .= "<li p='$i' class = 'selected' >{$i}</li>";
                else
                    $pag_container .= "<li p='$i' class='active'>{$i}</li>";
            }
            
            if ($next_btn && $cur_page < $no_of_paginations) {
                $nex = $cur_page + 1;
                $pag_container .= "<li p='$nex' class='active'>Next</li>";
            } else if ($next_btn) {
                $pag_container .= "<li class='inactive'>Next</li>";
            }

            if ($last_btn && $cur_page < $no_of_paginations) {
                $pag_container .= "<li p='$no_of_paginations' class='active'>Last</li>";
            } else if ($last_btn) {
                $pag_container .= "<li p='$no_of_paginations' class='inactive'>Last</li>";
            }

            $pag_container = $pag_container . "
                </ul>
            </div>";
            
            // We echo the final output
            echo 
            '<div class = "cvf-pagination-content">' . $msg . '</div>' . 
            '<div class = "cvf-pagination-nav">' . $pag_container . '</div>';
            
        }   
    
    }

    public function view($post_name) {
    
        
        $data['blog'] = $this->post_model->get_post(array('post_name' => $post_name));

        if (!empty($data['blog'])) {
            
            $data['post_title'] = $data['blog']->post_title;
            
            //$this->load->view('templates/header', $data);
            $this->load->view('magazzino/view', $data);
            //$this->load->view('templates/footer');
            
        } else {
            show_404();
        }
    
        
    }
    
}