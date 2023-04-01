<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutPage; // to fetch data from `about_pages` table which stores About Page data
use App\Models\MultiImage; // to fetch data from `multi_images` table which stores multiple images of About Page
use Image; // to resize images
use Illuminate\Support\Carbon; // Carbon for time

class AboutController extends Controller
{
    // =============================================================== 
    public function aboutPageSetUp ()
    {
        // store user id from Auth::user in $id
        $about =  AboutPage::find(1);
        return view('admin.home_about.home_about_all', compact('about'));

    } // end method

    
    public function updateAbout(Request $request)
    { 
        // assign data id from $request which is attained from POST method to $slide_id
        $slide_id = $request->id;
        
        // check if there is any image is uploaded
        if($request->file('about_me_image'))
        {
            // assign image to $image
            $image = $request->file('about_me_image');

            // generate unique name for image
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); 

            // resize image size by  (width)636x852(height) and save resized image at 'upload/home_slide/' with name of $name_gen
            Image::make($image)->resize(523, 605)->save('upload/home_about/'.$name_gen);

            // assign location of new image to $save_url
            $save_url = 'upload/home_about/'.$name_gen;

            // find the id of image being updated and updated below columns
            AboutPage::findOrFail($slide_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'long_description' => $request->long_description,
                'about_me_image' => $save_url,
                

            ]);

            // Toastr notification
            $notification = array (
                'message' => 'Home About Page Updated With Image Successfully!',
                'alert-type' => 'success'
            );
            
            // display notification on back page which is the same page is being updated
            return redirect()->back()->with($notification);

        } else {
             // find the id of image being updated and updated below columns
             AboutPage::findOrFail($slide_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'long_description' => $request->long_description,
                

            ]);

            // Toastr notification
            $notification = array (
                'message' => 'Home About Page Updated Without Image Successfully!',
                'alert-type' => 'success'
            );
            
            // display notification on back page which is the same page is being updated
            return redirect()->back()->with($notification);
        }

    } //end method

   
    public function AboutPageView ()
    {
        // store user id from Auth::user in $id
        $aboutPageView =  AboutPage::find(1);
        return view('frontend.home_about_all.about_page', compact('aboutPageView'));

    } // end method


    // About Page Multi Image, to upload multiple images for About Page
    public function AboutMultiImage ()
    {       
       
        return view('admin.home_about.multi_image');

    } // end method


    // Multi Image Store, Insert into database ===============================================================
    // Request $request is used to process POST route
    public function StoreMultiImage (Request $request)
    {
        
        // assign 'multi_image' value to $image variable
        $image = $request->file('multi_image');

        foreach($image as $single_image){

            // give unique name
            $name_gen = hexdec(uniqid()).'.'.$single_image->getClientOriginalExtension();

            // resize image
            Image::make($single_image)->resize(220, 220)->save('upload/about_multi_images/'.$name_gen);

            // assign path of image to $save_url variable
            $save_url = 'upload/about_multi_images/'.$name_gen;

            // MultiImage is database model name which stores multi images
            MultiImage::insert([

                'multi_image' => $save_url,
                'created_at' => Carbon::now()
            ]);

        } // end foreach loop

        // notification will be displayed after successfully insert
        $notification = array(
            'message' => 'Multi Image Uploaded Successfully!',
            'alert-type' => 'success'
        );

        // after inserting to database, redirect to back page with notificaion
        return redirect()->route('all.multi.image')->with($notification);
      
    } // end method

    
    public function AllMultiImage()
    {
        $allMultiImage = MultiImage::all();
        // send all data fetched from database to 'all_multiimage.blade.php' page
        return view( 'admin.home_about.all_multiimage', compact('allMultiImage') );
    } // end method

    // Edit a single imge within multi images
    public function EditMultiImage ($id)
    {
        $editMultiImage = MultiImage::findOrFail($id);
        return view('admin.home_about.edit_multi_image', compact('editMultiImage'));
    } // end method


    
    public function UpdateMultiImage(Request $request)
    {
        // assign data id from $request which is attained from POST method to $slide_id
        $single_image_id = $request->id;
        
        // check if there is any image is uploaded
        if($request->file('multi_image'))
        {
            // remove the old image file from folder using 'unlink()'
            $oldImage = MultiImage::find($single_image_id);
            $file_name = public_path('/').$oldImage->multi_image;
            unlink($file_name);
                        

            // assign image to $image
            $image = $request->file('multi_image');

            // generate unique name for image
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); 

            // resize image size by  (width)220x220(height) and save resized image at 'upload/home_slide/' with name of $name_gen
            Image::make($image)->resize(220, 220)->save('upload/about_multi_images/'.$name_gen);

            // assign location of new image to $save_url
            $save_url = 'upload/about_multi_images/'.$name_gen;

            // find the id of image being updated and updated below columns
            MultiImage::findOrFail($single_image_id)->update([                
                'multi_image' => $save_url,
                

            ]);
            
            $notification = array (
                'message' => 'Multi Image Updated Image Successfully!',
                'alert-type' => 'success'
            );
            
            // display notification on back page which is the same page is being updated
            return redirect()->route('all.multi.image')->with($notification);
        }

    } // end method

    public function DeleteMultiImage($id)
    {
        $deleteMultiImage = MultiImage::findOrFail($id);
        $image = $deleteMultiImage->multi_image;

        unlink($image);

        MultiImage::findOrFail($id)->delete();

        $notification = array (
            'message' => 'Image Deleted Successfully!',
            'alert-type' => 'success'
        );
        
        // display notification on back page which is the same page is being updated
        return redirect()->back()->with($notification);

    } // end method

    

}
