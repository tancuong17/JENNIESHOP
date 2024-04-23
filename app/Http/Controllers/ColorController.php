<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;
use App\Http\Controllers\SizeController;
use Illuminate\Support\Facades\Storage;

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
    
    public function update(Request $request){
        try {
            $condition = array();
            $condition["name"] = $request->name;
            if(isset($request->imageColorUpload) == true){
                $color = Color::where("id", $request->idColor)->get();
                Storage::delete($color[0]->url);
                $condition["url"] = $request->file('imageColorUpload')->store('images');
            }
            Color::whereRaw("id = $request->idColor")->update($condition);
            return json_encode("Cập nhật thành công");
        } catch (\Throwable $th) {
            return json_encode($th);
        }
    }

    public function delete(Request $request){
        try {
            $color = Color::where("id", $request->idColor)->get();
            Storage::delete($color[0]->url);
            $sizeController = new SizeController();
            $sizeController->deleteByIdColor($request->idColor);
            Color::where('id', $request->idColor)->delete();
            return json_encode("Xoá thành công");
        } catch (\Throwable $th) {
            return json_encode($th);
        }
    }

    public function deleteByIdProduct($idProduct){
        $colors = Color::where("id_product", $idProduct)->get();
        foreach ($colors as $color) {
            Storage::delete($color->url);
        }
        Color::where('id_product', $idProduct)->delete();
    }
}
