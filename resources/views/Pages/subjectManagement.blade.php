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
            <h4>Dalykų tvarkymas</h4>
        </div>
        <ul class="nav nav-tabs col-md-12">
            <li class="active"><a data-toggle="tab" href="#tab1" id="tab1Btn" aria-expanded="true">Suvesti dalykai</a></li>
            <li class=""><a data-toggle="tab" href="#tab2" id="tab2Btn" aria-expanded="false">Pridėti naują dalyką</a></li>
        </ul>
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
                <div id="subjectListShowDiv"><script>
                        $(".error").hide();
                        $(".success").hide();
                    </script>

                    <div class="error col-md-12" style="display: none;"><p>KLAIDA. Bandykite iš naujo.</p></div>
                    <div class="success col-md-12" style="display: none;"><p>Dalykai perkelti! Atlikite paiešką iš naujo.</p></div>

                    <form id="moveRegInfoData" method="post">
                        <div class="fl" id="mygtukPerkelt" style="visibility: hidden;"><button type="submit" class="btn" onclick="moveRegInfoData('FO0056');return false;">Perkelti pažymėtus į 2018 rudens semestrą</button></div><img src="https://resources.vdu.lt/IRISfiles/pictures/default.svg" style="display:none;" id="loading"><div class="fr"><p>Dalykų neleidžiam trinti jei jame yra nors vienas užsirašęs studentas. </p></div>

  <!--2018 rudens semestro lenteles stulpeliu sugrupavimas-->
  <table class="table" id="rud2018lent" style="display: none;">
    <thead>
         <tr>
            <th>Nr.</th>
            <th class="col-md-7">Apie dalyką</th>
            <th class="col-md-1">Grupė</th>
            <th class="col-md-1">Diena</th>
            <th class="col-md-1">Laikas</th>
            <th class="col-md-2">Adresas</th>
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
        <a href="#" title="Naikinti dalyką" onclick="return confirm('Ar norite panaikinti dalyka?')" class="noDecoration btn small"><i class="fa fa-trash"></i></a>
    </td>
    <td rowspan="1">{{$Subjects -> group_no}}<button type="button" onclick="openTimeWin()" target="_blank" title="Pridėti laiką" class="noDecoration btn small"><i class="fa fa-plus"></i></button></td>
    <td>{{$Subjects -> day_no}}</td>
    <td>{{$Subjects -> time_from}} - {{$Subjects -> time_to}}</td>
    <td>{{$Subjects -> adresas}} {{$Subjects -> nr}}<button type="button" title="Redaguoti" onclick="editGroupForm()" class="noDecoration btn small"><i class="fa fa-pencil"></i></button>
        <a href="#" title="Naikinti" onclick="deleteFromRegInfoGroup('474','FO0056');return false;" class="noDecoration btn small"><i class="fa fa-trash"></i></a></td>
</tr>

    @endforeach


 </tbody>
