<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function delete($id_image){
        $image = Image::where("id", $id_image)->get();
        Storage::delete($image[0]->url);
        Image::where('id', $id_image)->delete();
    }

    public function deleteByIdProduct($idProduct){
        $images = Image::where("id_product", $idProduct)->get();
        foreach ($images as $image) {
            Storage::delete($image->url);
        }
        Image::where('id_product', $idProduct)->delete();
    }
}
