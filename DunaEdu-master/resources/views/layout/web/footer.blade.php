<footer id="footer" class="footer accent-background">
    @php($societe = \App\Models\Societe::first())
    @php($reseaux = \App\Models\ReseauSocial::all())

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-about">
          <a href="{{ route('home.index_fr') }}" class="logo d-flex align-items-center">
            <span class="sitename">DunaEdu</span>
          </a>
          <p>{{ $societe->description_fr ?? 'L’éducation centralisée, accessible à tous.' }}</p>
          <div class="social-links d-flex mt-4">
            @foreach($reseaux as $r)
              <a href="{{ $r->url }}" target="_blank" rel="noopener"><i class="bi bi-{{ $r->icon ?? 'link-45deg' }}"></i></a>
            @endforeach
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Liens utiles</h4>
          <ul>
            <li><a href="{{ route('home.index_fr') }}">Accueil</a></li>
            <li><a href="{{ route('about.index_fr') }}">À propos</a></li>
            <li><a href="{{ route('services.index_fr') }}">Formations</a></li>
            <li><a href="{{ route('careers.index_fr') }}">Carrières</a></li>
            <li><a href="{{ route('contact.index_fr') }}">Contact</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Nous contacter</h4>
          <p>{{ $societe->address_fr ?? 'Adresse non renseignée' }}</p>
          <p class="mt-4"><strong>Téléphone:</strong> <span>{{ $societe->phone ?? '' }}</span></p>
          <p><strong>Email:</strong> <span>{{ $societe->email ?? '' }}</span></p>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© {{ date('Y') }} <strong class="px-1 sitename">DunaEdu</strong> — Tous droits réservés</p>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
