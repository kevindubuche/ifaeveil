@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Etape
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       @include('flash::message')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($etape, ['route' => ['etapes.update', $etape->id], 'method' => 'patch']) !!}

                        @include('etapes.fieldsEdit')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection