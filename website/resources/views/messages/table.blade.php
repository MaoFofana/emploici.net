<div class="table-responsive-sm">
    <table class="table table-striped" id="messages-table">
        <thead>
            <th>Message</th>
        <th>From</th>
            <th>To</th>
            <th colspan="3">Action</th>
        </thead>
        <tbody>
        @foreach($messages as $message)
            <tr>
                <td>{{ $message->message }}</td>
            <td>{{ $message->from}}</td>
                @if($message->to == 0)
                    <td>Admin</td>
                    @else
                    <td>{{ $message->to}}</td>
                    @endif
                <td>
                    {!! Form::open(['route' => ['messages.destroy', $message->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('messages.edit', [$message->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
