@extends('layout.web.main')

@section('content')
    <section class="section">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1>Carrières</h1>
                <a href="{{ route('home.index_fr') }}" class="btn btn-outline-secondary">Accueil</a>
            </div>

            <div class="row">
                @forelse($carrieres as $job)
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title"><a href="{{ route('careers.show_fr', $job->slug_fr) }}">{{ $job->title_fr }}</a></h5>
                                <p class="card-text text-muted">{{ $job->department_fr }} • {{ $job->location_fr }} • {{ ucfirst(str_replace('_',' ',$job->type)) }}</p>
                                <p>{{ Str::limit(strip_tags($job->description_fr), 140) }}</p>
                                <a href="{{ route('careers.show_fr', $job->slug_fr) }}" class="btn btn-primary">Voir l’offre</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12"><p class="text-center">Aucune offre pour le moment.</p></div>
                @endforelse
            </div>

            <div class="mt-3">{{ $carrieres->links() }}</div>

            <hr class="my-4">

            <h3>Candidature spontanée</h3>
            <form action="{{ route('careers.spontaneous_fr') }}" method="post" enctype="multipart/form-data" class="row g-2">
                @csrf
                <div class="col-md-4"><input type="text" name="name" class="form-control" placeholder="Nom complet" required></div>
                <div class="col-md-4"><input type="email" name="email" class="form-control" placeholder="Email" required></div>
                <div class="col-md-4"><input type="text" name="phone" class="form-control" placeholder="Téléphone"></div>
                <div class="col-md-8"><textarea name="message" class="form-control" placeholder="Message" rows="3"></textarea></div>
                <div class="col-md-4"><input type="file" name="cv" class="form-control" accept=".pdf,.doc,.docx"></div>
                <div class="col-12"><button class="btn btn-primary">Envoyer</button></div>
            </form>
        </div>
    </section>
@endsection
