<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\cilveks;
use DB;
use App\Professors;


class SearchController extends Controller
{

    public function index()
    {
        return view('pages.professorManagement');
    }

    public function search(Request $request)
    {
        if($request->ajax())
        {
            $output="";
            $professor = cilveks::select('cilveks.vards', 'cilveks.uzvards', 'cilveks.ckods', 'cilveks.pers_kods')
                ->join('professors', 'professors.ckods', '=', 'cilveks.ckods')
                ->get();
            $number = 1;

        }
            foreach ($professor as $key => $Professors) {
                $output.='<tr>'.
                    '<td>'.$number++.'</td>'.
                    '<td>'.$Professors->vards
                        .$Professors->uzvards.'</td>'.
                    '<td>'.$Professors->pers_kods.'</td>'.
                        '</tr>';
    }
            return Response($output);
    }


}
