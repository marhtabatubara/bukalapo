<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    protected $table = 'carousel';

    public function postingans(){
        return $this->belongsTo('App\Postingan', 'id_postingan', 'id');
    }
}
