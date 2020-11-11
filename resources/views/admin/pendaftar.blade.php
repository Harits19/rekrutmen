@extends('sufee.main')
@section('title', 'Pendaftar')

@section('breadcrumbs')
<div class="breadcrumbs">
  <div class="col-sm-4">
    <div class="page-header float-left">
      <div class="page-title">
        <h1>Pendaftar</h1>
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
            <strong class="card-title">Pendaftar</strong>
          </div>
          <div class="card-body">
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Nama Rekrutmen</th>
                  <th>Jumlah Pendaftar</th>
                  <th>List Pendaftar</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($rekrutmen as $data)
                <tr>
                  @php
                  $string = $data->nama;
                  $string = strip_tags($string);
                  $string = substr($string, 0, 20);
                  $string = '<td>'.$string.'...</td>';
                  echo $string;
                  @endphp
                  <td>{{$data->pendaftar_count}}</td>
                  <td><a type="button" href="/admin/pendaftar/list/{{$data->id}}" class="btn btn-primary btn-sm">List Pendaftar</a></td>

                </tr>

                @endforeach


              </tbody>
            </table>
          </div>
        </div>
      </div>


    </div>
  </div><!-- .animated -->
</div>
@endsection