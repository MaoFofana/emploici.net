<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Listes des offres</title>
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
                    <h3>Liste des offres valide</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->

<!-- catagory_area -->
<h5 class="text-center">{{$message}}</h5>
<div class="catagory_area">
    <div class="container">
        <form action="{{url('/search')}}" method="post">
            {!! csrf_field() !!}
            <div class="row cat_search">
                <div class="col-sm-6">
                    <div class="single_input">
                        <input type="text" name="mot" placeholder="Mot clé">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="single_input">
                        <select class="wide" id="selected" name="typeoffre" >
                            <option  selected value="">Tout</option>
                            <option >EMPLOI</option>
                            <option >STAGE</option>
                            <option >INTERIM</option>
                            <option >FREELANCE</option>
                            <option >CONSULTANCE</option>
                        </select>
                    </div>
                </div>


            </div>
            <div class="row cat_search">
                <div class="col-sm-6">
                    <div class="single_input">
                        <input type="text" list="secteur" name="secteur" placeholder="Secteur(s) d'activité">
                        <datalist id="secteur">
                            <option>Agroalimentaire</option>
                            <option>Banque / Assurance</option>
                            <option>Bois / Papier / Carton / Imprimerie</option>
                            <option>BTP / Matériaux de construction</option>
                            <option>Chimie / Parachimie</option>
                            <option>Commerce / Négoce / Distribution</option>
                            <option>Édition / Communication / Multimédia</option>
                            <option>Électronique / Électricité</option>
                            <option>Études et conseils</option>
                            <option>Industrie pharmaceutique</option>
                            <option>Informatique / Télécoms</option>
                            <option>Machines et équipements / Automobile</option>
                            <option>Métallurgie / Travail du métal</option>
                            <option>Plastique / Caoutchouc</option>
                            <option>Services aux entreprises</option>
                            <option>Textile / Habillement / Chaussure</option>
                            <option>Transports / Logistique</option>
                        </datalist>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="single_input">
                        <input type="text" list="niveau" name="niveau" placeholder="Niveau(x) d'études">
                        <datalist id="niveau">
                            <option>BAC+8</option>
                            <option>BAC+7</option>
                            <option>BAC+6</option>
                            <option>BAC+5</option>
                            <option >BAC+4</option>
                            <option>BAC+3</option>
                            <option>BAC+2</option>
                            <option>BAC+1</option>
                            <option>BAC</option>
                            <option>BT</option>
                            <option>BP</option>
                            <option >TERMINALE</option>
                            <option>BEPC</option>
                            <option>BEP</option>
                            <option >CAP</option>
                            <option >CEPE</option>
                            <option>CM2</option>
                        </datalist>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-sm-6">
                        <button type="submit" class="boxed-btn3 btn-block">Touver un job</button>

                </div>
                <div class="col-sm-6">
                    <input type="reset" value="Reintialisé"  class="btn btn-lg btn-block btn-danger">
                </div>
                <!--div-- class="col-lg-12">
                    <div class="popular_search d-flex align-items-center">
                        <span>Recherche populaire:</span>
                        <ul>
                            <li><a href="#">Design & Creative</a></li>
                            <li><a href="#">Marketing</a></li>
                            <li><a href="#">Administration</a></li>
                            <li><a href="#">Teaching & Education</a></li>
                        </ul>
                    </div>
                </div-->
            </div>
        </form>

    </div>
</div>
<!--/ catagory_area -->

@if($jobs->count() != 0)
<!-- job_listing_area_start  -->
<div class="job_listing_area plus_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="recent_joblist_wrap">
                    <div class="recent_joblist white-bg ">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h4>Liste des offres</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="job_lists m-0">
                    <div class="row">
                        @foreach($jobs as $job)
                            <div class="col-lg-12 col-md-12">
                                <div class="single_jobs white-bg d-flex justify-content-between">
                                    <div class="jobs_left d-flex align-items-center">
                                        <div style="padding-right: 5%">
                                            <img width="80" height="80" style="border-radius: 10%" src="{{url('storage/'.$job->user->link)}}" alt="">
                                        </div>
                                        <div class="jobs_conetent">
                                            <a href="job_details.html"><h4>{{$job->titre}}</h4></a>
                                            <div class="links_locat d-flex align-items-center">
                                                <div class="location">
                                                    <p> <i class="fa fa-map-marker"></i>{{$job->lieu}}</p>
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
                                            <p>Date limite: {{$job->datelimite}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="pagination_wrap">
                                    {{ $jobs->links() }}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- job_listing_area_end  -->
@endif


@include('shared.footer')


</body>

</html>