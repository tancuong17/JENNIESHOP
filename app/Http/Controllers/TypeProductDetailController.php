<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeProductDetail;

class TypeProductDetailController extends Controller
{
    public function add($request, $idProduct){
        $typeProducts = json_decode($request->typeProducts);
        foreach ($typeProducts as $typeProduct) {
            $typeProductDetail = new TypeProductDetail();
            $typeProductDetail->id_type = $typeProduct;
            $typeProductDetail->id_product = $idProduct;
            $typeProductDetail->save();
        }
    }

    public function update($request){
        try {
            $typeProducts = json_decode($request->typeProducts);
            TypeProductDetail::where("id_product", $request->idProduct)->delete();
            foreach ($typeProducts as $typeProduct) {
                $typeProductDetail = new TypeProductDetail();
                $typeProductDetail->id_type = $typeProduct;
                $typeProductDetail->id_product = $request->idProduct;
                $typeProductDetail->save();
            }
            return "Cập nhật thành công";
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function getByIdProduct($id_product){
        return TypeProductDetail::where('id_product', $id_product)->get();
    }
}
