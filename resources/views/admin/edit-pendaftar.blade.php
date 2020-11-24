@extends('sufee.main')
@section('title', 'Edit Pendaftar')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Edit Pendaftar</h1>
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

            <form action="{{ route('pendaftar.update', $pendaftar->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                <div class="form-group">
                    <h5>Data <strong>Utama</strong></h5>
                </div>
                <input hidden id="organisasi_id" name="organisasi_id" value="{{ Auth::user()->id }}">
                <div class="form-group"><label for="nama" class=" form-control-label">Nama Pendaftar</label><input value="{{$pendaftar->nama}}" type="text" name="nama" id="nama" placeholder="Nama Pendaftar ..." class="form-control" required></div>
                <div class="form-group"><label for="nama" class=" form-control-label">No Hp</label><input value="{{$pendaftar->no_hp}}" type="nummber" name="no_hp" id="no_hp" placeholder="No Hp ..." class="form-control" required></div>
                <div class="form-group"><label for="nama" class=" form-control-label">Email</label><input value="{{$pendaftar->email}}" type="email" name="email" id="email" placeholder="Email ..." class="form-control" required></div>
                <div class="form-group">
                    <label for="seleksi" class=" form-control-label">Seleksi</label>
                    <small><i>(Hasil Seleksi dari Proses Rekrutmen yang Dilakukan)</i></small>
                    <select name="seleksi" id="seleksi" value="" class="form-control col col-md-3" required>
                        <option value="">Pilih Hasil Seleksi</option>
                        <option value="-">-</option>
                        <option value="Diterima">Diterima</option>
                        <option value="Tidak Diterima">Tidak Diterima</option>
                    </select>
                </div>

                <br><br>
                <div class="form-group">
                    <h5>Data <strong>Formulir</strong></h5>
                </div>

                @foreach (array_combine($pendaftar->rekrutmen->data_formulir, $pendaftar->data_formulir) as $data_r => $data_p)
                <div class="form-group"><label class=" form-control-label">{{$data_r}}</label><input value="{{$data_p}}" type="text" name="data_formulir[]" id="data_formulir" placeholder="{{$data_r}} ..." class="form-control" required></div>

                @endforeach

                <button type="submit" class="btn btn-primary">Simpan</button>

            </form>




        </div>

    </div>
    =
</div>


@endsection