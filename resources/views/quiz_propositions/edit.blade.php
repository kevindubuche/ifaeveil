@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Quiz Proposition
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($quizProposition, ['route' => ['quizPropositions.update', $quizProposition->id], 'method' => 'patch']) !!}

                        @include('quiz_propositions.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection