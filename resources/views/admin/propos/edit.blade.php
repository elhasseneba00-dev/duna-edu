@extends('layout.admin.main')
@section('content')

    <section id="enroll" class="enroll section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            {{-- SUCCESS --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <strong>Succès :</strong> {{ session('success') }}
                </div>
            @endif

            {{-- ERROR --}}
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                    <strong>Erreur :</strong> {{ session('error') }}
                </div>
            @endif

            {{-- VALIDATION --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Veuillez corriger les erreurs ci-dessous :</strong>
                    <ul class="mt-2 mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <div class="enrollment-form-wrapper">

                        <div class="enrollment-header text-center mb-5" data-aos="fade-up" data-aos-delay="200">
                            <h2>Mettre à Jour la Section À Propos</h2>
                        </div>

                        <form class="enrollment-form" data-aos="fade-up" data-aos-delay="300" method="POST"
                            action="{{ route('propos.update', $propo->id) }}" enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            {{-- ===========================
                                FRANÇAIS
                        ============================ --}}
                            <h5 class="mt-4 mb-2">Version FR</h5>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label">Sous-titre (FR) *</label>
                                    <input type="text" name="subtitle_fr" class="form-control"
                                        value="{{ $propo->subtitle_fr }}" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Titre (FR) *</label>
                                    <input type="text" name="title_fr" class="form-control"
                                        value="{{ $propo->title_fr }}" required>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Description (FR)</label>
                                <textarea name="description_fr" rows="4" class="form-control">{{ $propo->description_fr }}</textarea>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label class="form-label">Années d'expérience</label>
                                    <input type="number" name="years_experience_fr" class="form-control"
                                        value="{{ $propo->years_experience_fr }}">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Instructeurs experts</label>
                                    <input type="number" name="expert_instructors_fr" class="form-control"
                                        value="{{ $propo->expert_instructors_fr }}">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Étudiants dans le monde</label>
                                    <input type="number" name="students_worldwide_fr" class="form-control"
                                        value="{{ $propo->students_worldwide_fr }}">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Mission (FR)</label>
                                <textarea name="mission_fr" rows="3" class="form-control">{{ $propo->mission_fr }}</textarea>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Vision (FR)</label>
                                <textarea name="vision_fr" rows="3" class="form-control">{{ $propo->vision_fr }}</textarea>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Valeurs (FR)</label>
                                <textarea name="value_fr" rows="3" class="form-control">{{ $propo->value_fr }}</textarea>
                            </div>


                            {{-- ===========================
                                ANGLAIS
                        ============================ --}}
                            <h5 class="mt-4 mb-2">Version EN</h5>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label">Subtitle (EN)</label>
                                    <input type="text" name="subtitle_en" class="form-control"
                                        value="{{ $propo->subtitle_en }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Title (EN)</label>
                                    <input type="text" name="title_en" class="form-control"
                                        value="{{ $propo->title_en }}">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Description (EN)</label>
                                <textarea name="description_en" rows="4" class="form-control">{{ $propo->description_en }}</textarea>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label class="form-label">Years experience</label>
                                    <input type="number" name="years_experience_en" class="form-control"
                                        value="{{ $propo->years_experience_en }}">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Expert instructors</label>
                                    <input type="number" name="expert_instructors_en" class="form-control"
                                        value="{{ $propo->expert_instructors_en }}">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Students worldwide</label>
                                    <input type="number" name="students_worldwide_en" class="form-control"
                                        value="{{ $propo->students_worldwide_en }}">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Mission (EN)</label>
                                <textarea name="mission_en" rows="3" class="form-control">{{ $propo->mission_en }}</textarea>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Vision (EN)</label>
                                <textarea name="vision_en" rows="3" class="form-control">{{ $propo->vision_en }}</textarea>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Value (EN)</label>
                                <textarea name="value_en" rows="3" class="form-control">{{ $propo->value_en }}</textarea>
                            </div>


                            {{-- ===========================
                                ARABE
                        ============================ --}}
                            <h5 class="mt-4 mb-2">Version AR</h5>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label">Sous-titre (AR)</label>
                                    <input type="text" name="subtitle_ar" class="form-control"
                                        value="{{ $propo->subtitle_ar }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Titre (AR)</label>
                                    <input type="text" name="title_ar" class="form-control"
                                        value="{{ $propo->title_ar }}">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Description (AR)</label>
                                <textarea name="description_ar" rows="4" class="form-control">{{ $propo->description_ar }}</textarea>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label class="form-label">Années d'expérience</label>
                                    <input type="number" name="years_experience_ar" class="form-control"
                                        value="{{ $propo->years_experience_ar }}">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Instructeurs experts</label>
                                    <input type="number" name="expert_instructors_ar" class="form-control"
                                        value="{{ $propo->expert_instructors_ar }}">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Étudiants dans le monde</label>
                                    <input type="number" name="students_worldwide_ar" class="form-control"
                                        value="{{ $propo->students_worldwide_ar }}">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Mission (AR)</label>
                                <textarea name="mission_ar" rows="3" class="form-control">{{ $propo->mission_ar }}</textarea>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Vision (AR)</label>
                                <textarea name="vision_ar" rows="3" class="form-control">{{ $propo->vision_ar }}</textarea>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Valeurs (AR)</label>
                                <textarea name="value_ar" rows="3" class="form-control">{{ $propo->value_ar }}</textarea>
                            </div>

                            {{-- ===========================
                                IMAGE
                        ============================ --}}
                            <div class="mb-4">
                                <label class="form-label">Image principale</label>
                                <input type="file" name="image" class="form-control">
                                @if ($propo->image)
                                    <img src="{{ asset('storage/' . $propo->image) }}" alt=""
                                        class="img-fluid mt-2" style="max-height: 120px;">
                                @endif
                            </div>


                            {{-- =======================
                            IMAGES
                        ======================== --}}
                            <hr>
                            <h5 class="mt-4 mb-3">Images</h5>

                            <div class="row mb-4">

                                {{-- Image 1 --}}
                                <div class="col-md-4">
                                    <label class="form-label">Image 1</label>
                                    <input type="file" class="form-control" name="image_1">

                                    @if ($propo->image_1)
                                        <img src="{{ asset('storage/' . $propo->image_1) }}"
                                            class="img-fluid mt-2 rounded" style="max-height: 100px;">
                                    @endif
                                </div>

                                {{-- Image 2 --}}
                                <div class="col-md-4">
                                    <label class="form-label">Image 2</label>
                                    <input type="file" class="form-control" name="image_2">

                                    @if ($propo->image_2)
                                        <img src="{{ asset('storage/' . $propo->image_2) }}"
                                            class="img-fluid mt-2 rounded" style="max-height: 100px;">
                                    @endif
                                </div>

                                {{-- Image 3 --}}
                                <div class="col-md-4">
                                    <label class="form-label">Image 3</label>
                                    <input type="file" class="form-control" name="image_3">

                                    @if ($propo->image_3)
                                        <img src="{{ asset('storage/' . $propo->image_3) }}"
                                            class="img-fluid mt-2 rounded" style="max-height: 100px;">
                                    @endif
                                </div>
                            </div>

                            {{-- BUTTON --}}
                            <div class="row">
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-enroll">
                                        <i class="bi bi-check-circle me-2"></i>
                                        Mettre à jour
                                    </button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>

        </div>

    </section>

@endsection
