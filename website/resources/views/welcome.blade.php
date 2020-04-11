<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Accueil</title>

    @include('shared.head')
</head>

<body>


<!-- header-start -->
@include('shared.menu')
<!-- header-end -->

<!-- slider_area_start -->
<div class="slider_area">
    <div class="single_slider  d-flex align-items-center slider_bg_1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-6">
                    <div class="slider_text">
                        <!--h5-- class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".2s">4536+ Jobs listed</h5-->
                        <h3 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">Trouver l'emploi de vos rêves</h3>
                        <!--p-- class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".4s">Nous offrons plusieurs services qui vous permettra de rester informer afin d’avoir un emploi</p-->
                        <!--div-- class="sldier_btn wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".5s">
                            <a href="" class="boxed-btn3">Rejoignez-nous </a>
                        </div-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ilstration_img wow fadeInRight d-none d-lg-block text-right" data-wow-duration="1s" data-wow-delay=".2s">
        <img src="img/banner/illustration.png" alt="">
    </div>
</div>
<!-- slider_area_end -->



<!-- popular_catagory_area_start  >
<div class="popular_catagory_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title mb-40">
                    <h3>Popolar Categories</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-xl-3 col-md-6">
                <div class="single_catagory">
                    <a href="jobs.html"><h4>Design & Creative</h4></a>
                    <p> <span>50</span> Available position</p>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3 col-md-6">
                <div class="single_catagory">
                    <a href="jobs.html"><h4>Marketing</h4></a>
                    <p> <span>50</span> Available position</p>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3 col-md-6">
                <div class="single_catagory">
                    <a href="jobs.html"><h4>Telemarketing</h4></a>
                    <p> <span>50</span> Available position</p>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3 col-md-6">
                <div class="single_catagory">
                    <a href="jobs.html"><h4>Software & Web</h4></a>
                    <p> <span>50</span> Available position</p>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3 col-md-6">
                <div class="single_catagory">
                    <a href="jobs.html"><h4>Administration</h4></a>
                    <p> <span>50</span> Available position</p>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3 col-md-6">
                <div class="single_catagory">
                    <a href="jobs.html"><h4>Teaching & Education</h4></a>
                    <p> <span>50</span> Available position</p>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3 col-md-6">
                <div class="single_catagory">
                    <a href="jobs.html"><h4>Engineering</h4></a>
                    <p> <span>50</span> Available position</p>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3 col-md-6">
                <div class="single_catagory">
                    <a href="jobs.html"><h4>Garments / Textile</h4></a>
                    <p> <span>50</span> Available position</p>
                </div>
            </div>
        </div>
    </div>
</div>
<-- popular_catagory_area_end  -->

