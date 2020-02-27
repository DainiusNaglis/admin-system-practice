<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Professors;
use App\Subjects;
use App\Reg_info;
use App\cilveks;
use App\Bureliai;
use App\semester_info;
use App\pastatai;
use App\patalpos;


class PagesController extends Controller
{

    public function index(){
        return view('pages.pradzia');
    }

    public function professorsManagement(){

        $professor = cilveks::select('cilveks.vards', 'cilveks.uzvards', 'cilveks.ckods', 'professors.tab_number', 'professors.fc_user_name', 'professors.details')
            ->join('professors', 'professors.ckods', '=', 'cilveks.ckods')
            ->get();
        $number = 1;

        return view("pages.professorsManagement", compact ('professor', 'number'));
    }

    public function subjectManagement(){
        //2018 rudens semestro uzregistruotu dalyku info
        $subject2018Rud = reg_info::select('reg_info.subject_kods', 'reg_info.id', 'reg_info_group.reg_info_id', 'reg_info.semester', 'reg_info.user_comment', 'luadm.kurss.knosauk', 'luadm.kurss.knosauka', 'luadm.tips.tnosauk', 'luadm.cilveks.vards', 'luadm.cilveks.uzvards', 'reg_info_group_line.day_no', 'reg_info_group_line.time_from', 'reg_info_group_line.time_to', 'luadm.pp_pastatai.adresas', 'luadm.pp_patalpos.nr', 'reg_info_group.group_no', 'luadm.tips.tkods')
        ->join('luadm.kurss', 'luadm.kurss.kkods', '=', 'reg_info.subject_kods')
        ->join('luadm.tips', 'reg_info.semester', '=', 'luadm.tips.tkods')
        ->join('luadm.cilveks', 'luadm.cilveks.ckods', '=', 'reg_info.profes_ckods')
        ->join('reg_info_group', 'reg_info_group.reg_info_id','=', 'reg_info.id')
        ->join('reg_info_group_line', 'reg_info_group_line.reg_info_group_id','=', 'reg_info_group.id')
        ->join('luadm.pp_pastatai', 'luadm.pp_pastatai.id','=', 'reg_info_group.building_id')
        ->join('luadm.pp_patalpos', 'luadm.pp_patalpos.id','=', 'reg_info_group.room_id')
        ->where('luadm.tips.tkods', '=', 'FO0056')
        ->orderBy('reg_info_group.reg_info_id')
            //->orderBy('reg_info_group.reg_info_id')
           //->distinct()
        ->get();


        $subject2018Pav = reg_info::select('reg_info.subject_kods', 'reg_info.semester', 'reg_info.user_comment', 'luadm.kurss.knosauk', 'luadm.kurss.knosauka', 'luadm.tips.tnosauk', 'luadm.cilveks.vards', 'luadm.cilveks.uzvards', 'reg_info_group_line.day_no', 'reg_info_group_line.time_from', 'reg_info_group_line.time_to', 'luadm.pp_pastatai.adresas', 'luadm.pp_patalpos.nr', 'reg_info_group.group_no', 'luadm.tips.tkods')
            ->join('luadm.kurss', 'luadm.kurss.kkods', '=', 'reg_info.subject_kods')
            ->join('luadm.tips', 'reg_info.semester', '=', 'luadm.tips.tkods')
            ->join('luadm.cilveks', 'luadm.cilveks.ckods', '=', 'reg_info.profes_ckods')
            ->join('reg_info_group', 'reg_info_group.reg_info_id','=', 'reg_info.id')
            ->join('reg_info_group_line', 'reg_info_group_line.reg_info_group_id','=', 'reg_info_group.id')
            ->join('luadm.pp_pastatai', 'luadm.pp_pastatai.id','=', 'reg_info_group.building_id')
            ->join('luadm.pp_patalpos', 'luadm.pp_patalpos.id','=', 'reg_info_group.room_id')
            ->where('luadm.tips.tkods', '=', 'FO0055')
            ->orderBy('reg_info_group.reg_info_id')
            ->get();

        $subject2017Rud = reg_info::select('reg_info.subject_kods', 'reg_info.semester', 'reg_info.user_comment', 'luadm.kurss.knosauk', 'luadm.kurss.knosauka', 'luadm.tips.tnosauk', 'luadm.cilveks.vards', 'luadm.cilveks.uzvards', 'reg_info_group_line.day_no', 'reg_info_group_line.time_from', 'reg_info_group_line.time_to', 'luadm.pp_pastatai.adresas', 'luadm.pp_patalpos.nr', 'reg_info_group.group_no', 'luadm.tips.tkods')
            ->join('luadm.kurss', 'luadm.kurss.kkods', '=', 'reg_info.subject_kods')
            ->join('luadm.tips', 'reg_info.semester', '=', 'luadm.tips.tkods')
            ->join('luadm.cilveks', 'luadm.cilveks.ckods', '=', 'reg_info.profes_ckods')
            ->join('reg_info_group', 'reg_info_group.reg_info_id','=', 'reg_info.id')
            ->join('reg_info_group_line', 'reg_info_group_line.reg_info_group_id','=', 'reg_info_group.id')
            ->join('luadm.pp_pastatai', 'luadm.pp_pastatai.id','=', 'reg_info_group.building_id')
            ->join('luadm.pp_patalpos', 'luadm.pp_patalpos.id','=', 'reg_info_group.room_id')
            ->where('luadm.tips.tkods', '=', 'FO0050')
            ->orderBy('reg_info_group.reg_info_id')
            ->get();

        $subject2017Pav = reg_info::select('reg_info.subject_kods', 'reg_info.semester', 'reg_info.user_comment', 'luadm.kurss.knosauk', 'luadm.kurss.knosauka', 'luadm.tips.tnosauk', 'luadm.cilveks.vards', 'luadm.cilveks.uzvards', 'reg_info_group_line.day_no', 'reg_info_group_line.time_from', 'reg_info_group_line.time_to', 'luadm.pp_pastatai.adresas', 'luadm.pp_patalpos.nr', 'reg_info_group.group_no', 'luadm.tips.tkods')
            ->join('luadm.kurss', 'luadm.kurss.kkods', '=', 'reg_info.subject_kods')
            ->join('luadm.tips', 'reg_info.semester', '=', 'luadm.tips.tkods')
            ->join('luadm.cilveks', 'luadm.cilveks.ckods', '=', 'reg_info.profes_ckods')
            ->join('reg_info_group', 'reg_info_group.reg_info_id','=', 'reg_info.id')
            ->join('reg_info_group_line', 'reg_info_group_line.reg_info_group_id','=', 'reg_info_group.id')
            ->join('luadm.pp_pastatai', 'luadm.pp_pastatai.id','=', 'reg_info_group.building_id')
            ->join('luadm.pp_patalpos', 'luadm.pp_patalpos.id','=', 'reg_info_group.room_id')
            ->where('luadm.tips.tkods', '=', 'FO0049')
            ->orderBy('reg_info_group.reg_info_id')
            ->get();

        //bureliu destytoju vardai ir pavardes drop downe
        $professor = cilveks::select('cilveks.vards', 'cilveks.uzvards', 'cilveks.ckods')
            ->join('professors', 'professors.ckods', '=', 'cilveks.ckods')
            ->get();

        //bureliu pavadinimai drop downe
        $bureliai = Bureliai::select('luadm.kurss.knosauk', 'luadm.kurss.kkods', 'luadm.kurss.tips_nozare')
            ->where('tips_nozare', '=', 'FM0051')
            ->get();

        //semestru sarasas drop downe
        $semester = reg_info::select('reg_info.semester', 'luadm.tips.tnosauk', 'luadm.tips.tkods')
            ->join('luadm.tips', 'reg_info.semester', '=', 'luadm.tips.tkods')
            ->distinct()
            ->orderBy('luadm.tips.tnosauk', 'desc')
            ->get();

        $numb2018Rud = 1;
        $numb2018Pav = 1;
        $numb2017Rud = 1;
        $numb2017Pav = 1;

        $countrow = reg_info::select('reg_info.subject_kods', 'reg_info_group.reg_info_id', 'reg_info.semester', 'reg_info.user_comment', 'luadm.kurss.knosauk', 'luadm.kurss.knosauka', 'luadm.tips.tnosauk', 'luadm.cilveks.vards', 'luadm.cilveks.uzvards', 'reg_info_group_line.day_no', 'reg_info_group_line.time_from', 'reg_info_group_line.time_to', 'luadm.pp_pastatai.adresas', 'luadm.pp_patalpos.nr', 'reg_info_group.group_no', 'luadm.tips.tkods')
            ->join('luadm.kurss', 'luadm.kurss.kkods', '=', 'reg_info.subject_kods')
            ->join('luadm.tips', 'reg_info.semester', '=', 'luadm.tips.tkods')
            ->join('luadm.cilveks', 'luadm.cilveks.ckods', '=', 'reg_info.profes_ckods')
            ->join('reg_info_group', 'reg_info_group.reg_info_id','=', 'reg_info.id')
            ->join('reg_info_group_line', 'reg_info_group_line.reg_info_group_id','=', 'reg_info_group.id')
            ->join('luadm.pp_pastatai', 'luadm.pp_pastatai.id','=', 'reg_info_group.building_id')
            ->join('luadm.pp_patalpos', 'luadm.pp_patalpos.id','=', 'reg_info_group.room_id')
            ->where('luadm.tips.tkods', '=', 'FO0056')
            ->orderBy('reg_info_group.reg_info_id')
            //->orderBy('reg_info_group.reg_info_id')
            // ->distinct()
            ->where('reg_info.id', '=', '666')
            ->count();

        return view ("pages.subjectManagement", compact ('subject2018Rud', 'subject2018Pav', 'subject2017Pav', 'subject2017Rud', 'professor', 'bureliai', 'semester', 'numb2018Rud', 'numb2018Pav', 'numb2017Rud', 'numb2017Pav', 'countrow'));

    }


