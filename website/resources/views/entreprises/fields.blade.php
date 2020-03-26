<!-- Nom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom', 'Nom:') !!}
    {!! Form::text('nom', null, ['class' => 'form-control']) !!}
</div>

<!-- Registrecommerce Field -->
<div class="form-group col-sm-6">
    {!! Form::label('registrecommerce', 'Registrecommerce:') !!}
    {!! Form::text('registrecommerce', null, ['class' => 'form-control']) !!}
</div>

<!-- Contact Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contact', 'Contact:') !!}
    {!! Form::number('contact', null, ['class' => 'form-control']) !!}
</div>

<!-- Localisation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('localisation', 'Localisation:') !!}
    {!! Form::text('localisation', null, ['class' => 'form-control']) !!}
</div>

<!-- Infoentrepriseactivite Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('infoentrepriseactivite', 'Infoentrepriseactivite:') !!}
    {!! Form::textarea('infoentrepriseactivite', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('entreprises.index') }}" class="btn btn-secondary">Cancel</a>
</div>
