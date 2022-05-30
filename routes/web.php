<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\AdmiOrderController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\OrderController as BackendOrderController;
use App\Http\Controllers\Backend\PartnerController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\ShipmentDistricController;
use App\Http\Controllers\Backend\ShippingController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubSubCategoryController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\CashController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\LanguageController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\StripeController;
use App\Http\Controllers\User\WishListController;
use App\Models\User;
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
// -------------------------- Home Auth Routes ------------------------
// Route::get('/', function () {
//     return view('welcome');
// });

// ------------------------ Admin Auth Routes -------------------------
Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function () {
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:admin'])->group(function(){
    Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('dashboard')->middleware('auth:admin');

    Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
    // ----------- Admin Profile Routes ----------------------------------------
    Route::get('/admin/profile', [AdminProfileController::class, 'adminProfile'])->name('admin.profile');
    Route::get('/admin/profile/edit', [AdminProfileController::class, 'adminProfileEdit'])->name('edit.admin.profile');
    Route::post('/admin/profile/update', [AdminProfileController::class, 'adminProfileUpdate'])->name('update.admin.profile');
    Route::get('/admin/password/change', [AdminProfileController::class, 'changeAdminPassword'])->name('change.admin.password');
    Route::post('/admin/password/changed', [AdminProfileController::class, 'updateAdminPassword'])->name('admin.password.changed');
    // ---------------------- Partners Routes For Admin ---------------------------------
route::prefix('partner')->group(function () {
    Route::get('/view', [PartnerController::class, 'ViewPartners'])->name('view.partners');
    Route::get('/add-partner', [PartnerController::class, 'ViewAddPartner'])->name('view.add.partner');
    Route::post('/partner-added', [PartnerController::class, 'AddPartner'])->name('add.partner');
    Route::get('/update/{id}', [PartnerController::class, 'ViewUpdatePartner'])->name('view.update.partner');
    Route::post('/updated/{id}', [PartnerController::class, 'UpdatePartner'])->name('update.partner');
    Route::get('/delete/{id}', [PartnerController::class, 'DeletePartner'])->name('view.delete.partner');
});
// ----------------- Reports Routes Admin -----------------------------
route::prefix('reports')->group(function () {
    Route::get('/view', [ReportController::class, 'ViewReports'])->name('view.reports');
    Route::get('/view/users', [ReportController::class, 'ViewUsers'])->name('view.users');
    Route::post('/search', [ReportController::class, 'SearchByDate'])->name('date.search');
});

// ---------------------- Categories Routes For Admin ---------------------------------
route::prefix('category')->group(function () {
    Route::get('/view', [CategoryController::class, 'ViewCategories'])->name('view.category');
    Route::get('/add', [CategoryController::class, 'ViewAddCategory'])->name('view.add.category');
    Route::post('/added', [CategoryController::class, 'AddCategory'])->name('add.category');
    Route::get('/update/{id}', [CategoryController::class, 'ViewUpdateCategory'])->name('view.update.category');
    Route::post('/updated/{id}', [CategoryController::class, 'UpdateCategory'])->name('update.category');
    Route::get('/delete/{id}', [CategoryController::class, 'DeleteCategory'])->name('delete.category');


});

// ---------------------- Sub Categories Routes For Admin ---------------------------------
route::prefix('subcategory')->group(function () {
    Route::get('/view', [SubCategoryController::class, 'ViewSubCategories'])->name('view.subcategory');
    Route::get('/add', [SubCategoryController::class, 'ViewAddSubCategory'])->name('view.add.subcategory');
    Route::post('/added', [SubCategoryController::class, 'AddSubCategory'])->name('add.subcategory');
    Route::get('/update/{id}', [SubCategoryController::class, 'ViewUpdateSubCategory'])->name('view.update.subcategory');
    Route::post('/updated/{id}', [SubCategoryController::class, 'UpdateSubCategory'])->name('update.subcategory');
    Route::get('/delete/{id}', [SubCategoryController::class, 'DeleteSubCategory'])->name('delete.subcategory');
});

// ---------------------- Sub Sub Categories Routes For Admin ---------------------------------
route::prefix('sub-subcategory')->group(function () {
    Route::get('/view', [SubSubCategoryController::class, 'ViewSubSubCategories'])->name('view.subsubcategory');
    Route::get('/ajax/{category_id}', [SubCategoryController::class, 'GetSubCategory']);
    Route::post('/added', [SubSubCategoryController::class, 'AddSubSubCategory'])->name('add.subsubcategory');
    Route::get('/update/{id}', [SubSubCategoryController::class, 'ViewUpdateSubSubCategory'])->name('view.update.subsubcategory');
    Route::post('/updated/{id}', [SubSubCategoryController::class, 'UpdateSubSubCategory'])->name('update.subsubcategory');
    Route::get('/delete/{id}', [SubSubCategoryController::class, 'DeleteSubSubCategory'])->name('delete.subsubcategory');
});

// ---------------------- Producs Routes For Admin ---------------------------------
route::prefix('products')->group(function () {
    Route::get('/view', [ProductController::class, 'ViewProducs'])->name('view.products');
    Route::get('/sub/subcategory/ajax/{subcategory_id}', [SubSubCategoryController::class, 'GetSubSubCategory']);
    Route::get('/add', [ProductController::class, 'ViewAddProduc'])->name('view.add.product');
    Route::post('/added', [ProductController::class, 'AddProduc'])->name('add.product');
    Route::get('/update/{id}', [ProductController::class, 'ViewUpdateProduc'])->name('view.update.product');
    Route::post('/updated', [ProductController::class, 'UpdateProduc'])->name('update.product');
    Route::post('/multi-image/updated', [ProductController::class, 'UpdateProducImage'])->name('update.product.image');
    Route::post('/image/updated', [ProductController::class, 'UpdateProducThumbnail'])->name('update.product.thumbnail');
    Route::get('/multi-image/delete/{id}', [ProductController::class, 'DeleteProducMultiImage'])->name('product.multiImage.delete');
    Route::get('/delete/{id}', [ProductController::class, 'DeleteProduc'])->name('delete.product');
    Route::get('/inactive/{id}', [ProductController::class, 'InactiveProduc'])->name('product.inactive');
    Route::get('/active/{id}', [ProductController::class, 'ActiveProduc'])->name('product.active');
});

// ---------------------- Sliders Routes For Admin ---------------------------------
route::prefix('slider')->group(function () {
    Route::get('/view', [SliderController::class, 'ViewSliders'])->name('view.sliders');
    Route::get('/add', [SliderController::class, 'ViewAddSlider'])->name('view.add.slider');
    Route::post('/added', [SliderController::class, 'AddSlider'])->name('add.slider');
    Route::get('/update/{id}', [SliderController::class, 'ViewUpdateSlider'])->name('view.update.slider');
    Route::post('/updated/{id}', [SliderController::class, 'UpdateSlider'])->name('update.slider');
    Route::get('/delete/{id}', [SliderController::class, 'DeleteSlider'])->name('view.delete.slider');
    Route::get('/inactive/{id}', [SliderController::class, 'InactiveSlider'])->name('slider.inactive');
    Route::get('/active/{id}', [SliderController::class, 'ActiveSlider'])->name('slider.active');
});

// --------------------- Shipment Divisions Routes For Admin----------------------------
route::prefix('shipment')->group(function () {
    Route::get('/divisions/view', [ShippingController::class, 'ViewDivisions'])->name('view.divisions');
    Route::post('/division/added', [ShippingController::class, 'AddDivision'])->name('add.division');
    Route::get('/division/updated/view/{id}', [ShippingController::class, 'ViewUpdateDivision'])->name('view.update.division');
    Route::post('/division/updated/{id}', [ShippingController::class, 'UpdateDivision'])->name('update.division');
    Route::get('/division/deleted/{id}', [ShippingController::class, 'DeleteDivision'])->name('delete.division');
});

// --------------------- Shipment Districs Routes For Admin----------------------------
route::prefix('district')->group(function () {
    Route::get('/view', [ShipmentDistricController::class, 'ViewDistrict'])->name('view.districts');
    Route::post('/added', [ShipmentDistricController::class, 'AddDistric'])->name('add.district');
    Route::get('/updated/view/{id}', [ShipmentDistricController::class, 'ViewUpdateDistrict'])->name('view.update.district');
    Route::post('/updated/{id}', [ShipmentDistricController::class, 'UpdateDistrict'])->name('update.district');
    Route::get('/deleted/{id}', [ShipmentDistricController::class, 'DeleteDistrict'])->name('delete.district');
});

// --------------------- Shipment States Routes For Admin----------------------------
route::prefix('state')->group(function () {
    Route::get('/view', [ShipmentDistricController::class, 'ViewState'])->name('view.states');
    Route::post('/added', [ShipmentDistricController::class, 'AddState'])->name('add.state');
    Route::get('/updated/view/{id}', [ShipmentDistricController::class, 'ViewUpdateState'])->name('view.update.state');
    Route::post('/updated/{id}', [ShipmentDistricController::class, 'UpdateState'])->name('update.state');
    Route::get('/deleted/{id}', [ShipmentDistricController::class, 'DeleteState'])->name('delete.state');
});
// --------------------- Orders Routes For Admin----------------------------
route::prefix('orders')->group(function () {
    Route::get('/pending-orders', [AdmiOrderController::class, 'ViewPendingOrders'])->name('view.pending.orders');
    Route::get('/pending-order/details/{id}', [AdmiOrderController::class, 'ViewPendingOrderDetails'])->name('pending.order.details');
    Route::get('/processing-order', [AdmiOrderController::class, 'ViewProcessingOrders'])->name('view.processing.orders');
    Route::get('/confirmed-order', [AdmiOrderController::class, 'ViewConfirmedOrders'])->name('view.confirmed.orders');
    Route::get('/cancelled-order', [AdmiOrderController::class, 'ViewCanceledOrders'])->name('view.canceled.orders');
    Route::get('/delivered-order', [AdmiOrderController::class, 'ViewDeliveredOrders'])->name('view.delivered.orders');
    Route::get('/shipped-order', [AdmiOrderController::class, 'ViewShippedOrders'])->name('view.shipped.orders');
    Route::get('/confirm-status/{id}', [AdmiOrderController::class, 'ConfirmOrder'])->name('confirm.order');
    Route::get('/processed-status/{id}', [AdmiOrderController::class, 'ProcessOrder'])->name('process.order');
    Route::get('/shipped-status/{id}', [AdmiOrderController::class, 'ShipOrder'])->name('ship.order');
    Route::get('/deliverd-status/{id}', [AdmiOrderController::class, 'DeliverdOrder'])->name('delivered.order');
    Route::get('/cancelled-status/{id}', [AdmiOrderController::class, 'CancelleddOrder'])->name('cancel.order');
    Route::get('/download-invoice/{id}', [AdmiOrderController::class, 'DownloadInvoiceAdmin'])->name('admin.download.invoice');
});



}); // Auth middleware admin end