    public function editGroup(){
        //2018 rudens semestro uzregistruotu dalyku info
        $subject2018Rud = pastatai::select('luadm.pp_pastatai.adresas')
            ->groupBy('adresas')
            ->orderBy('adresas')
            ->get();


        return view ("pages.editGroup", compact ('subject2018Rud'));

    }


    public function reportsManagement(){


        //2018 rudens semestro uzregistruotu dalyku info
        $subject2018Rud = reg_info::select('reg_info.subject_kods', 'reg_info.id', 'reg_info_group.reg_info_id', 'reg_info.semester', 'reg_info.user_comment', 'luadm.kurss.knosauk', 'luadm.kurss.knosauka', 'luadm.tips.tnosauk', 'luadm.cilveks.vards', 'luadm.cilveks.uzvards', 'reg_info_group_line.day_no', 'reg_info_group_line.time_from', 'reg_info_group_line.time_to', 'luadm.pp_pastatai.adresas', 'luadm.pp_patalpos.nr', 'reg_info_group.group_no', 'luadm.tips.tkods')
            ->join('luadm.kurss', 'luadm.kurss.kkods', '=', 'reg_info.subject_kods')
            ->join('luadm.tips', 'reg_info.semester', '=', 'luadm.tips.tkods')
            ->join('luadm.cilveks', 'luadm.cilveks.ckods', '=', 'reg_info.profes_ckods')
            ->join('reg_info_group', 'reg_info_group.reg_info_id','=', 'reg_info.id')
            ->join('reg_info_group_line', 'reg_info_group_line.reg_info_group_id','=', 'reg_info_group.id')
            ->join('luadm.pp_pastatai', 'luadm.pp_pastatai.id','=', 'reg_info_group.building_id')
            ->join('luadm.pp_patalpos', 'luadm.pp_patalpos.id','=', 'reg_info_group.room_id')
            ->where('luadm.tips.tkods', '=', 'FO0056')
            ->orderBy('reg_info_group.reg_info_id')
            //->orderBy('reg_info_group.reg_info_id')
            //->distinct()
            ->get();


        $subject2018Pav = reg_info::select('reg_info.subject_kods', 'reg_info.semester', 'reg_info.user_comment', 'luadm.kurss.knosauk', 'luadm.kurss.knosauka', 'luadm.tips.tnosauk', 'luadm.cilveks.vards', 'luadm.cilveks.uzvards', 'reg_info_group_line.day_no', 'reg_info_group_line.time_from', 'reg_info_group_line.time_to', 'luadm.pp_pastatai.adresas', 'luadm.pp_patalpos.nr', 'reg_info_group.group_no', 'luadm.tips.tkods')
            ->join('luadm.kurss', 'luadm.kurss.kkods', '=', 'reg_info.subject_kods')
            ->join('luadm.tips', 'reg_info.semester', '=', 'luadm.tips.tkods')
            ->join('luadm.cilveks', 'luadm.cilveks.ckods', '=', 'reg_info.profes_ckods')
            ->join('reg_info_group', 'reg_info_group.reg_info_id','=', 'reg_info.id')
            ->join('reg_info_group_line', 'reg_info_group_line.reg_info_group_id','=', 'reg_info_group.id')
            ->join('luadm.pp_pastatai', 'luadm.pp_pastatai.id','=', 'reg_info_group.building_id')
            ->join('luadm.pp_patalpos', 'luadm.pp_patalpos.id','=', 'reg_info_group.room_id')
            ->where('luadm.tips.tkods', '=', 'FO0055')
            ->orderBy('reg_info_group.reg_info_id')
            ->get();

        $subject2017Rud = reg_info::select('reg_info.subject_kods', 'reg_info.semester', 'reg_info.user_comment', 'luadm.kurss.knosauk', 'luadm.kurss.knosauka', 'luadm.tips.tnosauk', 'luadm.cilveks.vards', 'luadm.cilveks.uzvards', 'reg_info_group_line.day_no', 'reg_info_group_line.time_from', 'reg_info_group_line.time_to', 'luadm.pp_pastatai.adresas', 'luadm.pp_patalpos.nr', 'reg_info_group.group_no', 'luadm.tips.tkods')
            ->join('luadm.kurss', 'luadm.kurss.kkods', '=', 'reg_info.subject_kods')
            ->join('luadm.tips', 'reg_info.semester', '=', 'luadm.tips.tkods')
            ->join('luadm.cilveks', 'luadm.cilveks.ckods', '=', 'reg_info.profes_ckods')
            ->join('reg_info_group', 'reg_info_group.reg_info_id','=', 'reg_info.id')
            ->join('reg_info_group_line', 'reg_info_group_line.reg_info_group_id','=', 'reg_info_group.id')
            ->join('luadm.pp_pastatai', 'luadm.pp_pastatai.id','=', 'reg_info_group.building_id')
            ->join('luadm.pp_patalpos', 'luadm.pp_patalpos.id','=', 'reg_info_group.room_id')
            ->where('luadm.tips.tkods', '=', 'FO0050')
            ->orderBy('reg_info_group.reg_info_id')
            ->get();

        $subject2017Pav = reg_info::select('reg_info.subject_kods', 'reg_info.semester', 'reg_info.user_comment', 'luadm.kurss.knosauk', 'luadm.kurss.knosauka', 'luadm.tips.tnosauk', 'luadm.cilveks.vards', 'luadm.cilveks.uzvards', 'reg_info_group_line.day_no', 'reg_info_group_line.time_from', 'reg_info_group_line.time_to', 'luadm.pp_pastatai.adresas', 'luadm.pp_patalpos.nr', 'reg_info_group.group_no', 'luadm.tips.tkods')
            ->join('luadm.kurss', 'luadm.kurss.kkods', '=', 'reg_info.subject_kods')
            ->join('luadm.tips', 'reg_info.semester', '=', 'luadm.tips.tkods')
            ->join('luadm.cilveks', 'luadm.cilveks.ckods', '=', 'reg_info.profes_ckods')
            ->join('reg_info_group', 'reg_info_group.reg_info_id','=', 'reg_info.id')
            ->join('reg_info_group_line', 'reg_info_group_line.reg_info_group_id','=', 'reg_info_group.id')
            ->join('luadm.pp_pastatai', 'luadm.pp_pastatai.id','=', 'reg_info_group.building_id')
            ->join('luadm.pp_patalpos', 'luadm.pp_patalpos.id','=', 'reg_info_group.room_id')
            ->where('luadm.tips.tkods', '=', 'FO0049')
            ->orderBy('reg_info_group.reg_info_id')
            ->get();

        //bureliu destytoju vardai ir pavardes drop downe
        $professor = cilveks::select('cilveks.vards', 'cilveks.uzvards', 'cilveks.ckods')
            ->join('professors', 'professors.ckods', '=', 'cilveks.ckods')
            ->get();

        //bureliu pavadinimai drop downe
        $bureliai = Bureliai::select('luadm.kurss.knosauk', 'luadm.kurss.kkods', 'luadm.kurss.tips_nozare')
            ->where('tips_nozare', '=', 'FM0051')
            ->get();

        //semestru sarasas drop downe
        $semester = reg_info::select('reg_info.semester', 'luadm.tips.tnosauk', 'luadm.tips.tkods')
            ->join('luadm.tips', 'reg_info.semester', '=', 'luadm.tips.tkods')
            ->distinct()
            ->orderBy('luadm.tips.tnosauk', 'desc')
            ->get();

        $numb2018Rud = 1;
        $numb2018Pav = 1;
        $numb2017Rud = 1;
        $numb2017Pav = 1;

        $countrow = reg_info::select('reg_info.subject_kods', 'reg_info_group.reg_info_id', 'reg_info.semester', 'reg_info.user_comment', 'luadm.kurss.knosauk', 'luadm.kurss.knosauka', 'luadm.tips.tnosauk', 'luadm.cilveks.vards', 'luadm.cilveks.uzvards', 'reg_info_group_line.day_no', 'reg_info_group_line.time_from', 'reg_info_group_line.time_to', 'luadm.pp_pastatai.adresas', 'luadm.pp_patalpos.nr', 'reg_info_group.group_no', 'luadm.tips.tkods')
            ->join('luadm.kurss', 'luadm.kurss.kkods', '=', 'reg_info.subject_kods')
            ->join('luadm.tips', 'reg_info.semester', '=', 'luadm.tips.tkods')
            ->join('luadm.cilveks', 'luadm.cilveks.ckods', '=', 'reg_info.profes_ckods')
            ->join('reg_info_group', 'reg_info_group.reg_info_id','=', 'reg_info.id')
            ->join('reg_info_group_line', 'reg_info_group_line.reg_info_group_id','=', 'reg_info_group.id')
            ->join('luadm.pp_pastatai', 'luadm.pp_pastatai.id','=', 'reg_info_group.building_id')
            ->join('luadm.pp_patalpos', 'luadm.pp_patalpos.id','=', 'reg_info_group.room_id')
            ->where('luadm.tips.tkods', '=', 'FO0056')
            ->orderBy('reg_info_group.reg_info_id')
            //->orderBy('reg_info_group.reg_info_id')
            // ->distinct()
            ->where('reg_info.id', '=', '666')
            ->count();



        return view ("pages.reportsManagement", compact ('subject2018Rud', 'subject2018Pav', 'subject2017Pav', 'subject2017Rud', 'professor', 'bureliai', 'semester', 'numb2018Rud', 'numb2018Pav', 'numb2017Rud', 'numb2017Pav', 'countrow'));


    }

    public function addGroup()
    {
        $pastatai = pastatai::select('luadm.pp_pastatai.adresas', 'luadm.pp_pastatai.id')
            ->orderBy('adresas')
            ->get();

        $auditorija = patalpos::select('luadm.pp_patalpos.nr', 'luadm.pp_patalpos.id')
            ->orderBy('nr')
            ->get();
        return view('pages.professorsGroupAdd', compact ('pastatai', 'auditorija'));
    }



    public function readaguotiDestytoja()
    {
        return view('Forms.profEdit');
    }

    public function pridetiGrupe()
    {
        return view('pages.professorsGroupAdd');
    }
    public function Ieskoti()
    {
        $number = 1;

        return view("pages.searchas");
    }

    public function pridetiLaika()
    {
        return view("pages.addGroupTime");
    }

    public function redaguotiGrupe()
    {
        return view("pages.editGroup");
    }
}





