@extends('sufee.main')
@section('title', 'Dashboard')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
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

    <div class="col-sm-6 col-lg-3">
        <div class="card no-padding ">
            <div class="card-body">
                <div class="h1 text-muted text-right mb-4">
                    <i class="fa fa-users"></i>
                </div>

                <div class="h4 mb-0">
                    <span class="count">87500</span>
                </div>

                <small class="text-muted text-uppercase font-weight-bold">Visitors</small>
                <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
            </div>
            <a href="/admin/pendaftar" type="button" class="btn btn-primary">Kelola</a>

        </div>

        <!-- <div class="card text-white bg-flat-color-1">
            <div class="card-body pb-0">

                <h4 class="mb-0">
                    <span class="count"><strong>2</strong></span>
                </h4>
                <p class="text-light">Rekrutmen</p>


            </div>
            <a href="/admin/rekrutmen" type="button" class="btn btn-primary">Kelola</a>
        </div> -->

    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="card no-padding ">
            <div class="card-body">
                <div class="h1 text-muted text-right mb-4">
                    <i class="fa fa-users"></i>
                </div>

                <div class="h4 mb-0">
                    <span class="count">87500</span>
                </div>

                <small class="text-muted text-uppercase font-weight-bold">Visitors</small>
                <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
            </div>
            <a href="/admin/pendaftar" type="button" class="btn btn-primary">Kelola</a>

        </div>
        <!-- <div class="card text-white bg-flat-color-1">
            <div class="card-body pb-0">

                <h4 class="mb-0">
                    <span class="count"><strong>122</strong></span>
                </h4>
                <p class="text-light">Pendaftar</p>


            </div>
            <a href="/admin/pendaftar" type="button" class="btn btn-primary">Kelola</a>
        </div> -->



    </div>



</div>
@endsection