// ------------------------ User Auth Routes -------------------------
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $id = Auth::user()->id;
    $user = User::find($id);
    return view('dashboard', compact('user'));
})->name('dashboard');
Route::get('/user/logout', [HomeController::class, 'LogoutUser'])->name('user.logout');

// -------------------------User Profile Routes ----------------------------------
Route::get('/user/profile', [HomeController::class, 'GoToUserProfile'])->name('user.profile');
Route::post('/user/profile/update', [HomeController::class, 'UpdateUserProfile'])->name('update.user.profile');
Route::get('/user/profile/updatePassword', [HomeController::class, 'ViewUpdateUserPassword'])->name('view.user.update.password');
Route::post('/user/profile/passwordUpdated', [HomeController::class, 'UpdateUserPassword'])->name('update.user.password');

// ------------------------ User Home Routes -----------------------------
Route::get('/', [HomeController::class, 'index']);
// -------------------- Search Route -------------------------
Route::post('/product/search', [HomeController::class, 'SearchForProduct'])->name('search.product');


//---------------- Multi Language Routes ---------------------------------
Route::get('/language/lithuanian', [LanguageController::class, 'Lithuanian'])->name('lithuanian.language');

//---------------------- Product details route -------------------------
Route::get('/product/details/{id}/{slug}', [HomeController::class, 'ProductDetails']);

