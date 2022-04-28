<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
class SliderController extends Controller
{
     // Queiry the data from database to the UI
     public function ViewSliders()
     {
         $sliders = Slider::latest()->get();
         return view('admin.sliders.sliders_view', compact('sliders'));
     }
     // View the add slider page
     public function ViewAddSlider()
     {
         return view('admin.sliders.add_slider_view');
     }
     // Insert new slider entry to DB
     public function AddSlider(Request $request)
     {
 
         $image = $request->file('slider_image');
         $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
         Image::make($image)->resize(1024, 715)->save('upload/slider-images/' . $name_gen);
         $save_url = 'upload/slider-images/' . $name_gen;
 
         Slider::insert([
             'slider_name_en' => $request->slider_name_en,
             'slider_name_lith' => $request->slider_name_lith,
             'slider_description_en' => $request->slider_description_en,
             'slider_description_lith' => $request->slider_description_lith,
             'slider_status' => 1,
             'slider_slug_en' => strtolower(str_replace(' ', '-', $request->slider_name_en)),
             'slider_slug_lith' => str_replace(' ', '-', $request->slider_name_lith),
             'slider_image' => $save_url,
         ]);
 
         $notifications = array(
             'message' => 'Slider was inserted successfully',
             'alert-type' => 'success'
         );
         return redirect()->back()->with($notifications);
     }
 // ================= View the slider update page  ===================================
     public function ViewUpdateSlider($id)
     {
         $slider = Slider::findOrFail($id);
         return view('admin.sliders.update_slider', compact('slider'));
     }
 // =============== Update slider Info =================================
     public function UpdateSlider(Request $request)
     {
         $slider_id = $request->id;
         $current_image = $request->current_image;
         if ($request->file('slider_image')) {
             unlink($current_image);
             $image = $request->file('slider_image');
             $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
             Image::make($image)->resize(1024, 715)->save('upload/slider-images/' . $name_gen);
             $save_url = 'upload/slider-images/' . $name_gen;
 
             Slider::findOrFail($slider_id)->update([
                 'slider_name_en' => $request->slider_name_en,
                 'slider_name_lith' => $request->slider_name_lith,
                 'slider_description_en' => $request->slider_description_en,
                 'slider_description_lith' => $request->slider_description_lith,
                 'slider_status' => 1,
                 'slider_slug_en' => strtolower(str_replace(' ', '-', $request->slider_name_en)),
                 'slider_slug_lith' => str_replace(' ', '-', $request->slider_name_lith),
                 'slider_image' => $save_url,
             ]);
 
             $notifications = array(
                 'message' => 'Slider was updated successfully',
                 'alert-type' => 'success'
             );
             return redirect()->route('view.sliders')->with($notifications);
         } else {
             Slider::findOrFail($slider_id)->update([
                'slider_name_en' => $request->slider_name_en,
                'slider_name_lith' => $request->slider_name_lith,
                'slider_description_en' => $request->slider_description_en,
                'slider_description_lith' => $request->slider_description_lith,
                'slider_status' => 1,
                'slider_slug_en' => strtolower(str_replace(' ', '-', $request->slider_name_en)),
                'slider_slug_lith' => str_replace(' ', '-', $request->slider_name_lith),
             ]);
 
             $notifications = array(
                 'message' => 'Slider was updated successfully',
                 'alert-type' => 'success'
             );
             return redirect()->route('view.sliders')->with($notifications);
         }
     }
 // ======================= Delete slider Data ====================
     public function DeleteSlider($id) {
         $slider = Slider::findOrFail($id);
         $image = $slider->slider_image;
         unlink($image);
 
         Slider::findOrFail($id)->delete();
         $notifications = array(
             'message' => 'Slider was deleted successfully',
             'alert-type' => 'success'
         );
         return redirect()->back()->with($notifications);
     }

     public function InactiveSlider($id) {
        Slider::findOrFail($id)->update(['slider_status' => 0]);
        $notification = array(
            'message' => 'Slider Deactivated',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function ActiveSlider($id) {
        Slider::findOrFail($id)->update(['slider_status' => 1]);
        $notification = array(
            'message' => 'Slider Activated',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
