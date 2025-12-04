@extends('layout.web.main')
@section('content')

    <!-- About Section -->
    <section id="about" class="about section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <img src="{{ asset('storage/' .$propo->image) }}" alt="About Us" class="img-fluid rounded-4">
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="about-content">
                        <span class="subtitle">{{ $propo->subtitle_fr }}</span>
                        <h2>{{ $propo->title_fr }}</h2>
                        <p>{{ $propo->description_fr }}</p>
                        <div class="stats-row">
                            <div class="stats-item">
                                <span class="count">{{ $propo->years_experience_fr }}</span>
                                <p>Années d'expérience</p>
                            </div>
                            <div class="stats-item">
                                <span class="count">{{ $propo->expert_instructors_fr }}</span>
                                <p>Instructeurs experts</p>
                            </div>
                            <div class="stats-item">
                                <span class="count">{{ $propo->students_worldwide_fr }}</span>
                                <p>Étudiants dans le monde</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5 pt-4">
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="mission-card">
                        <div class="icon-box">
                            <i class="bi bi-bullseye"></i>
                        </div>
                        <h3>Notre Mission</h3>
                        <p>{{ $propo->mission_fr }}</p>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="mission-card">
                        <div class="icon-box">
                            <i class="bi bi-eye"></i>
                        </div>
                        <h3>Notre Vision</h3>
                        <p>{{ $propo->vision_fr }}</p>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="mission-card">
                        <div class="icon-box">
                            <i class="bi bi-award"></i>
                        </div>
                        <h3>Nos Valeurs</h3>
                        <p>{{ $propo->value_fr }}</p>
                    </div>
                </div>
            </div>

            <div class="row mt-5 pt-3 align-items-center">
                <div class="col-lg-6 order-lg-2" data-aos="fade-up" data-aos-delay="300">
                    <div class="achievements">
                        <span class="subtitle">Pourquoi Nous Choisir ?</span>
                        <h2>Transformer l'education pour un demain meilleur</h2>
                        <ul class="achievements-list">
                            @foreach ($benefices as $item)
                                <li><i class="bi bi-check-circle-fill"></i> {{ $item->text_fr }}</li>
                            @endforeach
                        </ul>
                        {{-- <a href="#" class="btn-explore">Discover More <i class="bi bi-arrow-right"></i></a> --}}
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                    <div class="about-gallery">
                        <div class="row g-3">
                            <div class="col-6">
                                <img src="{{ asset('storage/' .$propo->image_1) }}" alt="Campus Life"
                                    class="img-fluid rounded-3">
                            </div>
                            <div class="col-6">
                                <img src="{{ asset('storage/' .$propo->image_2) }}" alt="Student Achievement"
                                    class="img-fluid rounded-3">
                            </div>
                            <div class="col-12 mt-3">
                                <img src="{{ asset('storage/' .$propo->image_3) }}" alt="Our Campus" class="img-fluid rounded-3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section><!-- /About Section -->
@endsection
