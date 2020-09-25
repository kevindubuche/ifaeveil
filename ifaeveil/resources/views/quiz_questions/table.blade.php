<div class="table-responsive">
    <table class="table" id="quizQuestions-table">
        <thead>
            <tr>
                <th>Content</th>
        <th>Categorie</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($quizQuestions as $quizQuestion)
            <tr>
                <td>{{ $quizQuestion->content }}</td>
            <td>{{ $quizQuestion->categorie }}</td>
                <td>
                    {!! Form::open(['route' => ['quizQuestions.destroy', $quizQuestion->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('quizQuestions.show', [$quizQuestion->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('quizQuestions.edit', [$quizQuestion->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Confirmer')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
