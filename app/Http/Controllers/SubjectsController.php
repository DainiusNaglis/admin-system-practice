<?php

namespace App\Http\Controllers;

use App\Reg_info;
use Illuminate\Http\Request;
use App\Professors;
use App\pastatai;
use App\patalpos;


class SubjectsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Pages.subjectManagement');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reg_info = new Reg_info([
            'profes_ckods' => $request->get('profes_ckods'),
            'subject_kods' => $request->get('subject_kods'),
            'semester' => $request->get('semester'),
            'user_comment' => $request->get('user_comment')
        ]);

        $reg_info->save();



        $pastatai = pastatai::select('luadm.pp_pastatai.adresas', 'luadm.pp_pastatai.id')
            ->orderBy('adresas')
            ->get();

        $auditorija = patalpos::select('luadm.pp_patalpos.nr', 'luadm.pp_patalpos.id')
            ->orderBy('nr')
            ->get();
        return view('pages.professorsGroupAdd', compact ('pastatai', 'auditorija'));
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {

        DB::table('reg_info')->where('id',$id)->delete();
        return redirect('/');

    }
}
