<?php

namespace App\Http\Controllers\admin;

use App\Model\Occupation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OccupationController extends Controller
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
        return view('admin.occupation.index');
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

        $occupation = new Occupation();
        $occupation->title = $request->title;
        $occupation->remarks = $request->remarks;



        $response = $occupation->save();

        if($response){

            return redirect()->back()->with('success', 'Occupation Successfully Added.');
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
        $occupation = Occupation::find($id);
        return view('admin.occupation.edit', compact('occupation'));
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


        $occupation = Occupation::where('id', $request->occupation_id)->first();
        $occupation->title = $request->title;
        $occupation->remarks = $request->remarks;



        $response = $occupation->update();

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
        $occupation =Occupation::find($id);

        $response = $occupation->delete();

        if($response){

            return redirect()->back()->with('success', 'Occupation Successfully Deleted.');
        }
        else{
            return redirect()->back()->with('error', '...........Error.........');
        }
    }


    public function getJson(){
        $occupations = Occupation::all();
        $count = 1;
        foreach ($occupations as $occupation){
            $occupation->count = $count;
            $count++;
        }
        return datatables($occupations)->toJson();
    }
}
