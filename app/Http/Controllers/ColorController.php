<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;
use App\Http\Controllers\SizeController;

class ColorController extends Controller
{
    public function add($request, $id_product){
        $sizeController = new SizeController();
        $colors = json_decode($request->colors);
        for ($j=0; $j < count($colors); $j++) { 
            $color = new Color();
            $color->url = $request->file('colorPhoto'.$j)->store('images');
            $color->name = $colors[$j]->name;
            $color->id_product = $id_product;
            $color->save();
            $sizeController->add($colors[$j]->size, $color->id, $id_product);
        }
    }
    public function get($id_product){
        return Color::where('id_product', $id_product)->get();
    }
}
