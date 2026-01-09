<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold">Ils parlent de nous</h2>
            <p class="lead opacity-90">Plus de {{ $testimonials->count() }}+ apprenants satisfaits</p>
        </div>

        <div class="row g-4">
            @foreach ($testimonials->take(3) as $t)
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="bg-white text-dark p-4 rounded-4 shadow">
                        <div class="text-warning mb-3">
                            @for($i = 1; $i <= 5; $i++) <i class="bi bi-star-fill"></i> @endfor
                        </div>
                        <p class="fst-italic">"{{ Str::limit($t->content_fr, 140) }}"</p>
                        <div class="d-flex align-items-center mt-4">
                            <img src="{{ $t->avatar }}" class="rounded-circle me-3" width="60" height="60">
                            <div>
                                <h6 class="mb-0">{{ $t->name }}</h6>
                                <small class="text-muted">{{ $t->role_fr }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
