<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'RéservSalle') – Réservez votre espace</title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600;700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('styles')
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar" id="navbar">
    <div class="nav-container">
        <a href="{{ route('home') }}" class="nav-logo">
            <span class="logo-mark">RS</span>
            <span class="logo-text">Réserv<em>Salle</em></span>
        </a>

        <ul class="nav-links">
            <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Accueil</a></li>
            <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a></li>
            <li><a href="{{ route('salles.index') }}" class="{{ request()->routeIs('salles.*') ? 'active' : '' }}">Réservation</a></li>
            {{-- <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li> --}}
        </ul>

        <div class="nav-actions">
            @auth
                <div class="user-menu">
                    <span class="user-name">{{ Auth::user()->name }}</span>
                    <div class="user-dropdown">
                        @if(Auth::user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        @endif
                        <a href="{{ route('reservations.index') }}">Mes réservations</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="logout-btn">Déconnexion</button>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="btn-nav-outline">Connexion</a>
                <a href="{{ route('register') }}" class="btn-nav-primary">S'inscrire</a>
            @endauth
        </div>

        <button class="hamburger" id="hamburger">
            <span></span><span></span><span></span>
        </button>
    </div>
</nav>

<!-- ALERTS -->
@if(session('success'))
    <div class="alert alert-success">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
        {{ session('success') }}
        <button class="alert-close">×</button>
    </div>
@endif
@if(session('error'))
    <div class="alert alert-error">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>
        {{ session('error') }}
        <button class="alert-close">×</button>
    </div>
@endif

@yield('content')

<!-- FOOTER -->
<footer class="footer">
    <div class="footer-container">
        <div class="footer-brand">
            <div class="footer-logo">
                <span class="logo-mark">RS</span>
                <span class="logo-text">Réserv<em>Salle</em></span>
            </div>
            <p>La plateforme de référence pour la réservation de salles professionnelles. Trouvez et réservez l'espace idéal en quelques clics.</p>
        </div>

        <div class="footer-links">
            <h4>Navigation</h4>
            <ul>
                <li><a href="{{ route('home') }}">Accueil</a></li>
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="{{ route('salles.index') }}">Réservation</a></li>
                {{-- <li><a href="{{ route('contact') }}">Contact</a></li> --}}
            </ul>
        </div>

        <div class="footer-links">
            <h4>Compte</h4>
            <ul>
                @auth
                    <li><a href="{{ route('reservations.index') }}">Mes réservations</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}" style="display:inline">
                            @csrf
                            <button type="submit" style="background:none;border:none;color:inherit;cursor:pointer;font-family:inherit;font-size:inherit;padding:0">Déconnexion</button>
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('login') }}">Connexion</a></li>
                    <li><a href="{{ route('register') }}">Inscription</a></li>
                @endauth
            </ul>
        </div>

        <div class="footer-newsletter">
            <h4>Newsletter</h4>
            <p>Recevez nos offres et nouveautés.</p>
            <div class="newsletter-form">
                <input type="email" placeholder="Votre email">
                <button>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </button>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <p>© {{ date('Y') }} RéservSalle. Tous droits réservés.</p>
        <p>Fait avec ♥ au Burundi</p>
    </div>
</footer>

<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')
</body>
</html>