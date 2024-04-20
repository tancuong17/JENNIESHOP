<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\SizeController;

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
            $product = new Product();
            $priceController = new PriceController();
            $imageController = new ImageController();
            $colorController = new ColorController();
            $product->name = $request->nameProduct;
            $product->sku_code = $request->skuProduct;
            $product->slug = $this->convertData($request->slugProduct);
            $product->detail = $request->detailProduct;
            $product->status = 1;
            $product->creator = 1;
            $product->updater = 1;
            $product->save();
            $colorController->add($request, $product->id);
            $imageController->add($request, $product->id);
            $priceController->add(array("id_product" => $product->id, "price" => $request->priceProduct, "type_price" => 1, "creator" => 1));
            return json_encode("Thêm thành công");
        } catch (\Throwable $th) {
            return json_encode($th);
        }
    }

    public function update(Request $request){
        try {
            Product::whereRaw("id = $request->idProduct")->update(["$request->column" => $request->value]);
            return json_encode("Cập nhật thành công");
        } catch (\Throwable $th) {
            return json_encode($th);
        }
    }

    public function get($slug){
        try {
            $priceController = new PriceController();
            $imageController = new ImageController();
            $colorController = new ColorController();
            $sizeController = new SizeController();
            $product = Product::where('slug', $slug)->first();
            $images = $imageController->get($product->id);
            $prices = $priceController->get($product->id);
            $colors = $colorController->get($product->id);
            $sizes = $sizeController->getByIdProduct($product->id);
            return ["product" => $product, "images" => $images, "colors" => $colors, "sizes" => $sizes, "prices" => $prices];
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
            $products = Product::paginate($quantity);
            foreach ($products as $product) {
                array_push($images, $imageController->get($product->id));
                array_push($prices, $priceController->get($product->id));
            }
            return ["products" => $products, "images" => $images, "prices" => $prices];
        } catch (\Throwable $th) {
            return json_encode($th);
        }
    }
}
