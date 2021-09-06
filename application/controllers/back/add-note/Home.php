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
        if ($ids != 2 ) {
            redirect('Home');
        }
     }
    
    public function index()
    {
        $data['title'] = "Notlar";
        $end           = $this->database->listall('notes');
        $data['list']  = $end;
        $this->load->view('back/add-note/index', $data);
    }
    public function set()
    {
        $id     = $this->input->post('id');
        $status = ($this->input->post('status') == "true") ? 1 : 0;
        $this->db->where('id', $id)->update('add-note', array(
            'status' => $status
        ));
    }
    
    public function insert()
    {
        $data['title'] = "Not Ekleme";
        $end           = $this->database->listall('notes');
        $data['list']  = $end;
        $this->load->view('back/add-note/insert/index', $data);
    }
    
    public function edit($id)
    {
        $data['title'] = "Not Güncelleme";
        $end           = $this->database->datalist($id,'notes');
        $data['list']  = $end;
        $this->load->view('back/add-note/edit/index', $data);
    }
    
    public function inserting()
    {
        $panel_user = sessionus('kullan','Pinfo');
        $user_id  = $panel_user['id'];
        $user_bra = $panel_user['user_bra'];

        $ex1 = 0;
        $ex2 = 0;
        $note1 = 0;
        $note2 = 0;
        $final = 0;


        $stu                    = strip_tags($this->input->post('stu'));
        $ex1                    = strip_tags($this->input->post('ex1'));
        $ex2                    = strip_tags($this->input->post('ex2'));
        $note1                  = strip_tags($this->input->post('note1'));
        $note2                  = strip_tags($this->input->post('note2'));
        $final                  = strip_tags($this->input->post('final'));

        $user_ids               = strip_tags($user_id);
        $user_bras              = strip_tags($user_bra);

        $a = datalist('notes',array('note_stu' => $stu ));
        foreach ($a as $a) {$bra = $a['note_stu']; $brat = $a['note_tea'];}

        if ($stu == $bra && $user_id == $brat ) {
            $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-remove (alias)"></i>Aov</h4>Bu Öğrenciye daha önce not eklemişsiniz eğer notunu değiştirmek istiyorsanız lütfen notlar kısmından güncelleme işlemi yapınız</div>');
                redirect('add-note/insert');
        }

        else
        {

        $art = 101;
        $ek = -1;

        if ( $ex1 < $art && $ex1 > $ek && $ex2 < $art && $ex2 > $ek && $note1 < $art && $note1 > $ek && $note2 < $art && $note2 > $ek && $final < $art && $final > $ek)  {
     
        if (!empty($stu) || !empty($ex1) || !empty($ex2) || !empty($note1) || !empty($note2) || !empty($final) ) {
                        $data = array(
                'note_stu'                => $stu,
                'ex1'                     => $ex1,
                'ex2'                     => $ex2,
                'note1'                   => $note1,
                'note2'                   => $note2,
                'final_note'              => $final,
                'note_tea'                => $user_ids,
                'note_lesson'             => $user_bras
            );
            
            $sonuc = $this->database->insert('notes', $data);
            
            if ($sonuc) {
                $this->session->set_flashdata('durum', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-check"></i>Tebrikler</h4>Başarı İle eklenmişdir</div>');
                redirect('add-note');
            } else {
                $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-remove (alias)"></i>Aov</h4>eklenemedi</div>');
                redirect('add-note');
            }
           
        }

        else
        {
        
             $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-remove (alias)"></i>Aov</h4>Lütfen en az bir Alan doldurun</div>');
                redirect('add-note/insert');

        }
        } else {
             $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-remove (alias)"></i>Aov</h4>Eklediğiniz notlar 100 den büyük 0 dan küçük olamaz</div>');
                redirect('add-note/insert');
           }
        }
    }
    
    
    public function editing()
    {

        $id                     = strip_tags($this->input->post('id'));
        $ex1                    = strip_tags($this->input->post('ex1'));
        $ex2                    = strip_tags($this->input->post('ex2'));
        $note1                  = strip_tags($this->input->post('note1'));
        $note2                  = strip_tags($this->input->post('note2'));
        $final                  = strip_tags($this->input->post('final'));

         if ( $ex1 < $art && $ex1 > $ek && $ex2 < $art && $ex2 > $ek && $note1 < $art && $note1 > $ek && $note2 < $art && $note2 > $ek && $final < $art && $final > $ek)  {


        if (!empty($ex1) || !empty($ex2) || !empty($note1) || !empty($note2) || !empty($final) ) {
                    $data = array(
                'ex1'                     => $ex1,
                'ex2'                     => $ex2,
                'note1'                   => $note1,
                'note2'                   => $note2,
                'final_note'              => $final,
            );

        
            
         $sonuc = $this->database->guncelle($data, $id, 'id', 'notes');
            if ($sonuc) {
                $this->session->set_flashdata('durum', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-check"></i>Tebrikler</h4>Başarı İle güncellenmişdir</div>');
                redirect('add-note');
            } else {
                $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-remove (alias)"></i>Aov</h4>güncellenemedi</div>');
                redirect('add-note');
            }
            
        }


        else {
$this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-remove (alias)"></i>Aov</h4>Lütfen en az bir Alan doldurun</div>');
                redirect('add-note/edit/'.$id.'');

            }

            } 
                else {
             $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-remove (alias)"></i>Aov</h4>Değiştirdiğiniz notlar 100 den büyük 0 dan küçük olamaz</div>');
                redirect('add-note/edit/'.$id.'');
           }
            }

        
        
    
    
    public function delete($id)
    {
        $b = datalist('notes',array('id' => $id ));
        foreach ($b as $b) {$br = $b['note_lesson'];}
        $panel_user = sessionus('kullan','Pinfo');
        $bras  = $panel_user['user_bra'];
        $a = datalist('lessons',array('id' => $br ));
        foreach ($a as $a) {$bra = $a['id'];}

        if ($bras !=  $bra) {
              $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-remove (alias)"></i>Aov</h4>Yetkiniz Dışında bir silme işlemi yapamassınız</div>');
                redirect('add-note');
        }
        else
        {

        $sonuc = $this->database->sil($id, 'id' , 'notes');
        
        if ($sonuc) {
            $this->session->set_flashdata('durum', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-check"></i>Tebrikler</h4>Başarı İle Sildiniz</div>');
            redirect('add-note');
        } else {
            $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-remove (alias)"></i>Aov</h4>Silinemedi</div>');
            redirect('add-note');
        }
        }
    }
    
}