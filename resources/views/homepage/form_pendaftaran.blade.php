@extends('andrea.main')
@section('title', 'Form Pendaftaran')

@section('content')
<div class="col-xl-8 py-5 px-md-5">
    <div class="col-md-12 mb-4">
        <h2 class="h3">Form Pendaftaran</h2>
        <h6>{{ $blog->title }}</h6>
    </div>
    <div class="card-header">
        <small> Isilah Data Dibawah Ini </small> <strong>Dengan Benar</strong>
    </div>
    <div class="row pt-md-4">
        <form method="post" action="/store_data">

            <div class="card-body card-block">
                <div class="form-group">

                    <div class="input-group">
                        <input name="data[]" value="halo" class="form-control">
                    </div>
                </div>
                @foreach($form as $p)
                @foreach($p->data as $d)

                <div class="form-group">
                    <label class=" form-control-label">{{ $d }}</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                        <input id="data" name="data[]" class="form-control">
                    </div>
                    <small class="form-text text-muted">ex. 99/99/9999</small>
                </div>
                @endforeach
                @endforeach
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>




            </div>
        </form>

    </div>
    <!-- <div class="row d-flex mb-5 contact-info">
        <div class="col-md-12 mb-4">
            <h2 class="h3">Form Pendaftaran</h2>
            <h6>{{ $blog->title }}</h6>
        </div>
        <div class="w-100"></div>
    </div> -->


    <div class="col-lg-6 d-flex">
        <div id="map" class="bg-light"></div>
    </div>
</div>

@endsection