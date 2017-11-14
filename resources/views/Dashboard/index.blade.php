@extends('layouts.index')
@section('content')
<br><br><br><br>
<form method="post" id="form" action="{{ route('employee.insert') }}" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div  id="insert" tabindex="-1" role="dialog" aria-labelledby="insert" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                    <h4 class="modal-title custom_align" id="Heading">TEST</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label >text1</label>
                        <input type="text" class="form-control" name="text1" id="text1" style="width: 200px;" required>
                    </div>
                    <div class="form-group">
                        <label >text1</label>
                        <input type="text" class="form-control" name="text2" id="text2" style="width: 200px;" required>
                    </div>
                    <div class="form-group">
                        <label >text1</label>
                        <input type="date" class="form-control" name="date" id="date" style="width: 200px;" required>
                    </div>
                    
                <div class="modal-footer ">
                    <button type="submit" class="btn btn-success btn-lg" id="submit" style="width: 100%;">
                        <span class="glyphicon glyphicon-ok-sign"></span>&nbsp;เพิ่มข้อมูล
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<div>
    <center>
        <p>text1&nbsp;text2&nbsp;date</p>
    </center>
</div>

<script type="text/javascript">
    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });
    $(document).ready(function(){
        $('#submit').submit(function) {
            var text1 = $('#text1').val();
            var text1 = $('#text1').val();
            var date = $('#date').val();
            console.log("text1 : " + text);
            $.ajax({
                type: "POST",
                url: "/test.t",
                data: {
                    '_token': $('input[name=_token]').val(),
                    'text1': $('#text1').val(),
                    'text2': $('#text1').val(),
                    'date': $('#date').val()
                },
            });
        });
    });
</script>

@stop