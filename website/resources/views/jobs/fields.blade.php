<!-- Titre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('titre', 'Titre:') !!}
    {!! Form::text('titre', null, ['class' => 'form-control']) !!}
</div>

<!-- Typeoffre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('typeoffre', 'Typeoffre:') !!}
    {!! Form::text('typeoffre', null, ['class' => 'form-control']) !!}
</div>

<!-- Secteuractivite Field -->
<div class="form-group col-sm-6">
    {!! Form::label('secteuractivite', 'Secteuractivite:') !!}
    {!! Form::text('secteuractivite', null, ['class' => 'form-control']) !!}
</div>

<!-- Niveauetude Field -->
<div class="form-group col-sm-6">
    {!! Form::label('niveauetude', 'Niveauetude:') !!}
    {!! Form::text('niveauetude', null, ['class' => 'form-control']) !!}
</div>

<!-- Lieu Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lieu', 'Lieu:') !!}
    {!! Form::text('lieu', null, ['class' => 'form-control']) !!}
</div>

<!-- Datelimite Field -->
<div class="form-group col-sm-6">
    {!! Form::label('datelimite', 'Datelimite:') !!}
    {!! Form::text('datelimite', null, ['class' => 'form-control','id'=>'datelimite']) !!}
</div>

@push('scripts')
   <script type="text/javascript">
           $('#datelimite').datetimepicker({
               format: 'YYYY-MM-DD HH:mm:ss',
               useCurrent: true,
               icons: {
                   up: "icon-arrow-up-circle icons font-2xl",
                   down: "icon-arrow-down-circle icons font-2xl"
               },
               sideBySide: true
           })
       </script>
@endpush


<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('jobs.index') }}" class="btn btn-secondary">Cancel</a>
</div>
