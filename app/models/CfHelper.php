<?php

class CfHelper
{

    /**
     *
     * @param int $id
     *            id cau quan
     * @return string dia chi cua quan
     */
    public static function getAddress($id)
    {
        $place = Place::find($id);
        $address = $place->street_address;
        $district = $place->district()->first();
        $province = $district->province()->first();
        if(is_object($province)) $address .= ", " . $district->name . ", " . $province->name;
        return $address;
    }

    public static function cutString($str, $len = 150)
    {
        $str = trim($str);
        if (strlen($str) <= $len)
            return $str;
        $str = substr($str, 0, $len);
        if ($str != "") {
            if (! substr_count($str, " "))
                return $str . " ...";
            while (strlen($str) && ($str[strlen($str) - 1] != " "))
                $str = substr($str, 0, - 1);
            $str = substr($str, 0, - 1) . " ...";
        }
        return $str;
    }
    /**
     * Tao mang id array tu mang cac doi tuong
     * @param unknown $ObEloquent
     */
    public static function toArrayId($ObsEloquent){
        $idArray = array();
        foreach ($ObsEloquent as $ObEloquent){
            $idArray[] = $ObEloquent->id;
        }
        return $idArray;
    }
    
    /**
     * 
     */
    
    public static function getUrlPlaceIcon(){
        return base_path() . "/public/assets/mutidata/avatar_cafe/";
    }

    public static function getUrlImage($id){
        return asset('/public/assets/mutidata/avatar_cafe/cf-'.$id.'.jpg');
    }

    public static function distance($s1, $s2){
        $m = strlen($s1);
        $n = strlen($s2);
        $v = array();
        for ($i = 0; $i <= $m; $i++) {
                $v[$i][0] = $i;
        }
        for ($j = 0; $j <= $n; $j++) {
                $v[0][$j] = $j;
        }
 
        for ($i = 1; $i <= $m; $i++) {
                for ($j = 1; $j <= $n; $j++) {
                        if ($s1[$i-1] == $s2[$j-1]) $v[$i][$j] = $v[$i-1][$j-1];
                        else $v[$i][$j] = 1 + min( array(min( array($v[$i][$j-1],$v[$i-1][$j])) , $v[$i-1][$j-1]));
                }
        }
 
        return $v[$m][$n];
    }

    public static function similarity($str1, $str2){

        $rs = 1 - CfHelper::distance( $str1, $str2) / (max(array(strlen($str1), strlen($str2))));
        return $rs;
    }

    public static function utf8ToAscii($str) {
        $chars = array(    
                   'a'    =>    array('ấ','ầ','ẩ','ẫ','ậ','Ấ','Ầ','Ẩ','Ẫ','Ậ','ắ','ằ','ẳ','ẵ','ặ','Ắ','Ằ','Ẳ','Ẵ','Ặ','á','à','ả','ã','ạ','â','ă','Á','À','Ả','Ã','Ạ','Â','Ă'),
                   'e'    =>    array('ế','ề','ể','ễ','ệ','Ế','Ề','Ể','Ễ','Ệ','é','è','ẻ','ẽ','ẹ','ê','É','È','Ẻ','Ẽ','Ẹ','Ê'),
                   'i'    =>    array('í','ì','ỉ','ĩ','ị','Í','Ì','Ỉ','Ĩ','Ị'),
                   'o'    =>    array('ố','ồ','ổ','ỗ','ộ','Ố','Ồ','Ổ','Ô','Ộ','ớ','ờ','ở','ỡ','ợ','Ớ','Ờ','Ở','Ỡ','Ợ','ó','ò','ỏ','õ','ọ','ô','ơ','Ó','Ò','Ỏ','Õ','Ọ','Ô','Ơ'),
                   'u'    =>    array('ứ','ừ','ử','ữ','ự','Ứ','Ừ','Ử','Ữ','Ự','ú','ù','ủ','ũ','ụ','ư','Ú','Ù','Ủ','Ũ','Ụ','Ư'),
                   'y'    =>    array('ý','ỳ','ỷ','ỹ','ỵ','Ý','Ỳ','Ỷ','Ỹ','Ỵ'),
                   'd'    =>    array( "đ" ,'Đ'),
                  );
        foreach ($chars as $key => $arr) 
            foreach ($arr as $val)
                $str = str_replace($val,$key,$str);
        return trim(strtolower($str));
    }
}