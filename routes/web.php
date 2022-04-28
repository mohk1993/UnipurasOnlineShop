<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\PartnerController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubSubCategoryController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\LanguageController;
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

//---------------- Multi Language Routes ---------------------------------
Route::get('/language/english', [LanguageController::class, 'English'])->name('english.language');
Route::get('/language/lithuanian', [LanguageController::class, 'Lithuanian'])->name('lithuanian.language');

//---------------------- Product details route -------------------------
Route::get('/product/details/{id}/{slug}', [HomeController::class, 'ProductDetails']);

//-----------------Subcategory Wise data- -----------------
Route::get('/subcategory/product/{id}/{slug}', [HomeController::class, 'SubCategoryWiseProductView']);
Route::get('/sub_subcategory/product/{id}/{slug}', [HomeController::class, 'SubSubCategoryWiseProductView']);
