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
                $panel_user  = sessionus('kullan','Pinfo');
        $ids         = $panel_user['user_status'];
        if ($ids != 3 ) {
            redirect('Home');
        }
     }
    
    public function index()
    {
        $data['title'] = "Notlar";
        $end           = $this->database->listall('notes');
        $data['list']  = $end;
        $this->load->view('back/notes/index', $data);
    }
   
    
}