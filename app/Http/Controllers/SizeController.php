<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function add($sizeData, $id_color, $id_product){
        for ($i=0; $i < count($sizeData); $i++) {
            $size = new Size();
            $size->name = $sizeData[$i]->name;
            $size->quantity = $sizeData[$i]->quantity;
            $size->id_color = $id_color;
            $size->id_product = $id_product;
            $size->save();
        }
    }

    public function addOne(Request $request){
        try {
            $size = new Size();
            $size->name = $request->name;
            $size->quantity = $request->quantity;
            $size->id_color = $request->idColor;
            $size->id_product = $request->idProduct;
            $size->save();
            return json_encode("Thêm thành công");
        } catch (\Throwable $th) {
            return json_encode($th);
        }
    }

    public function getByIdProduct($id_product){
        return Size::where('id_product', $id_product)->get();
    }

    public function getByIdColor($id_color){
        return Size::where('id_color', $id_color)->get();
    }

    public function update(Request $request){
        try {
            Size::whereRaw("id = $request->idSize")->update(["name" => $request->name, "quantity" => $request->quantity]);
            return json_encode("Cập nhật thành công");
        } catch (\Throwable $th) {
            return json_encode($th);
        }
    }

    public function delete(Request $request){
        try {
            Size::where('id', $request->idSize)->delete();
            return json_encode("Xoá thành công");
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function deleteByIdColor($idColor){
        Size::where('id_color', $idColor)->delete();
    }

    public function deleteByIdProduct($idProduct){
        Size::where('id_product', $idProduct)->delete();
    }
}
