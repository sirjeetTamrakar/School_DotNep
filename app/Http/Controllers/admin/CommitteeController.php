<?php

namespace App\Http\Controllers\admin;

use App\Model\Committee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommitteeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.committee.index');
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
            'name'=>'required',
            'degination'=>'required',
        ]);

        $committe = new Committee();
        $committe->name = $request->name;
        $committe->degination = $request->degination;
        $committe->show_in_front = $request->show_in_front;
        $committe->status = $request->status;
        $committe->message = $request->message;
        $committe->school_id = 1;

        if($request->file('image')){
            $image = $request->file('image');
            $db_path = imageUpload($image,  'images/committees/');
            $committe->image = $db_path;
        }

        $response = $committe->save();

        if($response){

            return redirect()->back()->with('success', 'Member Successfully Added.');
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
        $committee = Committee::find($id);
        return view('admin.committee.edit', compact('committee'));
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
            'degination'=>'required',
        ]);


        $committe = Committee::where('id', $request->committee_id)->first();
        $committe->name = $request->name;
        $committe->degination = $request->degination;
        $committe->show_in_front = $request->show_in_front;
        $committe->status = $request->status;
        $committe->message = $request->message;
        $committe->school_id = 1;

        if($request->file('image')){
            if ($committe->image){
                $file_path = public_path().'/'.$committe->image;
                $thumbnail_path = public_path().'/thumbnail/'.$committe->image;
                if(file_exists($file_path)){
                    unlink($file_path);
                }
                if(file_exists($thumbnail_path)){
                    unlink($thumbnail_path);
                }
            }
            $image = $request->file('image');
            $db_path = imageUpload($image,  'images/committees/');
            $committe->image = $db_path;
        }



        $response = $committe->update();

        if($response){

            return redirect()->back()->with('success', 'Member Successfully Updated.');
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
        $committee =Committee::find($id);
        if($committee->image){
            $file_path = public_path().'/'.$committee->image;
            $thumbnail_path = public_path().'/thumbnail/'.$committee->image;
            if(file_exists($file_path)){
                unlink($file_path);
            }
            if(file_exists($thumbnail_path)){
                unlink($thumbnail_path);
            }
        }
        $response = $committee->delete();

        if($response){

            return redirect()->back()->with('success', 'Member Successfully Deleted.');
        }
        else{
            return redirect()->back()->with('error', '...........Error.........');
        }
    }


    public function getJson(){
        $committees = Committee::all();
        $count = 1;
        foreach ($committees as $committee){
            $committee->count = $count;
            $committee->image = asset('thumbnail/'.$committee->image);
            $count++;
        }
        return datatables($committees)->toJson();
    }
}
