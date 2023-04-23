<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use Illuminate\Support\Carbon;

class BlogCategoryController extends Controller
{
    public function AllBlogCategory()
    {   
        $blog_category = BlogCategory::latest()->get();
        return view('admin.home_blog.all_blog_category', compact('blog_category'));
    } // end method

    public function AddBlogCategory()
    {
        return view('admin.home_blog.add_blog_category');
    } // end method

    public function storeBlogCategory(Request $request)    
    {   
        BlogCategory::insert([
            'blog_category' => $request->blog_category,            
            'created_at' => Carbon::now()          

        ]);
       
        $notification = array (
            'message' => 'Blog Category Added Successfully!',
            'alert-type' => 'success'
        );
        
        // display notification
        return redirect()->route('all.blog.category')->with($notification);  
    } // end method

    public function editBlogCategory($id)
    {
        $edit_blog_categories = BlogCategory::findOrFail($id);
        return view('admin.home_blog.edit_blog_category', compact('edit_blog_categories'));
    } // end method

    public function updateBlogCategory(Request $request, $id)
    {
        // update database with new data
         BlogCategory::findOrFail($id)->update([
            'blog_category' => $request->blog_category           

        ]);

        // Toastr notification
            $notification = array (
            'message' => 'Blog Category Updated Successfully!',
            'alert-type' => 'success'
        );
        
        // display notification on back page which is the same page is being updated
        return redirect()->route('all.blog.category')->with($notification);   
    } // end method

    public function deleteBlogCategory($id)
    {     

        // to delete portfolio data from database
        BlogCategory::findOrFail($id)->delete();

        $notification = array (
            'message' => 'Blog Category Deleted Successfully!',
            'alert-type' => 'success'
        );
        
        // display notification on back page which is the same page is being updated
        return redirect()->back()->with($notification);

    }
}
