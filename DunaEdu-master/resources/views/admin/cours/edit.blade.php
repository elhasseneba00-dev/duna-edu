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
                            <h2>Mettre à Jour les Informations du Cours </h2>
                        </div>

                        <form class="enrollment-form" data-aos="fade-up" data-aos-delay="300" method="POST"
                            action="{{ route('cours.update', $cour->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            {{-- TITRES --}}
                            <h4 class="mb-3">Titres</h4>
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label class="form-label">Titre (FR) *</label>
                                    <input type="text" name="title_fr" class="form-control"
                                        value="{{ old('title_fr', $cour->title_fr) }}" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Titre (EN)</label>
                                    <input type="text" name="title_en" class="form-control"
                                        value="{{ old('title_en', $cour->title_en) }}">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Titre (AR)</label>
                                    <input type="text" name="title_ar" class="form-control"
                                        value="{{ old('title_ar', $cour->title_ar) }}">
                                </div>
                            </div>

                            {{-- RESUMES --}}
                            <h4 class="mb-3">Résumé</h4>
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label>Résumé FR</label>
                                    <textarea name="summary_fr" class="form-control" rows="3">{{ old('summary_fr', $cour->summary_fr) }}</textarea>
                                </div>
                                <div class="col-md-4">
                                    <label>Résumé EN</label>
                                    <textarea name="summary_en" class="form-control" rows="3">{{ old('summary_en', $cour->summary_en) }}</textarea>
                                </div>
                                <div class="col-md-4">
                                    <label>Résumé AR</label>
                                    <textarea name="summary_ar" class="form-control" rows="3">{{ old('summary_ar', $cour->summary_ar) }}</textarea>
                                </div>
                            </div>

                            {{-- DESCRIPTIONS --}}
                            <h4 class="mb-3">Descriptions</h4>
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label>Description FR</label>
                                    <textarea name="description_fr" rows="4" class="form-control">{{ old('description_fr', $cour->description_fr) }}</textarea>
                                </div>
                                <div class="col-md-4">
                                    <label>Description EN</label>
                                    <textarea name="description_en" rows="4" class="form-control">{{ old('description_en', $cour->description_en) }}</textarea>
                                </div>
                                <div class="col-md-4">
                                    <label>Description AR</label>
                                    <textarea name="description_ar" rows="4" class="form-control">{{ old('description_ar', $cour->description_ar) }}</textarea>
                                </div>
                            </div>

                            {{-- CATEGORY + TAGS --}}
                            <h4 class="mb-3">Organisation</h4>
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label>Catégorie</label>
                                    <select name="category_id" class="form-control">
                                        <option value="">-- Choisir --</option>
                                        @foreach ($categories as $c)
                                            <option value="{{ $c->id }}"
                                                {{ old('category_id', $cour->category_id) == $c->id ? 'selected' : '' }}>
                                                {{ $c->name_fr }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label>Instructeur</label>
                                    <select name="instructeur_id" class="form-control">
                                        <option value="">-- Choisir --</option>
                                        @foreach ($instructeurs as $c)
                                            <option value="{{ $c->id }}"
                                                {{ old('instructeur_id', $cour->instructeur_id) == $c->id ? 'selected' : '' }}>
                                                {{ $c->first_name_fr }} {{ $c->last_name_fr }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label>Mot Clé</label>
                                    <select name="tags[]" class="form-control" multiple>
                                        @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}"
                                                {{ in_array($tag->id, old('tags', $cour->tags->pluck('id')->toArray())) ? 'selected' : '' }}>
                                                {{ $tag->name_fr }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- PRIX --}}
                            <h4 class="mb-3">Prix & Options</h4>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label>Prix (€)</label>
                                    <input type="number" step="0.01" name="price" class="form-control"
                                        value="{{ old('price', $cour->price) }}">
                                </div>

                                <div class="col-md-3">
                                    <label>Type prix FR</label>
                                    <select name="price_type_fr" class="form-control">
                                        @foreach (['gratuit', 'paiement unique', 'abonnement'] as $type)
                                            <option value="{{ $type }}"
                                                {{ old('price_type_fr', $cour->price_type_fr) == $type ? 'selected' : '' }}>
                                                {{ $type }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label>Type prix EN</label>
                                    <select name="price_type_en" class="form-control">
                                        @foreach (['free', 'one_time', 'subscription'] as $type)
                                            <option value="{{ $type }}"
                                                {{ old('price_type_en', $cour->price_type_en) == $type ? 'selected' : '' }}>
                                                {{ $type }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label>Type prix AR</label>
                                    <select name="price_type_ar" class="form-control">
                                        @foreach (['مجاني', 'دفع مرة واحدة', 'اشتراك'] as $type)
                                            <option value="{{ $type }}"
                                                {{ old('price_type_ar', $cour->price_type_ar) == $type ? 'selected' : '' }}>
                                                {{ $type }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- COMPLEMENTS --}}
                            <h4 class="mb-3">Informations complémentaires</h4>
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label>Durée FR</label>
                                    <input type="number" name="duration_minutes_fr" class="form-control"
                                        value="{{ old('duration_minutes_fr', $cour->duration_minutes_fr) }}">
                                </div>

                                <div class="col-md-4">
                                    <label>Durée EN</label>
                                    <input type="number" name="duration_minutes_en" class="form-control"
                                        value="{{ old('duration_minutes_en', $cour->duration_minutes_en) }}">
                                </div>

                                <div class="col-md-4">
                                    <label>Durée AR</label>
                                    <input type="number" name="duration_minutes_ar" class="form-control"
                                        value="{{ old('duration_minutes_ar', $cour->duration_minutes_ar) }}">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label>Niveau FR</label>
                                    <input type="text" name="level_fr" class="form-control"
                                        value="{{ old('level_fr', $cour->level_fr) }}">
                                </div>
                                <div class="col-md-4">
                                    <label>Niveau EN</label>
                                    <input type="text" name="level_en" class="form-control"
                                        value="{{ old('level_en', $cour->level_en) }}">
                                </div>
                                <div class="col-md-4">
                                    <label>Niveau AR</label>
                                    <input type="text" name="level_ar" class="form-control"
                                        value="{{ old('level_ar', $cour->level_ar) }}">
                                </div>
                            </div>

                            {{-- THUMBNAIL --}}
                            <h4 class="mb-3">Image</h4>
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label>Image</label>
                                    <input type="file" class="form-control" name="thumbnail">

                                    @if ($cour->thumbnail)
                                        <p class="mt-2">
                                            <img src="{{ asset('storage/' .$cour->thumbnail) }}" width="120" class="rounded">
                                        </p>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label>Langue affichée</label>
                                    <input type="text" class="form-control" name="language"
                                        value="{{ old('language', $cour->language) }}">
                                </div>
                            </div>

                            {{-- PUBLICATION --}}
                            <h4 class="mb-3">Publication</h4>
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label>Publié ?</label>
                                    <select name="is_published" class="form-control">
                                        <option value="0" {{ $cour->is_published == 0 ? 'selected' : '' }}>Non
                                        </option>
                                        <option value="1" {{ $cour->is_published == 1 ? 'selected' : '' }}>Oui
                                        </option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label>Date de publication</label>
                                    <input type="datetime-local" name="published_at" class="form-control"
                                        value="{{ old('published_at', $cour->published_at ? $cour->published_at : '') }}">
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-enroll"><i
                                        class="bi bi-check-circle me-2"></i>Mettre
                                    à jour</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
