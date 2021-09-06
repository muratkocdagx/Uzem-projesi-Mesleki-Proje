<?php 

function logodeleteimage($id) {
    $ci =& get_instance();
    $sonuc = $ci->db->from('user')->where('id',$id)->get()->row();
    return $sonuc->logo;
}

 ?>
