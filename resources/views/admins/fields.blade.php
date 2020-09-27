<!-- Nom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom', 'Nom:') !!}
    {!! Form::text('nom', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45, 'required']) !!}
</div>

<!-- Prenom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prenom', 'Prénom:') !!}
    {!! Form::text('prenom', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45, 'required']) !!}
</div>

<!-- Username Field -->
<div class="form-group col-sm-6">
    {!! Form::label('username', 'Nom d\'utilisateur:') !!}
    {!! Form::text('username', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45, 'required', 'id'=>'username','autocomplete'=>'off' ]) !!}
    <i class="input-icon" id="messageError"></i>
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Mot de passe:') !!}
    {!! Form::password('password', ['class' => 'form-control', 'required']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admins.index') }}" class="btn btn-default">Annuler</a>
</div>


@push('scripts')
<script type="text/javascript">    
 
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