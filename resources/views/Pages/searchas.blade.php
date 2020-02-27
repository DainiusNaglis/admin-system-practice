@extends('Layouts.app')

@section('content')
<div class="container">
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
    <div class="container">
        @if(isset($details))
            <p> Paieškos rezultatai pagal užklausą: <b> {{ $query }} </b></p>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Nr.</th>
                    <th>Vardas, pavardė</th>
                    <th>A.k.</th>
                    <th>Pridėti</th>
                </tr>
                </thead>
                <tbody>
                @foreach($details as $prof)
                    <tr>
                        <td>1</td>
                        <td>{{$prof->vards}}
                        {{$prof->uzvards}}</td>
                        <td>{{$prof->pers_kods}}</td>
                        <td><a href="#" class="noDecoration btn" onclick="professorFormPopUp('21310'); return false;"><i class="fa fa-plus" aria-hidden="true"></i></a></td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        @elseif(isset($message))
            <p>{{ $message }}</p>
        @endif
    </div>

@endsection