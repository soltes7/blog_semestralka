@extends('layouts.app')

@section('content')

    <div class="container">
        @auth
        <div class="row">
            <a href="{{ route('article.create') }}" class="btn btn-success" id="pridajClanok" role="button">Create new article</a>
        </div>
        @endauth

        <?php $number = 0; ?>
        @foreach ($articles as $article)
            <?php if  ($number%2 == 0) { ?>
            <div class="row">
            <?php } ?>
            <div class="column">
                <div class="card clanok" style="width: 24rem;">
                    <img src="<?= $article->url ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $article->title ?></h5>
                        <a href="{{ route('article.expand', $article->id) }}" class="btn btn-primary">Expand</a>
                        @auth
                            @if(Auth::user()->id == $article->authorid || Auth::user()->name == 'admin')
                            <a href="{{ route('article.edit', $article->id) }}" class="btn btn-warning btn-sm" >Edit</a>
                            <a href="{{ route('article.delete', $article->id) }}" class="btn btn-danger btn-sm" >Delete</a>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
            <?php if ($number%2 == 1) { ?>
            </div>
            <?php } ?>
            <?php $number++; ?>
        @endforeach
        @if($number%2 == 1)
            </div>
        @endif
    </div>
@endsection
