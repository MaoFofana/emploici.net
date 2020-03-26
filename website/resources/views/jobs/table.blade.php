<div class="table-responsive-sm">
    <table class="table table-striped" id="jobs-table">
        <thead>
            <th>Titre</th>
        <th>Typeoffre</th>
        <th>Secteuractivite</th>
        <th>Niveauetude</th>
        <th>Lieu</th>
        <th>Datelimite</th>
        <th>Description</th>
            <th colspan="3">Action</th>
        </thead>
        <tbody>
        @foreach($jobs as $job)
            <tr>
                <td>{{ $job->titre }}</td>
            <td>{{ $job->typeoffre }}</td>
            <td>{{ $job->secteuractivite }}</td>
            <td>{{ $job->niveauetude }}</td>
            <td>{{ $job->lieu }}</td>
            <td>{{ $job->datelimite }}</td>
            <td>{{ $job->description }}</td>
                <td>
                    {!! Form::open(['route' => ['jobs.destroy', $job->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('jobs.show', [$job->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('jobs.edit', [$job->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>