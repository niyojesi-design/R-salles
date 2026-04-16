{{-- resources/views/contact.blade.php --}}
@extends('layouts.app')
@section('title', 'Contact – RéservSalle')
@section('content')

<div class="page-hero">
    <div class="container" style="position:relative;z-index:1">
        <span class="section-tag">Nous sommes là pour vous</span>
        <h1>Nous <em>Contacter</em></h1>
        <p>Une question, une suggestion ? Notre équipe vous répond rapidement.</p>
    </div>
</div>

<div class="contact-layout">
    <!-- Info -->
    <div class="contact-info">
        <h2>Parlons de votre <em style="font-style:normal;color:var(--gold)">projet</em></h2>
        <p>Notre équipe est disponible pour vous aider à trouver la salle idéale ou répondre à toutes vos questions.</p>

        <div class="contact-items">
            <div class="contact-item">
                <div class="contact-item-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                </div>
                <div>
                    <h4>Adresse</h4>
                    <p>Boulevard de la Liberté, Bujumbura, Burundi</p>
                </div>
            </div>
            <div class="contact-item">
                <div class="contact-item-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.11 12 19.79 19.79 0 0 1 1.07 3.18a2 2 0 0 1 1.99-2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                </div>
                <div>
                    <h4>Téléphone</h4>
                    <p>+257 22 23 24 25</p>
                </div>
            </div>
            <div class="contact-item">
                <div class="contact-item-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                </div>
                <div>
                    <h4>Email</h4>
                    <p>contact@reservsalle.bi</p>
                </div>
            </div>
            <div class="contact-item">
                <div class="contact-item-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                </div>
                <div>
                    <h4>Horaires</h4>
                    <p>Lun – Ven : 8h – 18h · Sam : 9h – 13h</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Form -->
    <div class="contact-form-card">
        <h3>Envoyez-nous un message</h3>
        <p>Nous vous répondons sous 24h ouvrées.</p>

        @if(session('success'))
        <div class="alert alert-success" style="position:relative;top:0;right:0;margin-bottom:1rem;animation:none;">
            {{ session('success') }}
        </div>
        @endif

        <form method="POST" action="{{ route('contact.store') }}">
            @csrf

            <div class="form-group-full">
                <label>Nom complet</label>
                <input type="text" name="name" class="form-control"
                    placeholder="Jean Dupont" value="{{ old('name') }}" required>
                @error('name')<p class="form-error">{{ $message }}</p>@enderror
            </div>

            <div class="form-group-full">
                <label>Email</label>
                <input type="email" name="email" class="form-control"
                    placeholder="votre@email.com" value="{{ old('email') }}" required>
                @error('email')<p class="form-error">{{ $message }}</p>@enderror
            </div>

            <div class="form-group-full">
                <label>Sujet</label>
                <input type="text" name="subject" class="form-control"
                    placeholder="Objet de votre message" value="{{ old('subject') }}" required>
                @error('subject')<p class="form-error">{{ $message }}</p>@enderror
            </div>

            <div class="form-group-full">
                <label>Message</label>
                <textarea name="message" class="form-control" rows="5"
                    placeholder="Décrivez votre demande..." required style="resize:vertical;">{{ old('message') }}</textarea>
                @error('message')<p class="form-error">{{ $message }}</p>@enderror
            </div>

            <button type="submit" class="btn-submit">
                Envoyer le message
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-left:0.5rem"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
            </button>
        </form>
    </div>
</div>

@endsection