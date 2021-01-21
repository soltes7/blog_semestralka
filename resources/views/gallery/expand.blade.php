@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-md-8">
                <div class="jumbotron">
                    <a class="btn btn-primary btn-lg" href="{{ route('gallery') }}" role="button">Back</a>
                    <div class="row">
                        <div class="column">
                            <img src="{{ $image->url }}" id="galeriaObrazok" alt="...">
                        </div>
                    </div>
                    <p class="pataClanku">Added: {{ $image->createtime }}, views: {{ $image->times }}x</p>
                </div>
            </div>
        </div>
    </div>

@endsection
