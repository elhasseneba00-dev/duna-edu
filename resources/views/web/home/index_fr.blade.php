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
                        data-purecounter-end="{{ $propo->years_experience_fr ?? 5 }}"
                        data-purecounter-duration="2"></span>
                                    <span class="label">Années d’expérience</span>
                                </div>
                                <div class="stat-item">
                  <span class="number purecounter"
                        data-purecounter-start="0"
                        data-purecounter-end="{{ $propo->expert_instructors_fr ?? 20 }}"
                        data-purecounter-duration="2"></span>
                                    <span class="label">Formateurs experts</span>
                                </div>
                                <div class="stat-item">
                  <span class="number purecounter"
                        data-purecounter-start="0"
                        data-purecounter-end="{{ $propo->students_worldwide_fr ?? 15000 }}"
                        data-purecounter-duration="2"></span>
                                    <span class="label">Étudiants dans le monde</span>
                                </div>
                            </div>

                            <div class="hero-buttons">
                                <a href="{{ route('catalogue.index') }}" class="btn btn-primary">Parcourir les formations</a>
                                <a href="{{ route('about.company') }}" class="btn btn-outline">En savoir plus</a>
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

                            <!-- Cartes flottantes (indicatives, peuvent être dynamiques plus tard) -->
                            <div class="floating-cards">
                                <div class="course-card" data-aos="fade-up" data-aos-delay="300">
                                    <div class="card-icon"><i class="bi bi-code-slash"></i></div>
                                    <div class="card-content">
                                        <h6>Développement Web</h6>
                                        <span>{{ $propo->students_web_fr ?? '2 450 étudiants' }}</span>
                                    </div>
                                </div>
                                <div class="course-card" data-aos="fade-up" data-aos-delay="400">
                                    <div class="card-icon"><i class="bi bi-palette"></i></div>
                                    <div class="card-content">
                                        <h6>UI/UX Design</h6>
                                        <span>{{ $propo->students_design_fr ?? '1 890 étudiants' }}</span>
                                    </div>
                                </div>
                                <div class="course-card" data-aos="fade-up" data-aos-delay="500">
                                    <div class="card-icon"><i class="bi bi-graph-up"></i></div>
                                    <div class="card-content">
                                        <h6>Marketing Digital</h6>
                                        <span>{{ $propo->students_marketing_fr ?? '3 200 étudiants' }}</span>
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

    <!-- Featured Courses Section -->
    <section id="featured-courses" class="featured-courses section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Formations mises en avant</h2>
            <p>Découvrez une sélection de nos meilleures formations pour accélérer votre parcours.</p>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">
                @forelse ($featuredCourses as $course)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="course-card">
                            <div class="course-image">
                                <img src="{{ asset('storage/' . ($course->cover_image ?? 'defaults/course.webp')) }}"
                                     alt="{{ $course->title_fr }}"
                                     class="img-fluid">
                                @if($course->is_featured)
                                    <div class="badge featured">À la une</div>
                                @endif
                                <div class="price-badge">
                                    {{ $course->is_free ? 'Gratuit' : String('%.2n', $course->price ?? 0) }}{{ $course->currency ?? '€' }}
                                </div>
                            </div>

                            <div class="course-content">
                                <div class="course-meta">
                                    <span class="level">{{ ucfirst($course->level_fr ?? 'Tous niveaux') }}</span>
                                    <span class="duration">{{ $course->duration_fr ?? 'Durée flexible' }}</span>
                                </div>

                                <h3>
                                    <a href="{{ route('catalogue.show', $course->slug) }}">{{ $course->title_fr }}</a>
                                </h3>
                                <p>{{ Str::limit($course->short_description_fr ?? $course->description_fr, 160) }}</p>

                                @if($course->instructor)
                                    <div class="instructor">
                                        <img src="{{ asset('storage/' . ($course->instructor->photo_url ?? 'defaults/instructor.webp')) }}"
                                             alt="{{ $course->instructor->name }}"
                                             class="instructor-img">
                                        <div class="instructor-info">
                                            <h6>{{ $course->instructor->name }}</h6>
                                            <span>{{ $course->instructor->role ?? 'Formateur' }}</span>
                                        </div>
                                    </div>
                                @endif

                                <div class="course-stats">
                                    <div class="rating">
                                        @php $rating = round($course->rating ?? 4.5, 1); @endphp
                                        @for($i=1; $i<=5; $i++)
                                            @if($i <= floor($rating)) <i class="bi bi-star-fill"></i>
                                            @elseif($i - $rating <= 0.5) <i class="bi bi-star-half"></i>
                                            @else <i class="bi bi-star"></i>
                                            @endif
                                        @endfor
                                        <span>({{ $rating }})</span>
                                    </div>
                                    <div class="students">
                                        <i class="bi bi-people-fill"></i>
                                        <span>{{ number_format($course->students_count ?? 0, 0, ',', ' ') }} étudiants</span>
                                    </div>
                                </div>

                                <a href="{{ route('checkout.add') }}"
                                   class="btn-course"
                                   onclick="event.preventDefault(); document.getElementById('add-to-cart-{{ $course->id }}').submit();">
                                    S’inscrire
                                </a>
                                <form id="add-to-cart-{{ $course->id }}" action="{{ route('checkout.add') }}" method="POST" class="d-none">
                                    @csrf
                                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-center">Aucune formation mise en avant pour le moment.</p>
                    </div>
                @endforelse
            </div>

            <div class="more-courses text-center" data-aos="fade-up" data-aos-delay="500">
                <a href="{{ route('catalogue.index') }}" class="btn-more">Voir toutes les formations</a>
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
                        <a href="{{ route('catalogue.index', ['category' => $item->slug]) }}" class="category-card category-tech">
                            <div class="category-icon">
                                <i class="{{ $item->icon }}"></i>
                            </div>
                            <h5>{{ $item->name_fr }}</h5>
                            <span class="course-count">{{ $item->courses_count ?? 0 }} formations</span>
                        </a>
                    </div>
                @empty
                    <div class="col-12"><p class="text-center">Aucune catégorie disponible.</p></div>
                @endforelse
            </div>
        </div>
    </section>
    <!-- /Course Categories Section -->

    <!-- Featured Instructors Section -->
    <section id="featured-instructors" class="featured-instructors section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Formateurs mis en avant</h2>
            <p>Des experts issus du terrain pour une pédagogie orientée résultat.</p>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">
                @forelse ($instructors as $instructor)
                    <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="instructor-card">
                            <div class="instructor-image">
                                <img src="{{ asset('storage/' . ($instructor->photo_url ?? 'defaults/instructor.webp')) }}" class="img-fluid" alt="{{ $instructor->name }}">
                                <div class="overlay-content">
                                    <div class="rating-stars">
                                        @php $rating = round($instructor->rating ?? 4.7, 1); @endphp
                                        @for($i=1; $i<=5; $i++)
                                            @if($i <= floor($rating)) <i class="bi bi-star-fill"></i>
                                            @elseif($i - $rating <= 0.5) <i class="bi bi-star-half"></i>
                                            @else <i class="bi bi-star"></i>
                                            @endif
                                        @endfor
                                        <span>{{ $rating }}</span>
                                    </div>
                                    <div class="course-count">
                                        <i class="bi bi-play-circle"></i>
                                        <span>{{ $instructor->courses_count ?? 0 }} formations</span>
                                    </div>
                                </div>
                            </div>
                            <div class="instructor-info">
                                <h5>{{ $instructor->name }}</h5>
                                <p class="specialty">{{ $instructor->specialty_fr ?? $instructor->role ?? 'Formateur' }}</p>
                                <p class="description">{{ Str::limit($instructor->bio_fr ?? '', 120) }}</p>
                                <div class="stats-grid">
                                    <div class="stat"><span class="number">{{ number_format($instructor->students_count ?? 0, 0, ',', ' ') }}</span> <span class="label">Étudiants</span></div>
                                    <div class="stat"><span class="number">{{ $rating }}</span> <span class="label">Note</span></div>
                                </div>
                                <div class="action-buttons">
                                    <a href="{{ route('instructors.show', $instructor->slug) }}" class="btn-view">Voir le profil</a>
                                    <div class="social-links">
                                        @if($instructor->linkedin)<a href="{{ $instructor->linkedin }}" target="_blank" rel="noopener"><i class="bi bi-linkedin"></i></a>@endif
                                        @if($instructor->twitter)<a href="{{ $instructor->twitter }}" target="_blank" rel="noopener"><i class="bi bi-twitter"></i></a>@endif
                                        @if($instructor->github)<a href="{{ $instructor->github }}" target="_blank" rel="noopener"><i class="bi bi-github"></i></a>@endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12"><p class="text-center">Aucun formateur affiché pour le moment.</p></div>
                @endforelse
            </div>
        </div>
    </section>
    <!-- /Featured Instructors Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Témoignages</h2>
            <p>La preuve sociale au service de la confiance.</p>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="testimonials-container">
                <div class="swiper testimonials-slider init-swiper" data-aos="fade-up" data-aos-delay="200">
                    <script type="application/json" class="swiper-config">
                        {
                          "loop": true,
                          "speed": 600,
                          "autoplay": { "delay": 5000 },
                          "slidesPerView": 1,
                          "spaceBetween": 30,
                          "pagination": { "el": ".swiper-pagination", "type": "bullets", "clickable": true },
                          "breakpoints": { "768": { "slidesPerView": 2 }, "992": { "slidesPerView": 3 } }
                        }
                    </script>
                    <div class="swiper-wrapper">
                        @forelse ($testimonials as $t)
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <div class="stars">
                                        @for($i=1; $i<=5; $i++)
                                            @if($i <= floor($t->rating ?? 5)) <i class="bi bi-star-fill"></i>
                                            @elseif($i - ($t->rating ?? 5) <= 0.5) <i class="bi bi-star-half"></i>
                                            @else <i class="bi bi-star"></i>
                                            @endif
                                        @endfor
                                    </div>
                                    <p>{{ $t->content_fr }}</p>
                                    <div class="testimonial-profile">
                                        <img src="{{ asset('storage/' . ($t->avatar_url ?? 'defaults/avatar.webp')) }}"
                                             alt="{{ $t->author_name }}"
                                             class="img-fluid rounded-circle">
                                        <div>
                                            <h3>{{ $t->author_name }}</h3>
                                            <h4>{{ $t->author_role_fr ?? 'Étudiant' }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <p>Les retours de nos apprenants seront publiés prochainement.</p>
                                </div>
                            </div>
                        @endforelse
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12 text-center" data-aos="fade-up">
                    <div class="overall-rating">
                        <div class="rating-number">{{ $propo->global_rating ?? '4.8' }}</div>
                        <div class="rating-stars">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                        </div>
                        <p>Basé sur {{ $propo->reviews_count ?? '230+' }} avis</p>
                        <div class="rating-platforms">
                            @foreach(($propo->rating_platforms ?? ['Google', 'Trustpilot', 'Facebook']) as $platform)
                                <span>{{ $platform }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Testimonials Section -->

    <!-- Recent Blog Posts Section -->
    <section id="recent-blog-posts" class="recent-blog-posts section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Articles récents</h2>
            <p>Restez informé grâce à notre blog éducatif.</p>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">
                @forelse ($blogPosts as $post)
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="card">
                            <div class="card-top d-flex align-items-center">
                                <img src="{{ asset('storage/' . ($post->author_avatar ?? 'defaults/avatar.webp')) }}" alt="{{ $post->author_name }}" class="rounded-circle me-2">
                                <span class="author-name">Par {{ $post->author_name }}</span>
                                <span class="ms-auto likes"><i class="bi bi-heart"></i> {{ $post->likes_count ?? 0 }}</span>
                            </div>
                            <a href="{{ route('blog.show', $post->slug) }}" class="card-img-wrapper d-block">
                                <img src="{{ asset('storage/' . ($post->cover_image ?? 'defaults/blog.webp')) }}" alt="{{ $post->title }}" class="w-100">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                                </h5>
                                <p class="card-text">{{ Str::limit($post->excerpt ?? strip_tags($post->content), 140) }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12"><p class="text-center">Aucun article publié pour le moment.</p></div>
                @endforelse
            </div>
        </div>
    </section>
    <!-- /Recent Blog Posts Section -->

    <!-- Cta Section -->
    <section id="cta" class="cta section light-background">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
                    <div class="cta-content">
                        <h2>Transformez votre avenir avec DunaEdu</h2>
                        <p>Rejoignez des milliers d’apprenants qui ont avancé leur carrière grâce à nos formations structurées et accessibles.</p>

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
                                <span>Accès 24/7 aux ressources et contenus</span>
                            </div>
                            <div class="feature-item" data-aos="fade-up" data-aos-delay="450">
                                <i class="bi bi-check-circle-fill"></i>
                                <span>Projets pratiques et cas réels</span>
                            </div>
                        </div>

                        <div class="cta-actions" data-aos="fade-up" data-aos-delay="500">
                            <a href="{{ route('catalogue.index') }}" class="btn btn-primary">Voir le catalogue</a>
                            <a href="{{ route('checkout.form') }}" class="btn btn-outline">S’inscrire maintenant</a>
                        </div>

                        <div class="stats-row" data-aos="fade-up" data-aos-delay="550">
                            <div class="stat-item">
                                <h3><span class="purecounter" data-purecounter-start="0" data-purecounter-end="{{ $propo->students_worldwide_fr ?? 15000 }}" data-purecounter-duration="2"></span>+</h3>
                                <p>Étudiants inscrits</p>
                            </div>
                            <div class="stat-item">
                                <h3><span class="purecounter" data-purecounter-start="0" data-purecounter-end="{{ $propo->courses_count_fr ?? 150 }}" data-purecounter-duration="2"></span>+</h3>
                                <p>Formations disponibles</p>
                            </div>
                            <div class="stat-item">
                                <h3><span class="purecounter" data-purecounter-start="0" data-purecounter-end="{{ $propo->success_rate_fr ?? 98 }}" data-purecounter-duration="2"></span>%</h3>
                                <p>Taux de réussite</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
                    <div class="cta-image">
                        <img src="{{ asset('storage/' . ($propo->cta_image ?? 'defaults/cta.webp')) }}" alt="Plateforme d’apprentissage en ligne" class="img-fluid">

                        <div class="floating-element student-card" data-aos="zoom-in" data-aos-delay="600">
                            <div class="card-content">
                                <i class="bi bi-person-check-fill"></i>
                                <div class="text">
                                    <span class="number">{{ number_format($propo->new_students_month_fr ?? 2450, 0, ',', ' ') }}</span>
                                    <span class="label">Nouveaux étudiants ce mois</span>
                                </div>
                            </div>
                        </div>

                        <div class="floating-element course-card" data-aos="zoom-in" data-aos-delay="700">
                            <div class="card-content">
                                <i class="bi bi-play-circle-fill"></i>
                                <div class="text">
                                    <span class="number">{{ $propo->hours_content_fr ?? '50+' }}</span>
                                    <span class="label">Heures de contenu</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- /Cta Section -->
@endsection
