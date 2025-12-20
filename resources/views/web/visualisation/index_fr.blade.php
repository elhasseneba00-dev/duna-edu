@extends('layout.web.main')

@section('content')
<section class="section">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h1>Visualisation</h1>
      <a href="{{ route('home.index_fr') }}" class="btn btn-outline-secondary">Accueil</a>
    </div>
    <div class="p-4 border rounded bg-white">
      <p class="mb-3">Espace dédié aux outils visuels et data visualisations (à préciser). Cette section sera enrichie en Phase B.</p>
      <a href="{{ route('contact.index_fr') }}" class="btn btn-primary">Nous contacter</a>
    </div>
  </div>
</section>
@endsection