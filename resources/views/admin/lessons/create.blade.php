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
                            <h2>Informations Nouvelle leçon</h2>
                        </div>

                        <form action="{{ route('lessons.store') }}" class="enrollment-form" data-aos="fade-up"
                            data-aos-delay="300" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Module *</label>
                                        <select name="module_id" class="form-control" required>
                                            <option value="">-- Sélectionner --</option>
                                            @foreach ($modules as $module)
                                                <option value="{{ $module->id }}">{{ $module->title_fr }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label>Titre FR *</label>
                                        <input type="text" name="title_fr" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label>Titre EN</label>
                                        <input type="text" name="title_en" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label>Titre AR</label>
                                        <input type="text" name="title_ar" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label>Type de contenu</label>
                                        <select name="content_type" class="form-control" required>
                                            <option value="article">Article</option>
                                            <option value="video">Vidéo</option>
                                            <option value="quiz">Quiz</option>
                                            <option value="assignment">Devoir</option>
                                            <option value="resource">Ressource</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label>URL Vidéo</label>
                                        <input type="url" name="video_url" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label>Fichier attaché</label>
                                        <input type="file" name="attachment" class="form-control">
                                    </div>

                                    <div class="mb-3 form-check">
                                        <input type="checkbox" name="is_locked" class="form-check-input" value="1">
                                        <label class="form-check-label">Verrouillée</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Contenu FR</label>
                                        <textarea name="content_fr" class="form-control" rows="5"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label>Contenu EN</label>
                                        <textarea name="content_en" class="form-control" rows="5"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label>Contenu AR</label>
                                        <textarea name="content_ar" class="form-control" rows="5"></textarea>
                                    </div>


                                    <div class="mb-3">
                                        <label>Durée (secondes)</label>
                                        <input type="number" name="duration_seconds" class="form-control">
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <button type="submit" class="btn btn-enroll"><i
                                            class="bi bi-check-circle me-2"></i>Enregistrer</button>
                                </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
