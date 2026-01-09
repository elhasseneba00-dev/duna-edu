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
            <div class="row mb-3">
                <div class="col-12 text-end">
                    <a href="{{ route('modules.create') }}" class="btn btn-primary">Nouveau</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="enrollment-form-wrapper">
                        <div class="enrollment-header text-center mb-5" data-aos="fade-up" data-aos-delay="200">
                            <h2>Liste des Modules</h2>
                        </div>

                        <table class="table table-bordered" id="example">
                            <thead>
                                <tr>
                                    <th>Titre (FR)</th>
                                    <th>Course</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($modules as $module)
                                    <tr>
                                        <td>{{ $module->title_fr }}</td>
                                        <td>{{ $module->course->title_fr ?? '-' }}</td>
                                        <td>
                                            <a href="{{ route('modules.show', $module->id) }}"
                                                class="btn btn-sm btn-info text-white">Voir</a>
                                            <a href="{{ route('modules.edit', $module->id) }}"
                                                class="btn btn-sm btn-warning text-white">Modifier</a>
                                            <form action="{{ route('modules.destroy', $module->id) }}" method="POST"
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
