<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\TypeProductDetailController;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    function convertData($body_content) {
        $body_content = trim($body_content);
        $body_content = stripslashes($body_content);
        $body_content = htmlspecialchars($body_content);
        return $body_content;
    } 

    public function add(Request $request){
        try {
            $user = Auth::user();
            $product = new Product();
            $priceController = new PriceController();
            $imageController = new ImageController();
            $colorController = new ColorController();
            $typeProductDetailController = new TypeProductDetailController();
            $product->name = $request->nameProduct;
            $product->sku_code = $request->skuProduct;
            $product->slug = $this->convertData($request->slugProduct);
            $product->detail = $request->detailProduct;
            $product->status = 1;
            $product->creator = $user->id;
            $product->updater = $user->id;
            $product->save();
            $typeProductDetailController->add($request, $product->id);
            $colorController->add($request, $product->id);
            $imageController->add($request, $product->id);
            $priceController->add(array("id_product" => $product->id, "price" => $request->priceProduct, "type_price" => 1, "creator" => $user->id));
            return json_encode("Thêm thành công");
        } catch (\Throwable $th) {
            return json_encode($th);
        }
    }

    public function update(Request $request){
        try {
            $user = Auth::user();
            if($request->column == "name"){
                $condition = json_decode($request->data);
                Product::whereRaw("id = $request->idProduct")->update([$request->column => $condition[0]->name, "slug" => $condition[0]->slug, "updater" => $user->id]);
            }
            if($request->column == "sku_code"){
                $condition = json_decode($request->data);
                Product::whereRaw("id = $request->idProduct")->update([$request->column => $condition[0]->sku_code, "updater" => $user->id]);
            }
            if($request->column == "detail")
                Product::whereRaw("id = $request->idProduct")->update([$request->column => $request->value, "updater" => $user->id]);
            return json_encode("Cập nhật thành công");
        } catch (\Throwable $th) {
            return json_encode($th);
        }
    }

    public function get($column, $value){
        try {
            $priceController = new PriceController();
            $imageController = new ImageController();
            $colorController = new ColorController();
            $sizeController = new SizeController();
            $typeProductDetailController = new TypeProductDetailController();
            $product = Product::where($column, $value)->first();
            $images = $imageController->get($product->id);
            $prices = $priceController->get($product->id);
            $colors = $colorController->get($product->id);
            $sizes = $sizeController->getByIdProduct($product->id);
            $types = $typeProductDetailController->getByIdProduct($product->id);
            return ["product" => $product, "images" => $images, "colors" => $colors, "sizes" => $sizes, "prices" => $prices, "types" => $types];
        } catch (\Throwable $th) {
            return json_encode($th);
        }
    }

    public function gets($quantity){
        try {
            $images = array();
            $prices = array();
            $imageController = new ImageController();
            $priceController = new PriceController();
            $products = Product::orderBy('id', 'desc')->paginate($quantity);
            foreach ($products as $product) {
                array_push($images, $imageController->get($product->id));
                array_push($prices, $priceController->get($product->id));
            }
            return ["products" => $products, "images" => $images, "prices" => $prices];
        } catch (\Throwable $th) {
            return json_encode($th);
        }
    }

    public function search($keyword, $quantity){
        try {
            $images = array();
            $prices = array();
            $imageController = new ImageController();
            $priceController = new PriceController();
            $products = Product::whereRaw("name like '%$keyword%'")->orderBy('id', 'desc')->paginate($quantity);
            foreach ($products as $product) {
                array_push($images, $imageController->get($product->id));
                array_push($prices, $priceController->get($product->id));
            }
            return ["products" => $products, "images" => $images, "prices" => $prices];
        } catch (\Throwable $th) {
            return json_encode($th);
        }
    }

    public function delete($idProduct){
        try {
            $priceController = new PriceController();
            $imageController = new ImageController();
            $colorController = new ColorController();
            $sizeController = new SizeController();
            $sizeController->deleteByIdProduct($idProduct);
            $colorController->deleteByIdProduct($idProduct);
            $priceController->deleteByIdProduct($idProduct);
            $priceController->deleteByIdProduct($idProduct);
            $imageController->deleteByIdProduct($idProduct);
            Product::where('id', $idProduct)->delete();
            return "Xoá thành công";
        } catch (\Throwable $th) {
            return json_encode($th);
        }
    }
}
