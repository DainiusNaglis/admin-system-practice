@extends('Forms.editGroupForm')


@section('content')

    <body><div class="popUpRow">
        <div class="col-md-12">
            <form id="editGroupLineSave" method="post">

                <div class="form-group">
                    <label>Diena</label>
                    <select class="form-control" name="dayNo">
                        <option value="I" selected="">I</option>
                        <option value="II">II</option>
                        <option value="III">III</option>
                        <option value="IV">IV</option>
                        <option value="V">V</option>

                    </select>
                </div>
                <label>Laikas nuo</label>
                <div class="form-group">
                    <input type="text" class="form-control" name="timeFrom" value="10:00">
                </div>
                <label>Laikas iki</label>
                <div class="form-group">
                    <input type="text" class="form-control" name="timeTo" value="12:00">
                </div>
                <input type="hidden" class="form-control" name="p_line_id" value="732">
                <div class="form-group">
                    <label>Pastatas</label>

                    <select class="form-control" name="building" id="buildingSelect">
                        @foreach($subject2018Rud as $Subjects)
                        <option value="{{$Subjects->adresas}}">{{$Subjects->adresas}}</option>
                        @endforeach
                    </select>

                </div>

                <div class="form-group">
                    <label>Auditorija</label>
                    <select class="form-control" name="room" >
                        @foreach($subject2018Rud as $Subjects)
                        <option value="{{$Subjects->nr}}">{{$Subjects->nr}}</option>
                        @endforeach
                    </select>
                </div>
                <input type="hidden" class="form-control" name="p_group_id" value="471">
                <div class="form-group">
                    <button type="submit" class="btn" onclick="submitFormAjax(this.form.id,3);return false;">Išsaugoti</button>
                </div>
                <img src="https://resources.vdu.lt/IRISfiles/pictures/default.svg" style="display:none;" id="loading">
            </form>
        </div></div>
    </body>

@endsection