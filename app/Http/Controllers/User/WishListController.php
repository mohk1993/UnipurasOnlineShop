<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    //
    public function ViewWishlist()
    {
        return view('user.wishlist.view_wishlist');
    }

    public function GetWishlistProduct()
    {
        $wishlist = WishList::with('product')->where('user_id', Auth::id())->latest()->get();
        return response()->json($wishlist);
    }

    public function RemoveWishlistProduct($id)
    {
        WishList::where('user_id', Auth::id())->where('id', $id)->delete();
        if (session()->get('language') == 'lithuanian') {
            return response()->json(['success' => 'Produktas buvo sėkmingai pašalintas']);
        } else
            return response()->json(['success' => ' Product was Removed Successfully']);
    }

    public function AddToWishlist(Request $request, $product_id)
    {
        if (Auth::check()) {

            $exists = WishList::where('user_id', Auth::id())->where('product_id', $product_id)->first();

            if (!$exists) {
                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'created_at' => Carbon::now(),
                ]);
                if (session()->get('language') == 'lithuanian') {
                    return response()->json(['success' => 'Sėkmingai įtraukta į jūsų pageidavimų sąrašą']);
                } else {
                    return response()->json(['success' => 'Successfully Added On Your Wishlist']);
                }
            } else {
                if (session()->get('language') == 'lithuanian') {
                    return response()->json(['error' => 'Šis produktas jau įtrauktas į jūsų pageidavimų sąrašą']);
                } else {
                    return response()->json(['error' => 'This Product Already On Your Wishlist']);
                }
            }
        } else {
            if (session()->get('language') == 'lithuanian') {
                $notification = array(
                    'message' => 'Pirmiausia prisijunkite prie savo paskyros',
                    'alert-type' => 'error'
                );
            } else {
                $notification = array(
                    'message' => 'Please Login To Your Account First',
                    'alert-type' => 'error'
                );
            }
        }
        return redirect()->back()->with($notification);
    }
}
