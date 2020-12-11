@extends('sufee.main')
@section('title', 'Buat Informasi Rekrutmen')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Buat Informasi Rekrutmen</h1>
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
                </div>
                <div class="form-group">
                    <label for="status" class=" form-control-label">Status</label>
                    <small><i>(Pilih "Tersedia" jika ingin ditampilkan di beranda atau sebaliknya)</i></small>

                    <select name="status" id="status" value="" class="form-control col col-md-3" required>

                        <option value="">Pilih Status</option>
                        <option value="tersedia">Tersedia</option>
                        <option value="tutup">Tutup</option>
                    </select>

                </div>
                <br><br>
                <button type="button" id="tombol_show" class="btn btn-primary btn-sm">Buat Formulir</button>
                <button type="button" id="tombol_hide" class="btn btn-danger btn-sm">Batal Buat</button>
                <br><br>
                <div class="form-group" id="div_formulir" hide>
                    <div class="form-group">
                        <h5>Data <strong>Formulir</strong></h5>
                    </div>
                    <table class="table table-bordered" id="bootstrap-data-table">
                        <tbody id="dynamic_field">

                        </tbody>
                    </table>

                    <div class="form-group">
                        <div class="input-group">
                            <input name="custom_label" id="custom_label" class="form-control" placeholder="Isi dengan data yang diinginkan">
                        </div>
                    </div>
                </div>


                <button type="submit" class="btn btn-primary">Simpan</button>

            </form>




        </div>

    </div>

</div>

<script>
    $(document).ready(function() {


        var i = 1;
        var count_row = 1;
        $("#div_formulir").hide();
        $("#tombol_hide").hide();
        $("#tombol_show").click(function() {
            $("#tombol_show").hide();
            // $("#tombol_hide").show();
            $("#div_formulir").show();
        })
        $("#tombol_hide").click(function() {
            $("#div_formulir").hide();
            $("#tombol_hide").hide();
            $("#tombol_show").show();
        })

        $('#custom_label').change(function() {
            i++;
            count_row++;

            if ($('#custom_label').val().trim() != '') {
                var model = $('#custom_label').val();
                document.getElementById("custom_label").value = "";
                $('#dynamic_field').append('<tr id="row' + i + '"><td><div class="form-group"><label class=" form-control-label">' + model + '</label><div class="input-group"><input readonly value="' + model + '" name="data_formulir[]" class="form-control"><button  type="button" name="remove" id="' + i + '" class="btn btn-danger btn-sm btn_remove">X</button></div></div></td></tr>');
            }
        });
        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
            count_row--;
        });

    });
</script>


@endsection