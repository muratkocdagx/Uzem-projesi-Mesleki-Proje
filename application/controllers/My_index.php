<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_index extends CI_Controller {

	            public function __construct()
     {
        parent::__construct();
        $protect = sessionus('kullan','user');
        if ($protect) {
            redirect('home');
        }
     }

	public function index()
	{
		$data['id'] = "6";
        $data['dbname'] = "title";
		$this->load->view('back/login',$data);
	}
		public function kolpa()
	{
		$this->load->view('sayfa Bulunamadı');
	}
}

