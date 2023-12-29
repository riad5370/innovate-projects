<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function inbox(){
        return view('admin.contact.inbox',[
            'messages'=>Contact::all()
        ]);
    }
    public function storeMessage(Request $request){
        $rules = [
            'name'=>'required|string',
            'name'=>'required|email',
            'subject'=>'required',
            'description'=>'required'
        ];
        //validate-data
        $validateData = $request->validate($rules);

        //data-store
        Contact::create($validateData);

        return back();
    }
    public function show($id){
        $message = Contact::find($id);
        return view('admin.contact.show',[
            'message'=>$message
        ]);
    }


    public function destroy(Request $request){
        $message = Contact::find($request->id);
        $message->delete();
        return back()->withSuccess('Message has been deleted!');
    }
}
