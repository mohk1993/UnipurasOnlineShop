<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Catch_;

class CategoryController extends Controller
{
    public function ViewCategories()
    {
        $categories = Category::latest()->get();
        return view('admin.categories.categories_view', compact('categories'));
    }

    // Insert new category entry to DB
    public function AddCategory(Request $request)
    {
        $request->validate([
            'category_name_en' => 'required',
            'category_name_lith' => 'required',
        ], [
            'category_name_en.required' => 'Please enter category name in English',
            'category_name_lith.required' => 'Please enter category name in Lithuanian',

        ]);

        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_lith' => $request->category_name_lith,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
            'category_slug_lith' => str_replace(' ', '-', $request->category_name_lith),
            'category_icon' => " ",
        ]);

        $notifications = array(
            'message' => 'Category was inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notifications);
    }

    public function ViewUpdateCategory($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.update_category', compact('category'));
    }

    public function UpdateCategory(Request $request)
    {
        $request->validate([
            'category_name_en' => 'required',
            'category_name_lith' => 'required',
        ], [
            'category_name_en.required' => 'Please enter category name in English',
            'category_name_lith.required' => 'Please enter category name in Lithuanian',
        ]);

        $category_id = $request->id;

        Category::findOrFail($category_id)->update([
            'category_name_en' => $request->category_name_en,
            'category_name_lith' => $request->category_name_lith,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
            'category_slug_lith' => str_replace(' ', '-', $request->category_name_lith),
            'category_icon' => " ",
        ]);

        $notifications = array(
            'message' => 'Category was updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('view.category')->with($notifications);
    }

    // ======================= Delete Category Data ====================
    public function DeleteCategory($id) {
        $category = Category::findOrFail($id);

        Category::findOrFail($id)->delete();
        $notifications = array(
            'message' => 'Category was deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notifications);
    }
}
