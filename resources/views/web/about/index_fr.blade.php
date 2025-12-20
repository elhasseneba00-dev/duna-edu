@extends('layout.web.main')

@section('content')
    <!-- Courses Hero Section -->
    <section id="courses-hero" class="courses-hero section light-background">
        <div class="hero-content">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="hero-text">
                            <h1>{{ $societe->slogan_fr ?? 'L’éducation centralisée, accessible à tous.' }}</h1>
                            <p>{{ $propo->description_fr ?? 'DunaEdu centralise le savoir pour le rendre accessible à tous, à travers des formations structurées et adaptées.' }}</p>

                            <div class="hero-stats">
                                <div class="stat-item">
                  <span class="number purecounter"
                        data-purecounter-start="0"
                        data-purecounter-end="{{ $propo->years_experience_fr ?? 0 }}"
                        data-purecounter-duration="2"></span>
                                    <span class="label">Années d’expérience</span>
                                </div>
                                <div class="stat-item">
                  <span class="number purecounter"
                        data-purecounter-start="0"
                        data-purecounter-end="{{ $propo->expert_instructors_fr ?? 0 }}"
                        data-purecounter-duration="2"></span>
                                    <span class="label">Formateurs experts</span>
                                </div>
                                <div class="stat-item">
                  <span class="number purecounter"
                        data-purecounter-start="0"
                        data-purecounter-end="{{ $propo->students_worldwide_fr ?? 0 }}"
                        data-purecounter-duration="2"></span>
                                    <span class="label">Étudiants dans le monde</span>
                                </div>
                            </div>

                            <div class="hero-buttons">
                                <a href="#course-categories" class="btn btn-primary">Parcourir les domaines</a>
                                <a href="{{ route('about.index_fr') }}" class="btn btn-outline">En savoir plus</a>
                            </div>

                            <div class="hero-features">
                                <div class="feature"><i class="bi bi-shield-check"></i> <span>Programmes certifiés</span></div>
                                <div class="feature"><i class="bi bi-clock"></i> <span>Accès à vie</span></div>
                                <div class="feature"><i class="bi bi-people"></i> <span>Formateurs experts</span></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="hero-image">
                            <div class="main-image">
                                <img src="{{ asset('storage/' . ($societe->cover_image_path ?? 'defaults/cover.webp')) }}"
                                     alt="DunaEdu - Plateforme d’apprentissage"
                                     class="img-fluid">
                            </div>

                            <!-- Cartes flottantes informatives -->
                            <div class="floating-cards">
                                <div class="course-card" data-aos="fade-up" data-aos-delay="300">
                                    <div class="card-icon"><i class="bi bi-code-slash"></i></div>
                                    <div class="card-content">
                                        <h6>Développement Web</h6>
                                        <span>Domaines populaires</span>
                                    </div>
                                </div>
                                <div class="course-card" data-aos="fade-up" data-aos-delay="400">
                                    <div class="card-icon"><i class="bi bi-palette"></i></div>
                                    <div class="card-content">
                                        <h6>UI/UX Design</h6>
                                        <span>Apprendre par la pratique</span>
                                    </div>
                                </div>
                                <div class="course-card" data-aos="fade-up" data-aos-delay="500">
                                    <div class="card-icon"><i class="bi bi-graph-up"></i></div>
                                    <div class="card-content">
                                        <h6>Marketing Digital</h6>
                                        <span>Compétences recherchées</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- hero-content -->

        <div class="hero-background">
            <div class="bg-shapes">
                <div class="shape shape-1"></div>
                <div class="shape shape-2"></div>
                <div class="shape shape-3"></div>
            </div>
        </div>
    </section>
    <!-- /Courses Hero Section -->

    <!-- Featured Courses Section (placeholder tant que le front courses n’est pas branché) -->
    <section id="featured-courses" class="featured-courses section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Formations mises en avant</h2>
            <p>Découvrez nos meilleures formations dès la mise en ligne du catalogue.</p>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="150">
            <div class="row">
                <div class="col-12">
                    <div class="p-4 border rounded text-center">
                        <p class="mb-3">Le catalogue est en préparation. Revenez bientôt pour explorer les formations par domaine, niveau et durée.</p>
                        <div class="d-flex gap-2 justify-content-center">
                            <a href="#course-categories" class="btn btn-primary">Voir les catégories</a>
                            <a href="{{ route('about.index_fr') }}" class="btn btn-outline">À propos de DunaEdu</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Featured Courses Section -->

    <!-- Course Categories Section -->
    <section id="course-categories" class="course-categories section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Catégories de formations</h2>
            <p>Parcourez nos domaines pour trouver la formation adaptée à votre besoin.</p>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row g-4">
                @forelse ($categories as $item)
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="100">
                        <a href="#featured-courses" class="category-card category-tech">
                            <div class="category-icon">
                                <i class="{{ $item->icon }}"></i>
                            </div>
                            <h5>{{ $item->name_fr }}</h5>
                            <span class="course-count">Bientôt disponible</span>
                        </a>
                    </div>
                @empty
                    <div class="col-12"><p class="text-center">Aucune catégorie disponible pour le moment.</p></div>
                @endforelse
            </div>
        </div>
    </section>
    <!-- /Course Categories Section -->

    <!-- CTA Section -->
    <section id="cta" class="cta section light-background">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
                    <div class="cta-content">
                        <h2>Transformez votre avenir avec DunaEdu</h2>
                        <p>Rejoignez des milliers d’apprenants qui avancent grâce à des formations structurées et accessibles.</p>

                        <div class="features-list">
                            <div class="feature-item" data-aos="fade-up" data-aos-delay="300">
                                <i class="bi bi-check-circle-fill"></i>
                                <span>Formateurs experts issus de l’industrie</span>
                            </div>
                            <div class="feature-item" data-aos="fade-up" data-aos-delay="350">
                                <i class="bi bi-check-circle-fill"></i>
                                <span>Certificat de réussite pour chaque formation</span>
                            </div>
                            <div class="feature-item" data-aos="fade-up" data-aos-delay="400">
                                <i class="bi bi-check-circle-fill"></i>
                                <span>Accès 24/7 aux ressources</span>
                            </div>
                            <div class="feature-item" data-aos="fade-up" data-aos-delay="450">
                                <i class="bi bi-check-circle-fill"></i>
                                <span>Projets pratiques et cas réels</span>
                            </div>
                        </div>

                        <div class="cta-actions" data-aos="fade-up" data-aos-delay="500">
                            <a href="#course-categories" class="btn btn-primary">Voir les catégories</a>
                            <a href="{{ route('about.index_fr') }}" class="btn btn-outline">En savoir plus</a>
                        </div>

                        <div class="stats-row" data-aos="fade-up" data-aos-delay="550">
                            <div class="stat-item">
                                <h3><span class="purecounter" data-purecounter-start="0" data-purecounter-end="{{ $propo->students_worldwide_fr ?? 0 }}" data-purecounter-duration="2"></span>+</h3>
                                <p>Étudiants inscrits</p>
                            </div>
                            <div class="stat-item">
                                <h3><span class="purecounter" data-purecounter-start="0" data-purecounter-end="{{ $propo->expert_instructors_fr ?? 0 }}" data-purecounter-duration="2"></span>+</h3>
                                <p>Formateurs</p>
                            </div>
                            <div class="stat-item">
                                <h3><span class="purecounter" data-purecounter-start="0" data-purecounter-end="{{ $propo->years_experience_fr ?? 0 }}" data-purecounter-duration="2"></span>+</h3>
                                <p>Années d’expérience</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
                    <div class="cta-image">
                        <img src="{{ asset('storage/' . ($propo->image ?? $societe->cover_image_path ?? 'defaults/cta.webp')) }}"
                             alt="Plateforme d’apprentissage en ligne"
                             class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /CTA Section -->
@endsection
