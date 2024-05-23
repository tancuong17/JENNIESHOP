<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TypeProductController;
use App\Http\Controllers\TypeProductDetailController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('addproduct', [ProductController::class, 'add']);

Route::post('updateproduct', [ProductController::class, 'update']);

Route::post('addsize', [SizeController::class, 'addOne']);

Route::post('updatesize', [SizeController::class, 'update']);

Route::post('deletesize', [SizeController::class, 'delete']);

Route::post('updatecolor', [ColorController::class, 'update']);

Route::post('deletecolor', [ColorController::class, 'delete']);

Route::post('updatetypeproductdetail', function (Request $request){
    $typeProductDetailController = new TypeProductDetailController();
    $result = $typeProductDetailController->update($request);
    return json_encode($result);
});

Route::post('deleteproduct', function (Request $request){
    $productController = new ProductController();
    $result = $productController->delete($request->idProduct);
    return json_encode($result);
});

Route::post('addtypeproduct', function (Request $request){
    try {
        $typeProductController = new TypeProductController();
        $typeProductController->add($request);
        return json_encode("Thêm thành công");
    } catch (\Throwable $th) {
        return json_encode($th);
    }
});

Route::post('deletetypeproduct', function (Request $request){
    try {
        $typeProductController = new TypeProductController();
        $result = $typeProductController->delete($request);
        return json_encode($result);
    } catch (\Throwable $th) {
        return json_encode($th);
    }
});

Route::post('updatetypeproduct', function (Request $request){
    try {
        $typeProductController = new TypeProductController();
        $result = $typeProductController->update($request);
        return json_encode($result);
    } catch (\Throwable $th) {
        return json_encode($th);
    }
});

Route::post('addorder', function (Request $request){
    try {
        $orderController = new OrderController();
        $result = $orderController->add($request);
        return json_encode($result);
    } catch (\Throwable $th) {
        return json_encode($th);
    }
});

Route::get('getsize/{idColor}', function ($idColor){
    $sizeController = new SizeController();
    return json_encode($sizeController->getByIdColor($idColor));
});

Route::post('pricepromotion', function (Request $request){
    try {
        $user = Auth::user();
        $priceController = new PriceController();
        $priceController->updateStatusByType($request->idProduct, 0);
        $priceController->add(array("id_product" => $request->idProduct, "price" => $request->price, "type_price" => 0, "creator" => $user->id, "created_at" => $request->startDate, "updated_at" => $request->endDate));
        return json_encode("Cập nhật thành công!");
    } catch (\Throwable $th) {
        return json_encode($th);
    }
});

Route::post('updateprice', function (Request $request){
    try {
        $user = Auth::user();
        $priceController = new PriceController();
        $priceController->updateStatusByType($request->idProduct, 1);
        $priceController->add(array("id_product" => $request->idProduct, "price" => $request->price, "type_price" => 1, "creator" => $user->id));
        return json_encode("Cập nhật thành công!");
    } catch (\Throwable $th) {
        return json_encode($th);
    }
});

Route::post('updateimage', function (Request $request){
    try {
        $imageController = new ImageController();
        $imagesRemove = json_decode($request->imagesRemoveProduct);
        foreach ($imagesRemove as $idImage) {
            $imageController->delete($idImage);
        }
        $imageController->add($request, $request->idProduct);
        return json_encode("Cập nhật thành công!");
    } catch (\Throwable $th) {
        return json_encode($th);
    }
});

Route::post('addcolor', function (Request $request){
    try {
        $colorController = new ColorController();
        $colorController->add($request, $request->idProduct);
        return json_encode("Cập nhật thành công!");
    } catch (\Throwable $th) {
        return json_encode($th);
    }
});

Route::post('addnews', function (Request $request){
    try {
        $newsController = new NewsController();
        $result = $newsController->add($request);
        return json_encode($result);
    } catch (\Throwable $th) {
        return json_encode($th);
    }
});

Route::post('updatenews', function (Request $request){
    try {
        $newsController = new NewsController();
        $result = $newsController->update($request);
        return json_encode($result);
    } catch (\Throwable $th) {
        return json_encode($th);
    }
});

Route::post('deletenews', function (Request $request){
    try {
        $newsController = new NewsController();
        $result = $newsController->delete($request);
        return json_encode($result);
    } catch (\Throwable $th) {
        return json_encode($th);
    }
});
