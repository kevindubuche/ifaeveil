<!-- Nom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom', 'Nom:') !!}
    {!! Form::text('nom', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45]) !!}
</div>

<!-- Matiere Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('matiere_id', 'Matiere Id:') !!}
    {!! Form::number('matiere_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Contenu Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('contenu', 'Contenu:') !!}
    {!! Form::textarea('contenu', null, ['class' => 'form-control']) !!}
</div>

<!-- Publier Field -->
<div class="form-group col-sm-6">
    {!! Form::label('publier', 'Publier:') !!}
    {!! Form::number('publier', null, ['class' => 'form-control']) !!}
</div>

<!-- Creer Par Field -->
<div class="form-group col-sm-6">
    {!! Form::label('creer_par', 'Creer Par:') !!}
    {!! Form::number('creer_par', null, ['class' => 'form-control']) !!}
</div>

<!-- Filename Field -->
<div class="form-group col-sm-6">
    {!! Form::label('filename', 'Filename:') !!}
    {!! Form::text('filename', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Videolink Field -->
<div class="form-group col-sm-6">
    {!! Form::label('videoLink', 'Videolink:') !!}
    {!! Form::text('videoLink', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('lecons.index') }}" class="btn btn-default">Cancel</a>
</div>
