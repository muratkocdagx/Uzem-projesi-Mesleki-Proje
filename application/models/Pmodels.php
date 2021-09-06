<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Pmodels extends CI_model{

    public function page_detail($ust){
        $urun=$this->db->where("slug",$ust)->get('page_list')->result();
        return $urun;
    }
    public function cat_detail($slug){
        $urun=$this->db->where("slug",$slug)->get('categories_list')->result();
        return $urun;
    }
       public function p_page_detail($ust){
        $urun=$this->db->where("slug",$ust)->get('products_list')->result();
        return $urun;
    }



}
 ?>