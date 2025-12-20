@extends('layout.web.main')

@section('content')
    <section class="section">
        <div class="container">
            <h1>Contact</h1>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <form action="{{ route('contact.store_fr') }}" method="post" class="row g-2">
                @csrf
                <div class="col-md-6"><input type="text" name="name" class="form-control" placeholder="Nom"></div>
                <div class="col-md-6"><input type="email" name="email" class="form-control" placeholder="Email" required></div>
                <div class="col-md-6"><input type="text" name="phone" class="form-control" placeholder="Téléphone"></div>
                <div class="col-md-6"><input type="text" name="subject" class="form-control" placeholder="Sujet" required></div>
                <div class="col-12"><textarea name="message" class="form-control" rows="5" placeholder="Votre message" required></textarea></div>
                <div class="col-12 form-check">
                    <input class="form-check-input" type="checkbox" name="newsletter" id="newsletter">
                    <label class="form-check-label" for="newsletter">S’abonner à la newsletter</label>
                </div>
                <div class="col-12"><button class="btn btn-primary">Envoyer</button></div>
            </form>
        </div>
    </section>
@endsection
