@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Soumission
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       @include('flash::message')

       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($soumission, ['route' => ['soumissions.update', $soumission->id], 'method' => 'patch']) !!}

                        @include('soumissions.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection