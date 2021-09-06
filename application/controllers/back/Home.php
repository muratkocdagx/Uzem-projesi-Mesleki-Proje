<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		$this->load->view('back/index');
	}

}
