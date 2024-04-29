<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\TypeProductDetail;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\TypeProductController;

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

    public function getProducts($id){
        $typeProductDetails = TypeProductDetail::where('id_type', $id)->paginate(2);
        $products = array();
        $images = array();
        $prices = array();
        $imageController = new ImageController();
        $priceController = new PriceController();
        $typeProductController = new TypeProductController();
        $typeProduct = $typeProductController->getById($id);
        foreach ($typeProductDetails as $typeProductDetail) {
            array_push($products, Product::where("id", $typeProductDetail->id_product)->first());
            array_push($images, $imageController->get($typeProductDetail->id_product));
            array_push($prices, $priceController->get($typeProductDetail->id_product));
        }
        return ["typeProductDetails" => $typeProductDetails, "typeProduct" => $typeProduct, "products" => $products, "images" => $images, "prices" => $prices];
    }
}
