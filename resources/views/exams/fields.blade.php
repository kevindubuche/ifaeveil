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
{{-- <div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div> --}}

<div class="form-group col-sm-12 col-lg-12 ">
  <textarea id="my-summernote" name="description"></textarea>
</div>  

<!-- Filename Field -->
<div class="form-group col-sm-6">
    <input type="file" name="filename" id="filename" >
</div>

<!-- Creer Par Field -->
<input type="hidden" name="creer_par" id="creer_par" value=" {{ Auth::user()->id }}" >



<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('exams.index') }}" class="btn btn-default">Annuler</a>
</div>




@push('scripts')
<script>

//Bootstrap 4 + daemonite material UI + Summernote wysiwyg text editor
//doc : https://github.com/summernote/summernote

$('#my-summernote').summernote({
  minHeight: 100,
  placeholder: 'Ecrivez ici ...',
  focus: false,
  airMode: false,
  fontNames: ['Roboto', 'Calibri', 'Times New Roman', 'Arial'],
  fontNamesIgnoreCheck: ['Roboto', 'Calibri'],
  dialogsInBody: true,
  dialogsFade: true,
  disableDragAndDrop: false,
  toolbar: [
    // [groupName, [list of button]]
    ['style', ['bold', 'italic', 'underline', 'clear']],
    ['para', ['style', 'ul', 'ol', 'paragraph']],
    ['fontsize', ['fontsize']],
    ['font', ['strikethrough', 'superscript', 'subscript']],
    ['height', ['height']],
    ['misc', ['undo', 'redo', 'print', 'help', 'fullscreen']]
  ],
  popover: {
    air: [
      ['color', ['color']],
      ['font', ['bold', 'underline', 'clear']]
    ]
  },
  print: {
    //'stylesheetUrl': 'url_of_stylesheet_for_printing'
  }
});
$('#my-summernote2').summernote({airMode: false,placeholder:'Try the airmode'});

</script>
@endpush