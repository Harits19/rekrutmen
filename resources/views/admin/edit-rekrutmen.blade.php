@extends('sufee.main')
@section('title', 'Edit Rekrutmen')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Edit Rekrutmen</h1>
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

            <form action="{{ route('rekrutmen.update', $rekrutmen->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                <div class="form-group">
                    <h5>Data <strong>Utama</strong></h5>
                </div>
                <input hidden id="organisasi_id" name="organisasi_id" value="{{ Auth::user()->id }}">
                <div class="form-group"><label for="nama" class=" form-control-label">Nama Rekrutmen</label><input value="{{$rekrutmen->nama}}" type="text" name="nama" id="nama" placeholder="Open Recruitmen Staf/Kepanitiaan/Volunteer ..." class="form-control" required></div>
                <div class="form-group"><label for="deskripsi" class=" form-control-label">Deskripsi</label><textarea value="" style="height: auto;" rows="15" name="deskripsi" id="deskripsi" placeholder="Timeline, Persyaratan, Alur, dll ..." class="form-control" required>{{$rekrutmen->deskripsi}}</textarea></div>

                <div class="form-group"><label for="poster" class=" form-control-label">Poster</label>
                    <input type="file" id="poster" name="poster" class="form-control-file" required>

                </div>
                <div class="form-group">
                    <label for="status" class=" form-control-label">Status</label>

                    <select name="status" id="status" value="" class="form-control col col-md-3" required>
                        <option value="">Pilih Status</option>
                        <option value="tersedia">Tersedia</option>
                        <option value="tutup">Tutup</option>
                    </select>

                </div>
                <br><br>


                <button type="submit" class="btn btn-primary">Simpan</button>

            </form>




        </div>

    </div>
    =
</div>


@endsection