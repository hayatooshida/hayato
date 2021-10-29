<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
class UserController extends Controller
{
    
    public function show($id)
    {
        
        $user = User::findOrFail($id);

        $user->loadRelationshipCounts();
        return view('users.show', [
            'user' => $user,
        ]);
    }
    public function favorites($id){
        $user = User::findOrFail($id);
       
        $favorites = $user->favorites()->paginate(10);
        return view('users.favorites',[
            'favorites' => $favorites,
        ]);
    }
}
