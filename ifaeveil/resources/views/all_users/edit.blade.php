@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
           Changer mot de passe
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       @include('flash::message')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($allUser, ['route' => ['allUsers.update', $allUser->id], 'method' => 'patch']) !!}

                        @include('all_users.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection