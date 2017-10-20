<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $fillable = [
    	'name', 
    	'descripcion', 
    	'user_id'
    ];

	public function user(){
    	return $this->belongsTo('App\User');
    }

    public function projects(){
    	return $this->hasMany('App\Project');
    }
}
