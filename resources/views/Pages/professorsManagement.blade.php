@extends('Layouts.app')

@section('content')
    <div class="col-md-12" id="contentTop">
        <div class="col-md-12" id="pageName">
            <h4>Dėstytojų tvarkymas</h4>
        </div>
        <div class="col-md-6 fl" id="registeredProfessors">

        <h3>Suvesti dėstytojai</h3>

        <table class="table">
            <thead>
            <tr>
                <th>Nr.</th>
                <th>Dėstytojas</th>
                <th>TAB numeris</th>
                <th>Komentaras</th>
                <th>Statusas</th>
                <th title="Redaguoti"><i class="fa fa-pencil"></i></th>

            </tr>
            </thead>


            <tbody>
            @foreach($professor as $Professors)
                <tr>
                    <td>{{$number++}}</td>
                    <td>{{$Professors->vards}}
                        {{$Professors->uzvards}}</td>
                    <td>{{$Professors->tab_number}}</td>
                    <td>{{$Professors->details}}</td>
                    <td><a class="noDecoration btn" title="Padaryti neaktyvų" onclick="changeProfessorStatus('23',1);return false;"><i class="fa fa-minus"></i></a></td>
                    <td><a class="noDecoration btn" title="Redaguoti" onclick="MyWindow=window.open('redDest','MyWindow','width=600,height=300'); return false;"><i class="fa fa-pencil"></i></a></td>
                    <td><a href="{{ route('professor.edit',['id' => $Professors->id])}}" class="btn btn-primary">Edit</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
    <div class="col-md-6 fr" id="saveProfessorsList">

        <h3>Ieškoti naujų dėstytojų</h3>
        <div class="form-inline">
            <form action="/search" method="POST" role="search">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" class="form-control" name="q"
                           placeholder="Pavardė"> <span class="input-group-btn">
					<button type="submit" class="btn btn-default">
						<span class="">Ieškoti</span>
					</button>
				</span>
                </div>
            </form>
        </div>
    </div>
    <script>
        $( "#registeredProfessors" ).load( "IRIS_ADMIN.saveProfessorsListShow")</script>
    <script>
        $( "#saveProfessorsList" ).load( "IRIS_ADMIN.searchProfessorsForm")</script>
</div>
@endsection