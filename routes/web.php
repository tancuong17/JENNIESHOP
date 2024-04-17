<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\ProductController;
    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */
    Route::get('/', function () {
        $productController = new ProductController();
        $data = $productController->gets(8);
        $products = $data["products"];
        $images = $data["images"];
        $prices = $data["prices"];
        return view('index', compact('products', 'images', 'prices'));
    });
    Route::get('manage/login', function () {
        return view('manage.login');
    });
    Route::get('manage/dashboard', function () {
        return view('manage.dashboard');
    });
    Route::get('manage/addproduct', function () {
        $quantity = 2;
        return view('manage.addproduct', compact('quantity'));
    });
    Route::get('manage/detailproduct/{slug}', function ($slug) {
        $productController = new ProductController();
        $data = $productController->get($slug);
        $product = $data["product"];
        $images = $data["images"];
        $colors = $data["colors"];
        $sizes = $data["sizes"];
        $prices = $data["prices"];
        $quantity = 2;
        return view('manage.detailproduct',  compact('product', 'images', 'colors', 'sizes', 'prices', 'quantity'));
    });
    Route::get('manage/listproduct/{quantity}', function ($quantity) {
        $productController = new ProductController();
        $data = $productController->gets($quantity);
        $products = $data["products"];
        $images = $data["images"];
        $prices = $data["prices"];
        $quantity = $quantity;
        return view('manage.listproduct', compact('products', 'images', 'quantity', 'prices'));
    });
    Route::get('product/{slug}', function ($slug) {
        $productController = new ProductController();
        $data = $productController->get($slug);
        $product = $data["product"];
        $images = $data["images"];
        $colors = $data["colors"];
        $sizes = $data["sizes"];
        $prices = $data["prices"];
        return view('store.product', compact('product', 'images', 'colors', 'sizes', 'prices'));
    });
?>