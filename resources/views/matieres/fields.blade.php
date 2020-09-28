<!-- Nom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom', 'Nom*:') !!}
    {!! Form::text('nom', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45, 'required']) !!}
</div>

<!-- Prof Id Field -->
<div class="form-group col-sm-6">
    <label>Choisir professeur*</label>
    <select class="form-control" name="prof_id" id="prof_id" required>
        <option value="" selected="false"></option>
        @foreach($allProfs as $prof)
        <option value="{{$prof->user_id}}">{{$prof->nom}} {{$prof->prenom}}</option>
        @endforeach
    </select>
</div>

<!-- Class Id Field -->
<div class="form-group col-sm-6">
    <label>Choisir classe*</label>
    <select class="form-control" name="class_id" id="class_id" required>
        {{-- @foreach($allClasses as $class)
        <option value="{{$class->id}}">{{$class->nom}}</option>
        @endforeach --}}
    </select>
</div>



<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('matieres.index') }}" class="btn btn-default">Annuler</a>
</div>

@push('scripts')
    <script>
        $(document).ready(function(){
            $('#class_id').empty();
            });
/////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
        $('#prof_id').on('change', function(e){
            console.log(e);
            var prof_id = e.target.value;
            // alert(prof_id);
            $('#class_id').empty();
            //get related levels to the specific course with ajax
            $.get('/dynamicLevel?prof_id=' + prof_id, function(data){
                // alert(data[0]); 

                $.each(data, function(index, clas){
                  //   alert(parseInt(clas.id))
                    $('#class_id').append('<option value="'+parseInt(clas.id)+'">'+clas.nom+'</option>')
                });
            });
        });
    </script>
@endpush