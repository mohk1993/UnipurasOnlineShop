<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductMultiImg;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{
    //
    // View the product page
    public function ViewProducs()
    {
        $products = Product::latest()->get();
        return view('admin.products.products_view', compact('products'));
    }
    // View the Add product page
    public function ViewAddProduc()
    {
        $categories = Category::latest()->get();
        return view('admin.products.add_product', compact('categories'));
    }
    // View the Update product page
    public function ViewUpdateProduc($id)
    {
        $multiImages = ProductMultiImg::where('product_id',$id)->get();
        $categories = Category::latest()->get();
        $sub_categories = SubCategory::latest()->get();
        $sub_subcategories = SubSubCategory::latest()->get();
        $products = Product::findOrFail($id);
        return view('admin.products.update_product', compact('categories', 'sub_categories', 'sub_subcategories', 'products','multiImages'));
    }
    //  Add product 
    public function AddProduc(Request $request)
    {

        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(1024, 715)->save('upload/product-images/' . $name_gen);
        $save_url = 'upload/product-images/' . $name_gen;

        $product_id = Product::insertGetId([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'sub_subcategory_id' => $request->sub_subcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_lith' => $request->product_name_lith,
            'product_slug_en' => strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_lith' => str_replace(' ', '-', $request->product_name_lith),
            'product_code' => $request->product_code,
            'product_model_en' => $request->product_model_en,
            'product_model_lith' => $request->product_model_lith,
            'product_qty' => $request->product_qty,
            'matirial_type_en' => $request->matirial_type_en,
            'matirial_type_lith' => $request->matirial_type_lith,
            'product_price' => $request->product_price,
            'height' => $request->height,
            'diameter_inner' => $request->diameter_inner,
            'diameter_outer' => $request->diameter_outer,
            'thickness' => $request->thickness,
            'length' => $request->length,
            'radius' => $request->radius,
            'width' => $request->width,
            'product_thambnail' => $save_url,
            'product_short_dic_en' => $request->product_short_dic_en,
            'product_short_dic_lith' => $request->product_short_dic_lith,
            'product_long_dic_en' => $request->product_long_dic_en,
            'product_long_dic_lith' => $request->product_long_dic_lith,
            'product_status' => 1,
            'created_at' => Carbon::now(),
        ]);

        $images = $request->file('img_name');
        foreach ($images as $img) {
            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('upload/product-multiImages/' . $make_name);
            $uploadPath = 'upload/product-multiImages/' . $make_name;

            ProductMultiImg::insert([
                'product_id' => $product_id,
                'img_name' => $uploadPath,
                'created_at' => Carbon::now(),
            ]);
        }

        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('view.products')->with($notification);
    }

    public function UpdateProduc(Request $request)
    {
        $product_id = $request->id;

        Product::findOrFail($product_id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'sub_subcategory_id' => $request->sub_subcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_lith' => $request->product_name_lith,
            'product_slug_en' => strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_lith' => str_replace(' ', '-', $request->product_name_lith),
            'product_code' => $request->product_code,
            'product_model_en' => $request->product_model_en,
            'product_model_lith' => $request->product_model_lith,
            'product_qty' => $request->product_qty,
            'matirial_type_en' => $request->matirial_type_en,
            'matirial_type_lith' => $request->matirial_type_lith,
            'product_price' => $request->product_price,
            'height' => $request->height,
            'diameter_inner' => $request->diameter_inner,
            'diameter_outer' => $request->diameter_outer,
            'thickness' => $request->thickness,
            'length' => $request->length,
            'radius' => $request->radius,
            'width' => $request->width,
            'product_short_dic_en' => $request->product_short_dic_en,
            'product_short_dic_lith' => $request->product_short_dic_lith,
            'product_long_dic_en' => $request->product_long_dic_en,
            'product_long_dic_lith' => $request->product_long_dic_lith,
            'product_status' => 1,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Product Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('view.products')->with($notification);
    }

    public function UpdateProducImage(Request $request) {
        $images = $request->img_name;

        foreach($images as $id=> $image){
            $deleteOldImg = ProductMultiImg::findOrFail($id);
            unlink($deleteOldImg->img_name);
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1024, 715)->save('upload/product-multiImages/' . $name_gen);
            $save_url = 'upload/product-multiImages/' . $name_gen;
            ProductMultiImg::where('id',$id)->update([
                'img_name' => $save_url,
                'updated_at' => Carbon::now(),
            ]);
        }

        $notification = array(
            'message' => 'Product Images Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

    public function UpdateProducThumbnail(Request $request) {
        $productId = $request->id;
        $oldImage = $request->old_img;
        unlink($oldImage);

        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(1024, 715)->save('upload/product-images/' . $name_gen);
        $save_url = 'upload/product-images/' . $name_gen; 
        
        Product::findOrFail($productId)->update([
            'product_thambnail' => $save_url,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Product thumbnail Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

    public function DeleteProducMultiImage($id) {
        $oldImage = ProductMultiImg::findOrFail($id);
        unlink($oldImage->img_name);
        ProductMultiImg::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Product multi images deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

    public function InactiveProduc($id) {
        Product::findOrFail($id)->update(['product_status' => 0]);
        $notification = array(
            'message' => 'Product Deactivated',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function ActiveProduc($id) {
        Product::findOrFail($id)->update(['product_status' => 1]);
        $notification = array(
            'message' => 'Product Activated',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function DeleteProduc($id) {
        $productId = Product::findOrFail($id);
        unlink($productId->product_thambnail);
        Product::findOrFail($id)->delete();

        $imageMulti = ProductMultiImg::where('product_id',$id)->get();
        foreach($imageMulti as $image){
            unlink($image->img_name);
            ProductMultiImg::where('product_id',$id)->delete();
        }

        $notification = array(
            'message' => 'Product deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
