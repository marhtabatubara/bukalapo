<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikel';

    public function postingans(){
        return $this->belongsTo('App\Postingan', 'id_postingan', 'id');
    }

    public function users(){
        return $this->belongsTo('App\User', 'id_user', 'id');
    }
}
