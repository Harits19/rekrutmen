@extends('andrea.main')
@section('title', 'Form Pendaftaran')

@section('content')
<div class="col-xl-8 py-5 px-md-5">
    <h2 class="h3">Form Pendaftaran</h2>
    <h6>{{$rekrutmen->nama}}</h6>
    @if (count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        @foreach ($errors->all() as $error)

        {{ $error }} <br>

        @endforeach
    </div>
    @endif
    <div class="row pt-md-4">


        <form method="post" action="/store">

            <div class="card-body card-block">
                <div>
                    <small> Isilah Data Dibawah Ini </small> <strong>Dengan Benar</strong>
                </div>
                <input type="text" id="rekrutmen_id" name="rekrutmen_id" hidden value="{{$rekrutmen->id}}">
                <div class="form-group">
                    <label class=" form-control-label">Nama</label>
                    <div class="input-group">
                        <div class="input-group-addon"></div>
                        <input type="text" id="nama" name="nama" class="form-control" required>
                    </div>

                </div>

                <div class="form-group">
                    <label class=" form-control-label">No Hp</label>
                    <div class="input-group">
                        <div class="input-group-addon"></div>
                        <input type="number" id="no_hp" name="no_hp" class="form-control" required>
                    </div>

                </div>

                <div class="form-group">
                    <label class=" form-control-label">Email</label>
                    <div class="input-group">
                        <div class="input-group-addon"></div>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>

                </div>
                @if($rekrutmen->data_formulir)
                @foreach ($rekrutmen->data_formulir as $data)
                <div class="form-group">
                    <label class=" form-control-label">{{$data}}</label>
                    <div class="input-group">
                        <div class="input-group-addon"></div>
                        <input id="data" name="data_formulir[]" class="form-control" required>
                    </div>

                </div>
                @endforeach
                @endif
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