<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Compte</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

@include('shared.head')
<!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
@include('shared.menu')

<!-- bradcam_area  -->
<div class="bradcam_area bradcam_bg_1">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>Mes offres d'emploi publiées</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->
    <h3 class="text-center">
        {{$message}}
    </h3>

<!-- featured_candidates_area_start  -->
<div class="featured_candidates_area candidate_page_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row"> <h3>Liste des offres d'emploi publiées</h3></div>
                <div class="row">
                    <table class="table">
                        <tr>
                            <th>Titre </th>
                            <th>Date de publication</th>
                            <th>Date d'expiration</th>
                            <th>
                            </th>
                        </tr>
                        @foreach($user->jobs->reverse() as $job)
                        <tr>
                            <td>
                                {{$job->titre}}
                            </td>
                            <td>
                                {{$job->created_at->format('d-m-Y')}}
                            </td>
                            <td>
                                {{$job->datelimite->format('d-m-Y')}}
                            </td>
                            <td>
                                <div class="row">
                                    <form action="{{url('/candidats')}}" method="post" style="margin-right: 2%">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="id" value="{{$job->id}}">
                                        {!! Form::button($job->postuler->count()." Candidats", ['type' => 'submit', 'class' => 'btn btn-xs']) !!}
                                    </form>
                                    <form action="{{url('/details')}}" method="post" style="margin-right: 2%">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="id" value="{{$job->id}}">
                                        {!! Form::button('Voir', ['type' => 'submit', 'class' => 'btn btn-xs']) !!}
                                    </form>

                                    <form action="{{url('/destroyjob')}}" method="post">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="id" value="{{$job->id}}">
                                        {!! Form::button('X', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs']) !!}
                                    </form>
                                </div>

                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- featured_candidates_area_end  -->



<!-- footer start -->
@include('shared.footer')
</body>

</html>
