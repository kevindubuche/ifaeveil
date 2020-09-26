<!-- Id Eleve Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_eleve', 'Id Eleve:') !!}
    {!! Form::number('id_eleve', null, ['class' => 'form-control']) !!}
</div>

<!-- Quiz Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quiz_id', 'Quiz Id:') !!}
    {!! Form::number('quiz_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Score Field -->
<div class="form-group col-sm-6">
    {!! Form::label('score', 'Score:') !!}
    {!! Form::number('score', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('quiznotes.index') }}" class="btn btn-default">Cancel</a>
</div>
