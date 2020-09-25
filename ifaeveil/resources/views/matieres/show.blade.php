@extends('layouts.app')

@section('content')
@include('flash::message')
    <section class="content-header">
        <h1>
            {{$matiere->nom}}
            @if (Auth::user()->role == 2) 
            <a data-toggle="modal" data-target="#add-course-modal" class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" ><i >Ajouter un cours</i></a> 
            @endif
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('matieres.show_fields')
                    <form action="{{route('lecons.store')}}"
                     method="post"
                     enctype="multipart/form-data">
                        @csrf
     
                        @include('matieres.leconfields')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
