@extends('Layouts.app')

@section('content')
    <div class="col-md-12" id="contentTop"><script>

            $(document).ready(function(){
                $(".datepicker").datepicker({
                    format: "yyyy-mm-dd",
                    todayHighlight: true,

                });
            });
        </script>
        <div class="col-md-12" id="pageName">
            <h3>VDU įvairiu registracijų į dalykus informacinė sistema</h3>
        </div>
        Regsitracijos veikimo data:

        <div class="form-inline">
            <form id="regDateSave" method="post">

                <div class="form-group">
                    <input data-provide="datepicker" class="datepicker form-control" name="regDateFrom" placeholder="yyyy-mm-dd" value="2018.02.02">
                </div>
                <div class="form-group">
                    <input data-provide="datepicker" class="datepicker form-control" name="regDateTo" placeholder="yyyy-mm-dd" value="2018.06.19">

                </div>
                <div class="form-group">
                    <button type="submit" class="btn" onclick="submitFormAjax(this.form.id,1);return false;">Išsaugoti</button>
                </div>
                <img src="https://resources.vdu.lt/IRISfiles/pictures/default.svg" style="display:none;" id="loading">
            </form>
        </div>
        <div class="success col-md-6"><p>Data pakeista!</p></div>
        <div class="error col-md-6"><p>KLAIDA. Bandykite iš naujo.</p></div>

        <div class="col-md-12"><p>Dėl techninių sistemos nesklandumų ar klausimų prašome kreiptis:</p>
            <p><b>gintare.ceidaite@vdu.lt, tel.nr.: 5008</b> </p></div>
    </div>
@endsection