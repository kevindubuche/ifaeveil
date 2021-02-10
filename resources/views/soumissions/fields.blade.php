
<input type="hidden" name="eleve_id" id="eleve_id" value=" {{ Auth::user()->id }}" >
<!-- Exam Id Field -->
<div class="form-group col-sm-4">
    <label>Examen</label>
    <select class="form-control" name="exam_id" id="exam_id" required>
        @if(Auth::user()->role ==3)
            @foreach($exams as $exam)
            @if($exam->matiere->class_id == $exam->GetConnectedStudent(Auth::user()->id)->class_id)
        <option value="{{$exam->id}}">{{$exam->title}}</option>
        @endif
     
        @endforeach
        @endif
    </select>
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Filename Field -->
<div class="form-group col-sm-6">
    <input type="file" name="filename" id="filename" required> (Max:2MB)
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">            
    {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary', 'onclick' => "return confirm('Vous ne pourrez plus modifier votre soumission. Confirmer !')"]) !!}
    <a href="{{ route('soumissions.index') }}" class="btn btn-default">Annuler</a>
</div>
