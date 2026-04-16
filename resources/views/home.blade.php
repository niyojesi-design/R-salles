@extends('layouts.app')

@section('title', 'RéservSalle – Trouvez et réservez votre espace')

@section('content')

<!-- ── HERO ──────────────────────────────────────────── -->
<section class="hero">
    <div class="hero-bg">
        <div class="hero-accent"></div>
        <div class="hero-accent-2"></div>
    </div>

    <div class="hero-content">
        <div class="hero-label">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
            Plateforme N°1 de réservation au Burundi
        </div>

        <h1>
            Trouvez votre <em>espace</em><br>idéal, maintenant
        </h1>

        <p class="hero-desc">
            Des salles de conférence aux espaces événementiels, trouvez et réservez l'espace parfait pour chaque occasion en quelques clics.
        </p>

        <div class="hero-actions">
            <a href="{{ route('salles.index') }}" class="btn-primary">
                Explorer les salles
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </a>
            <a href="{{ route('about') }}" class="btn-secondary">
                Comment ça marche
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polygon points="10 8 16 12 10 16 10 8"/></svg>
            </a>
        </div>

        <div class="hero-stats">
            <div class="stat-item">
                <div class="stat-num">{{ $totalSalles ?? '150' }}+</div>
                <div class="stat-label">Salles disponibles</div>
            </div>
            <div class="stat-item">
                <div class="stat-num">{{ $totalReservations ?? '1.2k' }}+</div>
                <div class="stat-label">Réservations</div>
            </div>
            <div class="stat-item">
                <div class="stat-num">{{ $totalClients ?? '800' }}+</div>
                <div class="stat-label">Clients satisfaits</div>
            </div>
            <div class="stat-item">
                <div class="stat-num">{{ $totalCategories ?? '12' }}</div>
                <div class="stat-label">Catégories</div>
            </div>
        </div>
    </div>

    <div class="hero-scroll">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        Défiler
    </div>
</section>

<!-- ── SEARCH BAR ────────────────────────────────────── -->
<div class="search-section">
    <div style="max-width:1100px;margin:0 auto;padding:0 2rem;">
        <form action="{{ route('salles.index') }}" method="GET" class="search-bar">
            <div class="search-field">
                <label>Recherche</label>
                <input type="text" name="search" placeholder="Nom de la salle..." value="{{ request('search') }}">
            </div>
            <div class="search-field">
                <label>Catégorie</label>
                <select name="category">
                    <option value="">Toutes les catégories</option>
                    @foreach($categories ?? [] as $cat)
                        <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="search-field">
                <label>Capacité min.</label>
                <input type="number" name="capacity" placeholder="Nb de personnes" value="{{ request('capacity') }}">
            </div>
            <div class="search-field">
                <label>Localisation</label>
                <input type="text" name="location" placeholder="Ville, quartier..." value="{{ request('location') }}">
            </div>
            <button type="submit" class="search-btn">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                Rechercher
            </button>
        </form>
    </div>
</div>

<!-- ── CATEGORIES ───────────────────────────────────── -->
<section class="section" style="padding-top:6rem;">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Parcourir par type</span>
            <h2>Explorer nos catégories</h2>
            <p>Chaque salle est pensée pour un usage spécifique. Trouvez celle qui vous convient.</p>
        </div>

        <div class="categories-grid">
            @forelse($categories ?? [] as $cat)
            <a href="{{ route('salles.index', ['category' => $cat->id]) }}" class="category-card">
                <div class="category-icon">
                    @switch(strtolower($cat->name))
                        @case('conférence') 🎤 @break
                        @case('formation') 📚 @break
                        @case('événement') 🎉 @break
                        @case('bureau') 💼 @break
                        @case('studio') 🎬 @break
                        @default 🏢
                    @endswitch
                </div>
                <h4>{{ $cat->name }}</h4>
                <p>{{ $cat->salles_count ?? 0 }} salle(s)</p>
            </a>
            @empty
            @foreach(['Conférence', 'Formation', 'Événement', 'Bureau', 'Studio', 'Réunion'] as $c)
            <div class="category-card">
                <div class="category-icon">🏢</div>
                <h4>{{ $c }}</h4>
                <p>Disponible</p>
            </div>
            @endforeach
            @endforelse
        </div>
    </div>
</section>

<!-- ── FEATURED SALLES ───────────────────────────────── -->
<section class="section" style="padding-top:2rem;background:var(--ivory-dark)">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Sélection du moment</span>
            <h2>Nos <em>meilleures</em> salles</h2>
            <p>{{ $featuredSalles->count() ?? 'Découvrez nos' }} espaces soigneusement sélectionnés pour vous.</p>
        </div>

        <div class="salles-grid">
            @forelse($featuredSalles ?? [] as $salle)
            <div class="salle-card">
                <div class="card-image">
                    @if($salle->image_path)
                        <img src="{{ asset('storage/' . $salle->image_path) }}" alt="{{ $salle->name }}">
                    @else
                        <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=600&q=80" alt="{{ $salle->name }}">
                    @endif
                    <div class="card-badge">{{ $salle->category->name ?? 'Salle' }}</div>
                    <button class="card-fav">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#c9a84c" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                    </button>
                </div>
                <div class="card-body">
                    <div class="card-category">{{ $salle->category->name ?? 'Espace' }}</div>
                    <h3 class="card-title">{{ $salle->name }}</h3>
                    <div class="card-location">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        {{ $salle->location ?? 'Bujumbura' }}
                    </div>
                    <div class="card-meta">
                        @if($salle->capacity)
                        <div class="card-meta-item">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                            {{ $salle->capacity }} pers.
                        </div>
                        @endif
                        <div class="card-meta-item">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                            Disponible
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="card-price">
                            {{ number_format($salle->price, 0, ',', ' ') }} BIF
                            <span>/ heure</span>
                        </div>
                        <a href="{{ route('salles.show', $salle) }}" class="btn-card">
                            Voir
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            {{-- Placeholder cards --}}
            @for($i = 0; $i < 3; $i++)
            <div class="salle-card">
                <div class="card-image" style="background:var(--ivory-dark);display:flex;align-items:center;justify-content:center;">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="var(--text-light)" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/></svg>
                </div>
                <div class="card-body">
                    <div class="card-category">Espace professionnel</div>
                    <h3 class="card-title">Salle Prestige {{ $i + 1 }}</h3>
                    <div class="card-location"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg> Bujumbura Centre</div>
                    <div class="card-meta">
                        <div class="card-meta-item"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg> 20 pers.</div>
                        <div class="card-meta-item"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg> Disponible</div>
                    </div>
                    <div class="card-footer">
                        <div class="card-price">50 000 BIF <span>/ heure</span></div>
                        <a href="{{ route('salles.index') }}" class="btn-card">Voir <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></a>
                    </div>
                </div>
            </div>
            @endfor
            @endforelse
        </div>

        <div style="text-align:center;margin-top:3rem;">
            <a href="{{ route('salles.index') }}" class="btn-primary">
                Voir toutes les salles
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </a>
        </div>
    </div>