</table>

  <!--2018 pavasario semestro lenteles stulpeliu sugrupavimas-->
  <table class="table" id="pav2018lent" style="display: none;">
     <thead>
        <tr>
           <th>Nr.</th>
           <th class="col-md-7">Apie dalyką</th>
           <th class="col-md-1">Grupė</th>
           <th class="col-md-1">Diena</th>
           <th class="col-md-1">Laikas</th>
           <th class="col-md-2">Adresas</th>
         </tr>
     </thead>


 <tbody>
   <tr>
     <!--2018 pavasario semestro bureliai-->
     @foreach($subject2018Pav as $Subjects)
      <td rowspan="1"><input type="checkbox" class="regId" name="id">{{$numb2018Pav++}}</td>
      <td rowspan="1">
      {{$Subjects -> knosauk}} / {{$Subjects -> knosauka}}<br>{{$Subjects -> vards}} {{$Subjects -> uzvards}}<br><i>{{$Subjects -> user_comment}}</i>
      <br>{{$Subjects -> tnosauk}}
        <a href="#" title="Naikinti dalyką" onclick="return confirm('Ar norite panaikinti dalyka?')" class="noDecoration btn small"><i class="fa fa-trash"></i></a>
      </td>
      <td rowspan="1">{{$Subjects -> group_no}}<button type="button" onclick="openTimeWin()" target="_blank" title="Pridėti laiką" class="noDecoration btn small"><i class="fa fa-plus"></i></button></td>
      <td>{{$Subjects -> day_no}}</td>
      <td>{{$Subjects -> time_from}} - {{$Subjects -> time_to}}</td>
      <td>{{$Subjects -> adresas}} {{$Subjects -> nr}}<button type="button" title="Redaguoti" onclick="editGroupForm()" class="noDecoration btn small"><i class="fa fa-pencil"></i></button>
        <a href="#" title="Naikinti" onclick="deleteFromRegInfoGroup('474','FO0056');return false;" class="noDecoration btn small"><i class="fa fa-trash"></i></a></td>
   </tr>
    @endforeach
 </tbody>
 </table>

    <!--2017 rudens semestro lenteles stulpeliu sugrupavimas-->
    <table class="table" id="rud2017lent" style="display: none;">
      <thead>
        <tr>
           <th>Nr.</th>
           <th class="col-md-7">Apie dalyką</th>
           <th class="col-md-1">Grupė</th>
           <th class="col-md-1">Diena</th>
           <th class="col-md-1">Laikas</th>
           <th class="col-md-2">Adresas</th>
        </tr>
      </thead>

  <tbody>
    <tr>
      <!--2017 rudens semestro bureliai-->
      @foreach($subject2017Rud as $Subjects)
      <td rowspan="1"><input type="checkbox" class="regId" name="id">{{$numb2017Rud++}}</td>
      <td rowspan="1">
        {{$Subjects -> knosauk}} / {{$Subjects -> knosauka}}<br>{{$Subjects -> vards}} {{$Subjects -> uzvards}}<br><i>{{$Subjects -> user_comment}}</i>
        <br>{{$Subjects -> tnosauk}}
          <a href="#" title="Naikinti dalyką" onclick="return confirm('Ar norite panaikinti dalyka?')" class="noDecoration btn small"><i class="fa fa-trash"></i></a>
      </td>
      <td rowspan="1">{{$Subjects -> group_no}}<button type="button" onclick="openTimeWin()" target="_blank" title="Pridėti laiką" class="noDecoration btn small"><i class="fa fa-plus"></i></button></td>
      <td>{{$Subjects -> day_no}}</td>
      <td>{{$Subjects -> time_from}} - {{$Subjects -> time_to}}</td>
      <td>{{$Subjects -> adresas}} {{$Subjects -> nr}}<button type="button" title="Redaguoti" onclick="editGroupForm()" class="noDecoration btn small"><i class="fa fa-pencil"></i></button>
          <a href="/delete/{{$Subjects->id}}" title="Naikinti" onclick="deleteFromRegInfoGroup('474','FO0056');return false;" class="noDecoration btn small"><i class="fa fa-trash"></i></a></td>
        </tr>
      @endforeach
  </tbody>
    </table>

  <!--2017 pavasario semestro lenteles stulpeliu sugrupavimas-->
 <table class="table" id="pav2017lent" style="display: none;">
    <thead>
      <tr>
        <th>Nr.</th>
        <th class="col-md-7">Apie dalyką</th>
        <th class="col-md-1">Grupė</th>
        <th class="col-md-1">Diena</th>
        <th class="col-md-1">Laikas</th>
        <th class="col-md-2">Adresas</th>
      </tr>
    </thead>


 <tbody>
    <tr>
        <!--2017 pavasario semestro bureliai-->
     @foreach($subject2017Pav as $Subjects)
       <td rowspan="1"><input type="checkbox" class="regId" name="id">{{$numb2017Pav++}}</td>
       <td rowspan="1">
          {{$Subjects -> knosauk}} / {{$Subjects -> knosauka}}<br>{{$Subjects -> vards}} {{$Subjects -> uzvards}}<br><i>{{$Subjects -> user_comment}}</i>
        <br>{{$Subjects -> tnosauk}}
          <a href="#" title="Naikinti dalyką" onclick="return confirm('Ar norite panaikinti dalyka?')" class="noDecoration btn small"><i class="fa fa-trash"></i></a>
       </td>
       <td rowspan="1">{{$Subjects -> group_no}}<button type="button" onclick="openTimeWin()" target="_blank" title="Pridėti laiką" class="noDecoration btn small"><i class="fa fa-plus"></i></button></td>
       <td>{{$Subjects -> day_no}}</td>
       <td>{{$Subjects -> time_from}} - {{$Subjects -> time_to}}</td>
       <td>{{$Subjects -> adresas}} {{$Subjects -> nr}}<button type="button" title="Redaguoti" onclick="editGroupForm()" class="noDecoration btn small"><i class="fa fa-pencil"></i></button>
          <a href="#" title="Naikinti" onclick="deleteFromRegInfoGroup('474','FO0056');return false;" class="noDecoration btn small"><i class="fa fa-trash"></i></a></td>
     </tr>
     @endforeach
 </tbody>
