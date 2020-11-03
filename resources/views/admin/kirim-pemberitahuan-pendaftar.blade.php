@extends('sufee.main')
@section('title', 'Kirim Pemberitahuan')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Kirim Pemberitahuan</h1>
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

    </div>




</div>
@endsection