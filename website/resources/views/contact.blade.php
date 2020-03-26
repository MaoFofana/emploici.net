<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Job Board</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('shared.head')
</head>

<body>
@include('shared.menu')

<!-- bradcam_area  -->
<div class="bradcam_area bradcam_bg_1">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>contact</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->
<!-- ================ contact section start ================= -->
<section class="contact-section section_padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="contact-title">Contactez nous</h2>
            </div>
            <div class="col-lg-8">
                <form class="form-control" action="{{url('/contactez-nous')}}" method="post">
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" placeholder = "Entrer votre message"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control" name="nom" id="name" type="text" placeholder = 'Entrer votre nom'>
                            </div>
                        </div>
                        @if (Route::has('login'))
                            @auth
                            @else
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="email" id="email" type="email"  placeholder = "Entrer  votre adresse email">
                                </div>
                            </div>
                                @endauth
                        @endif

                        <!--div-- class="col-12">
                            <div class="form-group">
                                <input class="form-control" name="subject" id="subject" type="text" placeholder ="Entrer l'objet">
                            </div>
                        </div-->
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="button button-contactForm btn_4 boxed-btn">Envoyer</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-4">
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-home"></i></span>
                    <div class="media-body">
                        <h3>Abidjan Cocody </h3>
                        <p>Angré 9e Tranche</p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                    <div class="media-body">
                        <h3>22 49 90 81</h3>

                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-email"></i></span>
                    <div class="media-body">
                        <h3>infos@emploici.net</h3>
                    </div>
                </div>

                <div class="contact-info">
                    <div>
                        <img width="120" height="50" src="/storage/playstore.png" alt="">
                    </div>


                    <div>
                        <h6>Echanger mieux avec notre application</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ================ contact section end ================= -->
<!-- footer start -->
@include('shared.footer')
</body>

</html>