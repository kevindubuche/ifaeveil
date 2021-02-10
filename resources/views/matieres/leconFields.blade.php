

  <!-- Modal -->
  <div class="modal fade" id="add-course-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Ajouter un nouveau cours</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

           
        <input type="hidden" name="creer_par" id="creer_par" value=" {{ Auth::user()->id }}" >
        <input type="hidden" name="matiere_id" id="matiere_id" value=" {{ $matiere->id }}" >

<!-- Course Name Field -->
<div class="form-group ">
    {!! Form::label('nom', 'Nom de la lecon*:') !!}
    {!! Form::text('nom', null, ['class' => 'form-control', 'maxlength'=>'250','required']) !!}
</div>



<!-- Description Field -->
<div class="form-group ">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'cols'=>40, 'rows'=>2 , 'maxlength'=>'250']) !!}
</div>

<div class="form-group ">
  <textarea id="my-summernote" name="editordata"></textarea>
</div>

<div class="form-group ">
  <label>Importer document</label>
<input type="file" name="filename" id="filename" >(Max:2MB)
</div>
{{-- <button type="button" class="btn btn-primary" >Ajouter une vidéo</button> --}}


<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Ajouter une vidéo</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"  title="" data-original-title="Collapse">
        <i class="fa fa-minus"></i></button>
      {{-- <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove"> --}}
        {{-- <i class="fa fa-times"></i></button> --}}
    </div>
  </div>
  <div class="box-body" style="">
    <div class="form-group ">
    <label>Lien de la video</label>
    <p><input type="text" name="videoLink" placeholder="Entrer le lien de la video" /></p>
    </div>
    {{-- <p><textarea name="description_video" cols="30" rows="5" placeholder="Description de la video"></textarea></p>
    --}}
  </div>
  <!-- /.box-body -->
  {{-- <div class="box-footer" style="">
    <label>Importer video</label>
    <input type="file" name="video" accept="video/mp4,video/avi,video/mov,video/gif,video/wmv"/>
  </div> --}}
  <!-- /.box-footer-->
</div>


{{-- , mov, mkv, vob, brc, gif, gifv, webm, wmv, fvl, ogv --}}







</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
  {!! Form::submit('Enregistrer le cours', ['class' => 'btn btn-primary']) !!}
</div>
</div>
</div>
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




