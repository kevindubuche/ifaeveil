<div class="table-responsive">
    <table class="table" id="matieres-table">
        <thead>
            <tr>
                <th></th>
                <th>Nom</th>
        <th>Classe</th>
        <th>Professeur</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($matieres as $matiere)
            <tr>
                <td><img src="{{asset('book.png')}}"
                    alt="livre"
                    width="50" 
                    height="50"
                   /></td>
                <td>{{ $matiere->nom }}</td>
            <td>{{ $matiere->class->nom }}</td>
            <td>{{ $matiere->prof($matiere->prof_id)->nom }}</td>
                <td>
                    {!! Form::open(['route' => ['matieres.destroy', $matiere->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('matieres.show', [$matiere->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('matieres.edit', [$matiere->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Confirmer')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
