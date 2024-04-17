<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    function add($sizeData, $id_color, $id_product){
        for ($i=0; $i < count($sizeData); $i++) {
            $size = new Size();
            $size->name = $sizeData[$i]->name;
            $size->quantity = $sizeData[$i]->quantity;
            $size->id_color = $id_color;
            $size->id_product = $id_product;
            $size->save();
        }
    }
    public function getByIdProduct($id_product){
        return Size::where('id_product', $id_product)->get();
    }
    public function getByIdColor($id_color){
        return Size::where('id_color', $id_color)->get();
    }
}
