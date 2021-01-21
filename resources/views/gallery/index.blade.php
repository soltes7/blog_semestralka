@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="jumbotron">
                    <div class="container">
                        @auth
                            @if(Auth::user()->name == 'admin')
                                <div class="row">
                                    <a href="{{ route('image.create') }}" class="btn btn-success" id="pridajObrazok" role="button">Add new image</a>
                                </div>
                            @endif
                        @endauth
                        <div class="row row-cols-4">
                            @foreach ($images as $image)
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                        <img src="<?= $image->url ?>" class="card-img-top" alt="...">
                                        <a href="{{ route('gallery.expand', $image->id) }}" class="btn btn-primary">View</a>
                                        @auth
                                            @if(Auth::user()->name == 'admin')
                                                <a href="{{ route('gallery.delete', $image->id) }}" class="btn btn-danger btn-sm" >Delete</a>
                                            @endif
                                        @endauth
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