</section>

<!-- ── FEATURES ──────────────────────────────────────── -->
<div class="features-section">
    <div class="container">
        <div class="features-grid">
            <div class="features-text">
                <span class="section-tag">Pourquoi nous choisir</span>
                <h2>Une plateforme pensée pour <em>vous</em></h2>
                <p>Nous simplifions la recherche et la réservation d'espaces professionnels avec une expérience fluide et transparente.</p>

                <div class="features-list">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                        </div>
                        <div>
                            <h4>Réservation instantanée</h4>
                            <p>Confirmez votre réservation en temps réel, sans délai d'attente ni paperasse.</p>
                        </div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><shield/><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                        </div>
                        <div>
                            <h4>Paiement sécurisé</h4>
                            <p>Vos transactions sont 100% sécurisées avec confirmation immédiate.</p>
                        </div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        </div>
                        <div>
                            <h4>Support dédié</h4>
                            <p>Notre équipe est disponible 7j/7 pour vous accompagner dans vos réservations.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="features-image">
                <img src="https://images.unsplash.com/photo-1497366412874-3415097a27e7?w=800&q=80" alt="Salle de conférence moderne">
            </div>
        </div>
    </div>
</div>

<!-- ── HOW IT WORKS ───────────────────────────────────── -->
<section class="section">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Simple comme bonjour</span>
            <h2>Comment ça <em>fonctionne</em></h2>
            <p>Réservez votre salle en 4 étapes simples</p>
        </div>

        <div class="steps-grid">
            <div class="step-card">
                <div class="step-number">01</div>
                <h3>Cherchez</h3>
                <p>Filtrez par date, catégorie, capacité ou localisation pour trouver la salle idéale.</p>
            </div>
            <div class="step-card">
                <div class="step-number">02</div>
                <h3>Choisissez</h3>
                <p>Consultez les détails, photos et disponibilités de chaque espace en détail.</p>
            </div>
            <div class="step-card">
                <div class="step-number">03</div>
                <h3>Réservez</h3>
                <p>Sélectionnez vos créneaux et confirmez votre réservation en quelques secondes.</p>
            </div>
            <div class="step-card">
                <div class="step-number">04</div>
                <h3>Profitez</h3>
                <p>Recevez votre confirmation et accédez à votre espace le jour J !</p>
            </div>
        </div>
    </div>
</section>

<!-- ── TESTIMONIALS ───────────────────────────────────── -->
<section class="testimonials-section">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Ils nous font confiance</span>
            <h2>Ce que disent <em>nos clients</em></h2>
        </div>

        <div class="testimonials-grid">
            <div class="testimonial-card">
                <div class="testimonial-stars">★★★★★</div>
                <blockquote>« Une expérience fluide et professionnelle. J'ai trouvé la salle parfaite pour ma conférence en moins de 10 minutes ! »</blockquote>
                <div class="testimonial-author">
                    <div class="author-avatar">JM</div>
                    <div>
                        <div class="author-name">Jean-Marie K.</div>
                        <div class="author-role">Directeur d'entreprise</div>
                    </div>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-stars">★★★★★</div>
                <blockquote>« Le processus de réservation est simple et rapide. Les salles sont exactement comme présentées sur le site. »</blockquote>
                <div class="testimonial-author">
                    <div class="author-avatar">AN</div>
                    <div>
                        <div class="author-name">Amina N.</div>
                        <div class="author-role">Formatrice indépendante</div>
                    </div>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-stars">★★★★☆</div>
                <blockquote>« Excellent service client et belle sélection d'espaces. Je recommande vivement pour tout type d'événement. »</blockquote>
                <div class="testimonial-author">
                    <div class="author-avatar">PM</div>
                    <div>
                        <div class="author-name">Pierre M.</div>
                        <div class="author-role">Organisateur d'événements</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ── CTA ────────────────────────────────────────────── -->
<section class="cta-section">
    <h2>Prêt à réserver votre <em style="color:var(--gold);font-style:normal;">espace idéal</em> ?</h2>
    <p>Rejoignez des centaines de professionnels qui font confiance à RéservSalle.</p>
    <div class="cta-actions">
        <a href="{{ route('salles.index') }}" class="btn-primary">
            Parcourir les salles
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
        </a>
        @guest
        <a href="{{ route('register') }}" class="btn-secondary">
            Créer un compte gratuit
        </a>
        @endguest
    </div>
</section>

@endsection