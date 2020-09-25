<!-- Username Field -->
<div class="form-group col-sm-6">
    {!! Form::label('username', 'Nom d\utilisateur:') !!}
    {!! Form::text('username', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45,'readonly']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Mot de passe*:') !!}
    {!! Form::password('password', ['class' => 'form-control','maxlength' => 255,'maxlength' => 255, 'required']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('allUsers.index') }}" class="btn btn-default">Annuler</a>
</div>
