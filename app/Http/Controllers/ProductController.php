<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
     public function index()
    {
        return view('product.index')
            ->with('products', Product::get());
    }
 
     public function show($id)
     {
         $product = Product::findOrFail($id);
          $favorites = $product->favorite_users()->count();
         return view('product.show',[
             'product' => $product,
             'favorites' => $favorites,
         ]);
     }

}
