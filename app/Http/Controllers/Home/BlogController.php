<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use Image;
use Illuminate\Support\Carbon; // Carbon for time


class BlogController extends Controller
{
    public function allBlog()
    {
        $all_blogs = Blog::latest()->get();
        return view('admin.admin_blog.all_blog', compact('all_blogs'));
    }

    public function addBlog()
    {
        $blogs_category =  BlogCategory::orderBy('blog_category', 'ASC')->get();
        return view('admin.admin_blog.add_blog', compact('blogs_category'));
    }

    public function storeBlog(Request $request)
    {
        // Error will be displayed with custom message 'Portfolio Name is Required'.
        // We can display default error message by removing 'portfolio_name.required' fields.
        $request->validate([
            'blog_category_id' => 'required|integer',
            'blog_title' =>'required',
            'blog_description' =>'required',
            'blog_image' => 'required',
            
        ]);        
       
        // assign image to $image
        $image = $request->file('blog_image');

        // generate unique name for image
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); 

        // resize image size by  (width)850x430(height) and save resized image at 'upload/home_slide/' with name of $name_gen
        Image::make($image)->resize(430, 327)->save('upload/home_blogs/'.$name_gen);

        // assign location of new image to $save_url
        $save_url = 'upload/home_blogs/'.$name_gen;

        // find the id of image being updated and updated below columns
        Blog::insert([
            'blog_category_id' => $request->blog_category_id,
            'blog_title' => $request->blog_title,
            'blog_tags' => $request->blog_tags,
            'blog_description' => $request->blog_description,
            'blog_image' => $save_url,
            'created_at' => Carbon::now()          

        ]);
       
        $notification = array (
            'message' => 'Blog Added Successfully!',
            'alert-type' => 'success'
        );
        
        // display notification
        return redirect()->route('all.blog')->with($notification); 
    }
    
    public function editBlog($id)
    {
        $edit_blogs = Blog::findOrFail($id);
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        return view('admin.admin_blog.edit_blog', compact('edit_blogs', 'categories'));
    }

    public function updateBlog(Request $request, $id)
    {
       

        if($request->file('blog_image'))
        {
            // remove the old image file from folder using 'unlink()'
            $old_image = Blog::find($id);
            $file_name = public_path('/'). $old_image->blog_image;
            unlink($file_name);

            // assign portfolio_image to $image variable 
            $image = $request->file('blog_image');

            // unique name for the image to be updated, ex: 128464978431112 .  jpg
            $unique_name = hexdec(uniqid()). '.'. $image->getClientOriginalExtension();

            // resize and save image to 'upload/home_portfolio/' with $unique_name
            Image::make($image)->resize(430, 327)->save('upload/home_blogs/'. $unique_name);

            // assign image url to $image_path variable
            $image_url = 'upload/home_blogs/'. $unique_name;

            // update database with new portfolio data
            BLog::findOrFail($id)->update([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,
                'blog_image' => $image_url

            ]);

            // Toastr notification
                $notification = array (
                'message' => 'Blog Updated With Image Successfully!',
                'alert-type' => 'success'
            );
            
            // display notification on back page which is the same page is being updated
            return redirect()->route('all.blog')->with($notification);         
        } else {

            // update database with new portfolio data
            Blog::findOrFail($id)->update([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description
                

            ]);

            // Toastr notification
                $notification = array (
                'message' => 'Blog Updated Without Image Successfully!',
                'alert-type' => 'success'
            );
            
            // display notification on back page which is the same page is being updated
            return redirect()->route('all.blog')->with($notification);
       }

    }

    public function deleteBlog($id)
    {
        $blog_to_be_deleted = Blog::findOrFail($id);

        $blog_image_url = $blog_to_be_deleted->blog_image;

        // to remove the image from folder
        unlink($blog_image_url);

        // to delete portfolio data from database
        Blog::findOrFail($id)->delete();

        $notification = array (
            'message' => 'Blog Deleted Successfully!',
            'alert-type' => 'success'
        );
        
        // display notification on back page which is the same page is being updated
        return redirect()->back()->with($notification);
    }
    
    public function blogDetail($id)
    {
        $all_blogs = Blog::latest()->limit(5)->get();
        $blog_details = Blog::findOrFail($id);
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        return view('frontend.home_blog.blog_detail', compact('blog_details', 'all_blogs', 'categories'));
    }

    public function blogCategory($id)
    {
        $blog_categories = Blog::where('blog_category_id', $id)->orderBy('id', 'DESC')->get();
        $all_blogs = Blog::latest()->limit(5)->get();
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        $category_name = BlogCategory::findOrFail($id);
        return view('frontend.home_blog.blog_category', compact('blog_categories', 'all_blogs', 'categories', 'category_name'));
    }
    
    public function homeBlog()
    {
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        $all_blogs = Blog::paginate(3);
        return view('frontend.blog', compact('all_blogs', 'categories'));
        
    } //end method

}