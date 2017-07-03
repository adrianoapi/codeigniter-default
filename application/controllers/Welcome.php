<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    public function index()
    {
        $this->console->exception(new Exception('test exception'));
        $this->console->debug(array('teste', 'teste', 'teste'));
        $this->console->info('Info message');
        $this->console->warning('Warning message');
        $this->console->error('Error message');
        $this->output->enable_profiler(true);
        $this->load->view('welcome_message');
    }

}
