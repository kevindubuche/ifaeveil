<div class="table-responsive">
    <table class="table" id="quizPropositions-table">
        <thead>
            <tr>
                <th>Id Question</th>
        <th>Content Prop</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($quizPropositions as $quizProposition)
            <tr>
                <td>{{ $quizProposition->id_question }}</td>
            <td>{{ $quizProposition->content_prop }}</td>
                <td>
                    {!! Form::open(['route' => ['quizPropositions.destroy', $quizProposition->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('quizPropositions.show', [$quizProposition->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('quizPropositions.edit', [$quizProposition->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Confirmer')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
