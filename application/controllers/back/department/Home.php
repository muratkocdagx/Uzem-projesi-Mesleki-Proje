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
        $data['title'] = "Bölümler";
        $end           = $this->database->listall('department');
        $data['list']  = $end;
        $this->load->view('back/department/index', $data);
    }
    public function set()
    {
        $id     = $this->input->post('id');
        $status = ($this->input->post('status') == "true") ? 1 : 0;
        $this->db->where('id', $id)->update('department', array(
            'status' => $status
        ));
    }
    
    public function insert()
    {
        $data['title'] = "Bölüm Ekleme";
        $this->load->view('back/department/insert/index', $data);
    }
    
    public function edit($id)
    {
        $data['title'] = "Bölüm Güncelleme";
        $end           = $this->database->datalist($id,'department');
        $data['list']  = $end;
        $this->load->view('back/department/edit/index', $data);
    }
    
    public function inserting()
    {

        $department_name       = $this->input->post('name');
        $rank                  = $this->input->post('code');

        if (!$department_name || !$rank) {
            $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-remove (alias)"></i>Aov</h4>Lütfen Boş Alan Bırakmayınız</div>');
                redirect('department/insert');
        }

        else
        {
        
            
            $data = array(
                'department_name' => $department_name,
                'rank' => $rank,
            );
            
            $sonuc = $this->database->insert('department', $data);
            
            if ($sonuc) {
                $this->session->set_flashdata('durum', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-check"></i>Tebrikler</h4>Başarı İle eklenmişdir</div>');
                redirect('department');
            } else {
                $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-remove (alias)"></i>Aov</h4>eklenemedi</div>');
                redirect('department');
            }
        }
        
    }
    
    
    public function editing()
    {
        
        
        $id                    = $this->input->post('id');
        $department_name       = $this->input->post('name');
        $rank                  = $this->input->post('code');

        if (!$department_name || !$rank) {
            $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-remove (alias)"></i>Aov</h4>Lütfen Boş Alan Bırakmayınız</div>');
                redirect('department/edit/'.$id.'');
        }


        else {

        $data = array(
                'department_name' => $department_name,
                'rank' => $rank,
            );

        
            
         $sonuc = $this->database->guncelle($data, $id, 'id', 'department');
            if ($sonuc) {
                $this->session->set_flashdata('durum', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-check"></i>Tebrikler</h4>Başarı İle güncellenmişdir</div>');
                redirect('department');
            } else {
                $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-remove (alias)"></i>Aov</h4>güncellenemedi</div>');
                redirect('department');
            }
            }
            
     }
        
        
    
    
    public function delete($id)
    {

        $sonuc = $this->database->sil($id, 'id' , 'department');
        
        if ($sonuc) {
            $this->session->set_flashdata('durum', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-check"></i>Tebrikler</h4>Başarı İle Sildiniz</div>');
            redirect('department');
        } else {
            $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-remove (alias)"></i>Aov</h4>Silinemedi</div>');
            redirect('department');
        }
        
    }
    
}