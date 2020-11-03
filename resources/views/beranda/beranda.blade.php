@extends('andrea.main')
@section('title', 'Homepage')

@section('content')
<div class="col-xl-8 py-5 px-md-5">
    <div class="row pt-md-4">

        <div class="col-md-12">
            <div class="blog-entry ftco-animate d-md-flex">
                <img class="img img-2" src="{{ url('andrea/images/image_1.jpg') }}"></img>
                <div class="text text-2 pl-md-4">

                    @php
                    $string = "Open Recruitment Staf Muda RKIM 2020";
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
                            $string = "Riset dan Karya Ilmiah Mahasiswa";
                            $string = "Badan Eksekutif Mahasiswa Fakultas Ilmu Komputer";
                            $string = strip_tags($string);
                            $string = substr($string, 0, 35);
                            $string = '<span><a href="#"><i class="icon-folder-o mr-2"></i>'.$string.'...</a></span>';
                            echo $string;
                            @endphp
                        </p>
                    </div>
                    @php
                    $string = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
                    //$string = "asdsada";
                    $string = strip_tags($string);
                    $string = substr($string, 0, 250);
                    //$string = '<p class="mb-4" style="text-align: justify;text-justify: inter-word;">'.$string.'<a href="/form/{{ $blog->id }}">...Read More</a></p>';
                    $string = '<p class="mb-4" style="text-align: justify;text-justify: inter-word;">'.$string.'<a href="/detail/1">...Read More</a></p>';
                    echo $string;
                    @endphp
                    <!-- <p class="mb-4">sadasdads</p> -->
                    <!-- <p><a href="/detail/" class="btn-custom">Read More <span class="ion-ios-arrow-forward"></span></a></p> -->
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="blog-entry ftco-animate d-md-flex">
                <img class="img img-2" src="{{ url('andrea/images/image_1.jpg') }}"></img>
                <div class="text text-2 pl-md-4">

                    @php
                    $string = "Open Recruitment Panitia GBQ XVII";
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
                            $string = "Riset dan Karya Ilmiah Mahasiswa";
                            $string = "Badan Eksekutif Mahasiswa Fakultas Ilmu Komputer";
                            $string = strip_tags($string);
                            $string = substr($string, 0, 35);
                            $string = '<span><a href="#"><i class="icon-folder-o mr-2"></i>'.$string.'...</a></span>';
                            echo $string;
                            @endphp
                        </p>
                    </div>
                    @php
                    $string = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
                    //$string = "asdsada";
                    $string = strip_tags($string);
                    $string = substr($string, 0, 250);
                    $string = '<p class="mb-4" style="text-align: justify;text-justify: inter-word;">'.$string.'<a href="#">...Read More</a></p>';
                    echo $string;
                    @endphp
                    <!-- <p class="mb-4">sadasdads</p> -->
                    <!-- <p><a href="/detail/" class="btn-custom">Read More <span class="ion-ios-arrow-forward"></span></a></p> -->
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="blog-entry ftco-animate d-md-flex">
                <img class="img img-2" src="{{ url('andrea/images/image_1.jpg') }}"></img>
                <div class="text text-2 pl-md-4">

                    @php
                    $string = "Open Recruitment Volunteer Abdi Brawijaya";
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
                            $string = "Riset dan Karya Ilmiah Mahasiswa";
                            $string = "Badan Eksekutif Mahasiswa Fakultas Ilmu Komputer";
                            $string = strip_tags($string);
                            $string = substr($string, 0, 35);
                            $string = '<span><a href="#"><i class="icon-folder-o mr-2"></i>'.$string.'...</a></span>';
                            echo $string;
                            @endphp
                        </p>
                    </div>
                    @php
                    $string = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
                    //$string = "asdsada";
                    $string = strip_tags($string);
                    $string = substr($string, 0, 250);
                    $string = '<p class="mb-4" style="text-align: justify;text-justify: inter-word;">'.$string.'<a href="#">...Read More</a></p>';
                    echo $string;
                    @endphp
                    <!-- <p class="mb-4">sadasdads</p> -->
                    <!-- <p><a href="/detail/" class="btn-custom">Read More <span class="ion-ios-arrow-forward"></span></a></p> -->
                </div>
            </div>
        </div>

    </div><!-- END-->
    <div class="row">
        <div class="col">
            <div class="block-27">
                <ul>
                    <li><a href="#">&lt;</a></li>
                    <li class="active"><span>1</span></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&gt;</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection