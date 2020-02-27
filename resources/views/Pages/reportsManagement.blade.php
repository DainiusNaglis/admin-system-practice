@extends('Layouts.app')

@section('content')

    <script>
        function showData()
        {
            var selectBox = document.getElementById('semester');
            var userInput = selectBox.options[selectBox.selectedIndex].value;
            if (userInput == 'FO0056')
            {
                document.getElementById('rud2018lent').style.display ='inline-block';
                document.getElementById('pav2018lent').style.display ='none';
                document.getElementById('pav2017lent').style.display ='none';
                document.getElementById('rud2017lent').style.display ='none';
                document.getElementById('mygtukPerkelt').style.visibility ='visible';
            }
            else if (userInput == 'FO0055')
            {
                document.getElementById('pav2018lent').style.display ='inline-block';
                document.getElementById('rud2018lent').style.display ='none'
                document.getElementById('rud2017lent').style.display ='none';
                document.getElementById('pav2017lent').style.display ='none';
                document.getElementById('mygtukPerkelt').style.visibility ='visible';
            }
            else if (userInput == 'FO0050')
            {
                document.getElementById('rud2017lent').style.display ='inline-block';
                document.getElementById('rud2018lent').style.display ='none'
                document.getElementById('pav2018lent').style.display ='none';
                document.getElementById('pav2017lent').style.display ='none';
                document.getElementById('mygtukPerkelt').style.visibility ='visible';
            }
            else if (userInput == 'FO0049')
            {
                document.getElementById('pav2017lent').style.display ='inline-block';
                document.getElementById('rud2018lent').style.display ='none'
                document.getElementById('pav2018lent').style.display ='none';
                document.getElementById('rud2017lent').style.display ='none';
                document.getElementById('mygtukPerkelt').style.visibility ='visible';
            }
        }

        function openTimeWin(){
            myWindow=window.open("{{url('addGroupTime')}}", "", "width=550,height=550");
            myWindow.moveTo(3,200);
        }

        function editGroupForm(){
            myWindow=window.open("{{url('editGroup')}}", "", "width=550,height=550");
            myWindow.moveTo(3,200);
        }

        function skaiciuoti()
        {
            console.count();
        }

    </script>

    <div class="col-md-12" id="contentTop">
        <div class="col-md-12" id="pageName">
            <h4>Ataskaitų tvarkymas</h4>
        </div>

        <div class="tab-content">
            <div id="tab1" class="tab-pane fade tab-text col-md-12 active in">
                <div class="form-inline">
                    <form id="subjectListShow" method="post">
                        <div class="form-group">
                            <select class="form-control" id="semester" name="p_semester_in">
                                @foreach($semester as $Semesters)
                                    <option value="{{$Semesters->tkods}}">{{$Semesters->tnosauk}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn" onclick="return showData();">Rodyti</button>
                        </div>
                        <img src="https://resources.vdu.lt/IRISfiles/pictures/default.svg" style="display:none;" id="loading">
                    </form>
                </div>


                        <!--2018 rudens semestro lenteles stulpeliu sugrupavimas-->
                        <table class="table" id="rud2018lent" style="display: none;">
                            <thead>
                            <tr>
                                <th>Nr.</th>
                                <th class="col-md-5">Apie dalyką</th>
                                <th class="col-md-1">Grupė</th>
                                <th class="col-md-1">Diena</th>
                                <th class="col-md-1">Laikas</th>
                                <th class="col-md-2">Adresas</th>
                                <th class="col-md-1">Aktyvūs studentai</th>
                                <th class="col-md-1">Visi studentai</th>

                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <!--2018 rudens semestro bureliai-->

                                @foreach($subject2018Rud as $Subjects)

                                    <td rowspan="1"><input type="checkbox" class="regId" name="id">{{$numb2018Rud++}}</td>
                                    <td rowspan="1">
                                        {{$Subjects -> knosauk}} / {{$Subjects -> knosauka}}<br>{{$Subjects -> vards}} {{$Subjects -> uzvards}}<br><i>{{$Subjects -> user_comment}}</i>
                                        <br>{{$Subjects -> tnosauk}}

                                    </td>
                                    <td rowspan="1">{{$Subjects -> group_no}}</td>
                                    <td>{{$Subjects -> day_no}}</td>
                                    <td>{{$Subjects -> time_from}} - {{$Subjects -> time_to}}</td>
                                    <td>{{$Subjects -> adresas}} {{$Subjects -> nr}}</td>
                                    <td rowspan="1">
                                        <a class="noDecoration btn small" title="Sąrašas" onclick="showSubjectStudentList('471','FO0056',1);return false;">0</a>
                                    </td>
                                    <td rowspan="1">
                                        <a class="noDecoration btn small" title="Sąrašas" onclick="showSubjectStudentList('471','FO0056',0);return false;">0</a>
                                    </td>
                            </tr>

                            @endforeach


                            </tbody>
                        </table>

                        <!--2018 pavasario semestro lenteles stulpeliu sugrupavimas-->
                        <table class="table" id="pav2018lent" style="display: none;">
                            <thead>
                            <tr>
                                <th>Nr.</th>
                                <th class="col-md-5">Apie dalyką</th>
                                <th class="col-md-1">Grupė</th>
                                <th class="col-md-1">Diena</th>
                                <th class="col-md-1">Laikas</th>
                                <th class="col-md-2">Adresas</th>
                                <th class="col-md-1">Aktyvūs studentai</th>
                                <th class="col-md-1">Visi studentai</th>

                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <!--2018 rudens semestro bureliai-->

                                @foreach($subject2018Pav as $Subjects)

                                    <td rowspan="1"><input type="checkbox" class="regId" name="id">{{$numb2018Pav++}}</td>
                                    <td rowspan="1">
                                        {{$Subjects -> knosauk}} / {{$Subjects -> knosauka}}<br>{{$Subjects -> vards}} {{$Subjects -> uzvards}}<br><i>{{$Subjects -> user_comment}}</i>
                                        <br>{{$Subjects -> tnosauk}}

                                    </td>
                                    <td rowspan="1">{{$Subjects -> group_no}}</td>
                                    <td>{{$Subjects -> day_no}}</td>
                                    <td>{{$Subjects -> time_from}} - {{$Subjects -> time_to}}</td>
                                    <td>{{$Subjects -> adresas}} {{$Subjects -> nr}}</td>
                                    <td rowspan="1">
                                        <a class="noDecoration btn small" title="Sąrašas" onclick="showSubjectStudentList('471','FO0056',1);return false;">0</a>
                                    </td>
                                    <td rowspan="1">
                                        <a class="noDecoration btn small" title="Sąrašas" onclick="showSubjectStudentList('471','FO0056',0);return false;">0</a>
                                    </td>
                            </tr>

                            @endforeach


                            </tbody>
                        </table>

                        <!--2017 rudens semestro lenteles stulpeliu sugrupavimas-->
                        <table class="table" id="rud2017lent" style="display: none;">
                            <thead>
                            <tr>
                                <th>Nr.</th>
                                <th class="col-md-5">Apie dalyką</th>
                                <th class="col-md-1">Grupė</th>
                                <th class="col-md-1">Diena</th>
                                <th class="col-md-1">Laikas</th>
                                <th class="col-md-2">Adresas</th>
                                <th class="col-md-1">Aktyvūs studentai</th>
                                <th class="col-md-1">Visi studentai</th>

                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <!--2018 rudens semestro bureliai-->

                                @foreach($subject2017Rud as $Subjects)

                                    <td rowspan="1"><input type="checkbox" class="regId" name="id">{{$numb2017Rud++}}</td>
                                    <td rowspan="1">
                                        {{$Subjects -> knosauk}} / {{$Subjects -> knosauka}}<br>{{$Subjects -> vards}} {{$Subjects -> uzvards}}<br><i>{{$Subjects -> user_comment}}</i>
                                        <br>{{$Subjects -> tnosauk}}

                                    </td>
                                    <td rowspan="1">{{$Subjects -> group_no}}</td>
                                    <td>{{$Subjects -> day_no}}</td>
                                    <td>{{$Subjects -> time_from}} - {{$Subjects -> time_to}}</td>
                                    <td>{{$Subjects -> adresas}} {{$Subjects -> nr}}</td>
                                    <td rowspan="1">
                                        <a class="noDecoration btn small" title="Sąrašas" onclick="showSubjectStudentList('471','FO0056',1);return false;">0</a>
                                    </td>
                                    <td rowspan="1">
                                        <a class="noDecoration btn small" title="Sąrašas" onclick="showSubjectStudentList('471','FO0056',0);return false;">0</a>
                                    </td>
                            </tr>

                            @endforeach


                            </tbody>
                        </table>

                        <!--2017 pavasario semestro lenteles stulpeliu sugrupavimas-->
                        <table class="table" id="pav2017lent" style="display: none;">
                            <thead>
                            <tr>
                                <th>Nr.</th>
                                <th class="col-md-5">Apie dalyką</th>
                                <th class="col-md-1">Grupė</th>
                                <th class="col-md-1">Diena</th>
                                <th class="col-md-1">Laikas</th>
                                <th class="col-md-2">Adresas</th>
                                <th class="col-md-1">Aktyvūs studentai</th>
                                <th class="col-md-1">Visi studentai</th>

                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <!--2018 rudens semestro bureliai-->

                                @foreach($subject2017Pav as $Subjects)

                                    <td rowspan="1"><input type="checkbox" class="regId" name="id">{{$numb2017Pav++}}</td>
                                    <td rowspan="1">
                                        {{$Subjects -> knosauk}} / {{$Subjects -> knosauka}}<br>{{$Subjects -> vards}} {{$Subjects -> uzvards}}<br><i>{{$Subjects -> user_comment}}</i>
                                        <br>{{$Subjects -> tnosauk}}

                                    </td>
                                    <td rowspan="1">{{$Subjects -> group_no}}</td>
                                    <td>{{$Subjects -> day_no}}</td>
                                    <td>{{$Subjects -> time_from}} - {{$Subjects -> time_to}}</td>
                                    <td>{{$Subjects -> adresas}} {{$Subjects -> nr}}</td>
                                    <td rowspan="1">
                                        <a class="noDecoration btn small" title="Sąrašas" onclick="showSubjectStudentList('471','FO0056',1);return false;">0</a>
                                    </td>
                                    <td rowspan="1">
                                        <a class="noDecoration btn small" title="Sąrašas" onclick="showSubjectStudentList('471','FO0056',0);return false;">0</a>
                                    </td>
                            </tr>

                            @endforeach


                            </tbody>
                        </table>

                </div>
            </div>

@endsection