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
        return asset("public/assets/mutidata/avatar_cafe/");
    }
}