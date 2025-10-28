@extends('layouts.app')

@section('title', 'Article Page')

@section('content')
    <!-- News Section -->
    <div class="container mb-5">
        <h2 class="mb-4 fw-bold">Latest Articles</h2>
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