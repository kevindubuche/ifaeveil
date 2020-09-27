<!-- Matiere Id Field -->
<div class="form-group col-sm-6">
    <label>Matiere*</label>
      <select class="form-control" name="matiere_id" id="matiere_id" required>
        @foreach($allMatieres as $matiere)
       {{-- lap we only cours kel te creer yo sauf adm kap we tout cours yo --}}
       @if ($matiere->prof_id == Auth::user()->id || Auth::user()->role==1)
       <option value="{{$matiere->id}}">{{$matiere->nom}}</option>
  @endif
  @endforeach
    </select>
  </div>
<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title*:') !!}
    {!! Form::text('title', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45, 'required']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Filename Field -->
<div class="form-group col-sm-6">
    <input type="file" name="filename" id="filename" required>
</div>

<!-- Creer Par Field -->
<input type="hidden" name="creer_par" id="creer_par" value=" {{ Auth::user()->id }}" >



<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('exams.index') }}" class="btn btn-default">Annuler</a>
</div>
