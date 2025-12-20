@extends('layout.web.main')

@section('content')
    <section class="section">
        <div class="container">
            <a href="{{ route('services.index_fr') }}" class="btn btn-outline-secondary mb-3">Retour au catalogue</a>
            <div class="row">
                <div class="col-lg-8">
                    <h1>{{ $course->title_fr }}</h1>
                    <p class="text-muted">{{ $course->category?->name_fr }} • {{ ucfirst($course->level_fr ?? 'Tous niveaux') }}</p>
                    <img src="{{ asset('storage/' . ($course->thumbnail ?? 'defaults/course.webp')) }}" class="img-fluid mb-3" alt="{{ $course->title_fr }}">
                    <article>{!! nl2br(e($course->description_fr)) !!}</article>

                    @if($course->modules?->count())
                        <h3 class="mt-4">Programme</h3>
                        <ul class="list-group">
                            @foreach($course->modules as $module)
                                <li class="list-group-item">
                                    <strong>{{ $module->title_fr }}</strong>
                                    @if($module->lessons?->count())
                                        <ul class="mt-2">
                                            @foreach($module->lessons as $lesson)
                                                <li>{{ $lesson->title_fr }} @if($lesson->duration_seconds) — {{ ceil($lesson->duration_seconds/60) }} min @endif</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="h4 mb-2">{{ $course->price > 0 ? number_format($course->price, 2, ',', ' ') . ' €' : 'Gratuit' }}</div>
                            <p>Durée: {{ $course->duration_minutes_fr ? ceil($course->duration_minutes_fr/60) . ' h' : 'Flexible' }}</p>
                            <p>Langue: {{ strtoupper($course->language ?? 'FR') }}</p>
                            @if($course->instructeur)
                                <div class="d-flex align-items-center mt-3">
                                    <img src="{{ asset('storage/' . ($course->instructeur->avatar ?? 'defaults/instructor.webp')) }}" alt="{{ $course->instructeur->first_name_fr }} {{ $course->instructeur->last_name_fr }}" class="rounded-circle me-2" width="48" height="48">
                                    <div>
                                        <div>{{ $course->instructeur->first_name_fr }} {{ $course->instructeur->last_name_fr }}</div>
                                        <small class="text-muted">{{ $course->instructeur->specialty_fr }}</small>
                                    </div>
                                </div>
                            @endif
                            <a href="{{ route('contact.index_fr') }}" class="btn btn-primary w-100 mt-3">S’inscrire / Demander info</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
