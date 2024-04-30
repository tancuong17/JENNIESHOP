<?php

namespace App\Http\Controllers;

use App\Models\TypeProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TypeProductController extends Controller
{
    public function add($request){
        try {
            $typeProduct = new TypeProduct();
            $typeProduct->name = $request->name;
            $typeProduct->slug = $request->slug;
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

    public function getAllWithPaginate($quantity){
        try {
            $typeproducts = TypeProduct::orderBy('id', 'desc')->paginate($quantity);
            return $typeproducts;
        } catch (\Throwable $th) {
            return json_encode($th);
        }
    }

    public function getById($id){
        try {
            $typeproducts = TypeProduct::where("id", $id)->get();
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

    public function update(Request $request){
        try {
            $condition = array();
            if(isset($request->name) == true){
                $condition["name"] = $request->name;
                $condition["slug"] = $request->slug;
            }
            if(isset($request->detail) == true)
                $condition["detail"] = $request->detail;
            if(isset($request->typeProductParent) == true)
                $condition["type_product_parent"] = $request->typeProductParent;
            if(isset($request->image) == true){
                $typeProduct = TypeProduct::whereRaw("id = $request->idTypeProduct")->get();
                Storage::delete($typeProduct[0]->image);
                $condition["image"] = $request->file('image')->store('images');
            }
            if(isset($request->icon) == true){
                $typeProduct = TypeProduct::whereRaw("id = $request->idTypeProduct")->get();
                Storage::delete($typeProduct[0]->icon);
                $condition["icon"] = $request->file('icon')->store('images');
            }
            TypeProduct::whereRaw("id = $request->idTypeProduct")->update($condition);
            return "Cập nhật thành công";
        } catch (\Throwable $th) {
            return json_encode($th);
        }
    }
}