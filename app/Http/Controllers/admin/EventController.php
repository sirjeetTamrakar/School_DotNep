<?php

namespace App\Http\Controllers\admin;

use App\Model\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function index(){
        $contents = Event::all();
        return view('admin.event.index',compact('contents'));
    }

    public function add(){
        return view('admin.event.add');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'image'=>'required|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
//         dd($request);
        $event = new Event();
        $event->school_id = 1;
        $event->title = $request->title;
        $event->event_date = $request->date;
        $event->content = $request->contents;
        $event->status  = $request->status;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $db_path = imageUpload($image,  'images/events/');
            $event->image = $db_path;
        }

        if($event->save()){
            return redirect()->back()->with('success','New Event Added Successfully');
        }
        else{
            return redirect()->back()->with('error','New Event Add Failed');
        }

    }

    public function edit($event_slug){
        if($event = Event::where('slug',$event_slug)->first()){
            return view('admin.event.edit',compact('event'));
        }
        else{
            return redirect()->back()->with('error','Event Not Found, Please Reload The Page');
        }
    }

    public function update(Request $request, $event_slug){
//        dd($request);
        $event = Event::where('slug',$event_slug)->first();
        $event->title = $request->title;
        $event->event_date = $request->date;
        $event->content = $request->contents;
        $event->status  = $request->status;

        if($request->hasFile('image')){
            $file_path=public_path().'/'.$event->image;
            $thumbnail_path = public_path().'/thumbnail/'.$event->image;
            if(file_exists($file_path)){
                unlink($file_path);
            }
            if(file_exists($thumbnail_path)){
                unlink($thumbnail_path);
            }
            $image = $request->file('image');
            $db_path = imageUpload($image,  'images/events/');
            $event->image = $db_path;
        }

        if($event->save()){
            return redirect()->back()->with('success','Event Edited Successfully');
        }
        else{
            return redirect()->back()->with('error','Failed to edit Event');
        }
    }

    public function delete(Request $request){
        if($event = Event::findOrFail($request->event_id)){
            $file_path=public_path().'/'.$event->image;
            $thumbnail_path = public_path().'/thumbnail/'.$event->image;
            if(file_exists($file_path)){
                unlink($file_path);
            }
            if(file_exists($thumbnail_path)){
                unlink($thumbnail_path);
            }
            $event->delete();
            return redirect()->back()->with('success','Event Deleted Successfully');
        }
        else{
            return redirect()->back()->with('error','Event Delete Failed, Please Reload The Page');
        }
    }

    public function changestatus($event_id){
        $event = Event::find($event_id);
        if($event->status == "Active"){
            $event->status = "Inactive";
        }else{
            $event->status = "Active";
        }
        $return = $event->update();

        return redirect()->back()->with('success','Status Changed');
    }
}
