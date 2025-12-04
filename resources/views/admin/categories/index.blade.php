@extends('layout.admin.main')

@section('content')
    <section id="enroll" class="enroll section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">

            {{-- Messages --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Succès :</strong> {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Erreur :</strong> {{ session('error') }}
                </div>
            @endif

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

            {{-- CREATE FORM --}}
            <div class="row mb-4">
                <div class="col-lg-12 mx-auto">
                    <div class="enrollment-form-wrapper">

                        <div class="enrollment-header text-center mb-5" data-aos="fade-up" data-aos-delay="200">
                            <h2>Informations Nouvelle Catégorie</h2>
                        </div>

                        <form class="enrollment-form" data-aos="fade-up" data-aos-delay="300" method="POST"
                            action="{{ route('categories.store') }}">
                            @csrf

                            <div class="row">

                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Nom (FR) *</label>
                                    <input type="text" name="name_fr" class="form-control" value="{{ old('name_fr') }}"
                                        required>
                                </div>

                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Nom (EN)</label>
                                    <input type="text" name="name_en" class="form-control" value="{{ old('name_en') }}"
                                        >
                                </div>

                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Nom (AR)</label>
                                    <input type="text" name="name_ar" class="form-control" value="{{ old('name_ar') }}">
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <label class="form-label">Icône (classe CSS) *</label>
                                    <input type="text" name="icon" class="form-control" placeholder="ex: bi bi-book"
                                        value="{{ old('icon') }}" required>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-enroll">
                                    <i class="bi bi-check-circle me-2"></i>Enregistrer
                                </button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>

            {{-- LISTE DES CATÉGORIES --}}
            <div class="row">
                <div class="col-12">
                    <div class="enrollment-form-wrapper">

                        <div class="enrollment-header text-center mb-5" data-aos="fade-up" data-aos-delay="200">
                            <h2>Liste des catégories</h2>
                        </div>

                        <table class="table table-bordered" id="example">
                            <thead>
                                <tr>
                                    <th>Icône</th>
                                    <th>Nom (FR)</th>
                                    <th>Nom (EN)</th>
                                    <th>Nom (AR)</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>
                                            @if ($category->icon)
                                                <i class="{{ $category->icon }}" style="font-size: 1.5rem"></i>
                                            @else
                                                -
                                            @endif
                                        </td>

                                        <td>{{ $category->name_fr }}</td>
                                        <td>{{ $category->name_en }}</td>
                                        <td>{{ $category->name_ar }}</td>

                                        <td>
                                            <a href="{{ route('categories.edit', $category->id) }}"
                                                class="btn btn-sm btn-warning text-white">Modifier</a>
                                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
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
