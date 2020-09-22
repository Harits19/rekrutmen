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
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Daftar Pendaftar Formulir {{ $form->nama }}</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>

                                <tr>
                                    <th> </th>
                                    <th>{{ $form->id }}</th>
                                    @foreach($form->data as $p)
                                    @foreach($p->data as $d)
                                    <th>{{ $d }}</th>
                                    @endforeach
                                    @endforeach

                                    <th>Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                foreach($pendaftar as $p){

                                echo "<tr>";
                                    echo "<td><input form=send_message_form type=checkbox id=id_list name=id_list[] value=$p->id></td>";

                                    echo "<td>$p->id</td>";
                                    $data = json_decode($p->data);
                                    foreach($data as $d){
                                    foreach($d as $z){

                                    foreach($z as $v){
                                    echo "<td>$v</td>";

                                    }
                                    }
                                    }
                                    echo "</tr>";
                                }
                                @endphp

                            </tbody>
                        </table>
                        <div class="form-inline">
                            <input type="checkbox" id="select-all" name="select-all" value="option1">&nbsp&nbsp Pilih Semua &nbsp&nbsp&nbsp</input>
                            <div class="input-group">
                                <div class="input-group-btn">
                                    <div class="btn-group">
                                        <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle btn btn-primary">Aksi</button>
                                        <div tabindex="-1" aria-hidden="true" role="menu" class="dropdown-menu">
                                            <button type="button" name="btn_kirim_pesan" id="btn_kirim_pesan" tabindex="0" class="dropdown-item">Kirim Pesan</button>
                                            <button type="button" name="btn_ubah_status" id="btn_ubah_status" tabindex="0" class="dropdown-item">Ubah Status</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>
                </div>
            </div>

            <div name="div_kirim_pesan" id="div_kirim_pesan" style="display: none" class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Kirim Pesan</strong>
                    </div>
                    <div class="card-body">
                        <!-- Credit Card -->
                        <div id="pay-invoice">
                            <div class="card-body">

                                <form id="send_message_form" method="post" action="/admin/send">
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Penerima</label>
                                        <small> (<i>Sesuai dengan pendaftar yang <b>dipilih</b></i>)</small>
                                    </div>


                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Tulis Pesan</label>
                                        <small> (<i>Berikan informasi seperti proses jadwal wawancara, status pendaftaran (diterima atau ditolak), dan yang lainnya</i>)</small>
                                        <br><br>
                                        <input type="checkbox" id="select-all" name="select-all" value="option1">&nbsp&nbsp Tambahkan Token <i>(untuk konfirmasi kehadiran wawancara)</i></input>

                                        <textarea name="textarea_message" id="textarea_message" rows="9" placeholder="Isi Pesan" class="form-control"></textarea>
                                        <!-- <button type="button" id="add_name" name="add_name">&nbsp&nbsp Tambahkan [nama_pendaftar]</button> -->

                                    </div>
                                    <div>
                                        <button id="send_button" name="send_button" class="btn btn-lg btn-info btn-block">Kirim Pesan</button>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                </div> <!-- .card -->

            </div>


        </div>
    </div><!-- .animated -->
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#bootstrap-data-table-export').DataTable();
    });

    $('#select-all').click(function(event) {
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

    $(document).ready(function() {
        $("#btn_kirim_pesan").click(function() {
            $("#div_kirim_pesan").show();
        });
        // $("#show").click(function() {
        //     $("p").show();
        // });
    });

    $(document).ready(function() {
        $("#add_name").click(function() {
            $("#textarea_message").append('[nama_pendaftar]');
        });
    });

    // $(document).ready(function() {
    //     $("#send_button").click(function() {
    //         var id_list = $("#id_list").value;
    //         // $("#id_list_pesan").value = id_list;

    //         // alert(print_r($("#id_list_pesan").value));
    //         alert(id_list[0]);

    //     });
    // });

    // function updatebox2() {
    //     var textbox = document.getElementById("textarea_message");

    //     if (document.getElementById('add_name').checked) {
    //         textbox.append("[nama_pendaftar]");
    //     }

    //     // if (document.getElementById('cb6').checked) {
    //     //     textbox.value = textbox.value + "\r\nGave information on ";
    //     // }

    // }
</script>
@endsection