<?php

namespace App\Http\Controllers\admin;

use App\Model\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    public function index(){
        $contents = News::all();
        return view('admin.news.index',compact('contents'));
    }

    public function add(){
        return view('admin.news.add');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
//         dd($request);
        $News = new News();
        $News->school_id = 1;
        $News->title = $request->title;
        $News->content = $request->contents;
        $News->status  = $request->status;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $db_path = imageUpload($image,  'images/news/');
            $News->image = $db_path;
        }

        if($News->save()){
            return redirect()->back()->with('success','New News Added Successfully');
        }
        else{
            return redirect()->back()->with('error','New News Add Failed');
        }

    }

    public function edit($News_slug){
        if($news = News::where('slug',$News_slug)->first()){
            return view('admin.news.edit',compact('news'));
        }
        else{
            return redirect()->back()->with('error','News Not Found, Please Reload The Page');
        }
    }

    public function update(Request $request, $News_slug){
//        dd($request);
        $News = News::where('slug',$News_slug)->first();
        $News->title = $request->title;
        $News->content = $request->contents;
        $News->status  = $request->status;

        if($request->hasFile('image')){
            $file_path=public_path().'/'.$News->image;
            $thumbnail_path = public_path().'/thumbnail/'.$News->image;
            if(file_exists($file_path)){
                unlink($file_path);
            }
            if(file_exists($thumbnail_path)){
                unlink($thumbnail_path);
            }
            $image = $request->file('image');
            $db_path = imageUpload($image,  'images/news/');
            $News->image = $db_path;
        }

        if($News->save()){
            return redirect()->back()->with('success','News Edited Successfully');
        }
        else{
            return redirect()->back()->with('error','Failed to edit News');
        }
    }

    public function delete(Request $request){
        if($News = News::findOrFail($request->news_id)){
            $file_path=public_path().'/'.$News->image;
            $thumbnail_path = public_path().'/thumbnail/'.$News->image;
            if(file_exists($file_path)){
                unlink($file_path);
            }
            if(file_exists($thumbnail_path)){
                unlink($thumbnail_path);
            }
            $News->delete();
            return redirect()->back()->with('success','News Deleted Successfully');
        }
        else{
            return redirect()->back()->with('error','News Delete Failed, Please Reload The Page');
        }
    }

    public function changestatus($News_id){
        $News = News::find($News_id);
        if($News->status == "Active"){
            $News->status = "Inactive";
        }else{
            $News->status = "Active";
        }
        $return = $News->update();

        return redirect()->back()->with('success','Status Changed');
    }
}
