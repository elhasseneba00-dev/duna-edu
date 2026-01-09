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
                <div class="col-lg-12 mx-auto">
                    <div class="enrollment-form-wrapper">
                        <div class="enrollment-header text-center mb-5" data-aos="fade-up" data-aos-delay="200">
                            <h2>Informations Nouveau Réseau Social</h2>
                        </div>

                        <form class="enrollment-form" data-aos="fade-up" data-aos-delay="300" method="POST"
                            action="{{ route('reseaux_sociaux.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4 mb-3">

                                    <label class="form-label">Nom *</label>
                                    <input type="text" name="nom" class="form-control" required
                                        value="{{ old('nom') }}">
                                </div>
                                <div class="col-lg-4 mb-3">

                                    <label class="form-label">Url *</label>
                                    <input type="text" name="url" class="form-control" required
                                        value="{{ old('url') }}">
                                </div>
                                <div class="col-lg-4 mb-3">

                                    <label class="form-label">Icone</label>
                                    <input type="text" name="icone" class="form-control" value="{{ old('icone') }}">
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
                            <h2>Liste des Réseaux Sociaux</h2>
                        </div>

                        <table class="table table-bordered" id="example">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Url</th>
                                    <th>Icone</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reseaux as $reseauSocial)
                                    <tr>
                                        <td>{{ $reseauSocial->nom }}</td>
                                        <td>{{ $reseauSocial->url }}</td>
                                        <td>{{ $reseauSocial->icone ?? '-' }}</td>
                                        <td>
                                            <a href="{{ route('reseaux_sociaux.show', $reseauSocial->id) }}"
                                                class="btn btn-sm btn-info text-white">Voir</a>
                                            <a href="{{ route('reseaux_sociaux.edit', $reseauSocial->id) }}"
                                                class="btn btn-sm btn-warning text-white">Modifier</a>
                                            <form action="{{ route('reseaux_sociaux.destroy', $reseauSocial->id) }}" method="POST"
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
