@extends('Layouts.app')

@section('content')

    <script>
        function gruppridej()
        {
            document.getElementById('grupaddform').style.visibility ='visible';
        }

        function postdat()
        {
            document.getElementById()
        }


    </script>

    <div class="col-md-12" id="contentTop">

        <div class="col-md-12" id="pageName">
            <h4>Grupių tvarkymas</h4>
        </div>

        <form method="post"><div class="form-inline" id="addGroup">
                <table class="table">

                    <thead>
                    <tr>
                        <th>Grupės numeris</th>
                        <th> Pastatas</th>
                        <th>Auditorija *</th>
                        <th> <button class="btn" data-bind="click: addGroup" onclick="gruppridej()"><i class="fa fa-plus" aria-hidden="true"></i> grupę </button></th>
                    </tr>
                    </thead>
                    <input type="hidden" class="form-control" name="regInfoId" data-bind="value: subject" value="913">
                    <tbody data-bind="foreach: groups" id="grupaddform" style="visibility: hidden;">

                    <tr>
                        <td class="groupNoTd"><input type="text" style="width:20%;" class="form-control" data-bind="value: number" disabled=""></td>
                        <td><select class="form-control" name="adresai" id="adresai" class="form-control input-lg dynamic" data-dependent="auditorija">
                                @foreach($pastatai as $Pastats)
                                    <option value="{{$Pastats->id}}">{{$Pastats->adresas}}</option>
                                @endforeach
                            </select></td>
                        <td><select class="form-control" name="auditorija" id="auditorija">
                                @foreach($auditorija as $Patalps)
                                    <option value="{{$Patalps->id}}">{{$Patalps->nr}}</option>
                                @endforeach
                            </select></td>
                        <td><button class="btn small" data-bind="click: $parent.removeGroup"><i class="fa fa-minus" aria-hidden="true"></i> grupę </button></td>
                    </tr>

                    <tr>
                        <td colspan="4">
                            <table class="table" id="groupFormTable">
                                <thead>
                                <tr>
                                    <th>Diena</th>
                                    <th>Laikas nuo *</th>
                                    <th>Laikas iki *</th>
                                    <th><button class="btn small" data-bind="click: $parent.addTime"><i class="fa fa-plus" aria-hidden="true"></i> laiką</button></th>
                                </tr>
                                </thead>

                                <tbody data-bind="foreach: times">
                                <tr>
                                    <td>
                                        <select class="form-control" data-bind="value:day">
                                            <option value="I" selected="">I</option>
                                            <option value="II">II</option>
                                            <option value="III">III</option>
                                            <option value="IV">IV</option>
                                            <option value="V">V</option>
                                            <option value="VI">VI</option>
                                            <option value="VII">VII</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" name="timeFrom1" id="timeFrom" data-bind="value: from" class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" name="timeTo1" id="timeTo" data-bind="value: to" class="form-control">
                                    </td>
                                    <td>
                                        <button class="btn small" data-bind="click: function() { $parents[1].removeTime($parent, $data) }">
                                            <i class="fa fa-minus" aria-hidden="true"></i> laiką
                                        </button>
                                    </td>
                                </tr>
                                </tbody>

                            </table>

                        </td>

                    </tr>
                    </tbody>

                </table>
                <button type="submit" class="btn" data-bind="click: save, disable: groups().length == 0 || timeCount() == 0" disabled="">Išsaugoti</button>

                <img src="https://resources.vdu.lt/IRISfiles/pictures/default.svg" style="display:none;" id="loading">
                <div class="error col-md-12"><p>KLAIDA. Bandykite iš naujo.</p></div>
                <div class="success col-md-12"><p>Dalykas išsaugotas!</p></div>
                <script src="https://resources.vdu.lt/IRISfiles/scripts/baseKnockout.js"></script>

            </div></form>


    </div>


@endsection