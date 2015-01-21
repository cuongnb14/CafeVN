<?php
class Province extends Eloquent{

	protected $table = 'provinces';

	public function districts(){
        return $this->hasMany('District');
    }
}