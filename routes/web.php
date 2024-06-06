<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\ProductController;
    use App\Http\Controllers\TypeProductController;
    use App\Http\Controllers\TypeProductDetailController;
    use App\Http\Controllers\OrderController;
    use App\Http\Controllers\OrderDetailController;
    use App\Http\Controllers\NewsController;
    use App\Http\Controllers\UserController;
    use App\Http\Controllers\CustomerController;
    use App\Http\Controllers\VoucherController;
    use Illuminate\Support\Facades\Redirect;
    use Illuminate\Support\Facades\Auth;
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
        $data = $productController->gets(8, "");
        $news = $newsController->gets(3, "");
        $products = $data["products"];
        $images = $data["images"];
        $prices = $data["prices"];
        return view('index', compact('products', 'images', 'prices', 'typeproducts', 'news'));
    });

    Route::get('manage', function () {
        if(Auth::check() && Auth::user()->type == 0){
            return Redirect::to('/manage/listorder/2?page=1');
        }
        else if(Auth::check() && Auth::user()->type == 1){
            return Redirect::to('/');
        }
        else{
            return view('manage.login');
        }
    });

    Route::get('dang-nhap', function () {
        if(Auth::check() && Auth::user()->type == 1){
            return Redirect::to('/');
        }
        else{
            return view('store.login');
        }
    });

    Route::get('manage/addproduct', function () {
        if(Auth::check() && Auth::user()->type == 0){
            $typeProductController = new TypeProductController();
            $typeproducts = $typeProductController->getAll();
            $quantity = Auth::user()->tablerow;
            return view('manage.addproduct', compact('quantity', 'typeproducts'));
        }
        else{
            return Redirect::to('/manage');
        }
    });

    Route::get('manage/addtypeproduct', function () {
        if(Auth::check() && Auth::user()->type == 0){
            $typeProductController = new TypeProductController();
            $typeproducts = $typeProductController->getAll();
            $quantity = Auth::user()->tablerow;
            return view('manage.addtypeproduct', compact('typeproducts', 'quantity'));
        }
        else{
            return Redirect::to('/manage');
        }
    });

    Route::get('manage/detailtypeproduct/{id}', function ($id) {
        if(Auth::check() && Auth::user()->type == 0){
            $typeProductController = new TypeProductController();
            $typeproductdetail = $typeProductController->getById($id);
            $typeproducts = $typeProductController->getAll();
            $quantity = Auth::user()->tablerow;
            return view('manage.detailtypeproduct', compact('typeproductdetail', 'quantity', 'typeproducts'));
        }
        else{
            return Redirect::to('/manage');
        }
    });

    Route::get('manage/detailproduct/{id}', function ($id) {
        if(Auth::check() && Auth::user()->type == 0){
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
            $quantity = Auth::user()->tablerow;
            return view('manage.detailproduct',  compact('product', 'images', 'colors', 'sizes', 'prices', 'quantity', 'typeproducts', 'types'));
        }
        else{
            return Redirect::to('/manage');
        }
    });

    Route::get('manage/listproduct/{quantity}', function ($quantity) {
        if(Auth::check() && Auth::user()->type == 0){
            $productController = new ProductController();
            $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
            $data = $productController->gets($quantity, $keyword);
            $products = $data["products"];
            $images = $data["images"];
            $prices = $data["prices"];
            $quantity = Auth::user()->tablerow;
            return view('manage.listproduct', compact('products', 'images', 'quantity', 'prices', 'keyword'));
        }
        else{
            return Redirect::to('/manage');
        }
    });

    Route::get('manage/listtypeproduct/{quantity}', function ($quantity) {
        if(Auth::check() && Auth::user()->type == 0){
            $typeProductController = new TypeProductController();
            $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
            $typeproducts = $typeProductController->getAllWithPaginate($quantity, $keyword);
            $quantity = Auth::user()->tablerow;
            return view('manage.listtypeproduct', compact('typeproducts', 'quantity', 'keyword'));
        }
        else{
            return Redirect::to('/manage');
        }
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
        if(Auth::check() && Auth::user()->type == 0){
            $orderController = new OrderController();
            $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
            $orders = $orderController->gets($quantity, $keyword);
            $quantity = Auth::user()->tablerow;
            return view('manage.listorder', compact('orders', 'quantity', 'keyword'));
        }
        else{
            return Redirect::to('/manage');
        }
    });

    Route::get('manage/detailorder/{id}', function ($id) {
        if(Auth::check() && Auth::user()->type == 0){
            $quantity = Auth::user()->tablerow;
            $orderController = new OrderController();
            $orderDetailController = new OrderDetailController();
            $order = $orderController->get($id);
            $orderdetail = $orderDetailController->gets($id);
            $user = Auth::user();
            return view('manage.detailorder', compact('quantity', 'order', 'orderdetail', 'user'));
        }
        else{
            return Redirect::to('/manage');
        }
    });

    Route::get('manage/addnews', function () {
        if(Auth::check() && Auth::user()->type == 0){
            $quantity = Auth::user()->tablerow;
            return view('manage.addnews', compact('quantity'));
        }
        else{
            return Redirect::to('/manage');
        }
    });

    Route::get('tin-tuc/{slug}/{id}', function ($slug, $id) {
        $newsController = new NewsController();
        $news = $newsController->get($id);
        return view('store.news', compact('news'));
    });

    Route::post('/flmngr', function () {
        \EdSDK\FlmngrServer\FlmngrServer::flmngrRequest(
            array(
                'dirFiles' => base_path() . '/public/files'
            )
        );
    });

    Route::get('manage/listnews/{quantity}', function ($quantity) {
        if(Auth::check() && Auth::user()->type == 0){
            $newsController = new NewsController();
            $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
            $news = $newsController->gets($quantity, $keyword);
            $quantity = Auth::user()->tablerow;
            return view('manage.listnews', compact('quantity', 'news', 'keyword'));
        }
        else{
            return Redirect::to('/manage');
        }
    });

    Route::get('manage/detailnews/{id}', function ($id) {
        if(Auth::check() && Auth::user()->type == 0){
            $quantity = Auth::user()->tablerow;
            $newsController = new NewsController();
            $news = $newsController->get($id);
            return view('manage.detailnews', compact('quantity', 'news'));
        }
        else{
            return Redirect::to('/manage');
        }
    });

    Route::post('/manage/logincheckmanager', [UserController::class, 'loginCheckManage']);

    Route::post('/logincheck', [UserController::class, 'loginCheck']);

    Route::get('/manage/logout', [UserController::class, 'logout']);

    Route::get('/logout', [UserController::class, 'logoutCustomer']);

    Route::get('manage/listcustomer/{quantity}', function ($quantity) {
        if(Auth::check() && Auth::user()->type == 0){
            $customerController = new CustomerController();
            $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
            $customers = $customerController->gets($quantity, $keyword);
            $quantity = Auth::user()->tablerow;
            return view('manage.listcustomer', compact('customers', 'quantity', 'keyword'));
        }
        else{
            return Redirect::to('/manage');
        }
    });

    Route::get('manage/addvoucher', function () {
        if(Auth::check() && Auth::user()->type == 0){
            $quantity = 2;
            return view('manage.addvoucher', compact('quantity'));
        }
        else{
            return Redirect::to('/manage');
        }
    });

    Route::get('manage/listvoucher/{quantity}', function ($quantity) {
        if(Auth::check() && Auth::user()->type == 0){
            $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
            $voucherController = new VoucherController();
            $vouchers = $voucherController->gets($quantity, $keyword);
            $quantity = Auth::user()->tablerow;
            return view('manage.listvoucher', compact('quantity', 'vouchers', 'keyword'));
        }
        else{
            return Redirect::to('/manage');
        }
    });

    Route::get('manage/detailvoucher/{id}', function ($id) {
        if(Auth::check() && Auth::user()->type == 0){
            $quantity = Auth::user()->tablerow;
            $voucherController = new VoucherController();
            $voucher = $voucherController->get($id);
            return view('manage.detailvoucher', compact('quantity', 'voucher'));
        }
        else{
            return Redirect::to('/manage');
        }
    });

    Route::get('san-pham', function () {
        $productController = new ProductController();
        $data = $productController->gets(20, "");
        $products = $data["products"];
        $images = $data["images"];
        $prices = $data["prices"];
        return view('store.products', compact('products', 'images', 'prices'));
    });

    Route::get('tin-tuc', function () {
        $newsController = new NewsController();
        $news = $newsController->gets(10, "");
        return view('store.newslist', compact('news'));
    });

    Route::get('/get-google-sign-in-url', [\App\Http\Controllers\GoogleController::class, 'getGoogleSignInUrl']);
    
    Route::get('/callback', [\App\Http\Controllers\GoogleController::class, 'loginCallback']);

    Route::get('/get-facebook-sign-in-url', [\App\Http\Controllers\FacebookController::class, 'getFacebookSignInUrl']);
    
    Route::get('/facebookcallback', [\App\Http\Controllers\FacebookController::class, 'loginCallback']);
?>