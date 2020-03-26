<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $job->id }}</p>
</div>

<!-- Titre Field -->
<div class="form-group">
    {!! Form::label('titre', 'Titre:') !!}
    <p>{{ $job->titre }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $job->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $job->updated_at }}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{{ $job->deleted_at }}</p>
</div>

<!-- Typeoffre Field -->
<div class="form-group">
    {!! Form::label('typeoffre', 'Typeoffre:') !!}
    <p>{{ $job->typeoffre }}</p>
</div>

<!-- Secteuractivite Field -->
<div class="form-group">
    {!! Form::label('secteuractivite', 'Secteuractivite:') !!}
    <p>{{ $job->secteuractivite }}</p>
</div>

<!-- Niveauetude Field -->
<div class="form-group">
    {!! Form::label('niveauetude', 'Niveauetude:') !!}
    <p>{{ $job->niveauetude }}</p>
</div>

<!-- Lieu Field -->
<div class="form-group">
    {!! Form::label('lieu', 'Lieu:') !!}
    <p>{{ $job->lieu }}</p>
</div>

<!-- Datelimite Field -->
<div class="form-group">
    {!! Form::label('datelimite', 'Datelimite:') !!}
    <p>{{ $job->datelimite }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $job->description }}</p>
</div>

