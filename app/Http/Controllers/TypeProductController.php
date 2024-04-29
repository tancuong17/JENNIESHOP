<?php

namespace App\Http\Controllers;

use App\Models\TypeProduct;
use Illuminate\Http\Request;

class TypeProductController extends Controller
{
    public function add($request){
        try {
            $typeProduct = new TypeProduct();
            $typeProduct->name = $request->name;
            $typeProduct->detail = $request->detail;
            $typeProduct->image = $request->file('image')->store('images');
            $typeProduct->icon = $request->file('icon')->store('images');
            $typeProduct->type_product_parent = $request->typeProductParent;
            $typeProduct->creator = 1;
            $typeProduct->updater = 1;
            $typeProduct->save();
            return json_encode("Thêm thành công");
        } catch (\Throwable $th) {
            return json_encode($th);
        }
    }

    public function getAll(){
        try {
            $typeproducts = TypeProduct::get();
            return $typeproducts;
        } catch (\Throwable $th) {
            return json_encode($th);
        }
    }

    public function getByCondition($column, $value){
        try {
            $typeproducts = TypeProduct::where($column, $value)->get();
            return $typeproducts;
        } catch (\Throwable $th) {
            return json_encode($th);
        }
    }
}