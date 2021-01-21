@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="jumbotron">
                    <a class="btn btn-primary btn-lg" href="{{ route('article') }}" role="button">Back</a>
                    <h1 class="display-4">{{ $article->title }}</h1>
                    <div class="row">
                        <div class="column">
                            <img src="{{ $article->url }}" id="titulnaFoto" alt="...">
                        </div>
                    </div>
                    <hr class="my-4">
                    <h5>{{ $article->content }}</h5>
                    <p class="pataClanku">Last edit: {{ $article->changedate }}, views: {{ $article->times }}x</p>
                </div>
            </div>
        </div>
    </div>
@endsection
