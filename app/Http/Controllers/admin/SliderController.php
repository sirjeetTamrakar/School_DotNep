<?php

namespace App\Http\Controllers\admin;

use App\Model\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.slider.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $this->validate($request,[
            'title'=>'required',
            'image'=>'required',
        ]);

        $slider = new Slider();
        $slider->title = $request->title;
        $slider->status = $request->status;
        $slider->link = $request->link;
        $slider->school_id =1;


        if($request->hasFile('image')){
            $file =  $request->image;
            $filename = str_replace(" ","",time().$file->GetClientOriginalName());
            $time = time();
            $orginalPath = "images/slider/";
            $db_path = $orginalPath.$filename;
            $ImageUpload = \Image::make($file);
            $largePath = public_path('/large/'.$orginalPath);
            $thumbnailPath = public_path('/thumbnail/'.$orginalPath);
            $originalPath = public_path( $orginalPath);
            if(!\File::isDirectory($originalPath)){

                \File::makeDirectory($originalPath, 0777, true, true);

            }
            $ImageUpload->save($originalPath.$filename);

            // for save thumnail image
//            if(!\File::isDirectory($thumbnailPath)){
//
//                \File::makeDirectory($thumbnailPath, 0777, true, true);
//
//            }
//            $ImageUpload->resizeCanvas(350, 350, 'center', false, 'fff');
//            $ImageUpload = $ImageUpload->save($thumbnailPath.$time.$file->getClientOriginalName());

            // for save large image
            if(!\File::isDirectory($largePath)){

                \File::makeDirectory($largePath, 0777, true, true);

            }
            $ImageUpload->resize(1920, 700, function ($constraint){
                $constraint->aspectRatio();
            });
            $ImageUpload->resizeCanvas(1920,700, 'center', false, 'fff');
            $ImageUpload = $ImageUpload->save($largePath.$time.$file->getClientOriginalName());
            $slider->image = $db_path;
        }

        $response = $slider->save();

        if($response){

            return redirect()->back()->with('success', 'Slider Successfully Added.');
        }
        else{
            return redirect()->back()->with('error', '...........Error.........');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
        ]);


        $slider = Slider::where('id', $request->slider_id)->first();
        $slider->title = $request->title;
        $slider->status = $request->status;
        $slider->link = $request->link;
        $slider->school_id =1;

        if($request->hasFile('image')){
            if($slider->image){
                File::delete(public_path('thumbnail/'.$slider->image));
                File::delete(public_path('large/'.$slider->image));
                File::delete(public_path($slider->image));
            }
            $file =  $request->image;
            $filename = str_replace(" ","",time().$file->GetClientOriginalName());
            $time = time();
            $orginalPath = "images/slider/";
            $db_path = $orginalPath.$filename;
            $ImageUpload = \Image::make($file);
            $largePath = public_path('/large/'.$orginalPath);
            $thumbnailPath = public_path('/thumbnail/'.$orginalPath);
            $originalPath = public_path( $orginalPath);
            $file->move($originalPath, $filename);
            if(!\File::isDirectory($originalPath)){

                \File::makeDirectory($originalPath, 0777, true, true);

            }
            $ImageUpload->save($originalPath.$filename);
            // $ImageUpload->save($originalPath.$time.$file->getClientOriginalName());

//            // for save thumnail image
//            if(!\File::isDirectory($thumbnailPath)){
//
//                \File::makeDirectory($thumbnailPath, 0777, true, true);
//
//            }
//            $ImageUpload->resizeCanvas(350, 350, 'center', false, 'fff');
//            $ImageUpload = $ImageUpload->save($thumbnailPath.$time.$file->getClientOriginalName());

            // for save large image
            if(!\File::isDirectory($largePath)){

                \File::makeDirectory($largePath, 0777, true, true);

            }
            $ImageUpload->resize(1920, 700, function ($constraint){
                $constraint->aspectRatio();
            });
            $ImageUpload->resizeCanvas(1920, 700, 'center', false, 'fff');
            $ImageUpload = $ImageUpload->save($largePath.$time.$file->getClientOriginalName());
            $slider->image = $db_path;
        }



        $response = $slider->update();

        if($response){

            return redirect()->back()->with('success', 'Slider Successfully Updated.');
        }
        else{
            return redirect()->back()->with('error', '...........Error.........');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider =Slider::find($id);
        if($slider->image){
            File::delete(public_path('thumbnail/'.$slider->image));
            File::delete(public_path('large/'.$slider->image));
            File::delete(public_path($slider->image));
        }
        $response = $slider->delete();

        if($response){

            return redirect()->back()->with('success', 'Slider Successfully Deleted.');
        }
        else{
            return redirect()->back()->with('error', '...........Error.........');
        }
    }


    public function getJson(){
        $sliders = Slider::all();
        $count = 1;
        foreach ($sliders as $slider){
            $slider->count = $count;
            // $slider->image = asset('large/'.$slider->image);
            $slider->image = asset($slider->image);
            $count++;
        }
        return datatables($sliders)->toJson();
    }
}
