<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>DunaEdu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home.index_fr') }}">DunaEdu</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMain">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMain">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('home.index_fr') }}">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('about.index_fr') }}">À propos</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('careers.index_fr') }}">Carrières</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('services.index_fr') }}">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('contact.index_fr') }}">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>

<main>@yield('content')</main>

<footer class="bg-dark text-white py-4 mt-5">
    <div class="container">
        <div class="d-flex justify-content-between">
            <div>&copy; {{ date('Y') }} DunaEdu</div>
            <div>
                <a href="#" class="text-white-50 me-3">Politique de confidentialité</a>
                <a href="#" class="text-white-50">CGU</a>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
