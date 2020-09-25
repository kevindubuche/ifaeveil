@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Quiz Question
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {{-- {!! Form::model($quizQuestion, ['route' => ['quizQuestions.update', $quizQuestion->id_question], 'method' => 'patch']) !!} --}}

                        @include('quiz_questions.fieldsEdit')

                   {{-- {!! Form::close() !!} --}}
               </div>
           </div>
       </div>
   </div>
@endsection