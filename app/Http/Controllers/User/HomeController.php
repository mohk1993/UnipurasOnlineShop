<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Partner;
use App\Models\Product;
use App\Models\ProductMultiImg;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index() {
        $partners = Partner::latest()->get();
        $sliders = Slider::where('slider_status',1)->orderBy('id','DESC')->limit(3)->get();
        $products = Product::where('product_status',1)->orderBy('id','DESC')->get();
        $categories = Category::orderBy('category_name_en','ASC')->get();
        return view('user.index',compact('categories','sliders','products','partners'));
    }
   
    public function LogoutUser(){
        Auth::logout();
        return Redirect()->route('login');
    }
    public function GoToUserProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('user.profile.user_profile',compact('user'));
    }
    public function UpdateUserProfile(Request $request){
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            @unlink(public_path('user-images/'.$data->profile_photo_path));
            $fileName = date('Ymdhi').$file->getClientOriginalName();
            $file->move(public_path('user-images'),$fileName);
            $data['profile_photo_path'] = $fileName;
        }
        $data->save();

        $notifications = array(
            'message' => 'Profile was updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('dashboard')->with($notifications);
    }

    public function ViewUpdateUserPassword(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('user.profile.update_password',compact('user'));
    }

    public function UpdateUserPassword(Request $request)
    {
        $validate = $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPass = Auth::user()->password;
        $hashed = Hash::check($request->current_password,$hashedPass);
        if(Hash::check($request->current_password,$hashedPass)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('user.logout');
        }else{
            return redirect()->back();
        }
    }

    public function ProductDetails($id,$slug) {
        $product = Product::findOrFail($id);
        $multiImg = ProductMultiImg::where('product_id',$id)->get();
        $categoryId = $product->category_id;
        $similarProducts = Product::where('category_id',$categoryId)->where('id','!=',$id)->orderBy('id','DESC')->get();
        return view('user.products.product_details',compact('product','multiImg','similarProducts'));
    }

    public function SubCategoryWiseProductView($id,$slug) {
        $products = Product::where('product_status',1)->where('subcategory_id',$id)->orderBy('id','DESC')->paginate(3);
        $categories = Category::orderBy('category_name_en','ASC')->get();
        return view('user.products.subcategory_view',compact('categories','products'));
    }
    public function SubSubCategoryWiseProductView($id,$slug) {
        $products = Product::where('product_status',1)->where('sub_subcategory_id',$id)->orderBy('id','DESC')->paginate(3);
        $categories = Category::orderBy('category_name_en','ASC')->get();
        return view('user.products.sub_subcategory_view',compact('categories','products'));
    }

    public function ProductViewCartModalAjax($id) {
        $product = Product::findOrFail($id);
        return response()->json(array(
            'product' => $product,
        ));
    }

    public function SearchForProduct(Request $request) {
        $item = $request->search;
        $products = DB::table('products')->where('product_name_en','LIKE',"%$item%")->paginate(20);
        return view('user.search.search',compact('products'));
    }
}
