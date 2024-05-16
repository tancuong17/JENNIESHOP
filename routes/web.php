<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\ProductController;
    use App\Http\Controllers\TypeProductController;
    use App\Http\Controllers\TypeProductDetailController;
    use App\Http\Controllers\OrderController;
    use App\Http\Controllers\OrderDetailController;
    use App\Http\Controllers\NewsController;
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
        $newsController = new NewsController();
        $typeproducts = $typeProductController->getByCondition("type_product_parent", 0);
        $data = $productController->gets(8);
        $news = $newsController->gets(3);
        $products = $data["products"];
        $images = $data["images"];
        $prices = $data["prices"];
        return view('index', compact('products', 'images', 'prices', 'typeproducts', 'news'));
    });

    Route::get('manage/login', function () {
        return view('manage.login');
    });

    Route::get('dang-nhap', function () {
        return view('store.login');
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

    Route::get('manage/detailtypeproduct/{id}', function ($id) {
        $typeProductController = new TypeProductController();
        $typeproductdetail = $typeProductController->getById($id);
        $typeproducts = $typeProductController->getAll();
        $quantity = 2;
        return view('manage.detailtypeproduct', compact('typeproductdetail', 'quantity', 'typeproducts'));
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

    Route::get('manage/listtypeproduct/{quantity}', function ($quantity) {
        $typeProductController = new TypeProductController();
        $typeproducts = $typeProductController->getAllWithPaginate($quantity);
        $quantity = $quantity;
        return view('manage.listtypeproduct', compact('typeproducts', 'quantity'));
    });

    Route::get('chi-tiet-san-pham/{slug}', function ($slug) {
        $productController = new ProductController();
        $data = $productController->get("slug", $slug);
        $product = $data["product"];
        $images = $data["images"];
        $colors = $data["colors"];
        $sizes = $data["sizes"];
        $prices = $data["prices"];
        return view('store.product', compact('product', 'images', 'colors', 'sizes', 'prices'));
    });

    Route::get('loai-san-pham/{slug}/{id}', function ($slug, $id) {
        $typeProductDetailController = new TypeProductDetailController();
        $typeProductController = new TypeProductController();
        $data = $typeProductDetailController->getProducts($id);
        $typeProductParents = $typeProductController->getByTypeProductParent($id);
        $products = $data["products"];
        $images = $data["images"];
        $prices = $data["prices"];
        $typeProductDetails = $data["typeProductDetails"];
        $typeProduct = $data["typeProduct"];
        return view('store.typeproducts', compact('typeProductDetails', 'products', 'images', 'prices', 'typeProduct', 'typeProductParents'));
    });

    Route::get('gio-hang', function () {
        return view('store.cart');
    });

    Route::get('tim-kiem/{keyword}', function ($keyword) {
        $productController = new ProductController();
        $data = $productController->search($keyword, 8);
        $products = $data["products"];
        $images = $data["images"];
        $prices = $data["prices"];
        $keyword = $keyword;
        return view('store.search', compact('products', 'images', 'prices', 'keyword'));
    });

    Route::get('manage/listorder/{quantity}', function ($quantity) {
        $orderController = new OrderController();
        $orders = $orderController->gets($quantity);
        $quantity = $quantity;
        return view('manage.listorder', compact('orders', 'quantity'));
    });

    Route::get('manage/detailorder/{id}', function ($id) {
        $quantity = 2;
        $orderController = new OrderController();
        $orderDetailController = new OrderDetailController();
        $order = $orderController->get($id);
        $orderdetail = $orderDetailController->gets($id);
        return view('manage.detailorder', compact('quantity', 'order', 'orderdetail'));
    });

    Route::get('manage/addnews', function () {
        $quantity = 2;
        return view('manage.addnews', compact('quantity'));
    });

    Route::get('tin-tuc/{slug}/{id}', function ($slug, $id) {
        $newsController = new NewsController();
        $news = $newsController->get($id);
        return view('store.news', compact('news'));
    });

    Route::post('/flmngr', function () {
        \EdSDK\FlmngrServer\FlmngrServer::flmngrRequest(
            array(
                'dirFiles' => base_path() . '/storage/app/images'
            )
        );
    });
?>