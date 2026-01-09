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
                            <h2>Informations Nouveau Instructeur</h2>
                        </div>

                        <form action="{{ route('instructeurs.store') }}" class="enrollment-form" data-aos="fade-up"
                            data-aos-delay="300" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                {{-- =======================
                            INFORMATIONS PERSONNELLES
                        ======================== --}}
                                <h4 class="mb-3">Informations Personnelles</h4>
                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <label>Prénom (FR) *</label>
                                        <input type="text" name="first_name_fr" class="form-control" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Prénom (EN)</label>
                                        <input type="text" name="first_name_en" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Prénom (AR)</label>
                                        <input type="text" name="first_name_ar" class="form-control">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <label>Nom (FR) *</label>
                                        <input type="text" name="last_name_fr" class="form-control" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Nom (EN)</label>
                                        <input type="text" name="last_name_en" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Nom (AR)</label>
                                        <input type="text" name="last_name_ar" class="form-control">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label>Email *</label>
                                        <input type="email" name="email" class="form-control" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Téléphone</label>
                                        <input type="text" name="phone" class="form-control">
                                    </div>
                                </div>

                                {{-- =======================
                            BIOS
                        ======================== --}}
                                <h4 class="mb-3">Biographie</h4>

                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <label>Bio (FR)</label>
                                        <textarea name="bio_fr" class="form-control" rows="3"></textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Bio (EN)</label>
                                        <textarea name="bio_en" class="form-control" rows="3"></textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Bio (AR)</label>
                                        <textarea name="bio_ar" class="form-control" rows="3"></textarea>
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
                                    </div>

                                    <div class="col-md-6">
                                        <label>CV (PDF)</label>
                                        <input type="file" name="cv" class="form-control">
                                    </div>
                                </div>

                                {{-- =======================
                            ADRESSE
                        ======================== --}}
                                <h4 class="mb-3">Adresse</h4>

                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label>Adresse ligne 1</label>
                                        <input type="text" name="address_line1" class="form-control">
                                    </div>

                                    <div class="col-md-6">
                                        <label>Adresse ligne 2</label>
                                        <input type="text" name="address_line2" class="form-control">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label>Ville</label>
                                        <input type="text" name="city" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Pays</label>
                                        <input type="text" name="country" class="form-control">
                                    </div>
                                </div>

                                {{-- =======================
                            SPÉCIALITÉ
                        ======================== --}}
                                <h4 class="mb-3">Spécialité</h4>

                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <label>Spécialité (FR)</label>
                                        <input type="text" name="specialty_fr" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Spécialité (EN)</label>
                                        <input type="text" name="specialty_en" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Spécialité (AR)</label>
                                        <input type="text" name="specialty_ar" class="form-control">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <label>Années d'expérience</label>
                                        <input type="number" name="experience_years" class="form-control"
                                            value="0">
                                    </div>
                                </div>

                                {{-- =======================
                            RESEAUX SOCIAUX
                        ======================== --}}
                                <h4 class="mb-3">Réseaux Sociaux</h4>

                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <label>Facebook</label>
                                        <input type="text" name="facebook" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Instagram</label>
                                        <input type="text" name="instagram" class="form-control">
                                    </div>

                                    <div class="col-md-3">
                                        <label>LinkedIn</label>
                                        <input type="text" name="linkedin" class="form-control">
                                    </div>

                                    <div class="col-md-3">
                                        <label>YouTube</label>
                                        <input type="text" name="youtube" class="form-control">
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
                                            <option value="1">Oui</option>
                                            <option value="0">Non</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <button type="submit" class="btn btn-enroll"><i
                                            class="bi bi-check-circle me-2"></i>Enregistrer</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
