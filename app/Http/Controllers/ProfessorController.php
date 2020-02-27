<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Professors;
use App\cilveks;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professor = cilveks::select('cilveks.vards', 'cilveks.uzvards', 'cilveks.ckods', 'professors.tab_number', 'professors.fc_user_name', 'professors.details')
            ->join('professors', 'professors.ckods', '=', 'cilveks.ckods')
            ->get();
        $number = 1;

        return view("pages.professorsManagement", compact ('professor', 'number'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('professor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tab_number'=>'required',
            'details'=> 'required|integer',
        ]);
        $professor = new Professors([
            'tab_number' => $request->get('tab_number'),
            'details'=> $request->get('details'),

        ]);
        $professor->save();
        return redirect('/professorsManagement')->with('success', 'has been added');
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
        //$professor = Professors::find($id);
        $professor = Professors::query()->find($id);
        return view('Forms.profEdit', compact('professor'));

       // $professor = Professors::select('select * from Professors where id=?',[$id]);
       // return view('Forms.profedit', ['professor' => $professor]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tab_number'=>'required',
            'details'=> 'required|integer',
        ]);

        $professor = Professors::find($id);
        $professor->tab_number = $request->get('tab_number');
        $professor->details = $request->get('details');
        $professor->save();

        return redirect('/professorsManagement')->with('success', 'has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       /* $share = Share::find($id);
        $share->delete();

        return redirect('/shares')->with('success', 'Stock has been deleted Successfully');*/
    }
}