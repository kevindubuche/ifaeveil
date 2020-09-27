<div class="table-responsive">
    <table class="table" id="messagesAssignations-table">
        <thead>
            <tr>
                <th>Message Id</th>
        <th>Class Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($messagesAssignations as $messagesAssignation)
            <tr>
                <td>{{ $messagesAssignation->message_id }}</td>
            <td>{{ $messagesAssignation->class_id }}</td>
                <td>
                    {!! Form::open(['route' => ['messagesAssignations.destroy', $messagesAssignation->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('messagesAssignations.show', [$messagesAssignation->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('messagesAssignations.edit', [$messagesAssignation->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
