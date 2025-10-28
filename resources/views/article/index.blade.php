@extends('layouts.app')

@section('title', 'Article Page')

@section('content')
    <div class="container mb-5">
        <h2 class="mb-4 fw-bold">Latest Articles</h2>

        <form action="{{ route('home') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input
                    type="text"
                    name="q"
                    class="form-control"
                    placeholder="Search news articles…"
                    value="{{ request('q') }}"
                    aria-label="Search news articles"
                >
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>

        <div class="row g-4">
        
            @if ( $articles->count() )
                @foreach ( $articles as $article )
                    <div class="col-md-4">
                        <div class="card news-card shadow-sm border-0">
                            <img src="{{ $article->image_url }}" class="card-img-top" alt="News">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title">{{ $article->title }}</h5>
                                    <p class="published-date">{{ $article->published_date }}</p>
                                </div>
                                <p class="card-text">{{ $article->description }}</p>
                                <a href="{{ route( 'article.details', [ 'id' => $article->id ] ) }}" class="btn btn-outline-primary btn-sm">Read More</a>
                            </div>
                        </div>
                    </div>

                @endforeach
                {{ $articles->links() }}
            @else
                <p>Articles not found</p>
            @endif
        </div>
    </div>
@endsection