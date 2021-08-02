<?php

namespace App\Http\Controllers\admin;

use App\Model\Tender;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TenderController extends Controller
{
    public function index(){
        $contents = Tender::all();
        return view('admin.tender.index',compact('contents'));
    }

    public function add(){
        return view('admin.tender.add');
    }

    public function store(Request $request){
//        dd($request);
        $tender = new Tender();
        $tender->school_id = 1;
        $tender->title = $request->title;
        $tender->content = $request->contents;
        $tender->status  = $request->status;

        if($request->hasFile('file')){
            $file = $request->file('file');
            $filename = time() . '-' . rand(1000, 9999) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/admin/tender/', $filename);
            $db_filename = 'admin/tender/' . $filename;
            $tender->file = $db_filename;
        }

        if($tender->save()){
            return redirect()->back()->with('success','New Tender Added Successfully');
        }
        else{
            return redirect()->back()->with('error','New Tender Add Failed');
        }

    }

    public function edit($tender_slug){
        if($tender = Tender::where('slug',$tender_slug)->first()){
            return view('admin.tender.edit',compact('tender'));
        }
        else{
            return redirect()->back()->with('error','Tender Not Found, Please Reload The Page');
        }
    }

    public function update(Request $request, $tender_slug){
//        dd($request);
        $tender = Tender::where('slug',$tender_slug)->first();
        $tender->title = $request->title;
        $tender->content = $request->contents;
        $tender->status  = $request->status;

        if($request->hasFile('file')){
            $file_path=public_path().'/'.$tender->file;
            if(file_exists($file_path)){
                unlink($file_path);
            }
            $file = $request->file('file');
            $filename = time() . '-' . rand(1000, 9999) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/admin/tender/', $filename);
            $db_filename = 'admin/tender/' . $filename;
            $tender->file = $db_filename;
        }

        if($tender->save()){
            return redirect()->back()->with('success','Tender Edited Successfully');
        }
        else{
            return redirect()->back()->with('error','Failed to edit Tender');
        }
    }

    public function delete(Request $request){
        if($tender = Tender::findOrFail($request->tender_id)){
            if($tender->file){
                $file_path = public_path().'/'.$tender->file;
                if(file_exists($file_path)){
                    unlink($file_path);
                }
            }
            $tender->delete();
            return redirect()->back()->with('success','Tender Deleted Successfully');
        }
        else{
            return redirect()->back()->with('error','Tender Delete Failed, Please Reload The Page');
        }
    }

    public function changestatus($tender_id){
        $tender = Tender::find($tender_id);
        if($tender->status == "Active"){
            $tender->status = "Inactive";
        }else{
            $tender->status = "Active";
        }
        $return = $tender->update();

        return redirect()->back()->with('success','Status Changed');
    }
}
