@extends('layouts.app')

@section('content')

    <div class="text-center">
        <!--/ bradcam_area  -->
        <div class="row">
            <div class="col-sm-12 text-center">
                @if($user->link == "user.png")
                    <img height="120" width="120" style="border-radius: 30%;"  id="output_image"  src="{{url('storage/'.$user->link)}}"/>

                    <h6>Veuillez choisir une photo de profile</h6>

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
                    <input type="submit" class="btn btn-primary" value="Enregistrer">
                </form>
            </div>
        </div>
    </div>


        <div class="container mt-5">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <h3 style="text-decoration: underline;margin-left: 10%">Information personnelle</h3></div>
                    <div class=" px-5 text-center">
                        <form method="post" action="{{ url('/updateuser') }}" >
                            {!! csrf_field() !!}
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <input type="hidden" name="role" value="{{$user->role}}">
                            <div class="row text-left">
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
                </div>

            </div>
        </div>

@endsection
