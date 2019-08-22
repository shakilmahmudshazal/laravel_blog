<?php

namespace App;
use Carbon\Carbon;
//use Illuminate\Database\Eloquent\Model;

class post extends model
{
    //
    //protected $guarded=[];
    public function comments()
    {
    	return $this->hasMany(comment::class);
    }

    public function addComment( $body)
    {
    	$this->comments()->create(compact('body'));
    	 // comment::create([
      //      'body'=>request('body'),
      //      'post_id'=>$this->id  
           
      // ]);
    }

     public function user()
    {
      return $this->belongsTo(user::class);
    }

   //  public function publish( comment $comment)

   //  {
   // $this->comments()->save($comment);
   //  }

    public function scopeFilter($query, $filters)
    {
       if(isset($filters['month']))
        {
            $query->whereMonth('created_at',Carbon::parse($filters['month'])->month);
        }
        if(isset($filters['year']))
        {
            $query->whereYear('created_at',$filters['year']);
        }
      
    }

    public static function archives()
    {
      return static::selectRaw('monthname(created_at) month, year(created_at) year ,count(*) publish')
        ->groupBy('year','month')
        ->orderByRaw('min(created_at) desc')
        ->get()
        ->toArray();
    }
}



