<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    //
    public function post()
    {
    	 return $this->belongsTo(post::class);

    }

    public function user()
    {
    	return $this->belongsTo(user::class);
    }
}
