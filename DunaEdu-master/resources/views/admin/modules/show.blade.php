@extends('layout.admin.main')
@section('content')
    <section id="enroll" class="enroll section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="enrollment-form-wrapper">
                        <div class="enrollment-header text-center mb-5" data-aos="fade-up" data-aos-delay="200">
                            <h2>Détails des Informations du Module</h2>
                        </div>
                        {{-- Course --}}
                        <div class="mb-3">
                            <strong>Cours :</strong> {{ $module->course->title_fr ?? '-' }}
                        </div>

                        {{-- TITRES ET DESCRIPTIONS --}}
                        <div class="row">
                            {{-- FR --}}
                            <div class="col-md-4">
                                <h5>FR</h5>
                                <p><strong>Titre :</strong> {{ $module->title_fr }}</p>
                                <p><strong>Description :</strong> {{ $module->description_fr }}</p>
                            </div>

                            {{-- EN --}}
                            <div class="col-md-4">
                                <h5>EN</h5>
                                <p><strong>Title :</strong> {{ $module->title_en ?? '-' }}</p>
                                <p><strong>Description :</strong> {{ $module->description_en ?? '-' }}</p>
                            </div>

                            {{-- AR --}}
                            <div class="col-md-4">
                                <h5>AR</h5>
                                <p><strong>Titre :</strong> {{ $module->title_ar ?? '-' }}</p>
                                <p><strong>Description :</strong> {{ $module->description_ar ?? '-' }}</p>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <a href="{{ route('modules.index') }}" class="btn btn-secondary">Retour à la liste</a>
                            <a href="{{ route('modules.edit', $module->id) }}" class="btn btn-warning text-white">Mettre à
                                jour</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
