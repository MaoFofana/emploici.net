<div class="table-responsive-sm">
    <table class="table table-striped" id="postulers-table">
        <thead>
            <th>Nom</th>
        <th>Email</th>
        <th>Lien</th>
        <th>Cv</th>
        <th>Lettre</th>
        <th>User Id</th>
            <th colspan="3">Action</th>
        </thead>
        <tbody>
        @foreach($postulers as $postuler)
            <tr>
                <td>{{ $postuler->nom }}</td>
            <td>{{ $postuler->email }}</td>
            <td>{{ $postuler->lien }}</td>
            <td>{{ $postuler->cv }}</td>
            <td>{{ $postuler->lettre }}</td>
            <td>{{ $postuler->user_id }}</td>
                <td>
                    {!! Form::open(['route' => ['postulers.destroy', $postuler->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('postulers.show', [$postuler->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('postulers.edit', [$postuler->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>