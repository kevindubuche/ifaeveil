<!-- Prof Id Field -->
<div class="table-responsive">
    {{-- @include('class_assignings.fields') --}}
    <div class="form-group col-sm-12">
      <input type="hidden" name="id" id="">
      <label>Selectionner professeur</label>
      <select class="form-control" name="prof_id" id="">
        @foreach($allTeacher as $teacher)
        <option value="{{$teacher->user_id}}">{{$teacher->nom}} {{$teacher->prenom}}</option>
        @endforeach
    </select>
  </div>
</div>
  
  <br>

<!-- Class Id Field -->
<div class="form-group col-sm-12">
    <table class="table" id="classAssignings-table">
        <thead>
            <tr>
              <td></td>
        <td>Classes</td>
            </tr>
        </thead>
        <tbody>
            <label>Selectionner la/les classe(s)</label>
          @foreach($classes as $classe)
              <tr>
                <td><input type="checkbox" name="multiclass[]" value="{{$classe->id}}" ></td>
                <td>{{ $classe->nom }}</td>
              </tr>
          @endforeach
        </tbody>
    </table> 
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('assignations.index') }}" class="btn btn-default">Annuler</a>
</div>