</table>
</form>
</div>
</div>


<div id="tab2" class="tab-pane fade tab-text col-md-12">
<div class="col-md-6 fl">

@if(count($errors)> 0)
<div class="alert alert-danger">
    <ul>
        @foreach($errors -> all as $error)
            <li>{{$error}}</li>
            @endforeach
    </ul>
</div>
    @endif

    @if(\Session::has('success'))
        <div class="alert alert-success">
            <p>{{\Session::get('success')}}</p>
        </div>
        @endif

<form method="post" action="{{('addgroup')}}">
@csrf
<label>Dalykas</label>
<div class="form-group">
<select class="form-control" name="subject_kods" id="subject">
    @foreach($bureliai as $Bureliais)
        <option value="{{$Bureliais->kkods}}">{{$Bureliais->knosauk}}</option>
    @endforeach

</select>
</div>


<label>Dėstytojas</label>
<div class="form-group">
<select class="form-control" name="profes_ckods" id="professor">
    @foreach($professor as $Professors)
        <option value="{{$Professors->ckods}}">{{$Professors->vards}} {{$Professors->uzvards}}</option>
    @endforeach

</select>
</div>


    <label>Semestras</label>
<div class="form-group">
<select class="form-control" name="semester" id="semester">
    @foreach($semester as $Semesters)
        <option value="{{$Semesters->tkods}}">{{$Semesters->tnosauk}}</option>
    @endforeach
</select>
</div>

<label>Komentaras</label>
<div class="form-group">
<textarea class="form-control" name="user_comment" id="user_comment"></textarea>
</div>

<div class="form-group">

    <input type="submit" value="Pridėti grupių" onclick="return confirm('Ar tikrai norite pridėti grupę?')" class="btn"/>
    <!--<a href="/pridgrupe"><button type="button" class="btn" onclick="return confirm('Ar tikrai norite pridėti grupę?')"><i class="fa fa-plus" aria-hidden="true"></i> grupių</button></a>-->
</div>
</form>
</div>
    <div id="addRegInfoGroup"></div>
</div>
</div>
</div>

@endsection



















<!--<form method="post" action="{{url('Pages')}}">
@csR F
        <label>Dalykas</label>
        <div class="form-group">
        <input type="text" name="subject" class="form-control" placeholder="Dalykas" />

        </div>


        <label>Dėstytojas</label>
        <div class="form-group">

            <input type="text" name="professor" class="form-control" placeholder="Destytojas" />

        </div>


            <label>Semestras</label>
        <div class="form-group">

            <input type="text" name="semester" class="form-control" placeholder="semester" />

        </div>

        <label>Komentaras</label>
        <div class="form-group">
        <textarea class="form-control" name="user_comment" id="user_comment"></textarea>
        </div>

        <div class="form-group">

            <input type="submit" class="btn btn-primary"/>
            <a href="/pridgrupe"><button type="button" class="btn" onclick="return confirm('Ar tikrai norite pridėti grupę?')"><i class="fa fa-plus" aria-hidden="true"></i> grupių</button></a>
        </div>
        </form> -->