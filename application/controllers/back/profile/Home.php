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
    $this->load->view('back/profile/index');
  }
  
       
  public function editing()
{

    $panel_user = sessionus('kullan','Pinfo');
    $bras  = $panel_user['id'];

    $id =  $this->input->post('id');
    $email = $this->input->post('email');
    $desc = $this->input->post('desc');
    $image = $this->input->post('image');

    if ($bras == $id) {
    
   

    $config['upload_path'] = FCPATH.'uploads/user/';
    $config['allowed_types'] ='gif|jpg|png|jpeg';

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('image'))
    {
        $image = $this->upload->data();
        $resimyolu = $image['file_name'];
        $resimkayit = 'uploads/user/'.$resimyolu.'' ;
        $config['craete_thumb'] = false;
        $config['maintain_raio'] = false;
        $config['quality'] = '60%';

        $this->load->library('image_lib', $config);
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
        $this->image_lib->clear();
        $imagedelete = logodeleteimage($id);
         unlink($imagedelete);

        $data = array(
                  'user_email'=>$email,

                  
                  'image'=>$resimkayit,
                  'user_desc'=>$desc
        );

        $sonuc = $this->database->guncelle($data,$id,'id','user');
        if ($sonuc) {
            $this->session->set_flashdata('durum', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-check"></i>Tebrikler</h4>Başarı İle güncellenmişdir</div>');
            redirect('back/profile/home');
        }
        else {
            $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-remove (alias)"></i>Aov</h4>güncellenemedi</div>');
            redirect('back/profile/home');
        }


    }
    else
    {
        $data = array(
                  'user_email'=>$email,
                  'user_desc'=>$desc
        );

        $sonuc = $this->database->guncelle($data,$id,'id','user');
        if ($sonuc) {
            $this->session->set_flashdata('durum', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-check"></i>Tebrikler</h4>Başarı İle güncellenmişdir</div>');
            redirect('back/profile/home');
        }
        else {
            $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-remove (alias)"></i>Aov</h4>güncellenemedi</div>');
            redirect('back/profile/home');
        }
    }

     } else
      {
        $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-remove (alias)"></i>Aov</h4>Hop Birader güncellemeye çalıştığın profil sana ait değil hayırdır !</div>');
            redirect('back/profile/home');
      }


}


 

}
