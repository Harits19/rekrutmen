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
            @if(session()->has('message'))
            <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
              {{ session()->get('message') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif

            @if (count($errors) > 0)
            <div class="alert alert-danger" role="alert">
              @foreach ($errors->all() as $error)

              {{ $error }} <br>

              @endforeach
            </div>
            @endif
            <form action="/admin/pendaftar/list/{{ Request::segment(4) }}/pemberitahuan " method="POST" enctype="multipart/form-data">

              <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <!-- membuat ukuran table auto -->
                <!-- <table id="bootstrap-data-table" style="table-layout: auto; width: 180px;  " class="table table-striped table-bordered"> -->
                <thead>
                  <tr>
                    <th><input type="checkbox" id="check-all" name="check-all" value="option1"></th>
                    <th>Nama Pendaftar</th>
                    <th>Email</th>
                    <th>No. Hp</th>
                    <th>Status</th>
                    <th>Foto</th>
                    <th>Ubah</th>
                    <th>Hapus</th>
                  </tr>
                </thead>
                <tbody>


                  @foreach($pendaftar as $data)
                  <tr>
                    <td> <input type="checkbox" id="checkbox{{$data->id}}" name="checkbox[]" value="{{$data}}">
                    </td>
                    @php
                    $string = $data->nama;
                    $string = strip_tags($string);
                    $string = substr($string, 0, 20);
                    $string = '<td>'.$string.'...</td>';
                    echo $string;
                    @endphp
                    <td>{{$data->email}}</td>
                    <td>{{$data->no_hp}}</td>
                    <td>hadir</td>
                    <td style="height: 10%; width: 10%;" width="3" height="4">
                      <img src="{{ asset('storage/foto/'.$data->foto) }}">
                    </td>
                    <td> <a href="/admin/pendaftar/{{$data->id}}/edit" type="button" class="btn btn-primary">Ubah</a>
                      <!-- <td><button href="/admin/pendaftar/{{$data->id}}/edit" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ubahmodal">Ubah</button></td> -->
                      <!-- <td>
                    <form action="" method="POST">
                      <input name="_method" type="hidden" value="DELETE">
                      <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Delete</button>
                    </form>
                  </td> -->

                    <td> <a href="/admin/pendaftar/{{$data->id}}/destroy" type="button" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</a>


                  </tr>
                  @endforeach
                </tbody>
              </table>
              <a href="/admin/pendaftar/list/{{ Request::segment(4) }}/unduh" type="button" class="btn btn-primary">Unduh Data</a>
              <button href="" type="submit" class="btn btn-primary">Kirim Pemberitahuan</button>
            </form>


          </div>
        </div>
      </div>


      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <strong class="card-title">Riwayat Pesan</strong>
          </div>
          <div class="card-body">
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Penerima</th>
                  <th>Layanan yang Digunakan</th>
                  <th>Isi Pesan</th>
                  <th>Lihat Detail</th>
                </tr>
              </thead>
              <tbody>

                <tr>
                  @php
                  $string = "Abdullah Harits, Abhista Ahnaf, Pahlevi Wahyu";
                  $string = strip_tags($string);
                  $string = substr($string, 0, 20);
                  $string = '<td>'.$string.'...</td>';
                  echo $string;
                  @endphp
                  <td>Whatsapp, Email, SMS</td>
                  @php
                  $string = "Diberitahukan kepada para pendaftar bahwa tempat screening ada di";
                  $string = strip_tags($string);
                  $string = substr($string, 0, 20);
                  $string = '<td>'.$string.'...</td>';
                  echo $string;
                  @endphp
                  <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#detailmodal">Lihat Detail</button></td>

                </tr>


              </tbody>
            </table>
            <a href="/admin/pendaftar/list/{{ Request::segment(4) }}/pemberitahuan" type="button" class="btn btn-primary">Kirim Pemberitahuan</a>
          </div>
        </div>
      </div>

    </div>
  </div><!-- .animated -->
  <div class="modal fade" id="ubahmodal" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="scrollmodalLabel">Ubah Data Pendaftar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card">
            <div class="card-header"><small> Isilah data dibawah ini </small><strong>Dengan Benar!</strong></div>
            <div class="card-body card-block">
              <div class="form-group"><label for="nama" class=" form-control-label">Nama</label><input type="text" id="nama" placeholder="" class="form-control"></div>
              <div class="form-group"><label for="deskripsi" class=" form-control-label">Email</label><input row="7" id="deskripsi" placeholder="" class="form-control"></input></div>
              <div class="form-group"><label for="deskripsi" class=" form-control-label">No Hp</label><input row="7" id="deskripsi" placeholder="" class="form-control"></input></div>
              <div class="form-group"><label for="deskripsi" class=" form-control-label">Status</label><input row="7" id="deskripsi" placeholder="" class="form-control"></input></div>
              <div class="form-group"><label for="deskripsi" class=" form-control-label">Data</label><input row="7" id="deskripsi" placeholder="" class="form-control"></input></div>

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
  <div class="modal fade" id="detailmodal" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="scrollmodalLabel">Detail Riwayat Pesan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div>
            <div>
              <div class="card">
                <div class="card-body card-block">
                  <div class="form-group"><label for="nama" class=" form-control-label">Penerima</label><input type="text" id="nama" placeholder="" class="form-control"></div>
                  <div class="form-group"><label for="nama" class=" form-control-label">Layanan yang Digunakan</label><input type="text" id="nama" placeholder="" class="form-control"></div>
                  <div class="form-group"><label for="nama" class=" form-control-label">Isi Pesan</label><input type="text" id="nama" placeholder="" class="form-control"></div>

                  <!-- <div class="form-group"><label for="deskripsi" class=" form-control-label">Deskripsi</label><textarea row="7" id="deskripsi" placeholder="" class="form-control"></textarea></div> -->

                  <!-- <div class="form-group"><label for="poster" class=" form-control-label">Poster</label>
                    <div class="card">
                      <img width="210" height="290" class="img img-2" src="{{ url('andrea/images/image_1.jpg') }}"></img>

                    </div>
                    <button type="button" class="btn btn-primary btn-sm">Upload Poster</button>
                  </div> -->
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
  <script>
    $(document).ready(function() {
      $('#check-all').click(function(event) {
        if (this.checked) {
          // Iterate each checkbox
          $(':checkbox').each(function() {
            this.checked = true;
          });
        } else {
          $(':checkbox').each(function() {
            this.checked = false;
          });
        }
      });
    });
  </script>
</div>
@endsection