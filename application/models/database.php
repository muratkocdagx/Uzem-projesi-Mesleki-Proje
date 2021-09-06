<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class database extends CI_model{

	function control_panel_user($kadi,$sifre){ 
		$sonuc = $this->db->select('*')->from('user')->where('user_name',$kadi)->where('user_pass',sha1(md5($sifre)))->get()->row();
		return $sonuc;
	}
    public function list_login($from,$where=array())
    {
     return $end = $this->db->from($from)->where($where)->get()->row_array();
    }
	// statik dir veri tabanındaki verileri listelemek için 
	// result_array virden fazla tablo için
	// row_array ise tek tablo için
    function listall($from){
        $sonuc = $this->db->select('*')->from($from)
        ->order_by('id','desc')->get()->result_array();
        return $sonuc;
    }
      function listele_kosul($from,$where){
        $sonuc = $this->db->select('*')->from($from)
        ->where($where)->order_by('id','desc')->get()->result_array();
        return $sonuc;
    }
       function datalist($id,$from){
        $sonuc = $this->db->select('*')->from($from)
        ->where('id',$id)->get()->row_array();
        return $sonuc;
    }

    //güncelleme işlemi

    function guncelle($data = array(),$id,$where,$from)
    {
    	$sonuc = $this->db->where($where,$id)->update($from,$data);
    	return $sonuc;
    }

        function updating($id,$where,$from,$data=array()) 
    {
        $sonuc = $this->db->update($from,$data,array($where=>$id));
        return $sonuc;
    }

    //silme işlemi

    function sil($id,$where,$from) 
    {
    	$sonuc = $this->db->delete($from,array($where=>$id));
    	return $sonuc;
    }

    //EKLEME işlemi

    function insert($from,$data=array()) 
    {
    	$sonuc = $this->db->insert($from,$data);
    	return $sonuc;
    }
    
        function updatepage($data = array(),$where,$from)
    {
        $sonuc = $this->db->where($where,$data['id'])->update($from,$data);
        unlink($sonuc);

    }

          function verisayiproduct(){
        $sonuc = $this->db->select('*')->from('products')
        ->where('purchased','Hayır')->count_all_results();
        return $sonuc;
    }

        function search($term,$data=array()) 
    {
        $and = $this->db->select('name as value,id,slug,image')->from('products_list')->like('slug',$term)->get()->result_array();
        return $and;
    }
}
 ?>