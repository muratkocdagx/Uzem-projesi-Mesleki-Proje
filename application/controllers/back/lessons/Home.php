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
        $data['title'] = "Dersler";
        $end           = $this->database->listall('lessons');
        $data['list']  = $end;
        $this->load->view('back/lessons/index', $data);
    }
    public function set()
    {
        $id     = $this->input->post('id');
        $status = ($this->input->post('status') == "true") ? 1 : 0;
        $this->db->where('id', $id)->update('lessons', array(
            'status' => $status
        ));
    }
    
    public function insert()
    {
        $data['title'] = "Ders Ekleme";
        $this->load->view('back/lessons/insert/index', $data);
    }
    
    public function edit($id)
    {
        $data['title'] = "Sosyal Medya Güncelleme İşlemleri";
        $end           = $this->database->datalist($id,'lessons');
        $data['list']  = $end;
        $this->load->view('back/lessons/edit/index', $data);
    }
    
    public function inserting()
    {

        $name       = $this->input->post('name');
        $code         = $this->input->post('code');
        $credit       = $this->input->post('credit');
        $akts        = $this->input->post('akts');
        $cat        = $this->input->post('cat');


        if (!$name || !$code || !$credit || !$akts || !$cat) {
            
         $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-remove (alias)"></i>Aov</h4>Lütfen Boş alan bırakmayınız</div>');
                redirect('lessons/insert');
            
        }

        else
        {
            $data = array(
                'lesson_name'   => $name,
                'lesson_code'   => $code,
                'lesson_credit' => $credit,
                'lesson_akts'   => $akts,
                'lesson_cat'    => $cat
            );
            
            $sonuc = $this->database->insert('lessons', $data);
            if ($sonuc) {
                $this->session->set_flashdata('durum', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-check"></i>Tebrikler</h4>Başarı İle eklenmişdir</div>');
                redirect('lessons');
            } else {
                $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-remove (alias)"></i>Aov</h4>eklenemedi</div>');
                redirect('lessons');
            }
        }
    
       
            
        } 
    
    public function editing()
    {
        
        $id       = $this->input->post('id');
        $name       = $this->input->post('name');
        $code         = $this->input->post('code');
        $credit       = $this->input->post('credit');
        $akts        = $this->input->post('akts');
        $cat        = $this->input->post('cat');

        if (!$name || !$code || !$credit || !$akts || !$cat) {

          $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-remove (alias)"></i>Aov</h4>Lütfen Boş alan bırakmayınız</div>');
                redirect('lessons/edit/'.$id.'');
        }
        
       
        else {
       
            $data = array(
                'lesson_name'   => $name,
                'lesson_code'   => $code,
                'lesson_credit' => $credit,
                'lesson_akts'   => $akts,
                'lesson_cat'    => $cat
            );
            
            $sonuc = $this->database->guncelle($data, $id, 'id', 'lessons');
            if ($sonuc) {
                $this->session->set_flashdata('durum', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-check"></i>Tebrikler</h4>Başarı İle güncellenmişdir</div>');
                redirect('lessons');
            } else {
                $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-remove (alias)"></i>Aov</h4>güncellenemedi</div>');
                redirect('lessons');
            }

            }


        }
        
        
    
    
    public function delete($id)
    {
        $sonuc = $this->database->sil($id,'id', 'lessons');
        
        if ($sonuc) {
            $this->session->set_flashdata('durum', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-check"></i>Tebrikler</h4>Başarı İle Silindi</div>');
            redirect('lessons');
        } else {
            $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-remove (alias)"></i>Aov</h4>Silinemedi</div>');
            redirect('lessons');
        }
        
    }
    
}