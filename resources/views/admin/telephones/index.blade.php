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

            <div class="row mb-4">
                <div class="col-lg-8 mx-auto">
                    <div class="enrollment-form-wrapper">
                        <div class="enrollment-header text-center mb-5" data-aos="fade-up" data-aos-delay="200">
                            <h2>Informations Nouveau Téléphone</h2>
                        </div>

                        <form class="enrollment-form" data-aos="fade-up" data-aos-delay="300" method="POST"
                            action="{{ route('telephones.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 mb-3">

                                    <label class="form-label">Numéro *</label>
                                    <input type="text" name="numero_tel" class="form-control" required
                                        value="{{ old('numero_tel') }}">
                                </div>
                                <div class="col-lg-6 mb-3">

                                    <label class="form-label">Type</label>
                                    <input type="text" name="type" class="form-control" value="{{ old('type') }}">
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

            <div class="row">
                <div class="col-12">
                    <div class="enrollment-form-wrapper">
                        <div class="enrollment-header text-center mb-5" data-aos="fade-up" data-aos-delay="200">
                            <h2>Liste des Téléphones</h2>
                        </div>

                        <table class="table table-bordered" id="example">
                            <thead>
                                <tr>
                                    <th>Numéro</th>
                                    <th>Type</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($telephones as $telephone)
                                    <tr>
                                        <td>{{ $telephone->numero_tel }}</td>
                                        <td>{{ $telephone->type ?? '-' }}</td>
                                        <td>
                                            <a href="{{ route('telephones.show', $telephone->id) }}"
                                                class="btn btn-sm btn-info text-white">Voir</a>
                                            <a href="{{ route('telephones.edit', $telephone->id) }}"
                                                class="btn btn-sm btn-warning text-white">Modifier</a>
                                            <form action="{{ route('telephones.destroy', $telephone->id) }}" method="POST"
                                                style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Confirmer la suppression ?')">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
