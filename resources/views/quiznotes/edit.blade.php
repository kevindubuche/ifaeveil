@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Quiznote
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($quiznote, ['route' => ['quiznotes.update', $quiznote->id], 'method' => 'patch']) !!}

                        @include('quiznotes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection