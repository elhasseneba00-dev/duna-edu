@extends('layout.admin.main')
@section('content')
    <section id="enroll" class="enroll section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <div class="enrollment-form-wrapper">
                        <div class="enrollment-header text-center mb-5" data-aos="fade-up" data-aos-delay="200">
                            <h2>Détails des Informations de l'Instructeur</h2>
                        </div>
                        {{-- =======================
                            INFORMATIONS PERSONNELLES
                        ======================== --}}
                        <h4 class="mb-3">Informations Personnelles</h4>
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <strong>Prénom (FR):</strong> {{ $instructeur->first_name_fr }}
                            </div>
                            <div class="col-md-4">
                                <strong>Prénom (EN):</strong> {{ $instructeur->first_name_en }}
                            </div>
                            <div class="col-md-4">
                                <strong>Prénom (AR):</strong> {{ $instructeur->first_name_ar }}
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-4">
                                <strong>Nom (FR):</strong> {{ $instructeur->last_name_fr }}
                            </div>
                            <div class="col-md-4">
                                <strong>Nom (EN):</strong> {{ $instructeur->last_name_en }}
                            </div>
                            <div class="col-md-4">
                                <strong>Nom (AR):</strong> {{ $instructeur->last_name_ar }}
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <strong>Email:</strong> {{ $instructeur->email }}
                            </div>
                            <div class="col-md-6">
                                <strong>Téléphone:</strong> {{ $instructeur->phone }}
                            </div>
                        </div>

                        {{-- =======================
                            BIOGRAPHIE
                        ======================== --}}
                        <h4 class="mb-3">Biographie</h4>

                        <div class="row mb-4">
                            <div class="col-md-4">
                                <strong>Bio (FR):</strong>
                                <p>{{ $instructeur->bio_fr }}</p>
                            </div>
                            <div class="col-md-4">
                                <strong>Bio (EN):</strong>
                                <p>{{ $instructeur->bio_en }}</p>
                            </div>
                            <div class="col-md-4">
                                <strong>Bio (AR):</strong>
                                <p class="text-end">{{ $instructeur->bio_ar }}</p>
                            </div>
                        </div>

                        {{-- =======================
                            FICHIERS
                        ======================== --}}
                        <h4 class="mb-3">Fichiers</h4>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <strong>Avatar :</strong><br>
                                @if ($instructeur->avatar)
                                    <img src="{{ asset('storage/' . $instructeur->avatar) }}" class="img-thumbnail"
                                        width="180">
                                @else
                                    <span>Aucune image</span>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <strong>CV :</strong><br>
                                @if ($instructeur->cv)
                                    <a href="{{ asset('storage/' . $instructeur->cv) }}" target="_blank"
                                        class="btn btn-primary btn-sm mt-2">
                                        <i class="bi bi-file-earmark-pdf"></i> Voir le CV
                                    </a>
                                @else
                                    <span>Aucun CV</span>
                                @endif
                            </div>
                        </div>

                        {{-- =======================
                            ADRESSE
                        ======================== --}}
                        <h4 class="mb-3">Adresse</h4>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <strong>Adresse 1:</strong> {{ $instructeur->address_line1 }}
                            </div>
                            <div class="col-md-6">
                                <strong>Adresse 2:</strong> {{ $instructeur->address_line2 }}
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <strong>Ville:</strong> {{ $instructeur->city }}
                            </div>
                            <div class="col-md-6">
                                <strong>Pays:</strong> {{ $instructeur->country }}
                            </div>
                        </div>

                        {{-- =======================
                            SPÉCIALITÉ
                        ======================== --}}
                        <h4 class="mb-3">Spécialité</h4>

                        <div class="row mb-4">
                            <div class="col-md-4">
                                <strong>Spécialité (FR):</strong> {{ $instructeur->specialty_fr }}
                            </div>
                            <div class="col-md-4">
                                <strong>Spécialité (EN):</strong> {{ $instructeur->specialty_en }}
                            </div>
                            <div class="col-md-4">
                                <strong>Spécialité (AR):</strong> {{ $instructeur->specialty_ar }}
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-4">
                                <strong>Années d'expérience:</strong> {{ $instructeur->experience_years }} ans
                            </div>
                        </div>

                        {{-- =======================
                            RÉSEAUX SOCIAUX
                        ======================== --}}
                        <h4 class="mb-3">Réseaux Sociaux</h4>

                        <div class="row mb-4">
                            <div class="col-md-3"><strong>Facebook:</strong> {{ $instructeur->facebook }}</div>
                            <div class="col-md-3"><strong>Instagram:</strong> {{ $instructeur->instagram }}</div>
                            <div class="col-md-3"><strong>LinkedIn:</strong> {{ $instructeur->linkedin }}</div>
                            <div class="col-md-3"><strong>YouTube:</strong> {{ $instructeur->youtube }}</div>
                        </div>

                        {{-- =======================
                            STATUT
                        ======================== --}}
                        <h4 class="mb-3">Statut</h4>

                        <p>
                            <strong>Actif :</strong>
                            @if ($instructeur->is_active)
                                <span class="badge bg-success">Oui</span>
                            @else
                                <span class="badge bg-danger">Non</span>
                            @endif
                        </p>


                        <div class="text-center mt-4">
                            <a href="{{ route('instructeurs.index') }}" class="btn btn-secondary">Retour à la liste</a>
                            <a href="{{ route('instructeurs.edit', $instructeur->id) }}" class="btn btn-warning text-white">Mettre
                                à jour</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
