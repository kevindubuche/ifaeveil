<div class="table-responsive">
    <table class="table" id="lecons-table">
        <thead>
            <tr>
                <th>Nom</th>
        <th>Matiere Id</th>
        <th>Description</th>
        <th>Contenu</th>
        <th>Publier</th>
        <th>Creer Par</th>
        <th>Filename</th>
        <th>Videolink</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($lecons as $lecon)
            <tr>
                <td>{{ $lecon->nom }}</td>
            <td>{{ $lecon->matiere_id }}</td>
            <td>{{ $lecon->description }}</td>
            <td>{{ $lecon->contenu }}</td>
            <td>{{ $lecon->publier }}</td>
            <td>{{ $lecon->creer_par }}</td>
            <td>{{ $lecon->filename }}</td>
            <td>{{ $lecon->videoLink }}</td>
                <td>
                    {!! Form::open(['route' => ['lecons.destroy', $lecon->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('lecons.show', [$lecon->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('lecons.edit', [$lecon->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
