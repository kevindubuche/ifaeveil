<!-- Nom Field -->
<div class="form-group">
    {!! Form::label('nom', 'Nom:') !!}
    <p>{{ $admin->nom }}</p>
</div>

<!-- Prenom Field -->
<div class="form-group">
    {!! Form::label('prenom', 'Prenom:') !!}
    <p>{{ $admin->prenom }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('username', 'Nom d\'utilisateur:') !!}
    <p>{{ $admin->username }}</p>
</div>

