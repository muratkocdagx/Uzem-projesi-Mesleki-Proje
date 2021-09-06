

<?php

function sessionus1($status,$title,$message=null) {
    $ci =& get_instance();
    if ($status=="kullan")
    {
        return $ci->session->userdata($title);
    }
    if ($status=="creat")
    {
        return $ci->session->set_userdata($title,$message);
    }
}

function Data_List_Dynamic1($from,$where=array(),$limit=null,$order=null,$ordera=null) {
    $ci =& get_instance();
    return $and = $ci->db->from($from)->where($where)->order_by($order,$ordera)->limit($limit)->get()->result_array();
}


function mail_read($where) {

      $ci =& get_instance();

      $end =  $ci->db->select('*')->from('mail')->where('read_mail','0')->where('mail_receive',$where)->where('admin','0')->count_all_results();

      return $end;

}


function events_read() {

      $end = 0;
      $panel_user  = sessionus1('kullan','Pinfo');
      $ids        = $panel_user['user_ep'];
      $ke = Data_List_Dynamic1('events',array('status' => 1 ));
                foreach ($ke as $ke) {
      if ($ids == $ke['events_dep'] || $ke['all_view'] == 1) {
      if(strtotime($ke['event_time']) >  strtotime(date('d.m.Y'))) {
        $end++;
       } } }
      

      echo $end;

}


function ann_read() {

      $ci =& get_instance();

      $end =  $ci->db->select('*')->from('announcement')->where('status','1')->count_all_results();

      return $end;

}



function sum_user_like_post($where){
      $ci =& get_instance();
      $ci->load->model("Database");
      $toplam=0;
         $sell_cat = datalist('products_list');
          foreach ($sell_cat as $sc) {
            if ($sc['post_user_id'] == $where) {
                  if ($sc['status'] == 1) {
                  $toplam+=$sc['post_like'];
               }
         }
      }
      return $toplam;
}

function clear($veri)
  {
   $degisecek=array('ananısikiyim','babanısikiyim','siktir','orospu','kevaşe','kaşar','hitler','siktir git','ananı sikeyim','aq','babannen kaşar','anneni sikeyim','a n a n ı s i k e y i m','bacını sikeyim','abini sikeyim','seni sikerim','kaşar','babanı sikeyim','anneni düzliyim','babanı düzliyim','sen bir orospusun','amcık kafası','amcık herif','amcık','orospu','sikmek','sikiş','seks','sikiyim','s i k t i r','yarrak','zina','amcığını','amcık','amınakoyim','amına koyam','amına koyiyim','amına koyıyım','ebenin yoğurtlanmışını sikerim','sapık');
   $yeniler=array('*****','*****','*****','*****','*****','*****','bigbos','*****','*****','*****','*****','*****','*****','*****','*****','*****','*****','*****','*****','*****','*****','*****','*****','*****','*****','*****','*****','*****','*****','*****','*****','*****','*****','*****','*****','*****','*****','*****','*****','*****');
   return str_replace($degisecek,$yeniler,$veri);
  }







?>