<section class="py-5">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="display-5 fw-bold text-primary">Explorer par domaine</h2>
            <p class="lead text-muted">Choisissez votre voie parmi nos catégories</p>
        </div>

        <div class="row g-4">
            @foreach ($categories as $category)
                <div class="col-lg-3 col-md-4 col-6" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">
                    <a href="{{ localized_route('courses.category', $category->slug) }}"
                       class="text-decoration-none text-dark">
                        <div class="text-center p-4 bg-white rounded-3 shadow-sm hover-shadow-lg transition">
                            <div class="fs-1 text-warning mb-3">
                                <i class="{{ $category->icon }}"></i>
                            </div>
                            <h5 class="fw-bold">{{ $category->name_fr }}</h5>
                            <small class="text-muted">{{ $category->courses_count }} formations</small>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
