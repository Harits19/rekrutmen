@extends('sufee.main')
@section('title', 'Rekrutmen')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Rekrutmen</h1>
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

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Table &nbsp&nbsp&nbsp&nbsp</strong>
                        <a href="/admin/rekrutmen/tambah" type="button" class="btn btn-primary">Tambah Informasi Rekrutmen</a>

                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Organisasi</th>
                                    <th>Deskripsi</th>
                                    <th>Ubah</th>
                                    <th>Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <!-- <td>Tiger Nixon</td> -->
                                    <!-- <td>System Architeaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaact</td> -->
                                    @php
                                    $string = "Open Recruitmen Staf Muda RKIM 2020";
                                    $string = strip_tags($string);
                                    $string = substr($string, 0, 20);
                                    $string = '<td>'.$string.'...</td>';
                                    echo $string;
                                    @endphp

                                    @php
                                    $string = "Ini adalah deskripsi dari informasi rekrutmen yang tersimpan asdasda asidaisdj asdas ";
                                    $string = strip_tags($string);
                                    $string = substr($string, 0, 90);
                                    $string = '<td>'.$string.'...</td>';
                                    echo $string;
                                    @endphp
                                    <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#scrollmodal">Ubah</button></td>
                                    <td><button type="button" class="btn btn-danger btn-sm">Hapus</button></td>
                                </tr>
                                <tr>
                                    <!-- <td>Tiger Nixon</td> -->
                                    <!-- <td>System Architeaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaact</td> -->
                                    @php
                                    $string = "Open Recruitmen Staf Muda RKIM 2020";
                                    $string = strip_tags($string);
                                    $string = substr($string, 0, 20);
                                    $string = '<td>'.$string.'...</td>';
                                    echo $string;
                                    @endphp

                                    @php
                                    $string = "Ini adalah deskripsi dari informasi rekrutmen yang tersimpan asdasda asidaisdj asdas ";
                                    $string = strip_tags($string);
                                    $string = substr($string, 0, 90);
                                    $string = '<td>'.$string.'...</td>';
                                    echo $string;
                                    @endphp
                                    <td><button type="button" class="btn btn-primary btn-sm">Ubah</button></td>
                                    <td><button type="button" class="btn btn-danger btn-sm">Hapus</button></td>
                                </tr>
                                <tr>
                                    <!-- <td>Tiger Nixon</td> -->
                                    <!-- <td>System Architeaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaact</td> -->
                                    @php
                                    $string = "Open Recruitmen Staf Muda RKIM 2020";
                                    $string = strip_tags($string);
                                    $string = substr($string, 0, 20);
                                    $string = '<td>'.$string.'...</td>';
                                    echo $string;
                                    @endphp

                                    @php
                                    $string = "Ini adalah deskripsi dari informasi rekrutmen yang tersimpan asdasda asidaisdj asdas ";
                                    $string = strip_tags($string);
                                    $string = substr($string, 0, 90);
                                    $string = '<td>'.$string.'...</td>';
                                    echo $string;
                                    @endphp
                                    <td><button type="button" class="btn btn-primary btn-sm">Ubah</button></td>
                                    <td><button type="button" class="btn btn-danger btn-sm">Hapus</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>

    </div><!-- .animated -->
    <div class="modal fade" id="scrollmodal" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="scrollmodalLabel">Ubah Informasi Rekrutmen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <div>
                            <div class="card">
                                <div class="card-header"><small> Isilah data dibawah ini </small><strong>Dengan Benar!</strong></div>
                                <div class="card-body card-block">
                                    <div class="form-group"><label for="nama" class=" form-control-label">Nama Rekrutmen</label><input type="text" id="nama" placeholder="" class="form-control"></div>
                                    <div class="form-group"><label for="deskripsi" class=" form-control-label">Deskripsi</label><textarea row="7" id="deskripsi" placeholder="" class="form-control"></textarea></div>

                                    <div class="form-group"><label for="poster" class=" form-control-label">Poster</label>
                                        <div class="card">
                                            <img width="210" height="290" class="img img-2" src="{{ url('andrea/images/image_1.jpg') }}"></img>

                                        </div>
                                        <button type="button" class="btn btn-primary btn-sm">Upload Poster</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Confirm</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection