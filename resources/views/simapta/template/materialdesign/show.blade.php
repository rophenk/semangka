<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <meta name="theme-color" content="#2196F3">
    <title>SIMAPTA</title>

    <!-- CSS  -->
    {!! Html::style('simapta/md/css/materialize.css') !!}
    {!! Html::style('simapta/md/css/style.css') !!}
    {!! Html::style('simapta/md/css/font-awesome.min.css') !!}
    {!! Html::script('simapta/md/js/modernizr.js') !!}<!-- Modernizr -->
</head>
<body id="top" class="scrollspy">

<!-- Pre Loader -->
<div id="loader-wrapper">
    <div id="loader"></div>
 
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
 
</div>

<!--Navigation-->
@include('simapta.template.materialdesign.navigation')

<!--Intro and service-->
<div id="intro" class="section scrollspy">
    <div class="container">
        @forelse($data as $data)
        <div class="row">
            <div  class="col s12">
                <h2 class=" header text_h2">{{ $data->document_title }} </h2>
            </div>

            <div  class="col s8">
                <div class="left promo promo-example">
                    <?php if (!empty($data->cover_image)) {

                            echo '<img width="300px" class="activator" src="'.$data->cover_image.'">';

                        }else{

                        }?>
                    <h5 class="promo-caption">Oleh {{ $data->writer }}</h5>
                    <p class="light left">{{ $data->description }}</p>
                    <br />
                    <p class="light left">
                        <?php if ($data->availability === 'available') {

                            echo '<a href="'.$data->address.'" target="_blank" class="btn waves-effect waves-light green darken-1">Unduh / Download File</a>

                            ';

                        }else{

                            echo '<a class="btn waves-effect waves-light red darken-1">Berkas Tidak Tersedia</a>';

                        }?>
                    </p>
                </div>
            </div>
            <div class="col s12 m4 l4">
                <div class="promo promo-example">
                    <h5 class="promo-caption">Metadata</h5>
                    <p class="light">
                        <strong>Penerbit :</strong>  {{ $data->publisher }}<hr />
                        <strong>Tahun Terbit :</strong>  {{ $data->year_published }}<hr />
                        <strong>Tipe File :</strong>  {{ $data->file_type }}<hr />
                        <strong>Halaman :</strong>  {{ $data->pages }}<hr />
                        <strong>ISBN :</strong>  {{ $data->isbn }}<hr />
                        <strong>Ukuran File :</strong>  {{ $data->document_size }}<hr />
                        <strong>Ketersediaan :</strong>  {{ $data->availability }}<hr />
                    </p>
                </div>
            </div>
        </div>
        @empty
        @endforelse
    </div>
</div>



<!--Parallax-->
<div class="parallax-container">
    <div class="parallax"><img src="{!! URL::asset('simapta/md/img/parallax1.png') !!}"></div>
</div>


<!--Footer-->
<footer id="contact" class="page-footer default_color scrollspy">
    <div class="footer-copyright default_color">
        <div class="container">
            Made by <a class="white-text" href="http://pertanian.go.id">Kementerian Pertanian Republik Indonesia</a>
        </div>
    </div>
</footer>


    <!--  Scripts-->
    {!! Html::script('simapta/md/js/jquery-2.1.1.min.js') !!}
    {!! Html::script('simapta/md/js/materialize.js') !!}
    {!! Html::script('simapta/md/js/init.js') !!}

    </body>
</html>