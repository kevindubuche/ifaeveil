<div class="table-responsive">
    <table class="table" id="admins-table">
        <thead>
            <tr>
                <th>Nom</th>
                 <th>Prénom</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($admins as $admin)
            <tr>
                <td>{{ $admin->nom }}</td>
            <td>{{ $admin->prenom }}</td>
                <td>
                    {!! Form::open(['route' => ['admins.destroy', $admin->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admins.show', [$admin->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('admins.edit', [$admin->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Confirmer ?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
