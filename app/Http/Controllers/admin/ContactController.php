<?php

namespace App\Http\Controllers\Admin;

use App\Model\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
        $contents = Contact::all();

        return view('admin.contact.index',compact('contents'));
    }

    public function view($id)
    {
        $content = Contact::find($id);
        $content->view = 1;
        $content->save();
        return view('admin.contact.details', compact('content'));
    }







//
//    public function edit($id)
//    {
//
//        $contact = Contact::findorfail($id);
//        $contact->view = 1;
//        $contact->update();
//        $contact=Contact::findOrFail($id);
//
//        if(isset($contact)){
//            return view('admin.contact.edit',compact('contact'));
//        }
//        else{
//            abort(404);
//        }
//    }




    public function delete(Request $request)
    {
        $contact= Contact::findorfail($request->contact_id);
        $contact->delete();
        return redirect()->back()->with( 'success', 'Contact successfully deleted!!' );
    }
}
