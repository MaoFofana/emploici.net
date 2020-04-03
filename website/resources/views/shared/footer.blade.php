
<!-- footer start -->
<footer class="footer">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-md-6 col-lg-3">
                    <div class="footer_widget wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                        <div class="footer_logo">
                            <a href="#">
                                <img src="img/logo.png" alt="">
                            </a>
                        </div>
                        <p>
                            infos@emploici.net<br>
                            22 49 90 81<br>
                            01 97 71 48 <br>
                            Abidjan Cocody Angré 9e Tranche
                        </p>
                        <div class="socail_links">
                            <ul>
                                <li>
                                    <a href="https://www.facebook.com/emploici/">
                                        <i class="ti-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-xl-2 col-md-6 col-lg-2">
                    <div class="footer_widget wow fadeInUp" data-wow-duration="1.1s" data-wow-delay=".4s">
                        <h3 class="footer_title">
                            Company
                        </h3>
                        <ul>
                            <li><a href="#">Apropos </a></li>
                            <li><a href="#">Emplois</a></li>
                            <li><a href="#">Candidats</a></li>
                            <li><a href="{{url('/contactez-nous')}}">Contactez nous</a></li>
                        </ul>

                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-3">
                    <div class="footer_widget wow fadeInUp" data-wow-duration="1.2s" data-wow-delay=".5s">
                        <h3 class="footer_title">
                          Type d"Offres
                        </h3>
                        <ul>
                            <li><a href="#">Emploi</a></li>
                            <li><a href="#">Stage</a></li>
                            <li><a href="#">Freelance</a></li>
                            <li><a href="#">Consultance</a></li>
                            <li><a href="#">Interim</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="footer_widget wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".6s">
                        <h3 class="footer_title">
                          Newsletter
                        </h3>
                        <form action="{{url('/newLetters')}}" method="post" class="newsletter_form">
                            {!! csrf_field() !!}
                            <input type="email" name="email" placeholder="Entre votre email">
                            <button type="submit">Envoyer</button>
                        </form>
                        <p class="newsletter_text">Recevez des information sur des offres d'emploi.</p>
                    </div>

                    <div class="contact-info">
                        <div>
                            <img width="120" height="50" src="/storage/playstore.png" alt="">
                        </div>
                        <p class="newsletter_text">Echanger mieux avec notre appliocation</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copy-right_text wow fadeInUp" data-wow-duration="1.4s" data-wow-delay=".3s">
        <div class="container">
            <div class="footer_border"></div>
            <div class="row">
                <div class="col-xl-12">
                    <p class="copy_right text-center">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> Tout droit reserver |  <i class="fa fa-heart-o" aria-hidden="true"></i> par <a href="" target="_blank">Emploi-ci</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--/ footer end  -->

<!-- link that opens popup -->
<!-- JS here -->
<script src="{{asset('js/vendor/modernizr-3.5.0.min.js')}}"></script>
<script src="{{asset('js/vendor/jquery-1.12.4.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('js/ajax-form.js')}}"></script>
<script src="{{asset('js/waypoints.min.js')}}"></script>
<script src="{{asset('js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('js/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('js/scrollIt.js')}}"></script>
<script src="{{asset('js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('js/wow.min.js')}}"></script>
<script src="{{asset('js/nice-select.min.js')}}"></script>
<script src="{{asset('js/jquery.slicknav.min.js')}}"></script>
<script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('js/plugins.js')}}"></script>
<script src="{{asset('js/gijgo.min.js')}}"></script>
<!-- <script src="js/gijgo.min.js')}}"></script> -->
<script src="{{asset('js/range.js')}}"></script>
<!--contact js-->
<script src="{{asset('js/contact.js')}}"></script>
<script src="{{asset('js/jquery.ajaxchimp.min.js')}}"></script>
<!--script-- src="js/jquery.form.js')}}"></script-->
<script src="{{asset('js/jquery.validate.min.js')}}"></script>
<script src="{{asset('js/mail-script.js')}}"></script>


<script src="{{asset('js/main.js')}}"></script>

<script>
    $( function() {
        $( "#slider-range" ).slider({
            range: true,
            min: 0,
            max: 24600,
            values: [ 750, 24600 ],
            slide: function( event, ui ) {
                $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] +"/ Year" );
            }
        });
        $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
            " - $" + $( "#slider-range" ).slider( "values", 1 ) + "/ Year");
    } );
</script>
