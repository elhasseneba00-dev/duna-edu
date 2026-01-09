@extends('layout.admin.main')
@section('content')
<section id="enroll" class="enroll section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="enrollment-form-wrapper">
                    <div class="enrollment-header text-center mb-5" data-aos="fade-up" data-aos-delay="200">
                        <h2>Détails des Informations du Téléphone</h2>
                    </div>
                    <div class="mb-3">
                        <strong>Numéro :</strong> {{ $telephone->numero_tel }}
                    </div>
                    <div class="mb-3">
                        <strong>Type :</strong> {{ $telephone->type ?? '-' }}
                    </div>

                    <div class="text-center mt-4">
                        <a href="{{ route('telephones.index') }}" class="btn btn-secondary">Retour à la liste</a>
                        <a href="{{ route('telephones.edit', $telephone->id) }}" class="btn btn-warning text-white">Mettre à jour</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
