<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\ProductController;
    use App\Http\Controllers\TypeProductController;
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
        $typeProductController = new TypeProductController();
        $typeproducts = $typeProductController->getByCondition("type_product_parent", 0);
        $data = $productController->gets(8);
        $products = $data["products"];
        $images = $data["images"];
        $prices = $data["prices"];
        return view('index', compact('products', 'images', 'prices', 'typeproducts'));
    });
    Route::get('manage/login', function () {
        return view('manage.login');
    });
    Route::get('manage/dashboard', function () {
        return view('manage.dashboard');
    });
    Route::get('manage/addproduct', function () {
        $typeProductController = new TypeProductController();
        $typeproducts = $typeProductController->getAll();
        $quantity = 2;
        return view('manage.addproduct', compact('quantity', 'typeproducts'));
    });
    Route::get('manage/addtypeproduct', function () {
        $typeProductController = new TypeProductController();
        $typeproducts = $typeProductController->getAll();
        $quantity = 2;
        return view('manage.addtypeproduct', compact('typeproducts', 'quantity'));
    });
    Route::get('manage/detailproduct/{id}', function ($id) {
        $typeProductController = new TypeProductController();
        $typeproducts = $typeProductController->getAll();
        $productController = new ProductController();
        $data = $productController->get("id", $id);
        $product = $data["product"];
        $images = $data["images"];
        $colors = $data["colors"];
        $sizes = $data["sizes"];
        $prices = $data["prices"];
        $types = $data["types"];
        $quantity = 2;
        return view('manage.detailproduct',  compact('product', 'images', 'colors', 'sizes', 'prices', 'quantity', 'typeproducts', 'types'));
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
        $data = $productController->get("slug", $slug);
        $product = $data["product"];
        $images = $data["images"];
        $colors = $data["colors"];
        $sizes = $data["sizes"];
        $prices = $data["prices"];
        return view('store.product', compact('product', 'images', 'colors', 'sizes', 'prices'));
    });
?>