<?php

namespace App\Http\Controllers\admin;

use App\Model\Album;
use App\Model\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Image;

class GalleryController extends Controller
{
    public function gallery($album_slug){
        if($album = Album::where('slug',$album_slug)->first()){
            return view('admin.album.gallery',compact('album'));
        }
        else{
            return redirect()->back()->with('error','Album Not Found! Please Reload Page.');
        }
    }
    public function get_gallery($album_id){
        $album = Album::find($album_id);
        $images = $album->gallerys;
        return $images;
    }

    public function upload(Request $request,$album_id){

        $validator = Validator::make($request->all(), [
            'album_image'=>'required|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()->all()],400);
        }
        $album = Album::find($album_id);
        $gallery = new Gallery();
        if($request->hasFile('album_image')) {
            $image = $request->file('album_image');
            $db_filename = imageUpload($image,'images/album/'.$album->slug.'/');
            $gallery->image = $db_filename;
            $gallery->album_id = $album->id;
            $gallery->school_id = 1;
        }
        if($gallery->save()){
            return response()->json("File Added",200);
        }
        else{
            return response()->json("Error",400);
        }
    }

    public function delete($gallery_id){
        $image = Gallery::findOrFail($gallery_id);
        $file_path = public_path().'/'.$image->image;
        $thumbnail_path = public_path().'/thumbnail/'.$image->image;
        if(file_exists($file_path)){
            unlink($file_path);
        }
        if(file_exists($thumbnail_path)){
            unlink($thumbnail_path);
        }
        if($image->delete()){
            return response()->json("File deleted",200);
        }
        else{
            return response()->json("Error",400);
        }
    }

}
