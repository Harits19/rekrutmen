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

        <div class="card-body card-block">
            <div class="form-group">
                <label class=" form-control-label">Date input</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                    <input class="form-control">
                </div>
                <small class="form-text text-muted">ex. 99/99/9999</small>
            </div>
            <div class="form-group">
                <label class=" form-control-label">Phone input</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                    <input class="form-control">
                </div>
                <small class="form-text text-muted">ex. (999) 999-9999</small>
            </div>
            <div class="form-group">
                <label class=" form-control-label">Taxpayer Identification Numbers</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                    <input class="form-control">
                </div>
                <small class="form-text text-muted">ex. 99-9999999</small>
            </div>
            <div class="form-group">
                <label class=" form-control-label">Social Security Number</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-male"></i></div>
                    <input class="form-control">
                </div>
                <small class="form-text text-muted">ex. 999-99-9999</small>
            </div>
            <div class="form-group">
                <label class=" form-control-label">Eye Script</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                    <input class="form-control">
                </div>
                <small class="form-text text-muted">ex. ~9.99 ~9.99 999</small>
            </div>
            <div class="form-group">
                <label class=" form-control-label">Credit Card Number</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-credit-card"></i></div>
                    <input class="form-control">
                </div>
                <small class="form-text text-muted">ex. 9999 9999 9999 9999</small>
            </div>
        </div>
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