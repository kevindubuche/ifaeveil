@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Admin
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       @include('flash::message')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($admin, ['route' => ['admins.update', $admin->id], 'method' => 'patch']) !!}

                        @include('admins.fieldsEdit')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection