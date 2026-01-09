  <header id="header" class="header d-flex align-items-center sticky-top">
      <div class="container-fluid container-xl position-relative d-flex align-items-center">

          <a href="index.html" class="logo d-flex align-items-center me-auto">
              <!-- Uncomment the line below if you also wish to use an image logo -->
              <!-- <img src="assets/img/logo.webp" alt=""> -->
              <h1 class="sitename">DunaEdu Admin</h1>
          </a>

          <nav id="navmenu" class="navmenu">
              <ul>

                  <li class="dropdown">
                      <a href="#"
                          class="{{ request()->is('societe*') || request()->is('telephones*') || request()->is('emails*') || request()->is('liens_utiles*') || request()->is('reseaux_sociaux*') ? 'active' : '' }}">
                          <span>Configurations</span> <i class="bi bi-chevron-down toggle-dropdown"></i>
                      </a>
                      <ul>
                          <li><a href="/societe" class="{{ request()->is('societe*') ? 'active' : '' }}">DunaEdu</a>
                          </li>
                          <li><a href="/telephones"
                                  class="{{ request()->is('telephones*') ? 'active' : '' }}">Téléphones</a></li>
                          <li><a href="/emails" class="{{ request()->is('emails*') ? 'active' : '' }}">Emails</a></li>
                          <li><a href="/liens_utiles" class="{{ request()->is('liens_utiles*') ? 'active' : '' }}">Liens
                                  Utiles</a></li>
                          <li><a href="/reseaux_sociaux"
                                  class="{{ request()->is('reseaux_sociaux*') ? 'active' : '' }}">Réseaux Sociaux</a>
                          </li>
                      </ul>
                  </li>
                  <li class="dropdown">
                      <a href="#"
                          class="{{ request()->is('propos*') || request()->is('benefices*') ? 'active' : '' }}">
                          <span>A Propos</span> <i class="bi bi-chevron-down toggle-dropdown"></i>
                      </a>
                      <ul>
                          <li><a href="/propos" class="{{ request()->is('propos*') ? 'active' : '' }}">A Propos</a></li>
                          <li><a href="/benefices" class="{{ request()->is('benefices*') ? 'active' : '' }}">Pourquoi
                                  Nous Choisir ?</a></li>
                      </ul>
                  </li>
                  <li class="dropdown">
                      <a href="#"
                          class="{{ request()->is('categories*') || request()->is('cours*') || request()->is('tags*') || request()->is('modules*') || request()->is('lessons*') ? 'active' : '' }}">
                          <span>Cours</span> <i class="bi bi-chevron-down toggle-dropdown"></i>
                      </a>
                      <ul>
                          <li><a href="/categories"
                                  class="{{ request()->is('categories*') ? 'active' : '' }}">Catégories</a></li>
                          <li><a href="/tags" class="{{ request()->is('tags*') ? 'active' : '' }}">Mot Clé</a></li>
                          <li><a href="/cours" class="{{ request()->is('cours*') ? 'active' : '' }}">Cours</a></li>
                          <li><a href="/modules" class="{{ request()->is('modules*') ? 'active' : '' }}">Modules</a></li>
                          <li><a href="/lessons" class="{{ request()->is('lessons*') ? 'active' : '' }}">Leçons</a></li>
                      </ul>
                  </li>
                  <li><a href="/instructeurs" class="{{ request()->is('societe*') ? 'active' : '' }}">Instructeurs</a></li>
                  <li><a href="pricing.html">Pricing</a></li>
                  <li><a href="blog.html">Blog</a></li>

                  <li class="dropdown"><a href="#"><span>Dropdown</span> <i
                              class="bi bi-chevron-down toggle-dropdown"></i></a>
                      <ul>
                          <li><a href="#">Dropdown 1</a></li>
                          <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i
                                      class="bi bi-chevron-down toggle-dropdown"></i></a>
                              <ul>
                                  <li><a href="#">Deep Dropdown 1</a></li>
                                  <li><a href="#">Deep Dropdown 2</a></li>
                                  <li><a href="#">Deep Dropdown 3</a></li>
                                  <li><a href="#">Deep Dropdown 4</a></li>
                                  <li><a href="#">Deep Dropdown 5</a></li>
                              </ul>
                          </li>
                          <li><a href="#">Dropdown 2</a></li>
                          <li><a href="#">Dropdown 3</a></li>
                          <li><a href="#">Dropdown 4</a></li>
                      </ul>
                  </li>
                  <li><a href="contact.html">Contact</a></li>
              </ul>
              <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
          </nav>

          <a class="btn-getstarted" href="enroll.html">Enroll Now</a>

      </div>
  </header>
