<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Entreprise</title>
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
                    <h3>Information sur entreprise</h3>
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
                <h2 class="contact-title">Enregistrer votre entreprise</h2>
            </div>
            <div class="col-lg-12">
                    <form method="post" action="{{ route('entreprises.store') }}"  class="form-contact contact_form"  id="contactForm" novalidate="novalidate">
                    {!! csrf_field() !!}

                        <div class="row">
                            <div class="col-sm-6">
                                <!-- Nom Field -->
                                <div class="form-group">
                                    {!! Form::label('nom', 'Nom:') !!}
                                    {!! Form::text('nom', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <!-- Registrecommerce Field -->
                                <div class="form-group">
                                    {!! Form::label('registrecommerce', 'Registre de commerce:') !!}
                                    {!! Form::text('registrecommerce', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="form-group col-sm-6">
                                {!! Form::label('localisation', 'Localisation:') !!}
                                {!! Form::text('localisation', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-sm-6">
                                <!-- Contact Field -->
                                <div class="form-group">
                                    {!! Form::label('contact', 'Contact:') !!}
                                    {!! Form::number('contact', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-sm-12">
                                <!-- Infoentrepriseactivite Field -->
                                <div class="form-group">
                                    {!! Form::label('infoentrepriseactivite', "Information sur les activités d'entreprise:") !!}
                                    {!! Form::textarea('infoentrepriseactivite', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- Submit Field -->
                            <div class="form-group col-sm-12" style="padding-top: 3%">
                                {!! Form::submit("Enregistrer votre entreprise", ['class' => 'btn btn-primary btn-block btn-flat btn-lg']) !!}
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</section>
<!-- ================ contact section end ================= -->



@include('shared.footer')
</body>

</html>
