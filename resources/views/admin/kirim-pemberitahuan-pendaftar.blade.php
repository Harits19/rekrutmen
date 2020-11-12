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

            @if (count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                @foreach ($errors->all() as $error)

                {{ $error }} <br>

                @endforeach
            </div>
            @endif
            <form action="/admin/pendaftar/list/{{ Request::segment(4) }}/pemberitahuan/kirim" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="nama" class=" form-control-label">Penerima</label>
                    <textarea placeholder="" name="penerima" class="form-control" style="height: auto;" rows="15" readonly> @php
                    foreach($pendaftar as $data){
                        $data =  json_decode($data);
                        echo $data->nama. ', ';
                        
                    }
                    @endphp
                    </textarea>
                </div>
                @foreach($pendaftar as $data)
                <input hidden value="{{$data}}" name="pendaftar[]">
                @endforeach
                <div class="form-check-inline form-check">
                    <label for="deskripsi" class="form-check-label">Isi Pesan &nbsp&nbsp</label>
                    <label for="konfirmasi_kehadiran" class="form-check-label ">
                        <input type="checkbox" id="konfirmasi_kehadiran" name="konfirmasi_kehadiran" value="true" class="form-check-input">Tambah Konfirmasi Kehadiran &nbsp&nbsp
                    </label>
                    <br><br>
                </div>
                <textarea required row="7" id="pesan" name="pesan" class="form-control"></textarea>
                <p id="example-link" value=""></p>
                <br>


                <div class="form-check-inline form-check checkbox-group required">
                    <label for="inline-checkbox1" class="form-check-label ">
                        <input type="checkbox" id="inline-checkbox1" name="layanan[]" value="whatsapp" class="form-check-input">Whatsapp &nbsp&nbsp
                    </label>
                    <label for="inline-checkbox2" class="form-check-label ">
                        <input type="checkbox" id="inline-checkbox2" name="layanan[]" value="email" class="form-check-input">Email &nbsp&nbsp
                    </label>
                    <label for="inline-checkbox3" class="form-check-label ">
                        <input type="checkbox" id="inline-checkbox3" name="layanan[]" value="sms" class="form-check-input">SMS &nbsp&nbsp
                    </label>
                </div>
                <br> <br>
                <button id="submit" href="" type="submit" class="btn btn-primary">Kirim Pemberitahuan</button>

            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#submit').click(function() {
                checked = $("input[type=checkbox]:checked").length;

                if (!checked) {
                    alert("You must check at least one checkbox.");
                    return false;
                }

            });
        });

        $('#konfirmasi_kehadiran').click(function(event) {
            if (this.checked) {
                // Iterate each checkbox
                $("#example-link").text("(cth : Silahkan klik link berikut ini untuk melakukan konfirmasi kehadiran http://rekrutmen.fia/konfirmasi/5a9645c3050e36e2a200f8185c08f73ba814a2ef8cf6331c1xxxxxxxxx )");
                
            } else {
                $("#example-link").text("");

            }
        });
    </script>
</div>

@endsection