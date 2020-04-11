<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Enregistrer une offre</title>
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
                    <h3>Offre d'emploi</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->
<!-- ================ contact section start ================= -->
@if (Route::has('login'))
    @auth
        @if(auth()->user()->role == "RECRUTEUR")

            <section class="contact-section section_padding">

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title">Enregistrer une offre</h2>
                    </div>
                    <div class="col-lg-12">
                        {!! Form::open(['route' => 'jobs.store', 'class'=>'form-control']) !!}
                        <div class="row">
                            <!-- Titre Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('titre', 'Titre:') !!}
                                {!! Form::text('titre', null, ['class' => 'form-control']) !!}
                            </div>
                            <!-- Typeoffre Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('typeoffre', "Type d'offre:") !!}
                                <select class="wide" name="typeoffre" >
                                    <option data-display="Type d'offre" disabled selected>Type d'offre</option>
                                    <option >EMPLOI</option>
                                    <option >STAGE</option>
                                    <option >INTERIM</option>
                                    <option >FREELANCE</option>
                                    <option >CONSULTANCE</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">


                            <!-- Secteuractivite Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('secteuractivite', "Secteur d'activite:") !!}
                                {!! Form::text('secteuractivite', null, ['class' => 'form-control', 'list'=>'secteur']) !!}
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

                            <!-- Niveauetude Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('niveauetude', "Niveau d'etude:") !!}
                                {!! Form::text('niveauetude', null, ['class' => 'form-control','list'=>'niveau']) !!}
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
                        <div class="row">
                            <!-- Lieu Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('lieu', 'Lieu:') !!}
                                {!! Form::text('lieu', null, ['class' => 'form-control']) !!}
                            </div>

                            <!-- Datelimite Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('datelimite', 'Date limite:') !!}
                                {!! Form::date('datelimite', null, ['class' => 'form-control','id'=>'datelimite']) !!}
                            </div>
                            @section('scripts')
                                <script type="text/javascript">
                                    $('#datelimite').datetimepicker({
                                        format: 'YYYY-MM-DD HH:mm:ss',
                                        useCurrent: false
                                    })
                                </script>
                            @endsection
                        </div>
                        <div class="row">
                            <!-- Titre Field -->
                            <div class="form-group col-sm-12">
                                {!! Form::label('nombreposte', 'Nombre de poste:') !!}
                                {!! Form::number('nombreposte', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <!-- Description Field -->
                            <div class="form-group col-sm-12 col-lg-12 mx-3">
                                {!! Form::label('description', 'Description:') !!}
                                <input id="x" type="hidden" name="description">
                                <trix-editor input="x" class="form-control"></trix-editor>
                            </div>
                        </div>
                        <!-- Submit Field -->
                        <div class="form-group col-sm-12">
                            <div class="row">
                                <div class="col-sm-6" style="margin-bottom: 5px">
                                    {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary btn-block btn-flat btn-lg']) !!}
                                </div>
                                <div class="col-sm-6">
                                    <a href="{{ route('jobs.index') }}" class="btn btn-danger btn-block btn-flat btn-lg">Annuler</a>

                                </div>
                            </div>


                        </div>


                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </section>
        @else
            <h3 class="text-center">
                <a class="boxed-btn3" href="{{url('/')}}">Vous n'etes pas un recruteur</a>
            </h3>
        @endif
    @else
        <h3 class="text-center">
            <a class="boxed-btn3" href="{{url('/login')}}">Connectez-vous d'abord</a>
        </h3>

    @endauth
@endif

<!-- ================ contact section end ================= -->
<!-- footer start -->
@include('shared.footer')
</body>

</html>