<!-- job_listing_area_start  -->
@if($jobs->count() != 0)
<div class="job_listing_area" >
    <div class="container">
        <div class="row align-items-center" style="padding-top: 3%">
            <div class="col-lg-6">
                <div class="section_title">
                    <h3>Quelques offres</h3>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="brouse_job text-right">
                    <a href="{{url('/emplois')}}" class="boxed-btn4">Plus</a>
                </div>
            </div>
        </div>

        <div class="job_lists">
            <div class="row">
                @foreach($jobs as $job)
                <div class="col-lg-12 col-md-12">
                    <div class="single_jobs white-bg d-flex justify-content-between">
                        <div class="jobs_left d-flex align-items-center">
                            <div style="padding-right: 3%">
                                <img width="80" height="80" style="border-radius: 10%" src="{{url('storage/'.$job->user->link)}}" alt="">
                            </div>
                            <div class="jobs_conetent">
                                <a href="job_details.html"><h4>{{$job->titre}}</h4></a>
                                <div class="links_locat d-flex align-items-center">
                                    <div class="location">
                                        <p> <i class="fa fa-map-marker"></i>{{$job->lieu}}  </p>
                                    </div>
                                    <!--div-- class="location">
                                        <p> <i class="fa fa-clock-o"></i> Part-time</p>
                                    </div-->
                                </div>
                            </div>
                        </div>
                        <div class="jobs_right">
                            <div class="apply_now">
                                <!--a-- class="heart_mark" href="#"> <i class="ti-heart"></i> </a-->
                                <form action="{{url('/details')}}" method="post">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="id" value="{{$job->id}}">
                                    <input type="submit" value="Voir"  class="boxed-btn3 btn-block">
                                </form>
                            </div>
                            <div class="date">
                                <p>Date limite: {{$job->datelimite->format('d-m-Y')}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- job_listing_area_end  -->

    @else
    <div class="mt-5 mb-5 text-center" ><h3>Aucun job n'est disponible actuellement </h3></div>
@endif
<!-- featured_candidates_area_start  >
<div class="featured_candidates_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title text-center mb-40">
                    <h3>Featured Candidates</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="candidate_active owl-carousel">
                    <div class="single_candidates text-center">
                        <div class="thumb">
                            <img src="img/candiateds/1.png" alt="">
                        </div>
                        <a href="#"><h4>Markary Jondon</h4></a>
                        <p>Software Engineer</p>
                    </div>
                    <div class="single_candidates text-center">
                        <div class="thumb">
                            <img src="img/candiateds/2.png" alt="">
                        </div>
                        <a href="#"><h4>Markary Jondon</h4></a>
                        <p>Software Engineer</p>
                    </div>
                    <div class="single_candidates text-center">
                        <div class="thumb">
                            <img src="img/candiateds/3.png" alt="">
                        </div>
                        <a href="#"><h4>Markary Jondon</h4></a>
                        <p>Software Engineer</p>
                    </div>
                    <div class="single_candidates text-center">
                        <div class="thumb">
                            <img src="img/candiateds/4.png" alt="">
                        </div>
                        <a href="#"><h4>Markary Jondon</h4></a>
                        <p>Software Engineer</p>
                    </div>
                    <div class="single_candidates text-center">
                        <div class="thumb">
                            <img src="img/candiateds/5.png" alt="">
                        </div>
                        <a href="#"><h4>Markary Jondon</h4></a>
                        <p>Software Engineer</p>
                    </div>
                    <div class="single_candidates text-center">
                        <div class="thumb">
                            <img src="img/candiateds/6.png" alt="">
                        </div>
                        <a href="#"><h4>Markary Jondon</h4></a>
                        <p>Software Engineer</p>
                    </div>
                    <div class="single_candidates text-center">
                        <div class="thumb">
                            <img src="img/candiateds/7.png" alt="">
                        </div>
                        <a href="#"><h4>Markary Jondon</h4></a>
                        <p>Software Engineer</p>
                    </div>
                    <div class="single_candidates text-center">
                        <div class="thumb">
                            <img src="img/candiateds/8.png" alt="">
                        </div>
                        <a href="#"><h4>Markary Jondon</h4></a>
                        <p>Software Engineer</p>
                    </div>
                    <div class="single_candidates text-center">
                        <div class="thumb">
                            <img src="img/candiateds/9.png" alt="">
                        </div>
                        <a href="#"><h4>Markary Jondon</h4></a>
                        <p>Software Engineer</p>
                    </div>
                    <div class="single_candidates text-center">
                        <div class="thumb">
                            <img src="img/candiateds/9.png" alt="">
                        </div>
                        <a href="#"><h4>Markary Jondon</h4></a>
                        <p>Software Engineer</p>
                    </div>
                    <div class="single_candidates text-center">
                        <div class="thumb">
                            <img src="img/candiateds/10.png" alt="">
                        </div>
                        <a href="#"><h4>Markary Jondon</h4></a>
                        <p>Software Engineer</p>
                    </div>
                    <div class="single_candidates text-center">
                        <div class="thumb">
                            <img src="img/candiateds/3.png" alt="">
                        </div>
                        <a href="#"><h4>Markary Jondon</h4></a>
                        <p>Software Engineer</p>
                    </div>
                    <div class="single_candidates text-center">
                        <div class="thumb">
                            <img src="img/candiateds/4.png" alt="">
                        </div>
                        <a href="#"><h4>Markary Jondon</h4></a>
                        <p>Software Engineer</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<-- featured_candidates_area_end  ->

<div class="top_companies_area">
    <div class="container">
        <div class="row align-items-center mb-40">
            <div class="col-lg-6 col-md-6">
                <div class="section_title">
                    <h3>Top Companies</h3>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="brouse_job text-right">
                    <a href="jobs.html" class="boxed-btn4">Browse More Job</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-xl-3 col-md-6">
                <div class="single_company">
                    <div class="thumb">
                        <img src="img/svg_icon/5.svg" alt="">
                    </div>
                    <a href="jobs.html"><h3>Snack Studio</h3></a>
                    <p> <span>50</span> Available position</p>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3 col-md-6">
                <div class="single_company">
                    <div class="thumb">
                        <img src="img/svg_icon/4.svg" alt="">
                    </div>
                    <a href="jobs.html"><h3>Snack Studio</h3></a>
                    <p> <span>50</span> Available position</p>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3 col-md-6">
                <div class="single_company">
                    <div class="thumb">
                        <img src="img/svg_icon/3.svg" alt="">
                    </div>
                    <a href="jobs.html"><h3>Snack Studio</h3></a>
                    <p> <span>50</span> Available position</p>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3 col-md-6">
                <div class="single_company">
                    <div class="thumb">
                        <img src="img/svg_icon/1.svg" alt="">
                    </div>
                    <a href="jobs.html"><h3>Snack Studio</h3></a>
                    <p> <span>50</span> Available position</p>
                </div>
            </div>
        </div>
    </div>
</div>

<-- job_searcing_wrap  -->
<div class="job_searcing_wrap overlay">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 offset-lg-1 col-md-6">
                <div class="searching_text">
                    <h3>Recherchez-vous un job?</h3>
                    <p>Nous fournissions plusieurs services qui vous permettra de trouver emploi</p>
                    <a href="{{url('/emplois')}}" class="boxed-btn3">Explorer</a>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1 col-md-6">
                <div class="searching_text">
                    <h3>Recherchez-vous un talent?</h3>
                    <p>Nous offrons plusieurs services qui vous permettra de retrouver le candidat parfait</p>
                    <a href="{{url('/')}}" class="boxed-btn3">Explorer</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- job_searcing_wrap end  -->

<!-- testimonial_area  >
<div class="testimonial_area  ">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title text-center mb-40">
                    <h3>Temoignage</h3>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="testmonial_active owl-carousel">
                    <div class="single_carousel">
                        <div class="row">
                            <div class="col-lg-11">
                                <div class="single_testmonial d-flex align-items-center">
                                    <div class="thumb">
                                        <img src="img/testmonial/author.png" alt="">
                                        <div class="quote_icon">
                                            <i class="Flaticon flaticon-quote"></i>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering through animal welfare when people might depend on livestock as their only source of income or food.</p>
                                        <span>- Micky Mouse</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_carousel">
                        <div class="row">
                            <div class="col-lg-11">
                                <div class="single_testmonial d-flex align-items-center">
                                    <div class="thumb">
                                        <img src="img/testmonial/author.png" alt="">
                                        <div class="quote_icon">
                                            <i class=" Flaticon flaticon-quote"></i>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering through animal welfare when people might depend on livestock as their only source of income or food.</p>
                                        <span>- Micky Mouse</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_carousel">
                        <div class="row">
                            <div class="col-lg-11">
                                <div class="single_testmonial d-flex align-items-center">
                                    <div class="thumb">
                                        <img src="img/testmonial/author.png" alt="">
                                        <div class="quote_icon">
                                            <i class="Flaticon flaticon-quote"></i>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering through animal welfare when people might depend on livestock as their only source of income or food.</p>
                                        <span>- Micky Mouse</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<-- /testimonial_area  -->


<!-- Footer  -->
@include('shared.footer')


</body>

</html>
