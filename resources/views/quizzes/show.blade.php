@extends('layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
    <section class="content-header">
        <h1>
            Quiz
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row ">
                    <div class="col-sm-3">
                    </div>
                    <div class="col-sm-6" style="overflow-x: auto;">
                        {!!$quiz->lien!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
