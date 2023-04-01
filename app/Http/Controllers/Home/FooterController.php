<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Footer;
use Illuminate\Support\Carbon; // Carbon for time

class FooterController extends Controller
{
    public function footerInfo()
    {
        $info = Footer::find(1);
        return view('admin.footer.footer_info', compact('info'));
    } // end method

    public function editFooter($id)
    {
        $footer_info = Footer::findOrFail($id);
        return view('admin.footer.edit_footer', compact('footer_info'));
    } // end method

    public function updateFooter(Request $request)
    {
        Footer::findOrFail($request->id)->update([
            'phone_number' => $request->phone_number,
            'contact_us_short_descr' => $request->contact_us_short_descr,
            'address_country' => $request->address_country,
            'address' => $request->address,
            'email' => $request->email,
            'social_connect_short_desc' => $request->social_connect_short_desc,
            'social_connect_icon_url1' => $request->social_connect_icon_url1,
            'social_connect_icon_url2' => $request->social_connect_icon_url2,
            'social_connect_icon_url3' => $request->social_connect_icon_url3,
            'social_connect_icon_url4' => $request->social_connect_icon_url4,       

        ]);

        $notification = array (
            'message' => 'Footer Updated Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('footer.info')->with($notification);
    }

    public function deleteFooter($id)
    {
        // to delete portfolio data from database
        Footer::findOrFail($id)->delete();

        $notification = array (
            'message' => 'Footer Deleted Successfully!',
            'alert-type' => 'success'
        );
        
        // display notification on back page which is the same page is being updated
        return redirect()->back()->with($notification);
    }

}
