@extends('layout.web.main')

@section('content')
    <section class="section">
        <div class="container">
            <a href="{{ route('blog.index_fr') }}" class="btn btn-outline-secondary mb-3">Retour au blog</a>
            <h1>{{ $post->title }}</h1>
            <p class="text-muted">Par {{ $post->author_name ?? 'DunaEdu' }} • {{ optional($post->published_at)->format('d/m/Y') }}</p>
            @if($post->cover_image)
                <img src="{{ asset('storage/' . $post->cover_image) }}" class="img-fluid mb-3" alt="{{ $post->title }}">
            @endif
            <article>{!! nl2br(e($post->content)) !!}</article>
        </div>
    </section>
@endsection
