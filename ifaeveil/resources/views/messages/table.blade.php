<div class="table-responsive">
    <table class="table" id="messages-table">
        <thead>
            <tr>
                <th>Ajoute par</th>
        <th>Titre</th>
        <th>Contenu</th>
        <th>Date</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($messages as $message)
            <tr>
                <td>{{ $message->user->username }}</td>
            <td>{{ $message->title }}</td>
            <td>{{ $message->body }}</td>
            <td>{{ $message->created_at->format('d M. Y') }}</td>
                <td>
                    {!! Form::open(['route' => ['messages.destroy', $message->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('messages.show', [$message->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('messages.edit', [$message->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Confirmer')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
