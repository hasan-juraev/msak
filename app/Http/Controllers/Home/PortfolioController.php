<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use Image;
use Illuminate\Support\Carbon; // Carbon for time

class PortfolioController extends Controller
{
    public function AllPortfolio()
    {
        // Assign latest data from database table to $portfolio
        $portfolio = Portfolio::latest()->get();
        return view('admin.admin_portfolio.admin_portfolio_all', compact('portfolio'));

    } // end method

    public function AddPortfolio()
    {
        return view('admin.admin_portfolio.admin_portfolio_add');
    } // end method

    public function StorePortfolio(Request $request)
    {   
        $request->validate([
            'portfolio_name' => 'required',
            'portfolio_title' =>'required',
            'portfolio_image' => 'required',
            
        ],[
            'portfolio_name.required' => 'Portfolio Name is Required',
            'portfolio_title.required' => 'Portfolio Title is Required',
            'portfolio_title.required' => 'Portfolio Image is Required',
        ]); // Error will be displayed with custom message 'Portfolio Name is Required'.
        // We can display default error message by removing 'portfolio_name.required' fields.
       
        // assign image to $image
        $image = $request->file('portfolio_image');

        // generate unique name for image
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); 

        // resize image size by  (width)636x852(height) and save resized image at 'upload/home_slide/' with name of $name_gen
        Image::make($image)->resize(1020, 519)->save('upload/home_portfolio/'.$name_gen);

        // assign location of new image to $save_url
        $save_url = 'upload/home_portfolio/'.$name_gen;

        // find the id of image being updated and updated below columns
        Portfolio::insert([
            'portfolio_name' => $request->portfolio_name,
            'portfolio_title' => $request->portfolio_title,
            'portfolio_description' => $request->portfolio_description,
            'portfolio_image' => $save_url,
            'created_at' => Carbon::now()          

        ]);
       
        $notification = array (
            'message' => 'Portfolio Added With Image Successfully!',
            'alert-type' => 'success'
        );
        
        // display notification
        return redirect()->route('all.portfolio')->with($notification);            

    } //end method

    public function EditPortfolio($id)
    {
        $edit_portfolio = Portfolio::findOrFail($id);
        return view('admin.admin_portfolio.edit_portfolio', compact('edit_portfolio'));
    }


    public function UpdatePortfolio(Request $request)
    {
        $portfolio_id = $request->id;

        if($request->file('portfolio_image'))
        {   
            // remove the old image file from folder using 'unlink()'
            $old_image = Portfolio::find($portfolio_id);
            $file_name = public_path('/'). $old_image->portfolio_image;
            unlink($file_name);

            // assign portfolio_image to $image variable 
            $image = $request->file('portfolio_image');

            // unique name for the image to be updated, ex: 128464978431112 . jpg
            $unique_name = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();

            // resize and save image to 'upload/home_portfolio/' with $unique_name
            Image::make($image)->resize(1020, 519)->save('upload/home_portfolio/'. $unique_name);

            // assign image url to $image_path variable
            $image_url = 'upload/home_portfolio/'. $unique_name;

            // update database with new portfolio data
            Portfolio::findOrFail($portfolio_id)->update([
                'portfolio_title' => $request->portfolio_title,
                'portfolio_name' => $request->portfolio_name,
                'portfolio_description' => $request->portfolio_description,
                'portfolio_image' => $image_url

            ]);

            // Toastr notification
                $notification = array (
                'message' => 'Portfolio Updated With Image Successfully!',
                'alert-type' => 'success'
            );
            
            // display notification on back page which is the same page is being updated
            return redirect()->route('all.portfolio')->with($notification);           
        } else {

            // update database with new portfolio data
            Portfolio::findOrFail($portfolio_id)->update([
                'portfolio_title' => $request->portfolio_title,
                'portfolio_name' => $request->portfolio_name,
                'portfolio_description' => $request->portfolio_description                

            ]);

            // Toastr notification
                $notification = array (
                'message' => 'Portfolio Updated Without Image Successfully!',
                'alert-type' => 'success'
            );
            
            // display notification on back page which is the same page is being updated
            return redirect()->route('all.portfolio')->with($notification);
       }

    } // end method

    public function DeletePortfolio($id)
    {
        $portfolio_to_be_deleted = Portfolio::findOrFail($id);

        $portfolio_image_url = $portfolio_to_be_deleted->portfolio_image;

        // to remove the image from folder
        unlink($portfolio_image_url);

        // to delete portfolio data from database
        Portfolio::findOrFail($id)->delete();

        $notification = array (
            'message' => 'Portfolio Deleted Successfully!',
            'alert-type' => 'success'
        );
        
        // display notification on back page which is the same page is being updated
        return redirect()->back()->with($notification);

    } // end method

    public function PortfolioDetails($id)
    {
        $portfolio_details = Portfolio::findOrFail($id);
        return view('frontend.home_portfolio.portfolio_details', compact('portfolio_details'));

    } // end method


    public function homePortfolio()
    {
        $portfolio = Portfolio::latest()->get();
        return view('frontend.home_portfolio.portfolio_view', compact('portfolio'));
    }

}
