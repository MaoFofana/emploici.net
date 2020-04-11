<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $entreprise->id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $entreprise->created_at->format('d-m-Y') }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $entreprise->updated_at->format('d-m-Y') }}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{{ $entreprise->deleted_at }}</p>
</div>

<!-- Nom Field -->
<div class="form-group">
    {!! Form::label('nom', 'Nom:') !!}
    <p>{{ $entreprise->nom }}</p>
</div>

<!-- Registrecommerce Field -->
<div class="form-group">
    {!! Form::label('registrecommerce', 'Registrecommerce:') !!}
    <p>{{ $entreprise->registrecommerce }}</p>
</div>

<!-- Contact Field -->
<div class="form-group">
    {!! Form::label('contact', 'Contact:') !!}
    <p>{{ $entreprise->contact }}</p>
</div>

<!-- Localisation Field -->
<div class="form-group">
    {!! Form::label('localisation', 'Localisation:') !!}
    <p>{{ $entreprise->localisation }}</p>
</div>

<!-- Infoentrepriseactivite Field -->
<div class="form-group">
    {!! Form::label('infoentrepriseactivite', 'Infoentrepriseactivite:') !!}
    <p>{{ $entreprise->infoentrepriseactivite }}</p>
</div>

