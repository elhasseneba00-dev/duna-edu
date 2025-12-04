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
                            <h2>Mettre à Jour les Informations de l'Instructeur </h2>
                        </div>

                        <form action="{{ route('instructeurs.update', $instructeur->id) }}" class="enrollment-form"
                            data-aos="fade-up" data-aos-delay="300" method="POST" enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            <div class="row">

                                {{-- =======================
                                INFORMATIONS PERSONNELLES
                            ======================== --}}
                                <h4 class="mb-3">Informations Personnelles</h4>

                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <label>Prénom (FR) *</label>
                                        <input type="text" name="first_name_fr" class="form-control"
                                            value="{{ old('first_name_fr', $instructeur->first_name_fr) }}" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Prénom (EN)</label>
                                        <input type="text" name="first_name_en" class="form-control"
                                            value="{{ old('first_name_en', $instructeur->first_name_en) }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Prénom (AR)</label>
                                        <input type="text" name="first_name_ar" class="form-control"
                                            value="{{ old('first_name_ar', $instructeur->first_name_ar) }}">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <label>Nom (FR) *</label>
                                        <input type="text" name="last_name_fr" class="form-control"
                                            value="{{ old('last_name_fr', $instructeur->last_name_fr) }}" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Nom (EN)</label>
                                        <input type="text" name="last_name_en" class="form-control"
                                            value="{{ old('last_name_en', $instructeur->last_name_en) }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Nom (AR)</label>
                                        <input type="text" name="last_name_ar" class="form-control"
                                            value="{{ old('last_name_ar', $instructeur->last_name_ar) }}">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label>Email *</label>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ old('email', $instructeur->email) }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Téléphone</label>
                                        <input type="text" name="phone" class="form-control"
                                            value="{{ old('phone', $instructeur->phone) }}">
                                    </div>
                                </div>

                                {{-- =======================
                                BIOS
                            ======================== --}}
                                <h4 class="mb-3">Biographie</h4>

                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <label>Bio (FR)</label>
                                        <textarea name="bio_fr" class="form-control" rows="3">{{ old('bio_fr', $instructeur->bio_fr) }}</textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Bio (EN)</label>
                                        <textarea name="bio_en" class="form-control" rows="3">{{ old('bio_en', $instructeur->bio_en) }}</textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Bio (AR)</label>
                                        <textarea name="bio_ar" class="form-control" rows="3">{{ old('bio_ar', $instructeur->bio_ar) }}</textarea>
                                    </div>
                                </div>

                                {{-- =======================
                                FICHIERS
                            ======================== --}}
                                <h4 class="mb-3">Fichiers</h4>

                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label>Photo de profil (avatar)</label>
                                        <input type="file" name="avatar" class="form-control">
                                        @if ($instructeur->avatar)
                                            <small class="d-block mt-2">
                                                <img src="{{ asset('storage/' . $instructeur->avatar) }}" width="80"
                                                    class="rounded">
                                            </small>
                                        @endif
                                    </div>

                                    <div class="col-md-6">
                                        <label>CV (PDF)</label>
                                        <input type="file" name="cv" class="form-control">
                                        @if ($instructeur->cv)
                                            <small class="d-block mt-2">
                                                <a href="{{ asset('storage/' . $instructeur->cv) }}" target="_blank"
                                                    class="text-primary">
                                                    Voir CV actuel
                                                </a>
                                            </small>
                                        @endif
                                    </div>
                                </div>

                                {{-- =======================
                                ADRESSE
                            ======================== --}}
                                <h4 class="mb-3">Adresse</h4>

                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label>Adresse ligne 1</label>
                                        <input type="text" name="address_line1" class="form-control"
                                            value="{{ old('address_line1', $instructeur->address_line1) }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label>Adresse ligne 2</label>
                                        <input type="text" name="address_line2" class="form-control"
                                            value="{{ old('address_line2', $instructeur->address_line2) }}">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label>Ville</label>
                                        <input type="text" name="city" class="form-control"
                                            value="{{ old('city', $instructeur->city) }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Pays</label>
                                        <input type="text" name="country" class="form-control"
                                            value="{{ old('country', $instructeur->country) }}">
                                    </div>
                                </div>

                                {{-- =======================
                                SPÉCIALITÉ
                            ======================== --}}
                                <h4 class="mb-3">Spécialité</h4>

                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <label>Spécialité (FR)</label>
                                        <input type="text" name="specialty_fr" class="form-control"
                                            value="{{ old('specialty_fr', $instructeur->specialty_fr) }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Spécialité (EN)</label>
                                        <input type="text" name="specialty_en" class="form-control"
                                            value="{{ old('specialty_en', $instructeur->specialty_en) }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Spécialité (AR)</label>
                                        <input type="text" name="specialty_ar" class="form-control"
                                            value="{{ old('specialty_ar', $instructeur->specialty_ar) }}">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <label>Années d'expérience</label>
                                        <input type="number" name="experience_years" class="form-control"
                                            value="{{ old('experience_years', $instructeur->experience_years ?? 0) }}">
                                    </div>
                                </div>

                                {{-- =======================
                                RESEAUX SOCIAUX
                            ======================== --}}
                                <h4 class="mb-3">Réseaux Sociaux</h4>

                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <label>Facebook</label>
                                        <input type="text" name="facebook" class="form-control"
                                            value="{{ old('facebook', $instructeur->facebook) }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Instagram</label>
                                        <input type="text" name="instagram" class="form-control"
                                            value="{{ old('instagram', $instructeur->instagram) }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label>LinkedIn</label>
                                        <input type="text" name="linkedin" class="form-control"
                                            value="{{ old('linkedin', $instructeur->linkedin) }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label>YouTube</label>
                                        <input type="text" name="youtube" class="form-control"
                                            value="{{ old('youtube', $instructeur->youtube) }}">
                                    </div>
                                </div>

                                {{-- =======================
                                STATUT
                            ======================== --}}
                                <h4 class="mb-3">Statut</h4>

                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label>Actif ?</label>
                                        <select name="is_active" class="form-control">
                                            <option value="1" {{ $instructeur->is_active == 1 ? 'selected' : '' }}>
                                                Oui</option>
                                            <option value="0" {{ $instructeur->is_active == 0 ? 'selected' : '' }}>
                                                Non</option>
                                        </select>
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
