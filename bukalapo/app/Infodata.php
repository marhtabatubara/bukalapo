<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Infodata extends Model
{
    protected $table = 'infodata';

    public function postingans(){
        return $this->belongsTo('App\Postingan', 'id_postingan', 'id');
    }

    public function users(){
        return $this->belongsTo('App\User', 'id_user', 'id');
    }
    
}
