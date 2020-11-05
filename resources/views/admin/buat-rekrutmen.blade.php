@extends('sufee.main')
@section('title', 'Tambah Rekrutmen')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Tambah Rekrutmen</h1>
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
    <div class="card">
        <div class="card-header"><small> Isilah data dibawah ini </small><strong>Dengan Benar!</strong></div>

        <div class="card-body card-block">

            @if (count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                @foreach ($errors->all() as $error)

                {{ $error }} <br>

                @endforeach
            </div>
            @endif

            
            <!-- <h1>{{ Auth::user()->id }}</h1> -->
            <form method="post" action="/admin/rekrutmen" enctype="multipart/form-data" id="myForm">
                @csrf
                <div class="form-group">
                    <h5>Data <strong>Utama</strong></h5>
                </div>
                <input hidden id="organisasi_id" name="organisasi_id" value="{{ Auth::user()->id }}">
                <div class="form-group"><label for="nama" class=" form-control-label">Nama Rekrutmen</label><input type="text" name="nama" id="nama" placeholder="Open Recruitmen Staf/Kepanitiaan/Volunteer ..." class="form-control" required></div>
                <div class="form-group"><label for="deskripsi" class=" form-control-label">Deskripsi</label><textarea style="height: auto;" rows="15" name="deskripsi" id="deskripsi" placeholder="Timeline, Persyaratan, Alur, dll ..." class="form-control" required></textarea></div>

                <div class="form-group"><label for="poster" class=" form-control-label">Poster</label>
                    <input type="file" id="poster" name="poster" class="form-control-file" required>
                    <small><i>(Upload poster dengan type file jpg atau png maksimal berukuran 2MB)</i></small>

                    <!-- <div class="card">
                        <img width="210" height="290" class="img img-2" src="{{ url('andrea/images/image_1.jpg') }}"></img>
                    </div>
                    <button type="button" class="btn btn-primary btn-sm">Upload Poster</button> -->

                </div>
                <div class="form-group">
                    <label for="status" class=" form-control-label">Status</label>

                    <select name="status" id="status" class="form-control col col-md-3" required>
                        <option value="tersedia">Tersedia</option>
                        <option value="tutup">Tutup</option>
                    </select>

                </div>
                <br><br>
                <!-- <button type="button" id="buat_formulir" class="btn btn-primary btn-sm">Buat Formulir</button> -->
                <button type="button" id="tombol_show" class="btn btn-primary btn-sm">Buat Formulir</button>
                <button type="button" id="tombol_hide" class="btn btn-primary btn-sm">Batal Buat</button>
                <!-- <a id="buat_formulir">Show</a> -->
                <br><br>
                <div class="form-group" id="div_formulir" hide>
                    <div class="form-group">
                        <h5>Data <strong>Formulir</strong></h5>
                    </div>
                    <!-- <div class="form-group"><label for="deskripsi" class=" form-control-label">Motivasi</label><textarea row="1" id="deskripsi" placeholder="Motivasi" class="form-control"></textarea></div>

                    <div class="form-group"><textarea row="1" id="deskripsi" placeholder="Isi sesuai dengan pertanyaan formulir yang diinginkan (contoh: deskripsikan SWOT kamu) " class="form-control"></textarea></div> -->
                    <!-- <div class="form-group">
                        <div class="input-group">
                            <input name="custom_label" id="custom_label" class="form-control">
                        </div>
                    </div> -->

                    <div id="dynamic_field">
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input name="custom_label" id="custom_label" class="form-control">
                        </div>
                    </div>
                </div>


                <button type="submit" class="btn btn-primary">Simpan</button>

            </form>




        </div>

    </div>
    <!-- <div class="card">
        <div class="card-header"><small> Isilah data dibawah ini </small><strong>Dengan Benar!</strong></div>
        <div class="card-body card-block">
            <div class="form-group"><label for="nama" class=" form-control-label">Penerima</label><textarea type="text" id="nama" placeholder="" class="form-control"></textarea></div>
            <div class="form-check-inline form-check">
                <label for="deskripsi" class="form-check-label">Isi Pesan &nbsp&nbsp</label>
                <label for="inline-checkbox1" class="form-check-label ">
                    <input type="checkbox" id="inline-checkbox1" name="inline-checkbox1" value="option1" class="form-check-input">Tambah Konfirmasi Kehadiran &nbsp&nbsp
                </label>
                <br><br>
            </div>
            <textarea row="7" id="deskripsi" placeholder="" class="form-control"></textarea>
            <br>
            <div class="form-check-inline form-check">
                <label for="inline-checkbox1" class="form-check-label ">
                    <input type="checkbox" id="inline-checkbox1" name="inline-checkbox1" value="option1" class="form-check-input">Whatsapp &nbsp&nbsp
                </label>
                <label for="inline-checkbox2" class="form-check-label ">
                    <input type="checkbox" id="inline-checkbox2" name="inline-checkbox2" value="option2" class="form-check-input">Email &nbsp&nbsp
                </label>
                <label for="inline-checkbox3" class="form-check-label ">
                    <input type="checkbox" id="inline-checkbox3" name="inline-checkbox3" value="option3" class="form-check-input">SMS &nbsp&nbsp
                </label>
            </div>
            <br> <br>  
            <a href="/admin/pendaftar/list/1/pemberitahuan" type="button" class="btn btn-primary">Kirim Pemberitahuan</a>

        </div>

    </div> -->




</div>



<script>
    // $("#div_formulir").hide();
    // $("#tombol_hide").hide();

    // $(document).ready(function() {



    //     $("#tombol_show").click(function() {
    //         $("#tombol_show").hide();
    //         $("#tombol_hide").show();
    //         $("#div_formulir").show();
    //     })
    //     $("#tombol_hide").click(function() {
    //         $("#div_formulir").hide();
    //         $("#tombol_hide").hide();
    //         $("#tombol_show").show();
    //     })

    //     // $('#custom_label').change(function() {
    //     //     i++;
    //     //     var model = $('#custom_label').val();
    //     //     // $('#dynamic_field').append('<tr id="row'+i+'"><td><label>'model'</label></td></tr>');
    //     //     // $('#dynamic_field').append('<tr id="row' + i + '"><td><label>' + model + '</label><input type="text" name="' + model + '"  class="form-control name_list" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
    //     //     // $('#dynamic_field').append('<div class="form-group"><label class=" form-control-label">' + model + '</label><div class="input-group"><div class="input-group-addon"> <input name="' + model + '" id="custom_label" class="form-control"></div></div><small class="form-text text-muted">ex. 99/99/9999</small></div>');

    //     //     $('#div_formulir').append('<div class="form-group"><label class=" form-control-label">' + model + '</label><div class="input-group"><input value="' + model + '" name="data[]" class="form-control"></div></div>');
    //     //     // alert(model);

    //     // });

    //     $('#custom_label').change(function() {
    //         i++;
    //         var model = $('#custom_label').val();
    //         // $('#dynamic_field').append('<tr id="row'+i+'"><td><label>'model'</label></td></tr>');
    //         // $('#dynamic_field').append('<tr id="row' + i + '"><td><label>' + model + '</label><input type="text" name="' + model + '"  class="form-control name_list" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
    //         // $('#dynamic_field').append('<div class="form-group"><label class=" form-control-label">' + model + '</label><div class="input-group"><div class="input-group-addon"> <input name="' + model + '" id="custom_label" class="form-control"></div></div><small class="form-text text-muted">ex. 99/99/9999</small></div>');

    //         $('#dynamic_field').append('<div class="form-group"><label class=" form-control-label">' + model + '</label><div class="input-group"><input value="' + model + '" name="data[]" class="form-control"></div><small class="form-text text-muted">ex. 99/99/9999</small></div>');
    //         // alert(model);

    //     });
    // });
</script>

<script>
    $(document).ready(function() {
        var i = 1;
        $("#div_formulir").hide();
        $("#tombol_hide").hide();
        $("#tombol_show").click(function() {
            $("#tombol_show").hide();
            $("#tombol_hide").show();
            $("#div_formulir").show();
        })
        $("#tombol_hide").click(function() {
            $("#div_formulir").hide();
            $("#tombol_hide").hide();
            $("#tombol_show").show();
        })

        $('#custom_label').change(function() {
            i++;
            var model = $('#custom_label').val();

            $('#dynamic_field').append('<div class="form-group"><label class=" form-control-label">' + model + '</label><div class="input-group"><input value="' + model + '" name="data_formulir[]" class="form-control"></div></div>');

        });


    });
</script>


@endsection