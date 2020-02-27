@extends('Forms.addTimeForm')


@section('content')

    <body>
      <div class="popUpRow">
        <div class="form-group">
            <form id="reportShow" method="post" action="IRIS_ADMIN.insertIntoRegInfoGroupLine">

                <div class="form-group">
                    <label>Diena</label>

                    <select class="form-control" name="p_day_in">
                        <option value="I" selected="">I</option>
                        <option value="II">II</option>
                        <option value="III">III</option>
                        <option value="IV">IV</option>
                        <option value="V">V</option>
                        <option value="VI">VI</option>
                        <option value="VII">VII</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Laikas nuo *</label>
                    <input type="text" class="form-control" name="p_timeFrom_in" value="10:00">
                </div>
                <div class="form-group">
                    <label>Laikas iki *</label>
                    <input type="text" class="form-control" name="p_timeTo_in" value="12:00">
                </div>
                <input type="hidden" name="p_group_id" value="552">

                <button type="submit" class="btn">Išsaugoti</button>
            </form></div><div>
        </div></div></body>

@endsection