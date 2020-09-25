<div class="table-responsive">
    <table class="table" id="quizzes-table">
        <thead>
            <tr>
                <th>Titre</th>
        <th>Classe</th>
        <th>Nombre de questions</th>
        <th>Duree</th>
        <th>Categorie</th>
        <th>Date</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($quizzes as $quiz)
            <tr>
                <td>{{ $quiz->titre }}</td>
            <td>{{ $quiz->class->nom}}</td>
            <td>{{ $quiz->nombre_questions }}</td>
            <td>{{ $quiz->duree }}</td>
            <td>{{ $quiz->categorie }}</td>
            <td>{{ $quiz->created_at->format('d  M. Y')}}</td>
                <td>
                    {!! Form::open(['route' => ['quizzes.destroy', $quiz->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('quizzes.show', [$quiz->id]) }}" class='btn btn-primary btn-xs'>Lancer</a>
                        @if(Auth::user()->role == 1)
                        <a href="{{ route('quizzes.edit', [$quiz->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Confirmer')"]) !!}
                        @endif
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
