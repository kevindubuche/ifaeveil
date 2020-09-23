@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Professeurs
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       @include('flash::message')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($prof, ['route' => ['profs.update', $prof->id], 'method' => 'patch', 'enctype'=>'multipart/form-data']) !!}

                        @include('profs.fieldsEdit')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection