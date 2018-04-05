<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'photos';

    public function utilisateur(){
        return $this->belongsTo('App\User','utilisateur_id');
    }

    public function album(){
        return $this->belongsTo('App\Album','album_id');
    }
}
