@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Assignations
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       @include('flash::message')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($assignations, ['route' => ['assignations.update', $assignations->id], 'method' => 'patch']) !!}

                        @include('assignations.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection