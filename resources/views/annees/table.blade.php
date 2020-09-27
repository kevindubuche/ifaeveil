<div class="table-responsive">
    <table class="table" id="annees-table">
        <thead>
            <tr>
                <th>Nom</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($annees as $annee)
            <tr>
                <td>{{ $annee->nom }}</td>
                <td>
                    {!! Form::open(['route' => ['annees.destroy', $annee->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('annees.show', [$annee->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('annees.edit', [$annee->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Confirmer')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
