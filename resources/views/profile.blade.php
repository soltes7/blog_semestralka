@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header kartaNadpis">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Hello ' . Auth::user()->name ) }}
                    <div class="card">
                        <img src=" {{ Auth::user()->profilepic }} " class="card-img-top" style="width:100% " alt=".">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
