@extends('layout.admin.main')
@section('content')
    <section id="enroll" class="enroll section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <div class="enrollment-form-wrapper">
                        <div class="enrollment-header text-center mb-5" data-aos="fade-up" data-aos-delay="200">
                            <h2>Détails des Informations du Cours</h2>
                        </div>
                        <div class="mb-3"><strong>Titre (FR):</strong> {{ $cour->title_fr }}</div>
                        <div class="mb-3"><strong>Titre (EN):</strong> {{ $cour->title_en ?? '-' }}</div>
                        <div class="mb-3"><strong>Titre (AR):</strong> {{ $cour->title_ar ?? '-' }}</div>


                        <div class="mb-3"><strong>Résumé (FR):</strong> {{ $cour->summary_fr ?? '-' }}</div>
                        <div class="mb-3"><strong>Résumé (EN):</strong> {{ $cour->summary_en ?? '-' }}</div>
                        <div class="mb-3"><strong>Résumé (AR):</strong> {{ $cour->summary_ar ?? '-' }}</div>


                        <div class="mb-3"><strong>Description (FR):</strong> {!! nl2br(e($cour->description_fr)) !!}</div>
                        <div class="mb-3"><strong>Description (EN):</strong> {!! nl2br(e($cour->description_en)) !!}</div>
                        <div class="mb-3"><strong>Description (AR):</strong> {!! nl2br(e($cour->description_ar)) !!}</div>


                        <div class="mb-3"><strong>Catégorie :</strong> {{ $cour->category->name_fr ?? '-' }}</div>


                        <div class="mb-3">
                            <strong>Mot Clé :</strong>
                            @if ($cour->tags && $cour->tags->count())
                                @foreach ($cour->tags as $tag)
                                    <span class="badge bg-primary me-1">{{ $tag->name_fr }}</span>
                                @endforeach
                            @else
                                -
                            @endif
                        </div>


                        <div class="mb-3"><strong>Instructeur (FR):</strong> {{ $cour->instructeur->first_name_fr ?? '-' }} {{ $cour->instructeur->last_name_fr ?? '-' }}</div>
                        <div class="mb-3"><strong>Instructeur (EN):</strong> {{ $cour->instructeur->first_name_en ?? '-' }} {{ $cour->instructeur->last_name_en ?? '-' }}</div>
                        <div class="mb-3"><strong>Instructeur (AR):</strong> {{ $cour->instructeur->first_name_ar ?? '-' }} {{ $cour->instructeur->last_name_ar ?? '-' }}</div>


                        <div class="mb-3"><strong>Prix :</strong> {{ $cour->price }} €</div>
                        <div class="mb-3"><strong>Type de prix (FR):</strong> {{ $cour->price_type_fr }}</div>
                        <div class="mb-3"><strong>Type de prix (EN):</strong> {{ $cour->price_type_en }}</div>
                        <div class="mb-3"><strong>Type de prix (AR):</strong> {{ $cour->price_type_ar }}</div>


                        <div class="mb-3"><strong>Durée (FR):</strong> {{ $cour->duration_minutes_fr }} minutes</div>
                        <div class="mb-3"><strong>Durée (EN):</strong> {{ $cour->duration_minutes_en }} minutes</div>
                        <div class="mb-3"><strong>Durée (AR):</strong> {{ $cour->duration_minutes_ar }} minutes</div>


                        <div class="mb-3"><strong>Niveau (FR):</strong> {{ $cour->level_fr ?? '-' }}</div>
                        <div class="mb-3"><strong>Niveau (EN):</strong> {{ $cour->level_en ?? '-' }}</div>
                        <div class="mb-3"><strong>Niveau (AR):</strong> {{ $cour->level_ar ?? '-' }}</div>


                        <div class="mb-3"><strong>Langue affichée :</strong> {{ $cour->language ?? '-' }}</div>


                        <div class="mb-3">
                            <strong>Image :</strong><br>
                            @if ($cour->thumbnail)
                                <img src="{{ asset('storage/' .$cour->thumbnail) }}" alt="Thumbnail" class="img-fluid rounded"
                                    width="250">
                            @else
                                -
                            @endif
                        </div>


                        <div class="mb-3"><strong>Publié :</strong> {{ $cour->is_published ? 'Oui' : 'Non' }}</div>
                        <div class="mb-3"><strong>Date de publication :</strong> {{ $cour->published_at ?? '-' }}</div>


                        <div class="text-center mt-4">
                            <a href="{{ route('cours.index') }}" class="btn btn-secondary">Retour à la liste</a>
                            <a href="{{ route('cours.edit', $cour->id) }}" class="btn btn-warning text-white">Mettre à
                                jour</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
