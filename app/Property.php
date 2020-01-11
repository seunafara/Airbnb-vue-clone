<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    //
    protected $fillable = [
      'name',
      'email',
      'price',
      'user_id',
      'rooms',
      'location',
      'description',

      'photo'
    ];

    public function user(){

        return $this->belongsTo('App\User');
    }
}
