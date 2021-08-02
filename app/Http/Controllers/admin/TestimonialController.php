<?php

namespace App\Http\Controllers\admin;

use App\Model\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{
    public function index()
    {
        return view('admin.testimonial.index');
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
//        dd($request);
        $this->validate($request,[
            'name'=>'required',
            'comment'=>'required',
        ]);

        $testimonial = new Testimonial();
        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->status = $request->status;
        $testimonial->comment = $request->comment;
        $testimonial->school_id =1;


        if($request->hasFile('image')){
            $file =  $request->image;
            $time = time();
            $orginalPath = "images/testimonial/";
            $db_path = $orginalPath.$time.$file->getClientOriginalName();
            $ImageUpload = \Image::make($file);
            $largePath = public_path('/large/'.$orginalPath);
            $thumbnailPath = public_path('/thumbnail/'.$orginalPath);
            $originalPath = public_path( $orginalPath);
            if(!\File::isDirectory($originalPath)){

                \File::makeDirectory($originalPath, 0777, true, true);

            }
            $ImageUpload->save($originalPath.$time.$file->getClientOriginalName());

            // for save thumnail image
            if(!\File::isDirectory($thumbnailPath)){

                \File::makeDirectory($thumbnailPath, 0777, true, true);

            }
            $ImageUpload->resize(250, 250, function ($constraint){
                $constraint->aspectRatio();
            });
            $ImageUpload->resizeCanvas(250, 250, 'center', false, 'fff');
            $ImageUpload = $ImageUpload->save($thumbnailPath.$time.$file->getClientOriginalName());

            $testimonial->image = $db_path;
        }

        $response = $testimonial->save();

        if($response){

            return redirect()->back()->with('success', 'Testimonial Successfully Added.');
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
        $testimonial = Testimonial::find($id);
        return view('admin.testimonial.edit', compact('testimonial'));
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
            'name'=>'required',
            'comment'=>'required',
        ]);


        $testimonial = Testimonial::where('id', $request->testimonial_id)->first();
        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->status = $request->status;
        $testimonial->comment = $request->comment;

        if($request->hasFile('image')){
            if($testimonial->image){
                File::delete(public_path('thumbnail/'.$testimonial->image));
                File::delete(public_path($testimonial->image));
            }
            $file =  $request->image;
            $time = time();
            $orginalPath = "images/testimonial/";
            $db_path = $orginalPath.$time.$file->getClientOriginalName();
            $ImageUpload = \Image::make($file);
            $thumbnailPath = public_path('/thumbnail/'.$orginalPath);
            $originalPath = public_path( $orginalPath);
            if(!\File::isDirectory($originalPath)){

                \File::makeDirectory($originalPath, 0777, true, true);

            }
            $ImageUpload->save($originalPath.$time.$file->getClientOriginalName());

            // for save thumnail image
            if(!\File::isDirectory($thumbnailPath)){

                \File::makeDirectory($thumbnailPath, 0777, true, true);

            }
            $ImageUpload->resize(250, 250, function ($constraint){
                $constraint->aspectRatio();
            });
            $ImageUpload->resizeCanvas(250, 250, 'center', false, 'fff');
            $ImageUpload = $ImageUpload->save($thumbnailPath.$time.$file->getClientOriginalName());

            $testimonial->image = $db_path;
        }



        $response = $testimonial->update();

        if($response){

            return redirect()->back()->with('success', 'Testimonial Successfully Updated.');
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
        $testimonial =Testimonial::find($id);
        if($testimonial->image){
            File::delete(public_path('thumbnail/'.$testimonial->image));
            File::delete(public_path($testimonial->image));
        }
        $response = $testimonial->delete();

        if($response){

            return redirect()->back()->with('success', 'Testimonial Successfully Deleted.');
        }
        else{
            return redirect()->back()->with('error', '...........Error.........');
        }
    }


    public function getJson(){
        $testimonials = Testimonial::where('school_id',1)->get();
        $count = 1;
        foreach ($testimonials as $testimonial){
            $testimonial->count = $count;
            $testimonial->image = asset('thumbnail/'.$testimonial->image);
            $count++;
        }
        return datatables($testimonials)->toJson();
    }
}
