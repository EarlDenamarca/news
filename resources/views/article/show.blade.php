@extends('layouts.app')

@section('title', $news['title'] ?? 'Article Details')

@section('content')
<div class="container my-5">

    {{-- Article Header --}}
    <div class="text-center mb-4">
        <h1 class="fw-bold">{{ $article->title }}</h1>
        <p class="text-muted">
            By <strong>{{ $article->author }}</strong> • 
            {{ $article->published_date }}
        </p>
    </div>

    {{-- Featured Image --}}
    <div class="mb-4 d-flex justify-content-center">
        <img src="{{ $news['image'] ?? 'https://picsum.photos/1200/400?random=10' }}" 
             class="img-fluid rounded-3 shadow-sm" 
             alt="News Image">
    </div>

    {{-- Article Content --}}
    <article class="mb-5">
        <p class="lead">
            {{ $article->description }}
        </p>

        <p>
            {{ $article->content }}
        </p>
    </article>

</div>
@endsection