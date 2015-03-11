<?php
class District extends Eloquent{

	protected $table = 'districts';

	public function province(){
        return $this->belongsTo('Province');
    }

    //one to many
    public function places(){
        return $this->hasMany('Place');
    }

    public static function getIdWith($distName, $provinceName){
    	$pro = DB::table('provinces')->where('name', '=', $provinceName)->get();
    	if(empty($pro[0])) return 221;
    	$idPro = $pro[0]->id;
    	$dist = DB::table('districts')
                    ->where('name', '=', $distName)
                    ->where('province_id', '=', $idPro)
                    ->get();
        if(empty($dist[0])) return 221;
        return $dist[0]->id;
    }
}