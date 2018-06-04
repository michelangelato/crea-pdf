<?php

class Pages extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        getLang($this);
    }

    public function index()
    {
        //$data['title'] = ucfirst($page); // Capitalize the first letter
        $page = 'home';
        $data['page'] = $page;
        $data['title'] = $this->lang->line($page);
        
        /* VIEW */

        $this->load->view('templates/header', $data);
        $this->load->view('pages/home', $data);
        $this->load->view('templates/footer', $data);
    }

    public function jacademy($subpage = '')
    {
        if ($subpage != '' && !file_exists(APPPATH.'views/jacademy/'.$subpage.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        // lang
        $lang = 
            isset($this->session->userdata['site_lang']) 
            ? $this->session->userdata['site_lang'] 
            : '';

        /* DATA */

        // descrizioni
        $sql = '';
        $page = '';
        if ($subpage == '')
        {
            $page = 'jacademy';
            $subpage = 'index';

            $sql = "select ita, eng 
                    from traduzione 
                    where pagina = 'jacademy' 
                    and sottopagina = '' 
                    and campo = 'descrizione';";
        }
        else
        {
            $page = 'jacademy_'.$subpage;
            $sql = "select ita, eng 
                    from traduzione 
                    where pagina = 'jacademy' 
                    and sottopagina = '".$subpage."' 
                    and campo = 'descrizione';";
        }
        $query = $this->db->query($sql);
        $row = $query->row();
        $description = 
            (isset($row))
            ?
                ($lang == 'italian') 
                ? $row->ita 
                : $row->eng
            : '';
        $data['description'] = $description;

        // lista team
        if ($subpage == 'team')
        {
            $sql = "select * from persona where team = 1 order by posizione asc;";
            $query = $this->db->query($sql);
            $data['list'] = $query->result();
        }

        // titolo
        $data['page'] = $page;
        $data['title'] = $this->lang->line($page);
        
        /* VIEW */

        $this->load->view('templates/header', $data);
        $this->load->view('templates/cover', $data);
        $this->load->view('jacademy/'.$subpage, $data);
        $this->load->view('templates/footer', $data);
    }

    public function courses($subpage = '')
    {
        if (!file_exists(APPPATH.'views/courses/index.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        /* DATA */

        $sql = '';
        $page = '';
        if ($subpage == '')
        {
            $page = 'courses';
            $subpage = 'index';
            $sql = "select id, titolo_ITA, titolo_ENG, sottotitolo_ITA, sottotitolo_ENG
                    from corso;";
        }
        else
        {
            $page = 'courses_'.$subpage;
            $sql = "select C.id, C.titolo_ITA, C.titolo_ENG, C.sottotitolo_ITA, C.sottotitolo_ENG
                    from corso as C
                    join categoriacorso as CC on C.categoria_id = CC.id
                    where CC.codice = '".$subpage."';";
        }

        $query = $this->db->query($sql);

        $data['page'] = $page;
        $data['title'] = $this->lang->line($page);
        $data['list'] = $query->result_array();
        //$data['parent'] = $this->lang->line('courses');
        
        /* VIEW */

        $this->load->view('templates/header', $data);
        $this->load->view('templates/cover', $data);
        $this->load->view('courses/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function course($id)
    {
        /* DATA */

        // get the course
        $sql = "select C.*, 
                    CC.nome_ITA as categoria_ITA, 
                    CC.nome_ENG as categoria_ENG, 
                    DC.codice as destinatario_codice, 
                    DC.nome_ITA as destinatario_ITA, 
                    DC.nome_ENG as destinatario_ENG, 
                    L.nome as location
                from corso as C
                join categoriacorso as CC on C.categoria_id = CC.id
                join destinatariocorso as DC on C.destinatario_id = DC.id
                join location as L on C.location_id = L.id
                where C.id = ".$id.";";
        
        $query = $this->db->query($sql);
        $corso = $query->row();

        if ($corso == null)
        {
            // not found
            redirect('/courses', 'refresh');
        }
        else
        {
            // get the dates
            $sql = "select data
                    from datecorso
                    where corso_id = ".$corso->id."
                    order by data asc;";
            $query = $this->db->query($sql);
            $date = $query->result();

            // get the timetable
            $sql = "select DC.data, OC.*
                    from oraricorso as OC
                    join datecorso as DC on OC.datecorso_id = DC.id
                    where DC.corso_id = ".$corso->id."
                    order by DC.data asc, OC.ora asc;";
            $query = $this->db->query($sql);
            $orari = $query->result();

            // get the lang
            $lang = getLang($this);

            // data for the view
            $page = 'course';
            $data['page'] = $page;
            $data['title'] = ($lang == 'italian' ? $corso->titolo_ITA : $corso->titolo_ENG);
            $data['corso'] = $corso;
            $data['date'] = $date;
            $data['orari'] = $orari;
            
            /* VIEW */

            $this->load->view('templates/header', $data);
            $this->load->view('templates/cover', $data);
            $this->load->view('courses/course', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    public function paths($subpage = '')
    {
        if ($subpage != '' && !file_exists(APPPATH.'views/paths/'.$subpage.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        /* DATA */

        if ($subpage == '')
        {
            $page = 'paths';
            $subpage = 'index';

            $sql = "select ita, eng 
                    from traduzione 
                    where pagina = 'paths' and sottopagina = '' and campo = 'descrizione';";
            
            $query = $this->db->query($sql);
            $row = $query->row();

            $lang = isset($this->session->userdata['site_lang']) ? $this->session->userdata['site_lang'] : '';
            $description = 
                (isset($row))
                ?
                    ($lang == 'italian') 
                    ? $row->ita 
                    : $row->eng
                : '';

            $data['page'] = $page;
            $data['title'] = $this->lang->line($page);
            //$data['parent'] = $this->lang->line('home');
            $data['description'] = $description;
        }
        else
        {
            $page = 'paths_'.$subpage;
            $data['page'] = $page;
            $data['title'] = $this->lang->line($page);
            //$data['parent'] = $this->lang->line('paths');
        }
        
        /* VIEW */

        $this->load->view('templates/header', $data);
        $this->load->view('templates/cover', $data);
        $this->load->view('paths/'.$subpage, $data);
        $this->load->view('templates/footer', $data);
    }

    public function shootingday()
    {
        if (!file_exists(APPPATH.'views/pages/shootingday.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        /* DATA */

        $sql = "select C.*, CC.nome_ITA as categoria_ITA, CC.nome_ENG as categoria_ENG, L.nome as location
                from corso as C
                join categoriacorso as CC on C.categoria_id = CC.id
                join location as L on C.location_id = L.id
                where C.shooting = 1;";
        
        $query = $this->db->query($sql);
        
        $page = 'shooting-day';
        $data['page'] = $page;
        $data['title'] = $this->lang->line($page);
        //$data['parent'] = $this->lang->line('home');
        $data['corso'] = $query->row();
        
        /* VIEW */

        $this->load->view('templates/header', $data);
        $this->load->view('templates/cover', $data);
        $this->load->view('pages/shootingday', $data);
        $this->load->view('templates/footer', $data);
    }

    public function internationalevents()
    {
        if (!file_exists(APPPATH.'views/pages/internationalevents.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        /* DATA */

        $page = 'international-events';
        $sql = "select C.id, C.titolo_ITA, C.titolo_ENG, C.sottotitolo_ITA, C.sottotitolo_ENG
                from corso as C
                where C.internazionale = 1;";

        $query = $this->db->query($sql);

        $data['page'] = $page;
        $data['title'] = $this->lang->line($page);
        //$data['parent'] = $this->lang->line('home');
        $data['list'] = $query->result_array();
        
        /* VIEW */

        $this->load->view('templates/header', $data);
        $this->load->view('templates/cover', $data);
        $this->load->view('pages/internationalevents', $data);
        $this->load->view('templates/footer', $data);
    }

    public function contacts()
    {
        if (!file_exists(APPPATH.'views/pages/contacts.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        /* DATA */

        $page = 'contacts';
        $data['page'] = $page;
        $data['title'] = $this->lang->line($page);
        $data['parent'] = $this->lang->line('home');
        
        /* VIEW */

        $this->load->view('templates/header', $data);
        $this->load->view('templates/cover', $data);
        $this->load->view('pages/contacts', $data);
        $this->load->view('templates/footer', $data);
    }
}

?>