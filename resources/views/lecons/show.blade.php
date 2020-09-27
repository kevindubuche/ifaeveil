@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {{$lecon->nom}}
        </h1>
        @if(Auth::user()->role == 2)
        <div class="pull-right" style="padding-top: -300px;">
            {!! Form::open(['route' => ['lecons.destroy', $lecon->id], 'method' => 'delete']) !!}
            <div class='btn-group'>
                <a href="{{ route('lecons.edit', [$lecon->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Vous etes sur?')"]) !!}
            </div>
            {!! Form::close() !!} 
        </div>
        @endif
    </section>
   
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('lecons.show_fields')
                 
                </div>
            </div>
        </div>
    </div>
@endsection
