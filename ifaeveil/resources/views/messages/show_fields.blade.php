<!-- Created By Field -->
<div class="form-group">
    {!! Form::label('created_by', 'Ajoute par:') !!}
    <p>{{ $message->created_by }}</p>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Titre:') !!}
    <p>{{ $message->title }}</p>
</div>

<!-- Body Field -->
<div class="form-group">
    {!! Form::label('body', 'Contenu:') !!}
    <p>{{ $message->body }}</p>
</div>
<div class="form-group">
    {!! Form::label('body', 'Date:') !!}
    <p>{{ $message->created_at->format('d M. Y') }}</p>
</div>

