"<?php
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
     }
    
    public function index()
    {
        $panel_user = sessionus('kullan','Pinfo');
        $bras  = $panel_user['id'];
        $data['title'] = "mail_send";
        $end           = $this->database->listele_kosul('mail',array( 'mail_receive' =>  $bras , 'mail_receive_delete' => 0));
        $data['list']  = $end;
        $this->load->view('back/mail/index', $data);
    }

     public function send()
    {
        $panel_user = sessionus('kullan','Pinfo');
        $bras  = $panel_user['id'];
        $data['title'] = "mail_receive";
        $end           = $this->database->listele_kosul('mail',array( 'mail_send' =>  $bras, 'mail_send_delete' => 0));
        $data['list']  = $end;
        $this->load->view('back/mail/index', $data);
    }
  
    public function sending()
    {
        $data['title'] = "mail Ekleme";
        $this->load->view('back/mail/sending', $data);
    }

        public function reply($id)
    {
        $data['title'] = "mail görüntüleme";
        $end           = $this->database->datalist($id,'mail');
        $data['list']  = $end;
        $this->load->view('back/mail/reply', $data);
    }
    
    
    public function detail($id)
    {
        $panel_user = sessionus('kullan','Pinfo');
        $bras  = $panel_user['id'];
        $t=0;
        $a = datalist('mail',array('mail_receive' => $bras, 'id' => $id));
         foreach ($a as $a) { 
         $t=1;

        if ($t == 1) {
             $data = array(
             'read_mail' => 1

        );
          $sonuc = $this->database->guncelle($data, $id, 'id', 'mail');

        }
        }
        

        $data['title'] = "mail görüntüleme";
        $end           = $this->database->datalist($id,'mail');
        $data['list']  = $end;
        $this->load->view('back/mail/detail', $data);
    }

     public function direct()
    {

        $content     = $this->input->post('message');
        $panel_user  = sessionus('kullan','Pinfo');
        $ids         = $panel_user['id'];

        if (!empty($content)) {
            $data = array(
                'content' => $content,
                'mail_send' => $ids,
                'mail_receive' => 1,
                'admin' => 1,
                'title' => 'Sistem Mesajı'

            );
            
            $sonuc = $this->database->insert('mail', $data);
            
            if ($sonuc) {
                $this->session->set_flashdata('durum', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-check"></i>Tebrikler</h4>Maili Başarıyla Gönderdiniz</div>');
                redirect('home');
            } else {
                $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-remove (alias)"></i>Aov</h4>Mail gönderirken bir hata oluştu</div>');
                redirect('home');
            }
           
         }
        else
        {
        
             $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-remove (alias)"></i>Aov</h4>Lütfen İçerik alanını boş bırakmayınız</div>');
                redirect('home');
        }


    }
    
    public function inserting()
    {

        $title       = $this->input->post('title');
        $content     = $this->input->post('content');
        $dep         = $this->input->post('cat');
        $panel_user  = sessionus('kullan','Pinfo');
        $ids         = $panel_user['id'];
        $idsm         = $panel_user['admin'];
        if ($idsm == 1) {
            $ten = 1;
        }
        else {
            $ten = 0;
        }

        if (!empty($content)) {
            $data = array(
                'title' => $title,
                'content' => $content,
                'mail_send' => $ids,
                'mail_receive' => $dep,
                'admin' => $ten

            );
            
            $sonuc = $this->database->insert('mail', $data);
            
            if ($sonuc) {
                $this->session->set_flashdata('durum', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-check"></i>Tebrikler</h4>Maili Başarıyla Gönderdiniz</div>');
                redirect('mail/send');
            } else {
                $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-remove (alias)"></i>Aov</h4>Mail gönderirken bir hata oluştu</div>');
                redirect('mail/send');
            }
           
         }
        else
        {
        
             $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-remove (alias)"></i>Aov</h4>Lütfen İçerik alanını boş bırakmayınız</div>');
                redirect('mail/sending');
        }


    }
        
        
        
    
    
    public function delete($id)
    {
        $panel_user = sessionus('kullan','Pinfo');
        $bras  = $panel_user['id'];

        $lim = datalist('mail',array('id' => $id ));
                      foreach ($lim as $lim) { 

        if ($bras == $lim['mail_send']) {

          if ($lim['mail_receive_delete'] == 1) {

                    $sonuc = $this->database->sil($id, 'id' , 'mail');
        
                    if ($sonuc) {
                        $this->session->set_flashdata('durum', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-check"></i>Tebrikler</h4>Başarı İle Sildiniz</div>');
                        redirect('mail');
                    } else {
                        $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-remove (alias)"></i>Aov</h4>Silinemedi</div>');
                        redirect('mail');
                    }
          }
          else {

        
        
              $send        = 1;
        
                 $data = array(
                     'mail_send_delete' => $send,

                );
                  $sonuc = $this->database->guncelle($data, $id, 'id', 'mail');
               if ($sonuc) {
                    $this->session->set_flashdata('durum', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-check"></i>Tebrikler</h4>Başarı İle Sildiniz</div>');
                    redirect('mail');
                } else {
                    $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-remove (alias)"></i>Aov</h4>Silinemedi</div>');
                    redirect('mail');
                }
           
          }
        }

         elseif ($bras == $lim['mail_receive']) {

          if ($lim['mail_send_delete'] == 1) {

                    $sonuc = $this->database->sil($id, 'id' , 'mail');
        
                    if ($sonuc) {
                        $this->session->set_flashdata('durum', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-check"></i>Tebrikler</h4>Başarı İle Sildiniz</div>');
                        redirect('mail');
                    } else {
                        $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-remove (alias)"></i>Aov</h4>Silinemedi</div>');
                        redirect('mail');
                    }
          }
          else {

              $send        = 1;
        
                 $data = array(
                     'mail_receive_delete' => $send,

                );
                  $sonuc = $this->database->guncelle($data, $id, 'id', 'mail');
               if ($sonuc) {
                    $this->session->set_flashdata('durum', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-check"></i>Tebrikler</h4>Başarı İle Sildiniz</div>');
                    redirect('mail');
                } else {
                    $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-remove (alias)"></i>Aov</h4>Silinemedi</div>');
                    redirect('mail');
                }
           
          }
        }
       } 
        
    }
    
}