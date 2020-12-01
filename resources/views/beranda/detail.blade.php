@extends('andrea.main')
@section('title', 'Detail Pendaftaran')

@section('content')
<div class="col-lg-8 px-md-5 py-5">
    @if($rekrutmen->status == "tersedia")
    <div class="col pt-md-4">
        <h1 class="mb-3">{{$rekrutmen->nama}}</h1>
        <p class="meta">
            <span><a href="#"><i class="icon-folder-o mr-2"></i>{{$rekrutmen->organisasi->name}}</a></span>
        </p>
        <p>
            <img style="height: 75%; width: 75%;" width="210" height="297" src="{{ url('poster/'.$rekrutmen->poster) }}" alt="" class="img-fluid">
        </p>
        @if($rekrutmen->data_formulir != "null")
        <!-- opsi jika tombol daftar dihilangkan -->
        @endif
        <div class="half">
            <p><a href="/form/{{$rekrutmen->id}}" class="btn btn-primary p-3 px-xl-4 py-xl-3">&nbsp&nbspDaftar&nbsp&nbsp</a></p>
        </div>
        <div class="col pt-md-4">
            <p style="white-space: pre-wrap; ">{{$rekrutmen->deskripsi}}</p>
        </div>

    </div><!-- END-->
    @endif
</div>
@endsection