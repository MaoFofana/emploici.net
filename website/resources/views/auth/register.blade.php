<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Inscription</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script type="text/javascript">
        function val(a){
            var x = (a.value || a.options[a.selectedIndex].value)
            if(x == "RECRUTEUR"){
                document.getElementById("label").innerHTML = "Charger le logo de votre entreprise";
            }else {
                document.getElementById("label").innerHTML = "Charger une image";
            }
        }
    </script>

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
                    <h3>Inscription</h3>
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
                <h2 class="contact-title">Inscrivez-vous</h2>
            </div>
            <div class="col-lg-12">
                <form method="post" action="{{ url('/register') }}"  class="form-contact contact_form"  id="contactForm" novalidate="novalidate">
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
                                <input class="form-control" name="name" id="name" type="text" onfocus="this.placeholder = ''"
                                       onblur="this.placeholder = 'Entrer votre nom'" placeholder = 'Entrer votre nom' value="{{ old('name') }}">
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
                                <input class="form-control" name="prenom" id="prenom" type="text" onfocus="this.placeholder = ''"
                                       onblur="this.placeholder = 'Entrer votre prenom'" placeholder = 'Entrer votre prenom' value="">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group ">
                                <input class="form-control" name="fonction" id="fonction" type="text" onfocus="this.placeholder = ''"
                                       onblur="this.placeholder = 'Entrer votre fonction passée ou actuelle'" placeholder = 'Entrer votre fonction passée ou actuelle' value="">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="single_input">
                                <select name="role" class="wide" id="selected">
                                    <option disabled selected>Type de demande</option>
                                    <option value="CHERCHEUR">Chercheur d'emploi</option>
                                    <option value="RECRUTEUR" >Recruteur</option>
                                </select>
                            </div>
                        </div>



                    <div class="col-sm-6">
                        <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input type="password" class="form-control" name="password" placeholder="Votre mot de passe">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                            @if ($errors->has('password'))
                                <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                            @endif
                        </div>
                    </div>

                        <div class="col-sm-6">
                            <div class="form-group has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <input type="password" name="password_confirmation" class="form-control" placeholder="La confirmation de votre mot de passe">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-primary btn-block btn-flat btn-lg">M'inscrire</button>
                        </div>
                    </div>
                </form>

                <h3>
                    <a href="{{ url('/login') }}" class="link text-center">J'ai déjà un compte</a>
                </h3>

            </div>
        </div>
    </div>
</section>
<!-- ================ contact section end ================= -->



@include('shared.footer')
</body>

</html>
