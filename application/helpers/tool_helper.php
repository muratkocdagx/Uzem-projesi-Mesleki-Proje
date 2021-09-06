<?php 
/**
 * @param $str
 * @param array $options
 * @return string
 */
function slug($str, $options = array())
{
    $str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());
    $defaults = array(
        'delimiter' => '-',
        'limit' => null,
        'lowercase' => true,
        'replacements' => array(),
        'transliterate' => true
    );
    $options = array_merge($defaults, $options);
    $char_map = array(
        // Latin
        'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'AE', 'Ç' => 'C',
        'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I',
        'Ð' => 'D', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ő' => 'O',
        'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ű' => 'U', 'Ý' => 'Y', 'Þ' => 'TH',
        'ß' => 'ss',
        'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'ae', 'ç' => 'c',
        'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
        'ð' => 'd', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ő' => 'o',
        'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ű' => 'u', 'ý' => 'y', 'þ' => 'th',
        'ÿ' => 'y',
        // Latin symbols
        '©' => '(c)',
        // Greek
        'Α' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E', 'Ζ' => 'Z', 'Η' => 'H', 'Θ' => '8',
        'Ι' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => '3', 'Ο' => 'O', 'Π' => 'P',
        'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'PS', 'Ω' => 'W',
        'Ά' => 'A', 'Έ' => 'E', 'Ί' => 'I', 'Ό' => 'O', 'Ύ' => 'Y', 'Ή' => 'H', 'Ώ' => 'W', 'Ϊ' => 'I',
        'Ϋ' => 'Y',
        'α' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd', 'ε' => 'e', 'ζ' => 'z', 'η' => 'h', 'θ' => '8',
        'ι' => 'i', 'κ' => 'k', 'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => '3', 'ο' => 'o', 'π' => 'p',
        'ρ' => 'r', 'σ' => 's', 'τ' => 't', 'υ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'ps', 'ω' => 'w',
        'ά' => 'a', 'έ' => 'e', 'ί' => 'i', 'ό' => 'o', 'ύ' => 'y', 'ή' => 'h', 'ώ' => 'w', 'ς' => 's',
        'ϊ' => 'i', 'ΰ' => 'y', 'ϋ' => 'y', 'ΐ' => 'i',
        // Turkish
        'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',
        'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g',
        // Russian
        'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
        'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
        'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
        'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',
        'Я' => 'Ya',
        'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
        'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
        'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
        'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',
        'я' => 'ya',
        // Ukrainian
        'Є' => 'Ye', 'І' => 'I', 'Ї' => 'Yi', 'Ґ' => 'G',
        'є' => 'ye', 'і' => 'i', 'ї' => 'yi', 'ґ' => 'g',
        // Czech
        'Č' => 'C', 'Ď' => 'D', 'Ě' => 'E', 'Ň' => 'N', 'Ř' => 'R', 'Š' => 'S', 'Ť' => 'T', 'Ů' => 'U',
        'Ž' => 'Z',
        'č' => 'c', 'ď' => 'd', 'ě' => 'e', 'ň' => 'n', 'ř' => 'r', 'š' => 's', 'ť' => 't', 'ů' => 'u',
        'ž' => 'z',
        // Polish
        'Ą' => 'A', 'Ć' => 'C', 'Ę' => 'e', 'Ł' => 'L', 'Ń' => 'N', 'Ó' => 'o', 'Ś' => 'S', 'Ź' => 'Z',
        'Ż' => 'Z',
        'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ś' => 's', 'ź' => 'z',
        'ż' => 'z',
        // Latvian
        'Ā' => 'A', 'Č' => 'C', 'Ē' => 'E', 'Ģ' => 'G', 'Ī' => 'i', 'Ķ' => 'k', 'Ļ' => 'L', 'Ņ' => 'N',
        'Š' => 'S', 'Ū' => 'u', 'Ž' => 'Z',
        'ā' => 'a', 'č' => 'c', 'ē' => 'e', 'ģ' => 'g', 'ī' => 'i', 'ķ' => 'k', 'ļ' => 'l', 'ņ' => 'n',
        'š' => 's', 'ū' => 'u', 'ž' => 'z'
    );
    $str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);
    if ($options['transliterate']) {
        $str = str_replace(array_keys($char_map), $char_map, $str);
    }
    $str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);
    $str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);
    $str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');
    $str = trim($str, $options['delimiter']);
    return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
}

function sfd($status,$title,$message,$icon) {
    $sfd = '<div class="alert alert-'.$status.' alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4>
     <i class="icon fa fa-'.$icon.'"></i>
      '.$title.'</h4>'.$message.'</div>';
    $ci =& get_instance();
    return $ci->session->set_flashdata('status',$sfd);
}

function fdata() {
    $ci =&  get_instance();
    return $ci->session->flashdata('status');
}

