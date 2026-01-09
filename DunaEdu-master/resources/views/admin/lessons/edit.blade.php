@extends('layout.admin.main')
@section('content')
    <section id="enroll" class="enroll section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">

            {{-- Message de succès --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Succès :</strong> {{ session('success') }}
                </div>
            @endif

            {{-- Message d'erreur --}}
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Erreur :</strong> {{ session('error') }}
                </div>
            @endif

            {{-- Erreurs de validation --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Veuillez corriger les erreurs ci-dessous :</strong>
                    <ul class="mt-2 mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <div class="enrollment-form-wrapper">
                        <div class="enrollment-header text-center mb-5" data-aos="fade-up" data-aos-delay="200">
                            <h2>Mettre à Jour les Informations de la Leçon </h2>
                        </div>

                        <form action="{{ route('lessons.update', $lesson->id) }}" class="enrollment-form" data-aos="fade-up"
                            data-aos-delay="300" method="POST" enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            <div class="row">

                                {{-- COLONNE GAUCHE --}}
                                <div class="col-md-6">

                                    {{-- MODULE --}}
                                    <div class="mb-3">
                                        <label>Module *</label>
                                        <select name="module_id" class="form-control" required>
                                            <option value="">-- Sélectionner --</option>
                                            @foreach ($modules as $module)
                                                <option value="{{ $module->id }}"
                                                    {{ $module->id == $lesson->module_id ? 'selected' : '' }}>
                                                    {{ $module->title_fr }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- TITRES --}}
                                    <div class="mb-3">
                                        <label>Titre FR *</label>
                                        <input type="text" name="title_fr" class="form-control"
                                            value="{{ $lesson->title_fr }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label>Titre EN</label>
                                        <input type="text" name="title_en" class="form-control"
                                            value="{{ $lesson->title_en }}">
                                    </div>

                                    <div class="mb-3">
                                        <label>Titre AR</label>
                                        <input type="text" name="title_ar" class="form-control"
                                            value="{{ $lesson->title_ar }}">
                                    </div>

                                    {{-- TYPE CONTENU --}}
                                    <div class="mb-3">
                                        <label>Type de contenu</label>
                                        <select name="content_type" class="form-control" required>
                                            @foreach (['article', 'video', 'quiz', 'assignment', 'resource'] as $type)
                                                <option value="{{ $type }}"
                                                    {{ $lesson->content_type == $type ? 'selected' : '' }}>
                                                    {{ ucfirst($type) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- URL VIDEO --}}
                                    <div class="mb-3">
                                        <label>URL Vidéo</label>
                                        <input type="url" name="video_url" class="form-control"
                                            value="{{ $lesson->video_url }}">
                                    </div>

                                    {{-- FICHIER ATTACHÉ --}}
                                    <div class="mb-3">
                                        <label>Fichier attaché</label>
                                        <input type="file" name="attachment" class="form-control">

                                        @if ($lesson->attachment)
                                            <p class="mt-2">
                                                <strong>Fichier actuel : </strong>
                                                <a href="{{ asset('storage/' . $lesson->attachment) }}" target="_blank">
                                                    Voir / Télécharger
                                                </a>
                                            </p>
                                        @endif
                                    </div>

                                    {{-- VERROUILLAGE --}}
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" name="is_locked" class="form-check-input" value="1"
                                            {{ $lesson->is_locked ? 'checked' : '' }}>
                                        <label class="form-check-label">Verrouillée</label>
                                    </div>

                                </div>

                                {{-- COLONNE DROITE --}}
                                <div class="col-md-6">

                                    {{-- CONTENUS --}}
                                    <div class="mb-3">
                                        <label>Contenu FR</label>
                                        <textarea name="content_fr" class="form-control" rows="5">{{ $lesson->content_fr }}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label>Contenu EN</label>
                                        <textarea name="content_en" class="form-control" rows="5">{{ $lesson->content_en }}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label>Contenu AR</label>
                                        <textarea name="content_ar" class="form-control" rows="5">{{ $lesson->content_ar }}</textarea>
                                    </div>

                                    {{-- DUREE --}}
                                    <div class="mb-3">
                                        <label>Durée (secondes)</label>
                                        <input type="number" name="duration_seconds" class="form-control"
                                            value="{{ $lesson->duration_seconds }}">
                                    </div>
                                </div>

                                <div class="text-center mt-3">
                                    <button type="submit" class="btn btn-enroll">
                                        <i class="bi bi-check-circle me-2"></i>Mettre à jour
                                    </button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
