<?php

namespace App\Http\Controllers\admin;

use App\Model\Album;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlbumController extends Controller
{
    public function index(){
        $contents = Album::all();
        return view('admin.album.index',compact('contents'));
    }

    public function add(Request $request){
        // dd($request);
        $album = new Album();
        $album->school_id = 1;
        $album->title = $request->title;

        if($album->save()){
            return redirect()->back()->with('success','New Album Added Successfully');
        }
        else{
            return redirect()->back()->with('error','New Album Add Failed');
        }

    }

    public function edit(Request $request, $album_id){
        $album = Album::findOrFail($album_id);
        $album->title = $request->title;

        if($album->save()){
            return redirect()->back()->with('success','Album Edited Successfully');
        }
        else{
            return redirect()->back()->with('error','Album Edit Failed');
        }
    }

    public function delete(Request $request){
        if($album = Album::find($request->album_id)){
            if($galleries = $album->gallerys){
                foreach ($galleries as $gallery){
                    $file_path = public_path().'/'.$gallery->image;
                    $thumbnail_path = public_path().'/thumbnail/'.$gallery->image;
                    if(file_exists($file_path)){
                        unlink($file_path);
                    }
                    if(file_exists($thumbnail_path)){
                        unlink($thumbnail_path);
                    }
                    $gallery->delete();
                    ///code left to delete from local storage;
                }
            }
            $album->delete();
            return redirect()->back()->with('success','Album Deleted Successfully');
        }
        else{
            return redirect()->back()->with('error','Album Delete Failed, Please Reload The Page and Try Again');
        }
    }

}
