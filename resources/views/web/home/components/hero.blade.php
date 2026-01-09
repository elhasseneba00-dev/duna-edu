<!-- Hero Section - DunaEdu -->
<section class="hero-section position-relative overflow-hidden py-5" style="background: linear-gradient(135deg, #0072b1 0%, #005a8a 100%); color: white;">
    <div class="container py-5">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-7" data-aos="fade-right">
                <h1 class="display-4 fw-bold mb-4">
                    {{ $societe->slogan_fr ?? 'L’éducation centralisée, accessible à tous.' }}
                </h1>
                <p class="lead mb-5">
                    {{ $societe->slogan_secondaire_fr ?? 'Des services éducatifs pour tout l’univers.' }}
                </p>

                <div class="d-flex flex-wrap gap-3 mb-5">
                    <a href="#formations" class="btn btn-warning btn-lg px-5 py-3 text-dark fw-bold">
                        Découvrir nos formations
                    </a>
                    <a href="{{ localized_route('about') }}" class="btn btn-outline-light btn-lg px-5 py-3">
                        En savoir plus
                    </a>
                </div>

                <div class="row text-center g-4">
                    <div class="col-4">
                        <h3 class="fw-bold">{{ $stats->formations ?? '200+' }}</h3>
                        <p class="mb-0 opacity-90">Formations</p>
                    </div>
                    <div class="col-4">
                        <h3 class="fw-bold">{{ $stats->apprenants ?? '15 000+' }}</h3>
                        <p class="mb-0 opacity-90">Apprenants</p>
                    </div>
                    <div class="col-4">
                        <h3 class="fw-bold">{{ $stats->experts ?? '50+' }}</h3>
                        <p class="mb-0 opacity-90">Experts</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 text-center" data-aos="fade-left" data-aos-delay="200">
                <img src="{{ asset('storage/' . $societe->cover_image_path) }}"
                     alt="DunaEdu - Plateforme éducative"
                     class="img-fluid rounded-4 shadow-lg">
            </div>
        </div>
    </div>

    <!-- Formes décoratives -->
    <div class="position-absolute top-0 end-0 w-50 h-100 opacity-10">
        <div class="bg-warning rounded-circle position-absolute top-10 end-10" style="width: 600px; height: 600px; filter: blur(120px);"></div>
    </div>
</section>
