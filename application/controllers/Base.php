<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->output->enable_profiler(true);
        $this->load->model('usuarios_model', 'modelsusuarios');
    }

//    public function index()
//    {
//        $this->console->exception(new Exception('test exception'));
//        $this->console->debug(array('teste', 'teste', 'teste'));
//        $this->console->info('Info message');
//        $this->console->warning('Warning message');
//        $this->console->error('Error message');
//        $this->output->enable_profiler(true);
//        $this->load->view('welcome_message');
//    }

    public function index()
    {
        $config = array(
            "base_url" => base_url('usuarios/p'),
            "per_page" => 10,
            "num_links" => 3,
            "uri_segment" => 3,
            "total_rows" => $this->modelsusuarios->CountAll(),
            "full_tag_open" => "<ul class='pagination' id='ajaxPagination'>",
            "full_tag_close" => "</ul>",
            "first_link" => FALSE,
            "last_link" => FALSE,
            "first_tag_open" => "<li>",
            "first_tag_close" => "</li>",
            "prev_link" => "Anterior",
            "prev_tag_open" => "<li class='prev'>",
            "prev_tag_close" => "</li>",
            "next_link" => "Próxima",
            "next_tag_open" => "<li class='next'>",
            "next_tag_close" => "</li>",
            "last_tag_open" => "<li>",
            "last_tag_close" => "</li>",
            "cur_tag_open" => "<li class='active'><a href='#'>",
            "cur_tag_close" => "</a></li>",
            "num_tag_open" => "<li>",
            "num_tag_close" => "</li>"
        );
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['usuarios'] = $this->modelsusuarios->GetAll(null, null, $config['per_page'], $offset);
        if (!$this->input->is_ajax_request()) {
            $this->load->view('home', $data);
        } else {
            $this->load->view('pagina-resultados', $data);
        }
    }

}
