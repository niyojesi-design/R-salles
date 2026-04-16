{{-- resources/views/about.blade.php --}}
@extends('layouts.app')
@section('title', 'À Propos – RéservSalle')
@section('content')

<div class="about-hero">
    <div style="position:absolute;inset:0;background:url('data:image/svg+xml,...');opacity:.04;"></div>
    <div style="position:relative;z-index:1">
        <span class="section-tag">Notre histoire</span>
        <h1>À <em>Propos</em> de nous</h1>
        <p>Nous simplifions la réservation d'espaces professionnels au Burundi depuis 2022.</p>
    </div>
</div>

<!-- Story -->
<div class="about-story">
    <div>
        <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?w=700&q=80" alt="Notre équipe" style="border-radius:var(--radius-lg)">
    </div>
    <div>
        <span class="section-tag">Notre mission</span>
        <h2>Connecter les espaces aux bonnes personnes</h2>
        <p>RéservSalle est né d'un constat simple : trouver et réserver une salle professionnelle au Burundi était un processus long, opaque et souvent décourageant.</p>
        <p>Nous avons créé une plateforme transparente, intuitive et fiable, qui met en relation les propriétaires d'espaces avec les professionnels qui en ont besoin — en quelques clics.</p>
        <p>Aujourd'hui, nous sommes fiers de gérer des centaines de réservations par mois et de contribuer au dynamisme professionnel de Bujumbura et de ses environs.</p>

        <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:1.25rem;margin-top:2rem;">
            <div style="text-align:center;padding:1.5rem;background:var(--gold-pale);border-radius:var(--radius-lg);">
                <div style="font-family:'Cormorant Garamond',serif;font-size:36px;font-weight:700;color:var(--gold);">150+</div>
                <div style="font-size:13px;color:var(--text-mid);text-transform:uppercase;letter-spacing:0.06em;">Salles</div>
            </div>
            <div style="text-align:center;padding:1.5rem;background:var(--gold-pale);border-radius:var(--radius-lg);">
                <div style="font-family:'Cormorant Garamond',serif;font-size:36px;font-weight:700;color:var(--gold);">1200+</div>
                <div style="font-size:13px;color:var(--text-mid);text-transform:uppercase;letter-spacing:0.06em;">Réservations</div>
            </div>
            <div style="text-align:center;padding:1.5rem;background:var(--gold-pale);border-radius:var(--radius-lg);">
                <div style="font-family:'Cormorant Garamond',serif;font-size:36px;font-weight:700;color:var(--gold);">98%</div>
                <div style="font-size:13px;color:var(--text-mid);text-transform:uppercase;letter-spacing:0.06em;">Satisfaction</div>
            </div>
        </div>
    </div>
</div>

<!-- Values -->
<section class="section" style="background:var(--ivory-dark);padding-top:4rem;">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Ce qui nous guide</span>
            <h2>Nos <em>valeurs</em></h2>
        </div>
        <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:1.75rem;">
            @foreach([
                ['🔍', 'Transparence', 'Nous affichons clairement tous les prix, conditions et disponibilités. Pas de mauvaises surprises.'],
                ['⚡', 'Efficacité', 'De la recherche à la confirmation, chaque étape est optimisée pour vous faire gagner du temps.'],
                ['🤝', 'Confiance', 'Chaque espace est vérifié. Chaque transaction est sécurisée. Nous construisons des relations durables.'],
            ] as [$icon, $title, $desc])
            <div style="background:var(--white);border-radius:var(--radius-lg);padding:2rem;border:1px solid var(--ivory-dark);text-align:center;">
                <div style="font-size:40px;margin-bottom:1rem;">{{ $icon }}</div>
                <h3 style="font-size:22px;margin-bottom:0.75rem;">{{ $title }}</h3>
                <p style="font-size:14px;color:var(--text-mid);line-height:1.7;">{{ $desc }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta-section">
    <h2>Prêt à <em style="color:var(--gold);font-style:normal;">commencer</em> ?</h2>
    <p>Rejoignez la communauté RéservSalle et simplifiez vos réservations.</p>
    <div class="cta-actions">
        <a href="{{ route('salles.index') }}" class="btn-primary">Explorer les salles</a>
        <a href="{{ route('contact') }}" class="btn-secondary">Nous contacter</a>
    </div>
</section>

@endsection


{{-- ======================================================= --}}
{{-- resources/views/reservations/index.blade.php            --}}
{{-- ======================================================= --}}