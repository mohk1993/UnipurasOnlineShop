<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function ViewSubCategories()
    {
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subcategory = SubCategory::latest()->get();
        return view('admin.categories.subcategory.subcategory_view', compact('subcategory','categories'));
    }

    // Insert new category entry to DB
    public function AddSubCategory(Request $request)
    {
        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_lith' => $request->subcategory_name_lith,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subcategory_name_en)),
            'subcategory_slug_lith' => str_replace(' ', '-', $request->subcategory_name_lith),
        ]);

        $notifications = array(
            'message' => 'SubCategory was inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notifications);
    }

    public function ViewUpdateSubCategory($id)
    {
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('admin.categories.subcategory.update_subcategory', compact('subcategory','categories'));
    }

    public function UpdateSubCategory(Request $request)
    {
        $subcategory_id = $request->id;

        SubCategory::findOrFail($subcategory_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_lith' => $request->subcategory_name_lith,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subcategory_name_en)),
            'subcategory_slug_lith' => str_replace(' ', '-', $request->subcategory_name_lith),
        ]);

        $notifications = array(
            'message' => 'SubCategory was updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('view.subcategory')->with($notifications);
    }

    // ======================= Delete Category Data ====================
    public function DeleteSubCategory($id) {
        SubCategory::findOrFail($id)->delete();
        $notifications = array(
            'message' => 'SubCategory was deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notifications);
    }
}
