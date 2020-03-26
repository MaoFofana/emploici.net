<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Compte</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type='text/javascript'>

        function preview_image(event)
        {
            var reader = new FileReader();
            reader.onload = function()
            {
                var output = document.getElementById('output_image');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
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
                    <h3>Informations</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->
    <div class="row">
        <div class="col-sm-6 text-center">
            @if($user->link == "user.png")
                <img height="120" width="120" style="border-radius: 30%;"  id="output_image"  src="{{url('storage/'.$user->link)}}"/>
                @if($user->entreprises)
                    <h6>Veuillez choisir le logo de votre entreprise</h6>
                @else
                    <h6>Veuillez choisir une photo de profile</h6>
                @endif
            @else
                <img height="120"  width="120" id="output_image" style="border-radius: 30%;" src="{{url('storage/'.$user->link)}}" alt="">
            @endif

            <br>
            <form action="{{url('/sendupload')}}" style="margin-top: 2%" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div>
                    <input type="file" name="file" accept="image/*" onchange="preview_image(event)">
                </div>
                <br>
                <input type="submit" class="boxed-btn3" value="Enregistrer">
            </form>
        </div>
        @if($user->entreprises)
        <div class="col-sm-6 text-center" style="margin-top: 2px">
            <img height="150"  width="150" src="{{url('storage/job.png')}}" alt="">
            <div class="d-lg-block" style="margin-top: 5%">
                <a class="boxed-btn3" href="{{url('/poster')}}">Poster un job</a>
            </div>
        </div>
            @endif
    </div>
<!-- featured_candidates_area_start  -->
<div class="featured_candidates_area candidate_page_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="row"><h3 style="text-decoration: underline;margin-left: 10%">Information personnelle</h3></div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <form method="post" action="{{ url('/updateuser') }}"  class="form-control" novalidate="novalidate">
                                {!! csrf_field() !!}
                                <input type="hidden" name="id" value="{{$user->id}}">
                                <input type="hidden" name="role" value="{{$user->role}}">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label for="name">Nom</label>
                                            <input class="form-control" name="name" id="name" type="text" onfocus="this.placeholder = ''"
                                                   onblur="this.placeholder = 'Entrer votre nom'" placeholder = 'Entrer votre nom' value="{{$user->name}}">
                                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="prenom">Prenom</label>
                                            <input class="form-control" name="prenom" id="prenom" type="text" onfocus="this.placeholder = ''"
                                                   onblur="this.placeholder = 'Entrer votre prenom'" placeholder = 'Entrer votre prenom' value="{{$user->prenom}}">
                                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group ">
                                            <label for="fonction">Fonction</label>
                                            <input class="form-control" name="fonction" id="fonction" type="text" onfocus="this.placeholder = ''"
                                                   onblur="this.placeholder = 'Entrer votre fonction passé ou actuelle'" placeholder = 'Entrer votre fonction passé ou actuel' value="{{$user->fonction}}">
                                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                        </div>
                                    </div>


                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary btn-block btn-flat btn-lg">Enregistrer</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="row" style="padding-top: 3%">
                            @if($user->role == 'CHERCHEUR')
                                <form action="{{url('/uploadcv')}}" method="post" class="form-control" enctype="multipart/form-data">
                                    {!! csrf_field() !!}
                                    <div class="col-sm-12">

                                            <div class="row" style="padding-top: 3%">
                                                <div class="col-sm-12">
                                                    <h4>
                                                        @if($user->cv == 'cv')
                                                            Aucun cv veuillez en choisir.
                                                        @else
                                                            <a href="{{url('storage/'.$user->cv)}}" target="_blank"  class="btn btn-xs btn-primary btn-block">Voir mon cv </a>
                                                        @endif
                                                    </h4>
                                                </div>
                                            </div>

                                    </div>
                                    <input type="file"  accept="application/pdf" name="file">
                                    {!! Form::button('Modifier ', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs']) !!}
                                </form>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
            @if($user->entreprises)
            <div class="col-lg-6">

                    <div class="row"><h3 style="text-decoration: underline; margin-left: 10%">Information sur entreprise</h3></div>
                    <div class="row">
                        <div class="col-sm-12">
                            {!! Form::model($user->entreprises, ['route' => ['entreprises.update', $user->entreprises->id], 'method' => 'patch', 'class'=>'form-control']) !!}
                            {!! csrf_field() !!}

                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- Nom Field -->
                                    <div class="form-group">
                                        {!! Form::label('nom', 'Nom:') !!}
                                        {!! Form::text('nom', $user->entreprises->nom, ['class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <!-- Registrecommerce Field -->
                                    <div class="form-group">
                                        {!! Form::label('registrecommerce', 'Registre de commerce:') !!}
                                        {!! Form::text('registrecommerce', $user->entreprises->registrecommerce, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-sm-6">
                                    {!! Form::label('localisation', 'Localisation:') !!}
                                    {!! Form::text('localisation', $user->entreprises->localisation, ['class' => 'form-control large']) !!}
                                </div>

                                <div class="col-sm-6">
                                    <!-- Contact Field -->
                                    <div class="form-group">
                                        {!! Form::label('contact', 'Contact:') !!}
                                        {!! Form::number('contact', $user->entreprises->contact, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- Infoentrepriseactivite Field -->
                                    <div class="form-group">
                                        {!! Form::label('infoentrepriseactivite', "Information sur les activité d'entreprise:") !!}
                                        {!! Form::textarea('infoentrepriseactivite', $user->entreprises->infoentrepriseactivite, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <!-- Submit Field -->
                                <div class="form-group col-sm-12" style="margin-top: 5%">
                                    {!! Form::submit("Modifier", ['class' => 'btn btn-primary btn-block btn-flat btn-lg']) !!}
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
            </div>
            @endif
        </div>
    </div>
</div>
<!-- footer start -->
@include('shared.footer')
</body>

</html>
