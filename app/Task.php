<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
    	'name',
    	'project_id', 
    	'user_id',
    	'company_id',
    	'days', 
    	'hours'
    ];

    public function project(){
    	return $this->belongsTo('App\Porject');
    }

    public function users(){
    	return $this->belongsToMany('App\Users');
    }

    /*public function user(){
    	return $this->belongsTo('App\User');
    }

    public function company(){
    	return $this->belongsTo('App\Company');
    }*/

    public function comments(){
        return $this->morphMany('App\Comment', 'commentable');
    }
    
}
