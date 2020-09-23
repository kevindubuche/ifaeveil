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

<!-- Username Field -->
<div class="form-group col-sm-6">
    {!! Form::label('username', 'Nom d\'utilisateur*:') !!}
    {!! Form::text('username', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45, 'required']) !!}
</div>


<!-- Sexe Field -->
<div class="form-group col-sm-6">
    <label>Sexe*</label>
    <select class="form-control" name="sexe" id="sexe" required>
        <option value="Masculin">Masculin</option>
        <option value="Feminin">Feminin</option>
        <option value="Autre">Autre</option>
    </select>
</div>

<!-- Statusmatrimonial Field -->
<div class="form-group col-sm-6">
    <label>Status matrimonial*</label>
    <select class="form-control" name="statusmatrimonial" id="statusmatrimonial" required>
        <option value="Célibataire">Célibataire</option>
        <option value="Fiancé(e)">Fiancé(e)</option>
        <option value="Marié(e)">Marié(e)</option>
        <option value="Divorcé(e)">Divorcé(e)</option>
        <option value="Veuf(ve)">Veuf(ve)</option>
    </select>
</div>

<!-- Datenaissance Field -->
<div class="form-group col-sm-6">
    {!! Form::label('datenaissance', 'Datenaissance*:') !!}
    {!! Form::text('datenaissance', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45, 'required']) !!}
</div>

<!-- Tel Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tel', 'Tel:') !!}
    {!! Form::text('tel', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45]) !!}
</div>

<!-- Adresse Field -->
<div class="form-group col-sm-6">
    {!! Form::label('adresse', 'Adresse:') !!}
    {!! Form::text('adresse', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45]) !!}
</div>

<!-- Date Entree En Service Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_entree_en_service', 'Date entree en service:') !!}
    {!! Form::text('date_entree_en_service', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45]) !!}
</div>

<!-- Religion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('religion', 'Religion*:') !!}
    {!! Form::text('religion', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45, 'required']) !!}
</div>

<!-- Nif Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nif', 'Nif:') !!}
    {!! Form::text('nif', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45]) !!}
</div>

<!-- Niveau Field -->
<div class="form-group col-sm-6">
    {!! Form::label('niveau', 'Niveau académique:') !!}
    {!! Form::text('niveau', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45]) !!}
</div>

<!-- Option Field -->

<div class="form-group col-sm-6">
    <label>Option*</label>
    <select class="form-control" name="option" id="option" required>
        <option  disabled="true" selected="false" value="">Option</option>
        <option value="Jardinière">Jardinière</option>
        <option value="Aide-Jardinière">Aide-Jardinière</option>
        <option value="Fondamental">Fondamental</option>
        <option value="Directrice pédagogique">Directrice pédagogique</option>
    </select>
</div>
<!-- Image Field -->

<div class="col-lg-12 col-md-12 col-sm-12">
    <div class="from-group form-group-login">
        <table style="margin:0 auto;">
            <thead>
                <tr class="info"></tr>
            </thead>
            <tbody>
                <tr>
                    <td class="image"  >
                        {!!Html::image('user_images/defaultAvatar.png',
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
    <a href="{{ route('profs.index') }}" class="btn btn-default">Annuler</a>
</div>


@push('scripts')
<script type="text/javascript">
   $('#browse_file').on('click', function(){
       //leum klike sou youn mdeklanche sak kache a
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
</script>  
@endpush