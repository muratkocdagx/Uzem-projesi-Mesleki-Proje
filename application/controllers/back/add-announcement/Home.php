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
        if ($ids == 3) {
            redirect('Home');
        }
     }
    
    public function index()
    {
        $panel_user = sessionus('kullan','Pinfo');
        $bras  = $panel_user['id'];
        $data['title'] = "Duyurular";
        $end           = $this->database->listele_kosul('announcement',array('ann_owner' =>  $bras));
        $data['list']  = $end;
        $this->load->view('back/add-announcement/index', $data);
    }
    public function set()
    {
        $id     = $this->input->post('id');
        $status = ($this->input->post('status') == "true") ? 1 : 0;
        $this->db->where('id', $id)->update('announcement', array(
            'status' => $status
        ));
    }
    
    public function insert()
    {
        $data['title'] = "Duyuru Ekleme";
        $this->load->view('back/add-announcement/insert/index', $data);
    }
    
    public function edit($id)
    {
        $data['title'] = "Duyuru Güncelleme";
        $end           = $this->database->datalist($id,'announcement');
        $data['list']  = $end;
        $this->load->view('back/add-announcement/edit/index', $data);
    }
    
    public function inserting()
    {

        $title       = $this->input->post('title');
        $content     = $this->input->post('content');
        $panel_user  = sessionus('kullan','Pinfo');
        $ids         = $panel_user['id'];
        $cont        = $panel_user['admin'];  
        $cont2        = $panel_user['user_bra']; 
        if ($cont == 1) {
           $dep     = $this->input->post('cat');
           $admin = 1;
        } 
        else
        {
           $f = datalist('lessons',array('id' => $cont2));
           foreach ($f as $f) { $tik = $f['id']; }
           $dep  = $tik;
           $admin = 0;    
        }


        if (!empty($content)) {
            $data = array(
                'title' => $title,
                'content' => $content,
                'content' => $content,
                'ann_owner' => $ids,
                'ann_view_dep' => $dep,
                'admin'       => $admin

            );
            
            $sonuc = $this->database->insert('announcement', $data);
            
            if ($sonuc) {
                $this->session->set_flashdata('durum', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-check"></i>Tebrikler</h4>Başarı İle eklenmişdir</div>');
                redirect('add-announcement');
            } else {
                $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-remove (alias)"></i>Aov</h4>eklenemedi</div>');
                redirect('add-announcement');
            }
           
         }
        else
        {
        
             $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-remove (alias)"></i>Aov</h4>Lütfen İçerik alanını boş bırakmayınız</div>');
                redirect('add-announcement/insert');
        }


        }
        
    
    
    public function editing()
    {
        
        
        $id          = $this->input->post('id');

        $b = datalist('announcement',array('id' => $id ));
        foreach ($b as $b) {$br = $b['ann_owner'];}
        $panel_user = sessionus('kullan','Pinfo');
        $bras  = $panel_user['id'];
        $a = datalist('user',array('id' => $br ));
        foreach ($a as $a) {$bra = $a['id'];}


        $title       = $this->input->post('title');
        $content     = $this->input->post('content');
        $panel_user  = sessionus('kullan','Pinfo');
        $ids         = $panel_user['id'];
        $cont        = $panel_user['admin'];  
        $cont2        = $panel_user['user_bra']; 

        if ($bras !=  $bra) {
           $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-remove (alias)"></i>Aov</h4>Yetkiniz Dışında bir Güncelleme işlemi yapamassınız</div>');
                redirect('add-announcement');
        } else {

        if ($cont == 1) {
           $dep     = $this->input->post('cat');
           $admin = 1;
        } 
        else
        {
           $f = datalist('lessons',array('id' => $cont2));
           foreach ($f as $f) { $tik = $f['id']; }
           $dep  = $tik;
           $admin = 0;    
        }

        if (!empty($content)) {
                        $data = array(
                'title' => $title,
                'content' => $content,
                'content' => $content,
                'ann_owner' => $ids,
                'ann_view_dep' => $dep,
                'admin'       => $admin

            );
                                 $sonuc = $this->database->guncelle($data, $id, 'id', 'announcement');
            if ($sonuc) {
                $this->session->set_flashdata('durum', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-check"></i>Tebrikler</h4>Başarı İle güncellenmişdir</div>');
                redirect('add-announcement');
            } else {
                $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-remove (alias)"></i>Aov</h4>güncellenemedi</div>');
                redirect('add-announcement');
            }

         
        }


        else {

    
           $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-remove (alias)"></i>Aov</h4>Lütfen İçerik alanını boş bırakmayınız</div>');
                redirect('add-announcement/edit/'.$id.'');
            

            }
        }
     }
        
        
    
    
    public function delete($id)
    {
        $b = datalist('announcement',array('id' => $id ));
        foreach ($b as $b) {$br = $b['ann_owner'];}
        $panel_user = sessionus('kullan','Pinfo');
        $bras  = $panel_user['id'];
        $a = datalist('user',array('id' => $br ));
        foreach ($a as $a) {$bra = $a['id'];}

        if ($bras !=  $bra) {
              $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-remove (alias)"></i>Aov</h4>Yetkiniz Dışında bir silme işlemi yapamassınız</div>');
                redirect('add-announcement');
        }

        else {

        $sonuc = $this->database->sil($id, 'id' , 'announcement');
        
        if ($sonuc) {
            $this->session->set_flashdata('durum', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-check"></i>Tebrikler</h4>Başarı İle Sildiniz</div>');
            redirect('add-announcement');
        } else {
            $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-remove (alias)"></i>Aov</h4>Silinemedi</div>');
            redirect('add-announcement');
        }
        }
    }
    
}