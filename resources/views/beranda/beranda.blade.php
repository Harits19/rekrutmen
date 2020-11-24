@extends('andrea.main')
@section('title', 'Beranda')

@section('content')
<div class="col-xl-8 py-5 px-md-5">
    <div class="row pt-md-4">


        <div class="col-md-12">
            @if(session()->has('message'))
            <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
                {{ session()->get('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            @if(!empty($message))
            <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
                {{$message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @foreach($rekrutmen as $data)
            @if($data->status == "tersedia")
            <div class="blog-entry ftco-animate d-md-flex">
                <img class="img img-2" style="height: 25%; width: 25%;" width="21" height="29.7" src="{{ url('poster/'.$data->poster) }}"></img>
                <div class="text text-2 pl-md-4">



                    @php
                    $string = $data->nama;
                    $string = strip_tags($string);
                    $string = substr($string, 0, 40);
                    $string = '<h3 class="mb-2">'.$string.'...</h3>';
                    echo $string;
                    @endphp

                    <!-- Jumlah Maksimal Judul 45 -->
                    <div class="meta-wrap">
                        <p class="meta">
                            <!-- <span><a href="#"><i class="icon-folder-o mr-2"></i>RKIM UB</a></span> -->


                            @php
                            // untuk mengakses has many value di blade
                            $string = $data->organisasi_nama;
                            $string = strip_tags($string);
                            $string = substr($string, 0, 35);
                            $string = '<span><a href="#"><i class="icon-folder-o mr-2"></i>'.$string.'...</a></span>';
                            echo $string;
                            @endphp
                        </p>
                    </div>
                    @php
                    $string = $data->deskripsi;
                    $string = strip_tags($string);
                    $string = substr($string, 0, 250);
                    $string = '<p class="mb-4" style="text-align: justify;text-justify: inter-word;">'.$string;
                        echo $string;
                        @endphp
                        <a href="/detail/{{$data->id}}"> ...Read More</a></p>
                    <!-- <p class="mb-4">sadasdads</p> -->
                    <!-- <p><a href="/detail/" class="btn-custom">Read More <span class="ion-ios-arrow-forward"></span></a></p> -->
                </div>
            </div>
            @endif
            @endforeach
        </div>

    </div><!-- END-->
    <div class="row">
        <div class="col">
            <div class="block-27">
                <ul>
                    <!-- <li><a href="#">&lt;</a></li>
                    <li class="active"><span>1</span></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&gt;</a></li> -->
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection