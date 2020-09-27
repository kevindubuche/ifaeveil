<!-- Exam Id Field -->
<div class="form-group">
    {!! Form::label('exam_id', 'Exam Id:') !!}
    <p>{{ $soumission->exam_id }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $soumission->description }}</p>
</div>

<!-- Filename Field -->
<div class="form-group">
    {!! Form::label('filename', 'Filename:') !!}
    <p>{{ $soumission->filename }}</p>
</div>

<!-- Eleve Id Field -->
<div class="form-group">
    {!! Form::label('eleve_id', 'Eleve Id:') !!}
    <p>{{ $soumission->eleve_id }}</p>
</div>

