<?php

namespace App\Http\Controllers;

use App\Models\TypeProduct;
use App\Models\TypeProductDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class TypeProductController extends Controller
{
    public function add($request){
        try {
            $user = Auth::user();
            $typeProduct = new TypeProduct();
            $typeProduct->name = $request->name;
            $typeProduct->slug = $request->slug;
            $typeProduct->detail = $request->detail;
            $typeProduct->image = $request->file('image')->store('images');
            $typeProduct->icon = $request->file('icon')->store('images');
            $typeProduct->type_product_parent = $request->typeProductParent;
            $typeProduct->creator = $request->user;
            $typeProduct->updater = $request->user;
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

    public function getAllWithPaginate($quantity, $keyword){
        try {
            if($keyword == "")
                $typeproducts = TypeProduct::orderBy('id', 'desc')->paginate($quantity);
            else
                $typeproducts = TypeProduct::where("id", $keyword)->orderBy('id', 'desc')->paginate($quantity);
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

    public function getByTypeProductParent($typeProductParent){
        try {
            $typeproducts = TypeProduct::where("type_product_parent", $typeProductParent)->get();
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

    public function delete(Request $request){
        try {
            $typeproduct = TypeProduct::where("id", $request->idTypeProduct)->get();
            TypeProductDetail::where("id_type", $request->idTypeProduct)->delete();
            Storage::delete($typeproduct[0]->image);
            Storage::delete($typeproduct[0]->icon);
            TypeProduct::where("id", $request->idTypeProduct)->delete();
            return "Xoá thành công";
        } catch (\Throwable $th) {
            return json_encode($th);
        }
    }

    public function update(Request $request){
        try {
            $user = Auth::user();
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
            $condition["updater"] = $request->user;
            TypeProduct::whereRaw("id = $request->idTypeProduct")->update($condition);
            return "Cập nhật thành công";
        } catch (\Throwable $th) {
            return json_encode($th);
        }
    }
}