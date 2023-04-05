<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postingan extends Model
{
    protected $table ='postingan';

    public function fotoartikels(){
        return $this->hasMany('App\Artikel','id_postingan','id');
    }

    public function fotoinfodatas(){
        return $this->hasMany('App\Infodata','id_postingan','id');
    }
    
    public function fotocarousels(){
        return $this->hasMany('App\Carousel','id_postingan','id');
    }
}
