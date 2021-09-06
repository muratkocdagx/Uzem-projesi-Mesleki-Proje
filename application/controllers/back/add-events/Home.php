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
        $ids         = $panel_user['admin'];
        if ($ids != 1 ) {
            redirect('Home');
        }
     }
    
    public function index()
    {
        $panel_user = sessionus('kullan','Pinfo');
        $bras  = $panel_user['id'];
        $data['title'] = "Etkinlikler";
        $end           = $this->database->listele_kosul('events',array('status' =>  1));
        $data['list']  = $end;
        $this->load->view('back/add-events/index', $data);
    }
    public function set()
    {
        $id     = $this->input->post('id');
        $status = ($this->input->post('status') == "true") ? 1 : 0;
        $this->db->where('id', $id)->update('events', array(
            'status' => $status
        ));
    }
    
    public function insert()
    {
        $data['title'] = "Etkinlikler Ekleme";
        $this->load->view('back/add-events/insert/index', $data);
    }
    
    public function edit($id)
    {
        $data['title'] = "Etkinlikler Güncelleme";
        $end           = $this->database->datalist($id,'events');
        $data['list']  = $end;
        $this->load->view('back/add-events/edit/index', $data);
    }
    
    public function inserting()
    {

        $title       = $this->input->post('title');
        $content     = $this->input->post('content');
        $date        = $this->input->post('date');
        $dep         = $this->input->post('cat');
        $panel_user  = sessionus('kullan','Pinfo');
        $ids         = $panel_user['id'];
        $time = 0;
        $department = 0;
        if ($dep == 'all23') {
            $department = 1;
        } else
        {
            $time = $this->input->post('cat');
        }


        if (!empty($content)) {
            $data = array(
                'title' => $title,
                'content' => $content,
                'content' => $content,
                'event_time' => $date,
                'events_owner' => $ids,
                'events_dep' => $time,
                'all_view'     => $department

            );
            
            $sonuc = $this->database->insert('events', $data);
            
            if ($sonuc) {
                $this->session->set_flashdata('durum', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-check"></i>Tebrikler</h4>Başarı İle eklenmişdir</div>');
                redirect('add-events');
            } else {
                $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-remove (alias)"></i>Aov</h4>eklenemedi</div>');
                redirect('add-events');
            }
           
         }
        else
        {
        
             $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-remove (alias)"></i>Aov</h4>Lütfen İçerik alanını boş bırakmayınız</div>');
                redirect('add-events/insert');
        }


        }
        
    
    
    public function editing()
    {
        
        
        $id          = $this->input->post('id');
        $title       = $this->input->post('title');
        $content     = $this->input->post('content');
        $date        = $this->input->post('date');
        $dep         = $this->input->post('cat');
        $panel_user  = sessionus('kullan','Pinfo');
        $ids         = $panel_user['id'];
        $time = 0;
        $department = 0;
        if ($dep == 'all23') {
            $department = 1;
        } else
        {
            $time = $this->input->post('cat');
        }

        if (!empty($content)) {
                        $data = array(
                 'title' => $title,
                'content' => $content,
                'content' => $content,
                'event_time' => $date,
                'events_owner' => $ids,
                'events_dep' => $time,
                'all_view'     => $department

            );
                                 $sonuc = $this->database->guncelle($data, $id, 'id', 'events');
            if ($sonuc) {
                $this->session->set_flashdata('durum', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-check"></i>Tebrikler</h4>Başarı İle güncellenmişdir</div>');
                redirect('add-events');
            } else {
                $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-remove (alias)"></i>Aov</h4>güncellenemedi</div>');
                redirect('add-events');
            }

         
        }


        else {

    
           $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-remove (alias)"></i>Aov</h4>Lütfen İçerik alanını boş bırakmayınız</div>');
                redirect('add-events/edit/'.$id.'');
            

            }
        
     }
        
        
    
    
    public function delete($id)
    {

        $sonuc = $this->database->sil($id, 'id' , 'events');
        
        if ($sonuc) {
            $this->session->set_flashdata('durum', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-check"></i>Tebrikler</h4>Başarı İle Sildiniz</div>');
            redirect('add-events');
        } else {
            $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-remove (alias)"></i>Aov</h4>Silinemedi</div>');
            redirect('add-events');
        }
        
    }
    
}