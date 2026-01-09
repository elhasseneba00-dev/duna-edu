@extends('layout.admin.main')
@section('content')
    <!-- Enroll Section -->
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
                            <h2>Mettre à Jour les Informations de DunaEdu</h2>
                        </div>

                        <form class="enrollment-form" data-aos="fade-up" data-aos-delay="300" method="POST"
                            action="{{ route('societe.update', $societe->id) }}" enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            {{-- ===========================
                 1. NOMS ET SLOGANS
            ============================ --}}
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label">Nom (FR) *</label>
                                    <input type="text" name="name_fr" class="form-control" required
                                        value="{{ $societe->name_fr }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Slogan (FR) *</label>
                                    <input type="text" name="slogan_fr" class="form-control" required
                                        value="{{ $societe->slogan_fr }}">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label">Nom (EN)</label>
                                    <input type="text" name="name_en" class="form-control"
                                        value="{{ $societe->name_en }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Slogan (EN)</label>
                                    <input type="text" name="slogan_en" class="form-control"
                                        value="{{ $societe->slogan_en }}">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label">Nom (AR)</label>
                                    <input type="text" name="name_ar" class="form-control"
                                        value="{{ $societe->name_ar }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Slogan (AR)</label>
                                    <input type="text" name="slogan_ar" class="form-control"
                                        value="{{ $societe->slogan_ar }}">
                                </div>
                            </div>

                            {{-- ===========================
                 2. CONTACT
            ============================ --}}
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control"
                                        value="{{ $societe->email }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Email secondaire</label>
                                    <input type="email" name="email_alt" class="form-control"
                                        value="{{ $societe->email_alt }}">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label">Téléphone</label>
                                    <input type="text" name="phone" class="form-control"
                                        value="{{ $societe->phone }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Téléphone secondaire</label>
                                    <input type="text" name="phone_alt" class="form-control"
                                        value="{{ $societe->phone_alt }}">
                                </div>
                            </div>

                            {{-- ===========================
                 3. ADRESSE FR
            ============================ --}}
                            <h5 class="mt-4 mb-2">Adresse (FR)</h5>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label">Adresse</label>
                                    <input type="text" name="street_address_fr" class="form-control"
                                        value="{{ $societe->street_address_fr }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Code postal</label>
                                    <input type="text" name="postal_code_fr" class="form-control"
                                        value="{{ $societe->postal_code_fr }}">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label">Ville</label>
                                    <input type="text" name="city_fr" class="form-control"
                                        value="{{ $societe->city_fr }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Pays</label>
                                    <input type="text" name="country_fr" class="form-control"
                                        value="{{ $societe->country_fr }}">
                                </div>
                            </div>
                            {{-- ===========================
                 3. ADRESSE FR
            ============================ --}}
                            <h5 class="mt-4 mb-2">Adresse (EN)</h5>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label">Adresse</label>
                                    <input type="text" name="street_address_en" class="form-control"
                                        value="{{ $societe->street_address_en }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Code postal</label>
                                    <input type="text" name="postal_code_en" class="form-control"
                                        value="{{ $societe->postal_code_en }}">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label">Ville</label>
                                    <input type="text" name="city_en" class="form-control"
                                        value="{{ $societe->city_en }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Pays</label>
                                    <input type="text" name="country_en" class="form-control"
                                        value="{{ $societe->country_en }}">
                                </div>
                            </div>

                            {{-- ===========================
                 3. ADRESSE FR
            ============================ --}}
                            <h5 class="mt-4 mb-2">Adresse (AR)</h5>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label">Adresse</label>
                                    <input type="text" name="street_address_ar" class="form-control"
                                        value="{{ $societe->street_address_ar }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Code postal</label>
                                    <input type="text" name="postal_code_ar" class="form-control"
                                        value="{{ $societe->postal_code_ar }}">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label">Ville</label>
                                    <input type="text" name="city_ar" class="form-control"
                                        value="{{ $societe->city_ar }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Pays</label>
                                    <input type="text" name="country_ar" class="form-control"
                                        value="{{ $societe->country_ar }}">
                                </div>
                            </div>

                            {{-- ===========================
                 4. LOGO + COVER
            ============================ --}}
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label">Logo</label>
                                    <input type="file" name="logo_path" class="form-control">
                                    @if ($societe->logo_path)
                                        <img src="{{ asset('storage/' .$societe->logo_path) }}" class="img-fluid mt-2"
                                            style="max-height: 80px;">
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Image de couverture</label>
                                    <input type="file" name="cover_image_path" class="form-control">
                                    @if ($societe->cover_image_path)
                                        <img src="{{ asset('storage/' .$societe->cover_image_path) }}" class="img-fluid mt-2"
                                            style="max-height: 80px;">
                                    @endif
                                </div>
                            </div>

                            {{-- ===========================
                 5. BOUTON
            ============================ --}}
                            <div class="row">
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-enroll">
                                        <i class="bi bi-check-circle me-2"></i>
                                        Mettre à Jour
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
