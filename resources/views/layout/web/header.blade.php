  <header id="header" class="header d-flex align-items-center sticky-top">
      <div class="container-fluid container-xl position-relative d-flex align-items-center">

          <a href="{{ route('home.index_fr') }}" class="logo d-flex align-items-center me-auto">
              <h1 class="sitename">DunaEdu</h1>
          </a>

          <nav id="navmenu" class="navmenu">
              <ul>
                  <li><a href="{{ route('home.index_fr') }}">Accueil</a></li>
                  <li><a href="{{ route('about.index_fr') }}">À propos</a></li>
                  <li class="dropdown">
                      <a href="#"><span>Nos services</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                      <ul>
                          <li><a href="{{ route('services.index_fr') }}">Formations</a></li>
                          <li><a href="{{ route('workshops.index_fr') }}">Workshops (Gratuits)</a></li>
                      </ul>
                  </li>
                  <li><a href="{{ route('careers.index_fr') }}">Carrières</a></li>
                  <li><a href="{{ route('contact.index_fr') }}">Contact</a></li>
                  <li><a href="{{ route('blog.index_fr') }}">Blog</a></li>
                  <li><a href="{{ route('visualisation.index_fr') }}">Visualisation</a></li>
              </ul>
              <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
          </nav>

          <a class="btn-getstarted" href="{{ route('services.index_fr') }}">Voir le catalogue</a>

      </div>
  </header>
