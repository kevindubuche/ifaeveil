<!-- Id Question Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_question', 'Id Question:') !!}
    {!! Form::number('id_question', null, ['class' => 'form-control']) !!}
</div>

<!-- Explication Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('explication', 'Explication:') !!}
    {!! Form::textarea('explication', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('quizReponses.index') }}" class="btn btn-default">Cancel</a>
</div>
