<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
    	'subject',
    	'message',
    	'file',
    	'updated_at',
    	'created_at'
    ];

     public function user()
    {
        return $this->belongsTo('App\User');
    }
}
