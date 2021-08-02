<?php

namespace App\Http\Controllers\admin;

use App\Model\Ethnicity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EthnicityController extends Controller
{
    public function __construct()
    {
        $this->middleware('super-admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.ethnicity.index');
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
        ]);

        $ethnicity = new Ethnicity();
        $ethnicity->title = $request->title;
        $ethnicity->remarks = $request->remarks;



        $response = $ethnicity->save();

        if($response){

            return redirect()->back()->with('success', 'Ethnicity Successfully Added.');
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
        $ethnicity = Ethnicity::find($id);
        return view('admin.ethnicity.edit', compact('ethnicity'));
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


        $ethnicity = Ethnicity::where('id', $request->ethnicity_id)->first();
        $ethnicity->title = $request->title;
        $ethnicity->remarks = $request->remarks;



        $response = $ethnicity->update();

        if($response){

            return redirect()->back()->with('success', 'Ethnicity Successfully Updated.');
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
        $ethnicity =Ethnicity::find($id);

        $response = $ethnicity->delete();

        if($response){

            return redirect()->back()->with('success', 'Ethnicity Successfully Deleted.');
        }
        else{
            return redirect()->back()->with('error', '...........Error.........');
        }
    }


    public function getJson(){
        $ethnicitys = Ethnicity::all();
        $count = 1;
        foreach ($ethnicitys as $ethnicity){
            $ethnicity->count = $count;
            $count++;
        }
        return datatables($ethnicitys)->toJson();
    }
}
