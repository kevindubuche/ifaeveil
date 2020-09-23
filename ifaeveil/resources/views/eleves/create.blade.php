@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Elève
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        @include('flash::message')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'eleves.store', 'method'=>'post','enctype'=>'multipart/form-data']) !!}
                    @csrf
                        @include('eleves.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
