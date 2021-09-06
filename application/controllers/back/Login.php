<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


     public function __construct()
     {
        parent::__construct();
        $protect = sessionus('kullan','user');
        if ($protect) {
            redirect('home');
        }
     }


     function index()
	{

		$this->load->view('back/login');

	}

	public function login_config()
	{
         $data = array(
             'user_code' => $user_code = $this->input->post('code'),
             'user_pass' => $user_pass = sha1(md5($this->input->post('pass')))
         );

         $control = $this->database->list_login('user',array(
             'user_code' => $user_code,
             'user_pass' => $user_pass
         ));


         if ($control)
         {
             sessionus('creat','user',true);
             sessionus('creat','Pinfo',$control);
             redirect('back/Home');
         }else {
		 	$this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-remove (alias)"></i>Aov</h4>Girilen Bilgiler Uyuşmuyor Caps Lock Açık Olabilir.</div>');
            redirect('login');
		}
	}
}
