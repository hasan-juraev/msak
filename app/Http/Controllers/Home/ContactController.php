<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon; // Carbon for time
use App\Models\Contact;

class ContactController extends Controller
{
    //
    public function contactPage()
    {
        return view('frontend.contact');
    }

    public function storeMessage(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' =>'required',
            'message' => 'required',
            
        ]);
       
        // find the id of image being updated and updated below columns
        Contact::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'phone' => $request->phone,
            'message' => $request->message,
            'created_at' => Carbon::now()

        ]);
       
        $notification = array (
            'message' => 'Thank you! We will contact you soon!',
            'alert-type' => 'success'
        );
        
        // display notification
        return redirect()->back()->with($notification);  
    } // end method

    public function contactMessages()
    {
        $messages = Contact::latest()->get();
        return view('admin.contact.messages', compact('messages'));
    }

    public function contactMessagesview($id)
    {
        $messagesview = Contact::findOrFail($id);
        return view('admin.contact.message_view', compact('messagesview'));
    }

    public function deleteMessage($id)
    {
        Contact::findOrFail($id)->delete();

        $notification = array (
            'message' => 'Message is deleted successfully!',
            'alert-type' => 'success'
        );
        
        // display notification
        return redirect()->back()->with($notification);  

    }
}
