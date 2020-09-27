<!-- Id Eleve Field -->
<div class="form-group">
    {!! Form::label('id_eleve', 'Id Eleve:') !!}
    <p>{{ $quiznote->id_eleve }}</p>
</div>

<!-- Quiz Id Field -->
<div class="form-group">
    {!! Form::label('quiz_id', 'Quiz Id:') !!}
    <p>{{ $quiznote->quiz_id }}</p>
</div>

<!-- Score Field -->
<div class="form-group">
    {!! Form::label('score', 'Score:') !!}
    <p>{{ $quiznote->score }}</p>
</div>

