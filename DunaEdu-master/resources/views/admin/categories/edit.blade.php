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
                            <h2>Mettre à Jour les Informations de la Catégorie</h2>
                        </div>

                        <form class="enrollment-form" data-aos="fade-up" data-aos-delay="300" method="POST"
                            action="{{ route('categories.update', $categorie->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Nom (FR) *</label>
                                    <input type="text" name="name_fr" class="form-control" value="{{ old('name_fr', $categorie->name_fr) }}"
                                        required>
                                </div>

                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Nom (EN)</label>
                                    <input type="text" name="name_en" class="form-control" value="{{ old('name_en', $categorie->name_en) }}"
                                        required>
                                </div>

                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Nom (AR)</label>
                                    <input type="text" name="name_ar" class="form-control" value="{{ old('name_ar', $categorie->name_ar) }}">
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <label class="form-label">Icône (classe CSS) *</label>
                                    <input type="text" name="icon" class="form-control" placeholder="ex: bi bi-book"
                                        value="{{ old('icon', $categorie->icon) }}" required>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-enroll"><i class="bi bi-check-circle me-2"></i>Mettre
                                    à jour</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
