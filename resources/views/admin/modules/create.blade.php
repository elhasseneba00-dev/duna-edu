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
                            <h2>Informations Nouveau Module</h2>
                        </div>
                        <form class="enrollment-form" data-aos="fade-up" data-aos-delay="300" method="POST"
                            action="{{ route('modules.store') }}">
                            @csrf
                            {{-- Select Course --}}
                            <div class="mb-4">
                                <label class="form-label">Cours *</label>
                                <select name="course_id" class="form-control" required>
                                    <option value="">-- Sélectionner un cours --</option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->title_fr }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- =========================
                             TITRES
                        ========================== --}}
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label">Titre (FR) *</label>
                                    <input type="text" name="title_fr" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Description (FR)</label>
                                    <textarea name="description_fr" rows="3" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label">Titre (EN)</label>
                                    <input type="text" name="title_en" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Description (EN)</label>
                                    <textarea name="description_en" rows="3" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label">Titre (AR)</label>
                                    <input type="text" name="title_ar" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Description (AR)</label>
                                    <textarea name="description_ar" rows="3" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="text-center">
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
