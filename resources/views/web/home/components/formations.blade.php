<section id="formations" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="display-5 fw-bold text-primary">Nos Formations phares</h2>
            <p class="lead text-muted">Des programmes conçus par des experts pour vous faire exceller</p>
        </div>

        <div class="row g-4">
            @foreach ($featuredCourses as $course)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <x-course.card :course="$course" />
                </div>
            @endforeach
        </div>

        <div class="text-center mt-5">
            <a href="{{ localized_route('courses.index') }}" class="btn btn-primary btn-lg px-5">
                Voir toutes les formations →
            </a>
        </div>
    </div>
</section>
