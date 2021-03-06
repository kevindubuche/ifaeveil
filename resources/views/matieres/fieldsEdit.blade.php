<!-- Nom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom', 'Nom*:') !!}
    {!! Form::text('nom', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45, 'required']) !!}
</div>

<div class="form-group col-sm-6">
    <label>Selectionner classe*</label>
    <select class="form-control" name="class_id" id="" required>
      @foreach($allClasses as $class)
      <option value="{{$class->id}}" @if($matiere->class_id == $class->id) selected="true" @endif>{{$class->nom}}</option>
      @endforeach
  </select>
</div>

<div class="form-group col-sm-6">
      <label>Selectionner professeur*</label>
      <select class="form-control" name="prof_id" id="" required>
        @foreach($allProfs as $prof)
        <option value="{{$prof->user_id}}" @if($matiere->prof_id == $prof->user_id) selected="true" @endif>{{$prof->nom}} {{$prof->prenom}}</option>
        @endforeach
    </select>
  </div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('matieres.index') }}" class="btn btn-default">Annuler</a>
</div>

@push('scripts')
    <script>
   
        $('#prof_id').on('change', function(e){
            console.log(e);
            var prof_id = e.target.value;
            // alert(prof_id);
            $('#class_id').empty();
            //get related levels to the specific course with ajax
            $.get('/dynamicLevel?prof_id=' + prof_id, function(data){
                // alert(data[0]); 

                $.each(data, function(index, clas){
                    $('#class_id').append('<option value="'+clas.id+'">'+clas.nom+'</option>')
                });
            });
        });
    </script>
@endpush