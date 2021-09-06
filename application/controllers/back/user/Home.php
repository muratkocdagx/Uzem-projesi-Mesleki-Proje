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
        $data['title'] = "Sisteme Öğretmen Öğrenci ekleme ve görüntüleme";
        $end           = $this->database->listall('user');
        $data['list']  = $end;
        $this->load->view('back/user/index', $data);
    }
    public function set()
    {
        $id     = $this->input->post('id');
        $status = ($this->input->post('status') == "true") ? 1 : 0;
        $this->db->where('id', $id)->update('user', array(
            'status' => $status
        ));
    }
    
    public function insert()
    {
        $data['title'] = "Öğretmen Öğrenci Ekleme İşlemleri";
        $this->load->view('back/user/insert/index', $data);
    }
    
    public function edit($id)
    {
        $data['title'] = "Öğretmen Öğrenci Güncelleme İşlemleri";
        $end           = $this->database->datalist($id,'user');
        $data['list']  = $end;
        $this->load->view('back/user/edit/index', $data);
    }
    
    public function inserting()
    {


        $name         = strip_tags($this->input->post('name'));
        $surname      = strip_tags($this->input->post('surname'));
        $date         = strip_tags($this->input->post('date'));
        $pass         = sha1(md5(strip_tags($this->input->post('pass1'))));
        $number       = strip_tags($this->input->post('number'));
        $code         = strip_tags($this->input->post('code'));
        $bra          = strip_tags($this->input->post('bra'));
        $ep           = strip_tags($this->input->post('ep'));
        $email        = strip_tags($this->input->post('email'));
        $tc           = strip_tags($this->input->post('tc'));
        $status       = strip_tags($this->input->post('status'));

        if (!$code || !$pass && !$bra && !$ep ) {
         
            $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-remove (alias)"></i>Aov</h4>Lütfen Kullanıcı kodu, şifresi, bölüm/ders kısmını boş bırakmayınız</div>');
                redirect('user/insert');


        } else {
      
            
            $data = array(
                'user_name' => $name,
                'user_surname' => $surname,
                'user_date' => $date,
                'user_pass' => $pass,
                'user_number' => $number,
                'user_code' => $code,
                'user_bra' => $bra,
                'user_ep' => $ep,
                'user_email' => $email,
                'user_tc' => $tc,
                'user_status' => $status
            );
            
            $sonuc = $this->database->insert('user', $data);
            if ($sonuc) {
                $this->session->set_flashdata('durum', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-check"></i>Tebrikler</h4>Başarı İle eklenmişdir</div>');
                redirect('user');
            } else {
                $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-remove (alias)"></i>Aov</h4>eklenemedi</div>');
                redirect('user');
            }
         }   
            
} 
    
    public function editing()
    {
        
        $id       = $this->input->post('id');
        $name       = $this->input->post('name');
        $surname         = $this->input->post('surname');
        $date       = $this->input->post('date');
        $pass        = $this->input->post('pass');
        $number       = $this->input->post('number');
        $code         = $this->input->post('code');
        $bra       = $this->input->post('bra');
        $ep        = $this->input->post('ep');
        $email       = $this->input->post('email');
        $tc         = $this->input->post('tc');

         if (!$code || !$pass && !$bra && !$ep ) {
         
            $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-remove (alias)"></i>Aov</h4>Lütfen Kullanıcı kodu, şifresi, bölüm/ders kısmını boş bırakmayınız</div>');
                redirect('user/edit/'.$id.'');


        } else {
       
            
            $data = array(
                'user_name' => $name,
                'user_surname' => $surname,
                'user_date' => $date,
                'user_pass' => $pass,
                'user_number' => $number,
                'user_code' => $code,
                'user_bra' => $bra,
                'user_ep' => $ep,
                'user_email' => $email,
                'user_tc' => $tc,
            );
            
            $sonuc = $this->database->guncelle($data, $id, 'id', 'user');
            if ($sonuc) {
                $this->session->set_flashdata('durum', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-check"></i>Tebrikler</h4>Başarı İle güncellenmişdir</div>');
                redirect('user');
            } else {
                $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-remove (alias)"></i>Aov</h4>güncellenemedi</div>');
                redirect('user');
            }
            
          }
        } 
    
    public function delete($id)
    {

        $f = datalist('user');
        foreach ($f as $f) { $c = $f['admin']; }
        if ($c != 1) {
        $sonuc = $this->database->sil($id, 'id', 'user');
        
        if ($sonuc) {
            $this->session->set_flashdata('durum', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-check"></i>Tebrikler</h4>Başarı İle güncellenmişdir</div>');
            redirect('user');
        } else {
            $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-remove (alias)"></i>Aov</h4>güncellenemedi</div>');
            redirect('user');
        }
    }
    else
    {
         echo "Bu işlemi yapmaya yetkiniz yok";
        }
    }

    
}