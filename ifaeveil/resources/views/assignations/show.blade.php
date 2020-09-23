@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Assignations
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('assignations.show_fields')
                    <a href="{{ route('assignations.index') }}" class="btn btn-default">Retour</a>
                </div>
            </div>
        </div>
    </div>
@endsection
