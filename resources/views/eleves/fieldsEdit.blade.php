<input type="hidden" name="user_id" id="user_id" 
  value="{{$eleve->user_id}}" required>
<!-- Nom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom', 'Nom*:') !!}
    {!! Form::text('nom', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45, 'required']) !!}
</div>

<!-- Prenom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prenom', 'Prenom*:') !!}
    {!! Form::text('prenom', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45, 'required']) !!}
</div>

<!-- Class Id Field -->
<div class="form-group col-sm-6">
    <label>Classe*</label>
    <select class="form-control" name="class_id" id="class_id" required>
        <option value="0" selected="true" disabled="true">Choisir classe</option>
        @foreach($allClasses as $class)
        <option value="{{$class->id}}" {{$class->id == $eleve->class_id ? 'selected' : ''}}>{{$class->nom}}</option>
        @endforeach
    </select>
</div>


<!-- Username Field -->
<div class="form-group col-sm-6">
    {!! Form::label('username', 'Nom d\'utilisateur*:') !!}
    {!! Form::text('username', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45, 'required', 'id'=>'username','autocomplete'=>'off' ]) !!}
    <i class="input-icon" id="messageError"></i>
</div>

<!-- Sexe Field -->
<div class="form-group col-sm-6">
    <label>Sexe*</label>
    <select class="form-control" name="sexe" id="sexe" required>
        <option value="Masculin" {{$eleve->sexe == 'Masculin' ? 'selected' : ''}}>Masculin</option>
        <option value="Feminin" {{$eleve->sexe == 'Feminin' ? 'selected' : ''}}>Feminin</option>
        <option value="Autre" {{$eleve->sexe == 'Autre' ? 'selected' : ''}}>Autre</option>
    </select>
</div>

<!-- Tel Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tel', 'Téléphone de l\'élève:') !!}
    {!! Form::text('tel', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45]) !!}
</div>

<!-- Adresse Field -->
<div class="form-group col-sm-6">
    {!! Form::label('adresse', 'Adresse de l\'élève:') !!}
    {!! Form::text('adresse', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45]) !!}
</div>

<!-- Religion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('religion', 'Religion*:') !!}
    {!! Form::text('religion', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45, 'required']) !!}
</div>

<!-- Nom Pere Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom_pere', 'Nom du père:') !!}
    {!! Form::text('nom_pere', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45]) !!}
</div>

<!-- Nom Pere Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tel_pere', 'Téléphone du père:') !!}
    {!! Form::text('tel_pere', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45]) !!}
</div>

<!-- Nom Mere Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom_mere', 'Nom de la mère*') !!}
    {!! Form::text('nom_mere', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45, 'required']) !!}
</div>

<!-- Tel Mere Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tel_mere', 'Téléphone de la mère:') !!}
    {!! Form::text('tel_mere', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45]) !!}
</div>

<!-- Nom Reponsable Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom_reponsable', 'Autre personne reponsable (Nom)') !!}
    {!! Form::text('nom_reponsable', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45]) !!}
</div>

<!-- Tel Responsable Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tel_responsable', 'Autre personne reponsable (Téléphone)') !!}
    {!! Form::text('tel_responsable', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45]) !!}
</div>

<!-- Date Naissance Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_naissance', 'Date de naissance*:') !!}
    {!! Form::text('date_naissance', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45,'required']) !!}
</div>

<!-- Date Admission Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_admission', 'Date Admission:') !!}
    {!! Form::text('date_admission', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45]) !!}
</div>


<!-- Image Field -->
<div class="col-lg-12 col-md-12 col-sm-4">
    <div class="from-group form-group-login">
        <table style="margin:0 auto;">
            <thead>
                <tr class="info"></tr>
            </thead>
            <tbody>
                <tr>
                    <td class="image" >
                        {!!Html::image('user_images/'.$eleve->image,
                        null,
                        ['class'=>'student.image', 'id'=>'showImage' , 'style'=>'width:200px; height:200px;'])!!}                       
                        <input type="file" name="image" id="image" 
                        accept="image/x-png, image/png,image/jpg,image/jpeg"
                        >
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center; background:#ddd;">
                        <input type="button"
                         name="browse_file"
                          id="browse_file"
                          class="form-control texte-capitalize btn-browse"
                          class="btn btn-outline-danger" value="Choisir image">
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
</div>




<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('eleves.index') }}" class="btn btn-default">Annuler</a>
</div>

@push('scripts')

<script type="text/javascript">
   $('#browse_file').on('click', function(){
       $('#image').click();
   })
   $('#image').on('change', function(e){
       showFile(this, '#showImage');
   })

   function showFile(fileInput,img, showName){
       if(fileInput.files[0]){
           var reader = new FileReader();
           reader.onload = function(e){
               $(img).attr('src', e.target.result);
           }
           reader.readAsDataURL(fileInput.files[0]);
       }
       $(showName).text(fileInput.files[0].name)
   };


   
   ////////////////////////////////////////////////////////////////
   ///////////////////////////////////////////////////////////////
   

    
 
   $('#username').keyup(function(){
          //using keyup to check if data is valid or not
          var username = $('#username').val();
          // alert(username);
          $.ajax({
            type:'get',
            url: '/verify-username',
            data: {username:username},
            success : function(response){
              if(response == 'false'){
                //show error
                $("#messageError").html("<font color='red'> <b> Nom  d'utilisateur non disponible</b> </font>")
              }else if(response == 'true'){
                //show success msg
                $("#messageError").html("<font color='green'> <b>Nom  d'utilisateur correct</b> </font>")
              }
            }
          });
        });
    

</script>

@endpush