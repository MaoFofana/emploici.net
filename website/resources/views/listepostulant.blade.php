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
                    <h3>Candidats</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->

<div class="job_details_area">
    <div class="container">
        <div class="row">
            @foreach($postulant as $pos)
            <div class="col-lg-4">
                <div class="job_sumary">
                    <div class="summery_header">
                        <h3>Information </h3>
                    </div>
                    <div class="job_content">
                        <ul>
                            <li>Nom : {{$pos->nom}} <span></span></li>
                            <li>Email: <span> {{$pos->email}}</span></li>
                            <li>Lien vers site : <span> {{$pos->lien}}</span></li>
                            <li>CV: <span>  <a href="{{url('/storage/'.$pos->cv)}}" target="_blank">Voir</a> </span></li>
                            <li>Lettre de motivation:  <span><a href="{{url('/storage/'.$pos->lettre)}}" target="_blank">Voir</a> </span></li>
                        </ul>
                    </div>
                    <div class="summery_header">
                        <h5>Quelque mots</h5>
                        <p>
                            {{$pos->mots}}
                        </p>

                    </div>
                </div>
            </div>
                @endforeach
        </div>
    </div>
</div>

@include('shared.footer')
</body>

</html>