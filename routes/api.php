<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\PriceController;

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

Route::get('getsize/{idColor}', function ($idColor){
    $sizeController = new SizeController();
    return json_encode($sizeController->getByIdColor($idColor));
});

Route::post('pricepromotion', function (Request $request){
    try {
        $priceController = new PriceController();
        $priceController->updateStatusByType(0);
        $priceController->add(array("id_product" => $request->idProduct, "price" => $request->price, "type_price" => 0, "creator" => 1, "created_at" => $request->startDate, "updated_at" => $request->endDate));
        return json_encode("Cập nhật thành công!");
    } catch (\Throwable $th) {
        return json_encode($th);
    }
    
});