<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Details </title>
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
                    <h3>{{$job->titre}}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->

<div class="job_details_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="job_details_header">
                    <div class="single_jobs white-bg d-flex justify-content-between">
                        <div class="jobs_left d-flex align-items-center">
                            <div style="padding-right: 5%">
                                <img width="80" height="80" style="border-radius: 10%" src="{{url('storage/'.$job->user->link)}}" alt="">
                            </div>
                            <div class="jobs_conetent">
                                <a href="#"><h4>{{$job->titre}}</h4></a>
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
                            </div>
                        </div>
                    </div>
                </div>
                <div class="descript_wrap white-bg">
                    <div class="single_wrap">
                        <h4>Description</h4>
                        <p>{{$job->description}}</p>
                    </div>
                    <!--div class="single_wrap">
                        <h4>Responsibility</h4>
                        <ul>
                            <li>The applicants should have experience in the following areas.
                            </li>
                            <li>Have sound knowledge of commercial activities.</li>
                            <li>Leadership, analytical, and problem-solving abilities.</li>
                            <li>Should have vast knowledge in IAS/ IFRS, Company Act, Income Tax, VAT.</li>
                        </ul>
                    </div>
                    <div class="single_wrap">
                        <h4>Qualifications</h4>
                        <ul>
                            <li>The applicants should have experience in the following areas.
                            </li>
                            <li>Have sound knowledge of commercial activities.</li>
                            <li>Leadership, analytical, and problem-solving abilities.</li>
                            <li>Should have vast knowledge in IAS/ IFRS, Company Act, Income Tax, VAT.</li>
                        </ul>
                    </div>
                    <div class="single_wrap">
                        <h4>Email : {{$job->user->email}}</h4>
                        <p></p>
                    </div-->
                </div>
                <div class="apply_job_form white-bg">
                    <h4>Postuler</h4>
                    <form action="{{route('postulers.store')}}" method="post" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <input type="hidden" name="job_id" value="{{$job->id}}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input_field">
                                    <input type="text" name="nom" placeholder="Votre nom">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input_field">
                                    <input type="text" placeholder="Votre Email" name="email">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input_field">
                                    <input type="text" name="lien" placeholder="Lien de votre site ou portfolio">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button type="button" id="inputGroupFileAddon03"><i class="fa fa-cloud-upload" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="cv" accept="application/pdf" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03">
                                        <label class="custom-file-label" for="inputGroupFile03">Charger le  CV</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button type="button" id="inputGroupFileAddon03"><i class="fa fa-cloud-upload" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="lettre"  accept="application/pdf" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03">
                                        <label class="custom-file-label" for="inputGroupFile03">Lettre de motivation</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input_field">
                                    <textarea name="mots" id="" cols="30"  rows="10" placeholder="Laisser un mot "></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="submit_btn">
                                    <button class="boxed-btn3 w-100" type="submit">Envoyer</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="job_sumary">
                    <div class="summery_header">
                        <h3>Information</h3>
                    </div>
                    <div class="job_content">
                        <ul>
                            <li>Publier le: <span>{{$job->created_at}}</span></li>
                            <li>Date limite: <span>{{$job->datelimite}}</span></li>
                            <li>Nombre de poste: <span>{{$job->nombreposte}} </span></li>
                            <li>Localisation: <span>{{$job->lieu}}</span></li>
                            <li>Nature du travail: <span> {{$job->typeoffre}}</span></li>
                            <li>Email: <span> {{$job->user->email}}</span></li>
                        </ul>
                    </div>
                </div>
                <div class="share_wrap d-flex">
                    <span>Share at:</span>
                    <ul>
                        <li><a href="#"> <i class="fa fa-facebook"></i></a> </li>
                        <li><a href="#"> <i class="fa fa-google-plus"></i></a> </li>
                        <li><a href="#"> <i class="fa fa-twitter"></i></a> </li>
                        <li><a href="#"> <i class="fa fa-envelope"></i></a> </li>
                    </ul>
                </div>
                <!--div-- class="job_location_wrap">
                    <div class="job_lok_inner">
                        <div id="map" style="height: 200px;"></div>
                        <script>
                            function initMap() {
                                var uluru = {lat: -25.363, lng: 131.044};
                                var grayStyles = [
                                    {
                                        featureType: "all",
                                        stylers: [
                                            { saturation: -90 },
                                            { lightness: 50 }
                                        ]
                                    },
                                    {elementType: 'labels.text.fill', stylers: [{color: '#ccdee9'}]}
                                ];
                                var map = new google.maps.Map(document.getElementById('map'), {
                                    center: {lat: -31.197, lng: 150.744},
                                    zoom: 9,
                                    styles: grayStyles,
                                    scrollwheel:  false
                                });
                            }

                        </script>
                        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&callback=initMap"></script>

                    </div>
                </div-->
            </div>
        </div>
    </div>
</div>

@include('shared.footer')
</body>

</html>