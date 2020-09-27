<!-- Nom Field -->
<div class="form-group">
    {!! Form::label('nom', 'Nom:') !!}
    <p>{{ $etape->nom }}</p>
</div>

<!-- Annee Field -->
<div class="form-group">
    {!! Form::label('annee', 'Annee:') !!}
    <p>{{ $etape->annee }}</p>
</div>

<!-- Duree Field -->
<div class="form-group">
    {!! Form::label('duree', 'Duree:') !!}
    <p>{{ $etape->duree }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $etape->description }}</p>
</div>

