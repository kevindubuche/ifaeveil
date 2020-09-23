

<!-- Nom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom', 'Nom:') !!}
    {!! Form::text('nom', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45,'required']) !!}
</div>

<!-- Annee Field -->
<div class="form-group col-sm-6">
    <label>Année académique</label>
    <select class="form-control" name="nom" id="nom" required>
        @foreach($annees as $annee)
        <option value="{{$annee->nom}}" @if($annee->nom == $etape->nom) selected="true" @endif>{{$annee->nom}}</option>   
        @endforeach
    </select>
</div>
<!-- Duree Field -->
<div class="form-group col-sm-6">
    {!! Form::label('duree', 'Duree:') !!}
    {!! Form::text('duree', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45,'required']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('etapes.index') }}" class="btn btn-default">Annuler</a>
</div>
