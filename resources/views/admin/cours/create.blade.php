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
                            <h2>Informations Nouveau Cours ?</h2>
                        </div>

                        <form action="{{ route('cours.store') }}" class="enrollment-form" data-aos="fade-up"
                            data-aos-delay="300" method="POST" enctype="multipart/form-data">
                            @csrf

                            {{-- =======================
                TITRES
            ======================== --}}
                            <h4 class="mb-3">Titres</h4>

                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label class="form-label">Titre (FR) *</label>
                                    <input type="text" name="title_fr" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Titre (EN)</label>
                                    <input type="text" name="title_en" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Titre (AR)</label>
                                    <input type="text" name="title_ar" class="form-control">
                                </div>
                            </div>

                            {{-- =======================
                RESUMES
            ======================== --}}
                            <h4 class="mb-3">Résumé</h4>

                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label>Résumé FR</label>
                                    <textarea name="summary_fr" class="form-control" rows="3"></textarea>
                                </div>
                                <div class="col-md-4">
                                    <label>Résumé EN</label>
                                    <textarea name="summary_en" class="form-control" rows="3"></textarea>
                                </div>
                                <div class="col-md-4">
                                    <label>Résumé AR</label>
                                    <textarea name="summary_ar" class="form-control" rows="3"></textarea>
                                </div>
                            </div>

                            {{-- =======================
                DESCRIPTION
            ======================== --}}
                            <h4 class="mb-3">Descriptions</h4>

                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label>Description FR</label>
                                    <textarea name="description_fr" rows="4" class="form-control"></textarea>
                                </div>

                                <div class="col-md-4">
                                    <label>Description EN</label>
                                    <textarea name="description_en" rows="4" class="form-control"></textarea>
                                </div>

                                <div class="col-md-4">
                                    <label>Description AR</label>
                                    <textarea name="description_ar" rows="4" class="form-control"></textarea>
                                </div>
                            </div>

                            {{-- =======================
                CATEGORY + TAGS
            ======================== --}}
                            <h4 class="mb-3">Organisation</h4>

                            <div class="row mb-4">

                                <div class="col-md-4">
                                    <label>Catégorie</label>
                                    <select name="category_id" class="form-control">
                                        <option value="">-- Choisir --</option>
                                        @foreach ($categories as $c)
                                            <option value="{{ $c->id }}">{{ $c->name_fr }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label>Instructeur</label>
                                    <select name="instructeur_id" class="form-control">
                                        <option value="">-- Choisir --</option>
                                        @foreach ($instructeurs as $c)
                                            <option value="{{ $c->id }}">{{ $c->first_name_fr }} {{ $c->last_name_fr }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label>Mot Clé</label>
                                    <select name="tags[]" class="form-control" multiple>
                                        @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}">{{ $tag->name_fr }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>

                            {{-- =======================
                RESUMES
            ======================== --}}

                            {{-- =======================
                PRICE
            ======================== --}}
                            <h4 class="mb-3">Prix & Options</h4>

                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label>Prix (€)</label>
                                    <input type="number" step="0.01" name="price" class="form-control"
                                        value="0">
                                </div>

                                <div class="col-md-3">
                                    <label>Type de prix (FR)</label>
                                    <select name="price_type_fr" class="form-control">
                                        <option value="gratuit">gratuit</option>
                                        <option value="paiement unique">paiement unique</option>
                                        <option value="abonnement">abonnement</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label>Type de prix (EN)</label>
                                    <select name="price_type_en" class="form-control">
                                        <option value="free">free</option>
                                        <option value="one_time">one time</option>
                                        <option value="subscription">subscription</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label>Type de prix (AR)</label>
                                    <select name="price_type_ar" class="form-control">
                                        <option value="مجاني">مجاني</option>
                                        <option value="دفع مرة واحدة">دفع مرة واحدة</option>
                                        <option value="اشتراك">اشتراك</option>
                                    </select>
                                </div>
                            </div>

                            {{-- =======================
                DURATION + LEVEL
            ======================== --}}
                            <h4 class="mb-3">Informations complémentaires</h4>

                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label>Durée (FR) en minutes</label>
                                    <input type="number" name="duration_minutes_fr" class="form-control">
                                </div>

                                <div class="col-md-4">
                                    <label>Durée (EN) en minutes</label>
                                    <input type="number" name="duration_minutes_en" class="form-control">
                                </div>

                                <div class="col-md-4">
                                    <label>Durée (AR) en minutes</label>
                                    <input type="number" name="duration_minutes_ar" class="form-control">
                                </div>
                            </div>


                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label>Niveau FR</label>
                                    <input type="text" name="level_fr" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label>Niveau EN</label>
                                    <input type="text" name="level_en" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label>Niveau AR</label>
                                    <input type="text" name="level_ar" class="form-control">
                                </div>
                            </div>

                            {{-- =======================
                THUMBNAIL
            ======================== --}}
                            <h4 class="mb-3">Image</h4>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label>Image</label>
                                    <input type="file" class="form-control" name="thumbnail">
                                </div>

                                <div class="col-md-6">
                                    <label>Langue affichée</label>
                                    <input type="text" class="form-control" name="language">
                                </div>
                            </div>

                            {{-- =======================
                PUBLISH
            ======================== --}}
                            <h4 class="mb-3">Publication</h4>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label>Publié ?</label>
                                    <select name="is_published" class="form-control">
                                        <option value="0">Non</option>
                                        <option value="1">Oui</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label>Date de publication</label>
                                    <input type="datetime-local" name="published_at" class="form-control">
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
