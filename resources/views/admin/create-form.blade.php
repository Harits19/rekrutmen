@extends('sufee.main')
@section('title', 'Tambah Form Pendaftaran')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Tambah Form Pendaftaran</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active"><i class="fa fa-dashboard"></i></li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')

<div class="content mt-3">

    <div class="animated fadeIn">

        <div class="row">
            <div class="col-xs-6 col-sm-6">

                <div class="card">
                    <div class="card-header">
                        <small> Isilah Data Dibawah Ini </small> <strong>Dengan Benar</strong>
                    </div>
                    <div class="card-body card-block">
                        <form id="laravel_json" method="post" action="/admin/form/store">
                            {{ csrf_field() }}

                            <div id="dynamic_field">
                                <!-- <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td> -->
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>

                        <div class="form-group">
                            <div class="input-group">
                                <input name="custom_label" id="custom_label" class="form-control">
                            </div>
                        </div>

                        <!-- <div class="form-group">
                            <label class=" form-control-label">Date input</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                <input class="form-control">
                            </div>
                            <small class="form-text text-muted">ex. 99/99/9999</small>
                        </div> -->

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            var i = 1;
            $('#add').click(function() {
                i++;
                $('#dynamic_field').append('<tr id="row' + i + '"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
            });
            $('#custom_label').change(function() {
                i++;
                var model = $('#custom_label').val();
                // $('#dynamic_field').append('<tr id="row'+i+'"><td><label>'model'</label></td></tr>');
                // $('#dynamic_field').append('<tr id="row' + i + '"><td><label>' + model + '</label><input type="text" name="' + model + '"  class="form-control name_list" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
                // $('#dynamic_field').append('<div class="form-group"><label class=" form-control-label">' + model + '</label><div class="input-group"><div class="input-group-addon"> <input name="' + model + '" id="custom_label" class="form-control"></div></div><small class="form-text text-muted">ex. 99/99/9999</small></div>');

                $('#dynamic_field').append('<div class="form-group"><label class=" form-control-label">' + model + '</label><div class="input-group"><input value="' + model + '" name="data[]" class="form-control"></div><small class="form-text text-muted">ex. 99/99/9999</small></div>');
                // alert(model);

            });
            $(document).on('click', '.btn_remove', function() {
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
            });
            //     $('#submit').click(function(){
            //         //  $.ajax({
            //         //     type:"POST",
            //         //     url: host + "/store_dynamic",
            //         //     data:$('#add_name').serialize(),
            //         //     success:function()
            //         //       {

            //         //       }
            //         //  });
            //     // $.ajax({
            //     //   url: "{{ url('store-dynamic')}}",
            //     //   method: 'post',
            //     //   data: $('#add_name').serialize(),
            //     //   success: function(response){
            //     //     alert('sukses');
            //     //   }});

            //     $("#add_name").submit();


            //    });

            $('#add_name').on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    // url: '{{ ("store-dynamic") }}',
                    method: 'post',
                    data: $(this).serialize(),
                    // dataType:'json',
                    // beforeSend:function(){
                    //     $('#save').attr('disabled','disabled');
                    // },
                    success: function(data) {
                        // if(data.error)
                        // {
                        //     var error_html = '';
                        //     for(var count = 0; count < data.error.length; count++)
                        //     {
                        //         error_html += '<p>'+data.error[count]+'</p>';
                        //     }
                        //     $('#result').html('<div class="alert alert-danger">'+error_html+'</div>');
                        // }
                        // else
                        // {
                        //     dynamic_field(1);
                        //     $('#result').html('<div class="alert alert-success">'+data.success+'</div>');
                        // }
                        // $('#save').attr('disabled', false);
                    }
                })
            });

        });
    </script>


</div>

@endsection