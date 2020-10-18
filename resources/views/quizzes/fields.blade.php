<!-- Titre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('titre', 'Titre:') !!}
    {!! Form::text('titre', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Class Id Field -->
<div class="form-group col-sm-6">
    <label>Selectionner classe</label>
    <select class="form-control" name="class_id" id="" required>
      @foreach($allClasses as $class)
      <option value="{{$class->id}}">{{$class->nom}}</option>
      @endforeach
  </select>
</div>
{{-- <!-- Teacher Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre_questions', 'Nombre de questions:') !!}
    {!! Form::number('nombre_questions', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Duree Field -->
<div class="form-group col-sm-6">
    {!! Form::label('duree', 'Duree (en minutes):') !!}
    {!! Form::number('duree', null, ['class' => 'form-control', 'required']) !!}
</div> --}}

{{-- <div class="form-group col-sm-6">
    <label>Selectionner categorie</label>
    <select class="form-control" name="categorie" id="" required>
      @foreach($allCategories as $cat)
      <option value="{{$cat->categorie}}">{{$cat->categorie}}</option>
      @endforeach
  </select>
</div> --}}
<div class="form-group col-sm-6">
   
    <a href="https://docs.google.com/forms/u/0/" class='btn btn-default' target=”_blank” ><i>AJOUTER LES QUESTIONS</i></a>
</div>

<!-- Lien Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lien', 'Lien du quiz:') !!}
    {!! Form::text('lien', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Lien Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lienAdm', 'Lien pour modification du quiz:') !!}
    {!! Form::text('lienAdm', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('quizzes.index') }}" class="btn btn-default">Annuler</a>
</div>

