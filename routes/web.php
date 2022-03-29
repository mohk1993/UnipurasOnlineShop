<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\User\HomeController;
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
Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){
	Route::get('/login', [AdminController::class, 'loginForm']);
	Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
// ----------- Admin Profile Routes ----------------------------------------
Route::get('/admin/profile', [AdminProfileController::class, 'adminProfile'])->name('admin.profile');
Route::get('/admin/profile/edit', [AdminProfileController::class, 'adminProfileEdit'])->name('edit.admin.profile');
Route::post('/admin/profile/update', [AdminProfileController::class, 'adminProfileUpdate'])->name('update.admin.profile');
Route::get('/admin/password/change', [AdminProfileController::class, 'changeAdminPassword'])->name('change.admin.password');
Route::post('/admin/password/changed', [AdminProfileController::class, 'updateAdminPassword'])->name('admin.password.changed');


// ------------------------ User Auth Routes -------------------------
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $id = Auth::user()->id;
    $user = User::find($id);
    return view('dashboard',compact('user'));
})->name('dashboard');
Route::get('/user/logout', [HomeController::class, 'LogoutUser'])->name('user.logout');

// -------------------------User Profile Routes ----------------------------------
Route::get('/user/profile', [HomeController::class, 'GoToUserProfile'])->name('user.profile');
Route::post('/user/profile/update', [HomeController::class, 'UpdateUserProfile'])->name('update.user.profile');
Route::get('/user/profile/updatePassword', [HomeController::class, 'ViewUpdateUserPassword'])->name('view.user.update.password');
Route::post('/user/profile/passwordUpdated', [HomeController::class, 'UpdateUserPassword'])->name('update.user.password');

// ------------------------ User Home Routes -----------------------------
Route::get('/', [HomeController::class, 'index']);
