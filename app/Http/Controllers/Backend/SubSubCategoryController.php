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
        $subcategories = SubCategory::orderBy('subcategory_name_en','ASC')->get();
        $subsubcategory = SubSubCategory::latest()->get();
        return view('admin.categories.subcategory.subsubcategory.subsubcategory_view', compact('subsubcategory','categories','subcategories'));
    }
    public function GetSubSubCategory($subcategory_id)
    {
        $subSubCategory = SubSubCategory::where('subcategory_id',$subcategory_id)->orderBy('sub_subcategory_name_en','ASC')->get();
        return json_encode($subSubCategory);
    }
    // Insert new category entry to DB
    public function AddSubSubCategory(Request $request)
    {
        SubSubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'sub_subcategory_name_en' => $request->subsubcategory_name_en,
            'sub_subcategory_name_lith' => $request->subsubcategory_name_lith,
            'sub_subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subsubcategory_name_en)),
            'sub_subcategory_slug_lith' => str_replace(' ', '-', $request->subsubcategory_name_lith),
        ]);

        $notifications = array(
            'message' => 'Sub-SubCategory was inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notifications);
    }

    public function ViewUpdateSubSubCategory($id)
    {
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subcategories = SubCategory::orderBy('subcategory_name_en','ASC')->get();
        $subsubcategory = SubSubCategory::findOrFail($id);
        return view('admin.categories.subcategory.subsubcategory.update_subsubcategory', compact('subsubcategory','categories','subcategories'));
    }

    public function UpdateSubSubCategory(Request $request)
    {
        $subsubcategory_id = $request->id;

        SubSubCategory::findOrFail($subsubcategory_id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'sub_subcategory_name_en' => $request->subsubcategory_name_en,
            'sub_subcategory_name_lith' => $request->subsubcategory_name_lith,
            'sub_subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subsubcategory_name_en)),
            'sub_subcategory_slug_lith' => str_replace(' ', '-', $request->subsubcategory_name_lith),
        ]);

        $notifications = array(
            'message' => 'Sub-SubCategory was updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('view.subsubcategory')->with($notifications);
    }

    // ======================= Delete Category Data ====================
    public function DeleteSubSubCategory($id) {
        SubSubCategory::findOrFail($id)->delete();
        $notifications = array(
            'message' => 'Sub-SubSubCategory was deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notifications);
    }
}
