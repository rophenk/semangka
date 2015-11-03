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

<!--Work-->
<div class="section scrollspy" id="work">
    <div class="container">
        <h2 class="header text_b">Hasil Pencarian</h2>
        <div class="row">
            <?php
            $jstextfit ='';
            ?>
            @forelse ($data as $data)
            <?php 
            $divnewest = 'title-'.$data->id;
            $jstextfit .= "window.fitText(document.getElementById('".$divnewest."'), 1.2)\n";
            ?>
            <div class="col s12 m4 l4">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <?php if (!empty($data->cover_image)) {

                            $curl = curl_init();

                            curl_setopt($curl, CURLOPT_URL, $data->cover_image);
                            // Only header
                            curl_setopt($curl, CURLOPT_NOBODY, true);
                            curl_setopt($curl, CURLOPT_HEADER, true);
                            // Do not print anything to output
                            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

                            // get last modified date
                            curl_setopt($curl, CURLOPT_FILETIME, true);

                            $result = curl_exec($curl);
                            // Get info
                            $info = curl_getinfo($curl);

                            $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

                            if ($httpcode=="200") {

                                echo '<img class="activator" src="'.$data->cover_image.'">';

                            } else {

                                echo '<img class="activator" src="/logo.png" width="50%">';

                            }

                            curl_close($curl);

                            

                        }else{

                            echo '<img class="activator" src="/logo.png" width="50%">';
                            
                        }?>

                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">
                            <div id="<?php echo $divnewest; ?>" style="width:100%; height:50px;">
                                <span><a href="/show/{{ $data->uuid }}">{{ $data->document_title }}</a></span>
                            </div>
                            <i class="mdi-navigation-more-vert right"></i>
                    </span>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">{{ $data->document_title }} <i class="mdi-navigation-close right"></i></span>
                        <p>{{ $data->description }}</p>
                    </div>
                </div>
            </div>
            @empty
            <div class="col s12">
                <p class="light center">Maaf hasil pencarian tidak ditemukan</p>
            </div>
            @endforelse
        </div>
    </div>
</div>

<!--Parallax-->
<div class="parallax-container">
    <div class="parallax"><img src="{!! URL::asset('simapta/md/img/parallax1.png') !!}"></div>
</div>

<!--Footer-->
<footer id="contact" class="page-footer default_color scrollspy">
    <!--<div class="container">  
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
    </div>-->
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
    {!! Html::script('simapta/md/js/fittext.js') !!}
    <script type="text/javascript">
        <?php echo $jstextfit; ?>
    </script>

    </body>
</html>