function sessionus($status,$title,$message=null) {
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
function short($kelime, $str = 10)
    {
        if (strlen($kelime) > $str)
        {
            if (function_exists("mb_substr")) $kelime = mb_substr($kelime, 0, $str, "UTF-8").'..';
            else $kelime = substr($kelime, 0, $str).'..';
        }
        return $kelime;
    }

    function shortis($kelime, $str = 10)
    {
        if (strlen($kelime) > $str)
        {
            if (function_exists("mb_substr")) $kelime = mb_substr($kelime, 0, $str, "UTF-8");
            else $kelime = substr($kelime, 0, $str);
        }
        return $kelime;
    }

    function short_one($kelime, $str = 10)
    {
        if (strlen($kelime) > $str)
        {
            if (function_exists("mb_substr")) $kelime = mb_substr($kelime, 0, $str, "UTF-8");
            else $kelime = substr($kelime, 0, $str);
        }
        return $kelime;
    }


function datalist($from,$where=array(),$order=null,$ordera=null) {
    $ci =& get_instance();
    return $and = $ci->db->from($from)->where($where)->order_by($order,$ordera)->get()->result_array();
}

function Data_List_Dynamic($from,$where=array(),$limit=null,$order=null,$ordera=null) {
    $ci =& get_instance();
    return $and = $ci->db->from($from)->where($where)->order_by($order,$ordera)->limit($limit)->get()->result_array();
}

function GetIP(){
  if(getenv("HTTP_CLIENT_IP")) {
  $ip = getenv("HTTP_CLIENT_IP");
  } elseif(getenv("HTTP_X_FORWARDED_FOR")) {
  $ip = getenv("HTTP_X_FORWARDED_FOR");
  if (strstr($ip, ',')) {
  $tmp = explode (',', $ip);
  $ip = trim($tmp[0]);
  }
  } else {
  $ip = getenv("REMOTE_ADDR");
  }
  return $ip;
}


 function control($from,$where=array()) {
    
    $ci =& get_instance();

    return $end = $ci->db->from($from)->where($where)->get()->row_array();
}

function yakala($contentcek) {
        $ci =& get_instance();
        $panel_user = sessionus('kullan','Pinfo');
        $content = $panel_user['user_name'] . $contentcek;
        $user_id        = $panel_user['id'];
        $user_ip        = GetIP();
        $data = array(
        'user_id' => $user_id,
        'content' => $content,
        'user_ip' => $user_ip,
         );
        return $str = $ci->database->insert('ts', $data);

}




function gecenzaman($dt,$precision=2)
{
    $times=array(   365*24*60*60    => "Yıl",
                30*24*60*60     => "Ay",
                7*24*60*60      => "Hafta",
                24*60*60        => "Gün",
                60*60           => "Saat",
                60              => "Dakika",
                1               => "Saniye");
 
    $passed=time()-$dt;
 
    if($passed<5)
    {
        $output='5 saniye önce';
    }
    else
    {
        $output=array();
        $exit=0;
        foreach($times as $period=>$name)
        {
            if($exit>=$precision || ($exit>0 && $period<60))   break;
            $result = floor($passed/$period);
 
            if($result>0)
            {
                $output[]=$result.' '.$name.($result==1?'':'');
                $passed-=$result*$period;
                $exit++;
            }
 
            else if($exit>0) $exit++;
 
        }
        $output=implode(' ve ',$output).' önce Yayınlandı';
    }
 
    return $output;
}

function gecenzamanres($dt,$precision=2)
{
    $times=array(   365*24*60*60    => "Yıl",
                30*24*60*60     => "Ay",
                7*24*60*60      => "Hafta",
                24*60*60        => "Gün",
                60*60           => "Saat",
                60              => "Dakika",
                1               => "Saniye");
 
    $passed=time()-$dt;
 
    if($passed<5)
    {
        $output='5 saniye önce';
    }
    else
    {
        $output=array();
        $exit=0;
        foreach($times as $period=>$name)
        {
            if($exit>=$precision || ($exit>0 && $period<60))   break;
            $result = floor($passed/$period);
 
            if($result>0)
            {
                $output[]=$result.' '.$name.($result==1?'':'');
                $passed-=$result*$period;
                $exit++;
            }
 
            else if($exit>0) $exit++;
 
        }
        $output=implode(' ve ',$output).' Önce gönderildi';
    }
 
    return $output;
}


function kalangun($gelecekTarih){
    $gelecek = new DateTime($gelecekTarih); 
    $bugun = new DateTime(date('d-m-Y'));
    $zamanFarki = $gelecek->diff($bugun);
    $kalanGun = $zamanFarki->format('%a');
    if (date($gelecekTarih) < date('d-m-Y')){
    $kalanGun = 'Etkinliğe '.$kalanGun.' Gün Kaldı';
    }
    return $kalanGun;
}



?>
