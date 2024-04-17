<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function add($request, $id_product){
        for ($i=0; $i < $request->quantityProductPhoto; $i++) { 
            $image = new Image();
            $image->url = $request->file('productPhoto'.$i)->store('images');
            $image->id_product = $id_product;
            $image->save();
        }
    }
    public function get($id_product){
        return Image::where('id_product', $id_product)->get();
    }
}
