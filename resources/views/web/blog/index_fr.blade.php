@extends('layout.web.main')

@section('content')
    <section class="section">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1>Blog</h1>
                <a href="{{ route('home.index_fr') }}" class="btn btn-outline-secondary">Accueil</a>
            </div>

            <div class="row gy-4">
                @forelse($posts as $post)
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100">
                            @if($post->cover_image)
                                <a href="{{ route('blog.show_fr', $post->slug) }}" class="card-img-wrapper d-block">
                                    <img src="{{ asset('storage/' . $post->cover_image) }}" alt="{{ $post->title }}" class="w-100">
                                </a>
                            @endif
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><a href="{{ route('blog.show_fr', $post->slug) }}">{{ $post->title }}</a></h5>
                                <p class="card-text">{{ Str::limit($post->excerpt ?? strip_tags($post->content), 140) }}</p>
                                <div class="mt-auto text-muted small">Par {{ $post->author_name ?? 'DunaEdu' }} — {{ optional($post->published_at)->format('d/m/Y') }}</div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12"><p class="text-center">Aucun article pour le moment.</p></div>
                @endforelse
            </div>

            <div class="mt-4">{{ $posts->links() }}</div>
        </div>
    </section>
@endsection
