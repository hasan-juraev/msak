<?php

namespace App\Http\Controllers\Religon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Religon;
use Illuminate\Support\Carbon;

class HadithController extends Controller
{
    

    // add Hadith
    public function addHadith(){      
        return view('admin.hadith.add_hadith');
    }

    // store Hadith
    public function storeHadith(Request $request){
        Religon::insert([
            'narrator' =>$request->narrator,
            'topic' =>$request->topic,
            'content' => $request->content,
            'hadith_reference' => $request->hadith_reference,
            'hadith_tags' => $request->hadith_tags,
            'created_at'=>Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Hadith added successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.hadith')->with($notification);
    }

    // show all Hadith
    public function showAllHadith(){
        $hadiths = Religon::latest()->get();
        return view('admin.hadith.all_hadith', compact('hadiths'));
    }

  
    
  
}
