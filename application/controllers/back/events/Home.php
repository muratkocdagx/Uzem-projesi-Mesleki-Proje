<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
            public function __construct()
     {
        parent::__construct();
        $protect = sessionus('kullan','user');
        if (!$protect) {
            redirect('login');
        }
     }
    
    public function index()
    {
        $data['title'] = "Etkinlikler";
        $end           = $this->database->listall('events');
        $data['list']  = $end;
        $this->load->view('back/events/index', $data);
    }

    
    public function detail($id)
    {
        $data['title'] = "Etkinlik Detayı";
        $end           = $this->database->datalist($id,'events');
        $data['list']  = $end;
        $this->load->view('back/events/detail/index', $data);
    }
    
   
    
}