//-----------------Subcategory Wise data- -----------------
Route::get('/subcategory/product/{id}/{slug}', [HomeController::class, 'SubCategoryWiseProductView']);
Route::get('/sub_subcategory/product/{id}/{slug}', [HomeController::class, 'SubSubCategoryWiseProductView']);

// product cart view modal JS --------
Route::get('/product/view/modal/{id}', [HomeController::class, 'ProductViewCartModalAjax']);
// Add To cart -----------
Route::post('/cart/data/store/{id}', [CartController::class, 'AddProductToCart']);
// ------------------------ Add Carts ----------------------
Route::get('/product/mini/cart/', [CartController::class, 'AddMiniCart']);
// ----------- Remove Carts -----------------------------
Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'RemoveMiniCart']);
// --------- Add To WishList------------------------------
Route::group(['prefix'=>'user','middleware' => ['user','auth'],'namespace'=>'User'],function(){
    Route::post('/add-to-wishlist/{product_id}', [WishListController::class, 'AddToWishlist']);
    Route::get('/wishlist', [WishListController::class, 'ViewWishlist'])->name('wishlist');
    Route::get('/get-wishlist-product', [WishListController::class, 'GetWishlistProduct']);
    Route::get('/wishlist-remove/{id}', [WishListController::class, 'RemoveWishlistProduct']);
    // ------------ Order Management Routes -------------------------
    Route::get('/my/orders', [OrderController::class, 'MyOrders'])->name('user.orders');
    Route::get('/new/order/request', [OrderController::class, 'RequestNewProductView'])->name('request.new.product.view');
    Route::get('/order_details/{order_id}', [OrderController::class, 'OrderDetails']);
    Route::get('/invoice/{order_id}', [OrderController::class, 'InvoiceDownload']);
    Route::post('/cash/order', [CashController::class, 'CashOrder'])->name('cash.order');
});
// ----- Cart Get Products ---
Route::get('/mycart', [CartController::class, 'ViewCartPage'])->name('cart');
Route::get('/user/get-cart-product', [CartController::class, 'GetCartProduct']);
Route::get('/user/cart-remove/{id}', [CartController::class, 'CartRemove']);
Route::get('/cart-increment/{rowId}', [CartController::class, 'CartIncrement']);
Route::get('/cart-decrement/{rowId}', [CartController::class, 'CartDecrement']);
// ---------- Checkout Routes - --------------
Route::get('/checkout', [CartController::class, 'ViewCheckout'])->name('checkout');
Route::get('/district-get/ajax/{division_id}', [CheckoutController::class, 'DistrictGetAjax']);
Route::get('/state-get/ajax/{district_id}', [CheckoutController::class, 'StateGetAjax']);
Route::get('/state/view/ajax/{division_id}', [CheckoutController::class, 'DistrictGetAjax1']);
Route::post('/checkout/store', [CheckoutController::class, 'CheckoutStore'])->name('checkout.store');
// ------------- Payments----------------------------
Route::post('/stripe/order', [StripeController::class, 'StripeOrder'])->name('stripe.order');