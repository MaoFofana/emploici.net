<!-- Nom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom', 'Nom:') !!}
    {!! Form::text('nom', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Lien Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lien', 'Lien:') !!}
    {!! Form::text('lien', null, ['class' => 'form-control']) !!}
</div>

<!-- Cv Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cv', 'Cv:') !!}
    {!! Form::text('cv', null, ['class' => 'form-control']) !!}
</div>

<!-- Lettre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lettre', 'Lettre:') !!}
    {!! Form::text('lettre', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('postulers.index') }}" class="btn btn-secondary">Cancel</a>
</div>
