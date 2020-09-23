<div class="table-responsive">
    <table class="table" id="etapes-table">
        <thead>
            <tr>
                <th>Nom</th>
        <th>Annee</th>
        <th>Duree</th>
        <th>Description</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($etapes as $etape)
            <tr>
                <td>{{ $etape->nom }}</td>
            <td>{{ $etape->annee }}</td>
            <td>{{ $etape->duree }}</td>
            <td>{{ $etape->description }}</td>
                <td>
                    {!! Form::open(['route' => ['etapes.destroy', $etape->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('etapes.show', [$etape->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('etapes.edit', [$etape->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Confirmer')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
