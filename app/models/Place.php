<?php
class Place extends Eloquent{

	protected $table = 'places';

	//Many to Many
	public function services(){
        return $this->belongsToMany('Service','places_services');
    }
    //Many to Many
	public function purports(){
        return $this->belongsToMany('Purport','places_purports');
    }
    //Many to one
	public function district(){
         return $this->belongsTo('District');
    }
}