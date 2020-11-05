@extends('sufee.main')
@section('title', 'Rekrutmen')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Kelola Rekrutmen</h1>
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
                        <strong class="card-title">List Informasi Rekrutmen &nbsp&nbsp&nbsp&nbsp</strong>
                        <a href="/admin/rekrutmen/create" type="button" class="btn btn-primary">Buat Informasi Rekrutmen</a>
                    </div>
                    <div class="card-body card-block">

                        @if(session()->has('message'))
                        <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
                            {{ session()->get('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Organisasi</th>
                                    <th>Deskripsi</th>
                                    <th>Poster</th>
                                    <th>Ubah</th>
                                    <th>Hapus</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($rekrutmen as $data)
                                <tr>

                                    @php
                                    $string = "$data->nama";
                                    $string = strip_tags($string);
                                    $string = substr($string, 0, 20);
                                    $string = '<td>'.$string.'...</td>';
                                    echo $string;
                                    @endphp

                                    @php
                                    $string = "$data->deskripsi";
                                    $string = strip_tags($string);
                                    $string = substr($string, 0, 90);
                                    $string = '<td>'.$string.'...</td>';
                                    echo $string;
                                    @endphp
                                    <td>
                                    <img width="210" height="297" src="{{ url('poster/'.$data->poster) }}">
                                    </td>
                                    <td> <a href="/admin/rekrutmen/{{$data->id}}/edit" type="button" class="btn btn-primary">Ubah</a>
                                    </td>
                                    <!-- <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#scrollmodal">Ubah</button></td> -->
                                    <!-- <td><button type="button" class="btn btn-primary" id="button_edit" data-toggle="modal" href="#scrollmodal" data-id="{{ $data->id }}" data-nama="{{ $data->nama }}" data-deskripsi="{{ $data->deskripsi }}" data-status="{{ $data->status }}" data-poster="{{ $data->poster }}">Edit</button> -->
                                    </td>
                                    <!-- <td><a href="/admin/rekrutmen/{{ $data->id }}" method="delete" class="btn btn-danger btn-sm">Hapus</a></td> -->
                                    <td>
                                        <form action="{{ route('rekrutmen.destroy' , $data->id)}}" method="POST">
                                            <input name="_method" type="hidden" value="DELETE">

                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

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
                <form action="" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="scrollmodalLabel">Ubah Informasi Rekrutmen</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="card">
                            <div class="card-header"><small> Isilah data dibawah ini </small><strong>Dengan Benar!</strong></div>
                            <div class="card-body card-block">
                                <div class="form-group"><label for="nama" class=" form-control-label">Nama Rekrutmen</label><input type="text" id="nama" placeholder="" class="form-control"></div>
                                <div class="form-group"><label for="deskripsi" class=" form-control-label">Deskripsi</label><textarea row="20" id="deskripsi" placeholder="" class="form-control"></textarea></div>

                                <!-- <div class="form-group"><label for="poster" class=" form-control-label">Poster</label>
                                    <div class="card">
                                        <img width="210" height="290" class="img img-2" src="{{ url('poster/15.jpg') }}" ></img>
                                        <img width="210" height="290" class="img img-2"></img>

                                    </div>
                                    <button type="button" class="btn btn-primary btn-sm">Upload Poster</button>
                                </div> -->

                                <div class="form-group"><label for="poster" class=" form-control-label">Poster</label>
                                    <input type="file" id="poster" name="poster" class="form-control-file" value="">

                                </div>
                                <div class="form-group">
                                    <label for="status" class=" form-control-label">Status</label>

                                    <select name="status" id="status" value="" class="form-control col col-md-3">
                                        <option value="tersedia">Tersedia</option>
                                        <option value="tutup">Tutup</option>
                                    </select>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        var id;
        var nama;
        var deskripsi;
        var poster;
        var status;

        $(document).on('click', '#button_edit', function(e) {
            id = $(this).attr('data-id');
            $(".modal-body #id").val(id);
            nama = $(this).attr('data-nama');
            $(".modal-body #nama").val(nama);
            deskripsi = $(this).attr('data-deskripsi');
            $(".modal-body #deskripsi").val(deskripsi);
            // poster = $(this).attr('data-poster');
            // $(".modal-body #poster").attr('src',"{{ url('poster/"+poster+"') }}");
            // $(".modal-body #poster").attr('src',"{{ url('poster/15.jpg') }}");
            poster = $(this).attr('data-poster');
            $(".modal-body #poster").val(poster);
            status = $(this).attr('data-status');
            $(".modal-body #status").val(status);
            console.log(nama);
        });
    </script>
</div>

@endsection