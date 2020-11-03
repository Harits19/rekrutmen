@extends('andrea.main')
@section('title', 'Form Pendaftaran')

@section('content')
<div class="col-xl-8 py-5 px-md-5">
    <h2 class="h3">Form Pendaftaran</h2>
    <h6>Open Recruitmen Staf Muda RKIM 2020</h6>

    <div class="row pt-md-4">

        <form method="post" action="/store_data">

            <div class="card-body card-block">
                <div>
                    <small> Isilah Data Dibawah Ini </small> <strong>Dengan Benar</strong>
                </div>

                <div class="form-group">
                    <label class=" form-control-label">Nama</label>
                    <div class="input-group">
                        <div class="input-group-addon"></div>
                        <input id="data" name="data[]" class="form-control">
                    </div>

                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Daftar Sekarang</button>
                </div>




            </div>
        </form>

    </div>



    <div class="col-lg-6 d-flex">
        <div id="map" class="bg-light"></div>
    </div>
</div>

@endsection