<div class="table-responsive-sm">
    <table class="table table-striped" id="entreprises-table">
        <thead>
            <th>Nom</th>
        <th>Registrecommerce</th>
        <th>Contact</th>
        <th>Localisation</th>
        <th>Infoentrepriseactivite</th>
            <th colspan="3">Action</th>
        </thead>
        <tbody>
        @foreach($entreprises as $entreprise)
            <tr>
                <td>{{ $entreprise->nom }}</td>
            <td>{{ $entreprise->registrecommerce }}</td>
            <td>{{ $entreprise->contact }}</td>
            <td>{{ $entreprise->localisation }}</td>
            <td>{{ $entreprise->infoentrepriseactivite }}</td>
                <td>
                    {!! Form::open(['route' => ['entreprises.destroy', $entreprise->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('entreprises.show', [$entreprise->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('entreprises.edit', [$entreprise->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>