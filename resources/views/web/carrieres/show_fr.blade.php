@extends('layout.web.main')

@section('content')
    <section class="section">
        <div class="container">
            <a href="{{ route('careers.index_fr') }}" class="btn btn-outline-secondary mb-3">Retour aux offres</a>
            <h1>{{ $carriere->title_fr }}</h1>
            <p class="text-muted">{{ $carriere->department_fr }} • {{ $carriere->location_fr }} • {{ ucfirst(str_replace('_',' ',$carriere->type)) }}</p>
            <article class="mb-4">{!! nl2br(e($carriere->description_fr)) !!}</article>

            <h3>Postuler</h3>
            <form action="{{ route('careers.apply_fr', $carriere->slug_fr) }}" method="post" enctype="multipart/form-data" class="row g-2">
                @csrf
                <div class="col-md-4"><input type="text" name="name" class="form-control" placeholder="Nom complet" required></div>
                <div class="col-md-4"><input type="email" name="email" class="form-control" placeholder="Email" required></div>
                <div class="col-md-4"><input type="text" name="phone" class="form-control" placeholder="Téléphone"></div>
                <div class="col-md-8"><textarea name="message" class="form-control" placeholder="Message" rows="3"></textarea></div>
                <div class="col-md-4"><input type="file" name="cv" class="form-control" accept=".pdf,.doc,.docx"></div>
                <div class="col-12"><button class="btn btn-primary">Envoyer la candidature</button></div>
            </form>
        </div>
    </section>
@endsection
