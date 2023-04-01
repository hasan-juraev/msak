<?php

namespace App\Http\Controllers\Home;
use App\Models\HomeSlide;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;


class HomeSliderController extends Controller
{
    // homeSlideSetup
    public function homeSlideSetup()
    {
       $homeslide =  HomeSlide::find(1);
       return view('admin.home_slide.home_slide_all', compact('homeslide'));
        
    }// end method

    // updateSlide method
    public function updateSlide(Request $request)
    { 
        
        $slide_id = $request->id; 
        
        // check if there is any image is uploaded
        if($request->file('home_slide'))
        {
            // assign image to $image
            $image = $request->file('home_slide');

            // generate unique name for image
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); 

            // resize image size by  (width)636x852(height) and save resized image at 'upload/home_slide/' with name of $name_gen
            Image::make($image)->resize(636, 852)->save('upload/home_slide/'.$name_gen);

            // assign location of new image to $save_url
            $save_url = 'upload/home_slide/'.$name_gen;

            // find the id of image being updated and updated below columns
            HomeSlide::findOrFail($slide_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'home_slide' => $save_url,
                'video_url' => $request->video_url,

            ]);

            // toastr notification
            $notification = array (
                'message' => 'Home Slide Updated With Image Successfully!',
                'alert-type' => 'success'
            );
            
            // display notification on back page which is the same page is being updated
            return redirect()->back()->with($notification);

        } else {
             // find the id of image being updated and updated below columns
             HomeSlide::findOrFail($slide_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,                
                'video_url' => $request->video_url,

            ]);

            // toastr notification
            $notification = array (
                'message' => 'Home Slide Updated Without Image Successfully!',
                'alert-type' => 'success'
            );
            
            // display notification on back page which is the same page is being updated
            return redirect()->back()->with($notification);
        }       

    } //end method

  

}
