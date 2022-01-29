<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\contactus;
use Auth;
class Others extends Controller
{
    public function index(){
        if(auth()->user()->isNotAdmin())
        {
            return redirect('/');
        }else{
            $contactus= contactus::all()->reverse();
            return view('user.contactus', compact('contactus'));

        }
    }
    public function ContactUs(Request $request){
        $contactus = contactus::create([
            'name'         => $request->name,
            'email'          => $request->email,
            'subject'       => $request->subject,
            'message'   => $request->message
        ]);
        session()->flash('message', 'Message has been send Successfully.');

         return redirect()->back();

    }
    public function show(contactus $contactus)
    {
        
        return view('user.contactshow',compact('contactus') );
    }
   
    public function destroy(contactus $contactus)
    {
        if(Auth::user()->is_admin==true)
{
        $contactus->delete();

        session()->flash('message', 'Message deleted successfully.');

         return redirect()->back();
       }else{
           return redirect('/');
       }   }
}
