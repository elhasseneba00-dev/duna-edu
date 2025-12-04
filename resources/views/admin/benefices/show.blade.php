@extends('layout.admin.main')
@section('content')
    <section id="enroll" class="enroll section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <div class="enrollment-form-wrapper">
                        <div class="enrollment-header text-center mb-5" data-aos="fade-up" data-aos-delay="200">
                            <h2>Détails des Informations de Pourquoi Nous Choisir ?</h2>
                        </div>
                        <div class="mb-3">
                            <strong>Texte (FR) :</strong> {{ $benefice->text_fr }}
                        </div>

                        <div class="mb-3">
                            <strong>Texte (EN) :</strong> {{ $benefice->text_en ?? '-' }}
                        </div>

                        <div class="mb-3">
                            <strong>Texte (AR) :</strong> {{ $benefice->text_ar ?? '-' }}
                        </div>

                        <div class="mb-3">
                            <strong>Ordre :</strong> {{ $benefice->order }}
                        </div>


                        <div class="text-center mt-4">
                            <a href="{{ route('benefices.index') }}" class="btn btn-secondary">Retour à la liste</a>
                            <a href="{{ route('benefices.edit', $benefice->id) }}" class="btn btn-warning text-white">Mettre
                                à jour</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
