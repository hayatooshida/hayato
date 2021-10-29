<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Product extends Model
{
    protected $fillable = ['name','description','image','price'];
    
    public function favorite_users(){
        return $this->belongsToMany(User::class,'favorites','product_id','user_id');
    }
    
     
}
