<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'albums';

    public function photo(){
        return $this->hasMany('App\Photo','album_id');
    }

    public function utilisateur(){
        return $this->belongsTo('App\User','utilisateur_id');
    }
}
