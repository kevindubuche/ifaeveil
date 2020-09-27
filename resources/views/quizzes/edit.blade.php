@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Quiz
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       @include('flash::message')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($quiz, ['route' => ['quizzes.update', $quiz->id], 'method' => 'patch']) !!}

                        @include('quizzes.fieldsEdit')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection