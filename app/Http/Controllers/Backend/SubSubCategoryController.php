<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class SubSubCategoryController extends Controller
{
    public function ViewSubSubCategories()
    {
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subsubcategory = SubSubCategory::latest()->get();
        return view('admin.categories.subcategory.subsubcategory.subsubcategory_view', compact('subsubcategory','categories'));
    }

    public function GetSubCategory($category_id)
    {
        $subcategory = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_en','ASC')->get();
        return json_encode($subcategory);
    }

    // Insert new category entry to DB
    public function AddSubSubCategory(Request $request)
    {
        SubSubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_lith' => $request->subsubcategory_name_lith,
            'subsubcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subsubcategory_name_en)),
            'subsubcategory_slug_lith' => str_replace(' ', '-', $request->subsubcategory_name_lith),
        ]);

        $notifications = array(
            'message' => 'SubSubCategory was inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notifications);
    }

    public function ViewUpdateSubSubCategory($id)
    {
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subsubcategory = SubSubCategory::findOrFail($id);
        return view('admin.categories.subsubcategory.update_subsubcategory', compact('subsubcategory','categories'));
    }

    public function UpdateSubSubCategory(Request $request)
    {
        $subsubcategory_id = $request->id;

        SubSubCategory::findOrFail($subsubcategory_id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_lith' => $request->subsubcategory_name_lith,
            'subsubcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subsubcategory_name_en)),
            'subsubcategory_slug_lith' => str_replace(' ', '-', $request->subsubcategory_name_lith),
        ]);

        $notifications = array(
            'message' => 'SubSubCategory was updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('view.subsubcategory')->with($notifications);
    }

    // ======================= Delete Category Data ====================
    public function DeleteSubSubCategory($id) {
        SubSubCategory::findOrFail($id)->delete();
        $notifications = array(
            'message' => 'SubSubSubCategory was deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notifications);
    }
}
