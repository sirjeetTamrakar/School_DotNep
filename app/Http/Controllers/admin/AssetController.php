<?php

namespace App\Http\Controllers\admin;

use App\Model\Asset;
use App\Model\AssetCategory;
use App\Model\AssetImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AssetController extends Controller
{
    public function index(){

        $categories = AssetCategory::all();
        $count = 1;
        foreach ($categories as $category){
            $category->count = $count;
            $count++;
        }
        return view('admin.asset.index', compact('categories'));
    }


    public function categoryStore(Request $request){
        $this->validate($request,[
            'title'=>'required',
        ]);

        $category = new AssetCategory();
        $category->title = $request->title;
        $category->remarks = $request->remarks;
        $category->school_id = 1;



        $response = $category->save();

        if($response){

            return redirect()->back()->with('success', 'Asset Category Successfully Added.');
        }
        else{
            return redirect()->back()->with('error', '...........Error.........');
        }
    }


    public function store(Request $request){
        $this->validate($request,[
            'title'=>'required',
        ]);

        $asset = new Asset();
        $asset->title = $request->title;
        $asset->quantity = $request->quantity;
        $asset->asset_category_id = $request->asset_category_id;
        $asset->remarks = $request->remarks;
        $asset->school_id = 1;



        $response = $asset->save();

        if($response){

            return redirect()->back()->with('success', 'Asset Successfully Added.');
        }
        else{
            return redirect()->back()->with('error', '...........Error.........');
        }
    }


    public function create($category_id){

        $category = AssetCategory::find($category_id);
        return view('admin.asset.add', compact('category'));
    }


    public function edit($id){

        $asset = Asset::find($id);
        return view('admin.asset.edit', compact('asset'));
    }


    public function update(Request $request){
        $this->validate($request,[
            'title'=>'required',
        ]);

        $asset = Asset::where('id', $request->asset_id)->first();
        $asset->title = $request->title;
        $asset->quantity = $request->quantity;
        $asset->remarks = $request->remarks;
        $asset->school_id = 1;



        $response = $asset->update();

        if($response){

            return redirect()->back()->with('success', 'Asset Successfully Updated.');
        }
        else{
            return redirect()->back()->with('error', '...........Error.........');
        }
    }


    public function categoryEdit($id){

        $category = AssetCategory::find($id);
        return view('admin.asset.editcategory', compact('category'));
    }


    public function categoryUpdate(Request $request){

        $this->validate($request,[
            'title'=>'required',
        ]);

        $category = AssetCategory::where('id', $request->asset_category_id)->first();
        $category->title = $request->title;
        $category->remarks = $request->remarks;
        $category->school_id = 1;




        $response = $category->update();

        if($response){

            return redirect()->back()->with('success', 'Asset Successfully Updated.');
        }
        else{
            return redirect()->back()->with('error', '...........Error.........');
        }
    }


    public function categoryDelete($id){

        $category = AssetCategory::find($id);
        if($category->assets){
            foreach ($category->assets as $asset){

                if($asset->assetImages){
                    foreach ($asset->assetImages as $assetImage){
                        $this->deleteImage($assetImage->id);
                    }
                }
                $asset->assetImages()->delete();
            }
            $category->assets()->delete();
        }


        $response = $category->delete();

        if($response){

            return redirect()->back()->with('success', 'Asset Successfully Deleted.');
        }
        else{
            return redirect()->back()->with('error', '...........Error.........');
        }
    }



    public function destroy($id){

        $asset = Asset::find($id);
        if($asset->assetImages){
            foreach ($asset->assetImages as $assetImage){
                $this->deleteImage($assetImage->id);
            }
        }
        $asset->assetImages()->delete();
        $response = $asset->delete();

        if($response){

            return redirect()->back()->with('success', 'Asset Successfully Deleted.');
        }
        else{
            return redirect()->back()->with('error', '...........Error.........');
        }
    }


    public function addImage($slug){

        $asset = Asset::where('slug', $slug)->first();
        return view('admin.asset.images', compact('asset'));

    }


    public function getImages($id){

        $asset = Asset::where('id', $id)->first();
        $images = $asset->assetImages;
        return $images;

    }


    public function upload(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'asset_image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()->all()],400);
        }
        $asset = Asset::find($id);
        $assetImages = new AssetImage();
        if($request->hasFile('asset_image')) {
            $image = $request->file('asset_image');
            $db_filename = imageUpload($image,'images/asset/'.$asset->slug.'/');
            $assetImages->image = $db_filename;
            $assetImages->asset_id = $asset->id;
            $assetImages->school_id = 1;
        }
        if($assetImages->save()){
            return response()->json("File Added",200);
        }
        else{
            return response()->json("Error",400);
        }
    }


    public function deleteImage($id){
        $image = AssetImage::findOrFail($id);
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
