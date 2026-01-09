@extends('layout.web.main')

@section('content')
    <section class="section">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1>Catalogue des formations</h1>
                <a href="{{ route('home.index_fr') }}" class="btn btn-outline-secondary">Accueil</a>
            </div>

            <form class="row g-2 mb-4" method="get">
                <div class="col-md-4">
                    <select name="category" class="form-select">
                        <option value="">Toutes catégories</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" @selected(request('category')==$cat->id)>{{ $cat->name_fr }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="level" class="form-select">
                        <option value="">Tous niveaux</option>
                        <option value="beginner" @selected(request('level')=='beginner')>Débutant</option>
                        <option value="intermediate" @selected(request('level')=='intermediate')>Intermédiaire</option>
                        <option value="advanced" @selected(request('level')=='advanced')>Avancé</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Rechercher une formation..." />
                </div>
                <div class="col-md-2 d-flex align-items-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="free" value="1" id="free" @checked(request('free'))>
                        <label class="form-check-label" for="free">Gratuites</label>
                    </div>
                </div>
            </form>

            <div class="row gy-4">
                @forelse($courses as $course)
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100">
                            <img src="{{ asset('storage/' . ($course->thumbnail ?? 'defaults/course.webp')) }}" class="card-img-top" alt="{{ $course->title_fr }}">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $course->title_fr }}</h5>
                                <p class="card-text">{{ Str::limit($course->summary_fr ?? $course->description_fr, 120) }}</p>
                                <div class="mt-auto d-flex justify-content-between align-items-center">
                                    <span class="badge bg-light text-dark">{{ $course->level_fr ?? 'Tous niveaux' }}</span>
                                    <span class="badge bg-primary">{{ $course->price > 0 ? number_format($course->price, 2, ',', ' ') . ' €' : 'Gratuit' }}</span>
                                </div>
                                <a href="{{ route('services.show_fr', $course->slug_fr) }}" class="btn btn-primary mt-3">Voir détails</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-center">Aucune formation publiée pour le moment.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-4">
                {{ $courses->withQueryString()->links() }}
            </div>
        </div>
    </section>
@endsection
