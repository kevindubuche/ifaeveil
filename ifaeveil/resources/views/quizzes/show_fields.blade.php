<!-- Titre Field -->
<div class="form-group">
    {!! Form::label('titre', 'Titre:') !!}
    <p>{{ $quiz->titre }}</p>
</div>

<!-- Class Id Field -->
<div class="form-group">
    {!! Form::label('class_id', 'Class Id:') !!}
    <p>{{ $quiz->class_id }}</p>
</div>

<!-- Teacher Id Field -->
<div class="form-group">
    {!! Form::label('teacher_id', 'Teacher Id:') !!}
    <p>{{ $quiz->teacher_id }}</p>
</div>

<!-- Duree Field -->
<div class="form-group">
    {!! Form::label('duree', 'Duree:') !!}
    <p>{{ $quiz->duree }}</p>
</div>

<!-- Categorie Field -->
<div class="form-group">
    {!! Form::label('categorie', 'Categorie:') !!}
    <p>{{ $quiz->categorie }}</p>
</div>

