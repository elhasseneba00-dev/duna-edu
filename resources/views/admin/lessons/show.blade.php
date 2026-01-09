@extends('layout.admin.main')
@section('content')
    <section id="enroll" class="enroll section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <div class="enrollment-form-wrapper">
                        <div class="enrollment-header text-center mb-5" data-aos="fade-up" data-aos-delay="200">
                            <h2>Détails des Informations de Pourquoi Nous Choisir ?</h2>
                        </div>
                        {{-- Module --}}
                        <div class="mb-3">
                            <strong>Module :</strong> {{ $lesson->module->title_fr ?? '-' }}
                        </div>

                        {{-- Informations supplémentaires --}}
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <p><strong>Type de contenu :</strong> {{ ucfirst($lesson->content_type) }}</p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>Durée :</strong>
                                    {{ $lesson->duration_seconds ? gmdate('H:i:s', $lesson->duration_seconds) : '-' }}</p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>Verrouillée :</strong> {{ $lesson->is_locked ? 'Oui' : 'Non' }}</p>
                            </div>
                        </div>

                        {{-- TITRES ET CONTENUS --}}
                        <div class="row">
                            {{-- FR --}}
                            <div class="col-md-4">
                                <h5>FR</h5>
                                <p><strong>Titre :</strong> {{ $lesson->title_fr }}</p>
                                <p><strong>Contenu :</strong> {!! nl2br(e($lesson->content_fr)) ?? '-' !!}</p>
                            </div>

                            {{-- EN --}}
                            <div class="col-md-4">
                                <h5>EN</h5>
                                <p><strong>Title :</strong> {{ $lesson->title_en ?? '-' }}</p>
                                <p><strong>Content :</strong> {!! nl2br(e($lesson->content_en)) ?? '-' !!}</p>
                            </div>

                            {{-- AR --}}
                            <div class="col-md-4">
                                <h5>AR</h5>
                                <p><strong>Titre :</strong> {{ $lesson->title_ar ?? '-' }}</p>
                                <p><strong>Contenu :</strong> {!! nl2br(e($lesson->content_ar)) ?? '-' !!}</p>
                            </div>
                        </div>

                        {{-- Vidéo et fichier attaché --}}
                        <div class="row mt-4">
                            @if ($lesson->content_type === 'video' && $lesson->video_url)
                                <div class="col-md-6 mb-3">
                                    <h5>Vidéo</h5>
                                    <a href="{{ $lesson->video_url }}" target="_blank" class="btn btn-primary">Voir la
                                        vidéo</a>
                                </div>
                            @endif

                            @if ($lesson->attachment)
                                <div class="col-md-6 mb-3">
                                    <h5>Fichier attaché</h5>
                                    <a href="{{ asset('storage/' . $lesson->attachment) }}" target="_blank"
                                        class="btn btn-success">Télécharger le fichier</a>
                                </div>
                            @endif
                        </div>


                        <div class="text-center mt-4">
                            <a href="{{ route('lessons.index') }}" class="btn btn-secondary">Retour à la liste</a>
                            <a href="{{ route('lessons.edit', $lesson->id) }}"
                                class="btn btn-warning text-white">Mettre
                                à jour</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
