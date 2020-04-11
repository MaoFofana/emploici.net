<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Connnexion</title>
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
                    <h3>Connection</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->
<!-- ================ contact section start ================= -->
<section class="contact-section section_padding" >
    <div class="container">
        <div class="row">
            <div class="col-12"  style="margin: 0% 20% 0% 20%">
                <h2 class="contact-title">Connectez-vous</h2>
            </div>
            <div class="col-lg-12"  style="margin: 0% 20% 0% 20%">
                <form method="post" action="{{ url('/login') }}"  class="form-contact contact_form"  id="contactForm" novalidate="novalidate">
                    {!! csrf_field() !!}
                    <div class="row" >
                        <div class="col-sm-6">
                            <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        </div>
                    </div>
                    <div class="row" >
                        <div class="col-sm-6">
                            <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input type="password" class="form-control" placeholder="Password" name="password">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row" >
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-primary btn-block btn-flat btn-lg">Se connecter</button>
                        </div>
                    </div>

                </form>

                <h5>
                    <a href="{{ url('/password/reset') }}">J'ai oublié mon mot de passe</a><br>
                    <a href="{{ url('/register') }}" class="text-center">Je suis un nouveau membre</a>
                </h5>

            </div>
        </div>
    </div>
</section>
<!-- ================ contact section end ================= -->

@include('shared.footer')

</body>

</html>
