

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Titre:') !!}
    <p>{{ $exam->title }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    {!! $exam->description!!}
</div>

<!-- Class Id Field -->
<div class="form-group">
    {!! Form::label('matiere_id', 'Matière') !!}
    <p>{{ $exam->matiere->nom}}</p>
</div>

<!-- Filename Field -->
<div class="form-group">
    {!! Form::label('filename', 'Fichier:') !!}<br>
    @if($exam->filename)
    <a href="/exam_files/{{$exam->filename}}" target='_blank'>Ouvrir document</a>
    @endif
</div>

<!-- Created By Field -->
<div class="form-group">
    {!! Form::label('created_by', 'Ajouté par:') !!}
    <p> {{$exam->creerPar->username}}</p>
</div>

