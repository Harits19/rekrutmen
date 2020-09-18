@extends('sufee.main')
@section('title', 'Tambah Form Pendaftaran')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Tambah Form Pendaftaran</h1>
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
    <div class="animated fadeIn">

        <div class="row">
            <div class="col-xs-6 col-sm-6">

                <div class="card">
                    <div class="card-header">
                        <small> Isilah Data Dibawah Ini </small> <strong>Dengan Benar</strong>
                    </div>
                    <div class="card-body card-block">
                        <div class="form-group">
                            <label class=" form-control-label">Date input</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                <input class="form-control">
                            </div>
                            <small class="form-text text-muted">ex. 99/99/9999</small>
                        </div>
                        <!-- <div class="form-group">
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
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection