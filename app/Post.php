<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id','tcategory_id','scategory_id','content','title','gazou_path'
    ];


    public function tcategory(){
      return $this->belongsTo(\App\Tcategory::class,'tcategory_id');
    }

    public function scategory(){
      return $this->belongsTo(\App\Scategory::class,'scategory_id');
    }

    public function user(){
      return $this->belongsTo(\App\User::class,'user_id');
    }

    public function comments(){
       return $this->hasMany(\App\Comment::class,'post_id','id');
    }

}     
