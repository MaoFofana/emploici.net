@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Utilisateurs</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>
                            Liste des utilisateurs
                        </div>
                        <div class="card-body">
    <div class="table-responsive-sm">
        <table class="table table-striped" id="postulers-table">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Fonction</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->fonction }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <form action="{{url('/isAdmin')}}" method="post">
                            {!! csrf_field() !!}
                            <div class='btn-group'>
                                <input type="hidden" name="id" value="{{$user->id}}">
                                @if($user->role == "ADMIN")
                                <input type="submit" value="Supprimé admin" class="btn btn-primary">
                                    @else
                                    <input type="submit" value="Ajouter admin" class="btn btn-primary">
                                @endif
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
                            <div class="pull-right mr-3">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
