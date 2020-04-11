<div class="table-responsive-sm">
    <table class="table table-striped" id="jobs-table">
        <thead>
            <th>Titre</th>
        <th>Typeoffre</th>
        <th>Secteuractivite</th>
        <th>Niveauetude</th>
        <th>Lieu</th>
        <th>Datelimite</th>
            <th>Active</th>
            <th colspan="3">Action</th>
        </thead>
        <tbody>
        @foreach($jobs as $job)
            <tr>
                <td>{{ $job->titre }}</td>
            <td>{{ $job->typeoffre }}</td>
            <td>{{ $job->secteuractivite }}</td>
            <td>{{ $job->niveauetude}}</td>
            <td>{{ $job->lieu }}</td>
            <td>{{ $job->datelimite->format('d-m-Y') }}</td>
                @if($job->deleted_at == null)
                <td>Active</td>
                @else
                    <td>Desactivé</td>
                @endif
                <td>
                    {!! Form::open(['route' => ['jobs.destroy', $job->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <!--a-- href="{{ route('jobs.show', [$job->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a-->
                        <a href="{{ route('jobs.edit', [$job->id]) }}" class='btn btn-ghost-info'>Voir / Editer</a>
                        {!! Form::button('Desactivé', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('EÊtes vous sûrs? ?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
