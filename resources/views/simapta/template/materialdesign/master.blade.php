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
    {!! Html::style('simapta/md/css/modernizr.css') !!}
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

<!--Hero-->
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <h3 class="text_h center header">
            <span>SIMAPTA</span> 
        </h3>
            <form class="col s12 center" method="post" action="/result">
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="mdi-editor-mode-edit prefix white-text"></i>
                            <input id="icon_prefix" type="text" name="keyword" class="validate white-text">
                            <label for="icon_prefix" class="white-text">Keyword</label>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </div>
                        <div>
                            <button class="btn waves-effect waves-light red darken-1" type="submit" name="action" value="search"><small>Search</small>
                                <i class=""></i>
                            </button>
                        </div>
                    </div>
                </form>
    </div>
</div>

<!--Intro and service-->
<div id="intro" class="section scrollspy">
    <div class="container">
        <div class="row">
            <div  class="col s12">
                <h2 class="center header text_h2">Sistem Informasi Modul <span class="span_h2"> API  </span>Pemerintahan<span class="span_h2"> Terbuka</span </h2>
            </div>

            <div  class="col s12 m4 l4">
                <div class="center promo promo-example">
                    <i class="mdi-image-flash-on"></i>
                    <h5 class="promo-caption">Mempercepat Pencarian</h5>
                    <p class="light center">Memudahkan masyarakan dalam mencari informasi atau dokumen dari berbagai instansi.</p>
                </div>
            </div>
            <div class="col s12 m4 l4">
                <div class="center promo promo-example">
                    <i class="mdi-social-group"></i>
                    <h5 class="promo-caption">Kontribusi Instansi Terpadu</h5>
                    <p class="light center">Semakin banyak instansi bergabung dalam SIMAPTA untuk berkontribusi menyediakan dokumen informasi yang dibutuhkan masyarakat</p>
                </div>
            </div>
            <div class="col s12 m4 l4">
                <div class="center promo promo-example">
                    <i class="mdi-hardware-desktop-windows"></i>
                    <h5 class="promo-caption">Tampilan Website responsif</h5>
                    <p class="light center">Tampilan ramah bagi berbagai device pengguna.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Work-->
<div class="section scrollspy" id="work">
    <div class="container">
        <h2 class="header text_b">Terbaru</h2>
        <div class="row">
            @forelse ($data as $data)
            <div class="col s12 m4 l4">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <?php if (!empty($data->cover_image)) {

                            echo '<img class="activator" src="'.$data->cover_image.'">';

                        }else{

                        }?>

                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">{{ $data->document_title }} <i class="mdi-navigation-more-vert right"></i></span>
                        <p><a href="show/{{ $data->uuid }}">Detil</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">{{ $data->document_title }} <i class="mdi-navigation-close right"></i></span>
                        <p>{{ $data->description }}</p>
                    </div>
                </div>
            </div>
            @empty
            @endforelse
        </div>
    </div>
</div>

<!--Parallax-->
<div class="parallax-container">
    <div class="parallax"><img src="{!! URL::asset('simapta/md/img/parallax1.png') !!}"></div>
</div>

<!--Team-->
<div class="section scrollspy" id="team">
    <div class="container">
        <h2 class="header text_b"> Kontributor </h2>
        <div class="row">
            @forelse ($instansi as $instansi)
            <div class="col s12 m3">
                <div class="card card-avatar">
                    <!--<div class="waves-effect waves-block waves-light">
                        <img class="activator" src="img/avatar1.png">
                    </div>-->
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">{{ $instansi->name }}<br/>
                            <!--<small><em><a class="red-text text-darken-1" href="#">CEO</a></em></small>-->
                        </span>
                        <!--<p>
                            <a class="blue-text text-lighten-2" href="https://www.facebook.com/joash.c.pereira">
                                <i class="fa fa-facebook-square"></i>
                            </a>
                            <a class="blue-text text-lighten-2" href="https://twitter.com/im_joash">
                                <i class="fa fa-twitter-square"></i>
                            </a>
                            <a class="blue-text text-lighten-2" href="https://plus.google.com/u/0/+JoashPereira">
                                <i class="fa fa-google-plus-square"></i>
                            </a>
                            <a class="blue-text text-lighten-2" href="https://www.linkedin.com/in/joashp">
                                <i class="fa fa-linkedin-square"></i>
                            </a>
                        </p>-->
                    </div>
                </div>
            </div>
            @empty
            @endforelse
        </div>
    </div>
</div>

<!--Footer-->
<footer id="contact" class="page-footer default_color scrollspy">
    <div class="container">  
        <div class="row">
            <div class="col l6 s12">
                <form class="col s12">
                    <div class="row">
                        <div class="input-field col s6">
                            <i class="mdi-action-account-circle prefix white-text"></i>
                            <input id="icon_prefix" type="text" class="validate white-text">
                            <label for="icon_prefix" class="white-text">First Name</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="mdi-communication-email prefix white-text"></i>
                            <input id="icon_email" type="email" class="validate white-text">
                            <label for="icon_email" class="white-text">Email-id</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="mdi-editor-mode-edit prefix white-text"></i>
                            <textarea id="icon_prefix2" class="materialize-textarea white-text"></textarea>
                            <label for="icon_prefix2" class="white-text">Message</label>
                        </div>
                        <div class="col offset-s7 s5">
                            <button class="btn waves-effect waves-light red darken-1" type="submit" name="action">Submit
                                <i class="mdi-content-send right white-text"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text">SIMAPTA</h5>
                <ul>
                    <li><a class="white-text" href="/">Home</a></li>
                    <li><a class="white-text" href="#">Blog</a></li>
                </ul>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Social</h5>
                <ul>
                    <li>
                        <a class="white-text" href="#">
                            <i class="small fa fa-behance-square white-text"></i> Behance
                        </a>
                    </li>
                    <li>
                        <a class="white-text" href="#">
                            <i class="small fa fa-facebook-square white-text"></i> Facebook
                        </a>
                    </li>
                    <li>
                        <a class="white-text" href="#">
                            <i class="small fa fa-github-square white-text"></i> Github
                        </a>
                    </li>
                    <li>
                        <a class="white-text" href="#">
                            <i class="small fa fa-linkedin-square white-text"></i> Linkedin
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
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