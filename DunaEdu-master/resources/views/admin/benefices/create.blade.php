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
                            <h2>Informations Nouveau Pourquoi Nous Choisir ?</h2>
                        </div>

                        <form action="{{ route('benefices.store') }}" class="enrollment-form" data-aos="fade-up" data-aos-delay="300" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label">Texte (FR) *</label>
                                    <input type="text" name="text_fr" class="form-control" value="{{ old('text_fr') }}"
                                        required>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Texte (EN)</label>
                                    <input type="text" name="text_en" class="form-control" value="{{ old('text_en') }}">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Texte (AR)</label>
                                    <input type="text" name="text_ar" class="form-control" value="{{ old('text_ar') }}">
                                </div>
                            </div>

                            <div class="mt-3">
                                <label class="form-label">Ordre d’affichage</label>
                                <input type="number" name="order" class="form-control" value="{{ old('order', 0) }}">
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
