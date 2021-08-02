<?php

namespace App\Http\Controllers\admin;

use App\Model\Download;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DownloadController extends Controller
{
    public function index(){
        $contents = Download::orderBy('created_at','desc')->get();
        return view('admin.download.index',compact('contents'));
    }

    public function add(){
        return view('admin.download.add');
    }

    public function store(Request $request){
//        dd($request);
        $download = new Download();
        $download->title = $request->title;
        $download->description = $request->contents;
        $download->status  = $request->status;

        if($request->hasFile('file')){
            $file = $request->file('file');
            $filename = time() . '-' . rand(1000, 9999) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/admin/download/', $filename);
            $db_filename = 'admin/download/' . $filename;
            $download->file = $db_filename;
        }

        if($download->save()){
            return redirect()->back()->with('success','New File Added Successfully');
        }
        else{
            return redirect()->back()->with('error','New File Add Failed');
        }

    }

    public function edit($download_id){
        if($download = Download::where('id',$download_id)->first()){
            return view('admin.download.edit',compact('download'));
        }
        else{
            return redirect()->back()->with('error','File Not Found, Please Reload The Page');
        }
    }

    public function update(Request $request, $download_id){
//        dd($request);
        $download = Download::where('id',$download_id)->first();
        $download->title = $request->title;
        $download->description = $request->contents;
        $download->status  = $request->status;

        if($request->hasFile('file')){
            $file_path=public_path().'/'.$download->file;
            if(file_exists($file_path)){
                unlink($file_path);
            }
            $file = $request->file('file');
            $filename = time() . '-' . rand(1000, 9999) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/admin/download/', $filename);
            $db_filename = 'admin/download/' . $filename;
            $download->file = $db_filename;
        }

        if($download->save()){
            return redirect()->back()->with('success','Download File Edited Successfully');
        }
        else{
            return redirect()->back()->with('error','Failed to edit download file');
        }
    }

    public function delete(Request $request){
        if($download = Download::findOrFail($request->download_id)){
            $file_path=public_path().'/'.$download->file;
            if(file_exists($file_path)){
                unlink($file_path);
            }
            $download->delete();
            return redirect()->back()->with('success','Download File Deleted Successfully');
        }
        else{
            return redirect()->back()->with('error','Download File Delete Failed, Please Reload The Page');
        }
    }

    public function changestatus($download_id){
        $download = Download::find($download_id);
        if($download->status == 0){
            $download->status = 1;
        }else{
            $download->status = 0;
        }
        $return = $download->update();
        if($return) {
            return redirect()->back()->with('success', 'Status Changed');
        }
    }
}
