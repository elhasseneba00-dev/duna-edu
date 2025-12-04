{{-- resources/views/components/course/card.blade.php --}}
<div class="card h-100 border-0 shadow-sm hover-shadow transition">
    @if($course->image)
        <img src="{{ asset('storage/' . $course->image) }}" class="card-img-top" alt="{{ $course->title_fr }}">
    @endif

    <div class="card-body d-flex flex-column">
        <div class="d-flex justify-content-between mb-2">
            <span class="badge bg-primary">{{ $course->level_fr }}</span>
            @if($course->is_free)
                <span class="badge bg-success">Gratuit</span>
            @else
                <span class="text-primary fw-bold">{{ $course->price }} FCFA</span>
            @endif
        </div>

        <h5 class="card-title">
            <a href="{{ localized_route('courses.show', $course) }}" class="text-decoration-none text-dark">
                {{ $course->title_fr }}
            </a>
        </h5>

        <p class="text-muted small flex-grow-1">{{ Str::limit($course->excerpt_fr, 100) }}</p>

        <div class="mt-auto">
            <a href="{{ localized_route('courses.show', $course) }}" class="btn btn-outline-primary w-100">
                Voir le programme
            </a>
        </div>
    </div>
</div>
