@extends('layouts.app')

@section('titre', 'Dashboard')

@section('contenu')

<style>
/* ===== LAYOUT PRINCIPAL ===== */
.dash-wrapper {
    display: flex;
    flex-direction: row;
    gap: 1.5rem;
    align-items: flex-start;
}

/* ===== SIDEBAR ===== */
.dash-sidebar {
    width: 210px;
    min-width: 210px;
    flex-shrink: 0;
}

.dash-avatar {
    background: white;
    border-radius: 12px;
    border: 1px solid #f3f4f6;
    padding: 20px;
    margin-bottom: 12px;
    text-align: center;
}

.dash-avatar-circle {
    width: 64px;
    height: 64px;
    min-width: 64px;
    min-height: 64px;
    border-radius: 50%;
    background: linear-gradient(135deg, #60a5fa, #34d399);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.4rem;
    font-weight: 700;
    margin: 0 auto 10px;
    overflow: hidden;
}

.dash-nav-box {
    background: white;
    border-radius: 12px;
    border: 1px solid #f3f4f6;
    padding: 12px;
    margin-bottom: 12px;
}

.dash-nav-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 10px 12px;
    border-radius: 10px;
    color: #4b5563;
    font-size: 0.875rem;
    text-decoration: none;
    margin-bottom: 2px;
    transition: background 0.15s;
}

.dash-nav-item:hover { background: #f9fafb; }
.dash-nav-item.active { background: #eff6ff; color: #2563eb; font-weight: 600; }

.dash-publish-btn {
    display: block;
    width: 100%;
    text-align: center;
    background: linear-gradient(to right, #3b82f6, #10b981);
    color: white;
    padding: 12px;
    border-radius: 10px;
    font-weight: 600;
    font-size: 0.875rem;
    text-decoration: none;
    box-sizing: border-box;
}

/* ===== CONTENU PRINCIPAL ===== */
.dash-main { flex: 1; min-width: 0; }

.dash-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 1.5rem;
    flex-wrap: wrap;
    gap: 12px;
}

/* ===== STATS ===== */
.dash-stats {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 12px;
    margin-bottom: 1.5rem;
}

.dash-stat-card {
    background: white;
    border-radius: 12px;
    border: 1px solid #f3f4f6;
    padding: 16px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.04);
}

.dash-stat-card.accent { border-left: 4px solid #3b82f6; }

.dash-stat-top {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 12px;
}

.dash-stat-icon {
    width: 40px;
    height: 40px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* ===== ARTICLES + SIDEBAR DROITE ===== */
.dash-bottom {
    display: flex;
    gap: 1.5rem;
    align-items: flex-start;
}

.dash-articles { flex: 1; min-width: 0; }

.dash-card {
    background: white;
    border-radius: 12px;
    border: 1px solid #f3f4f6;
    padding: 24px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.04);
}

.dash-sidebar-right {
    width: 240px;
    min-width: 240px;
    flex-shrink: 0;
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.dash-small-card {
    background: white;
    border-radius: 12px;
    border: 1px solid #f3f4f6;
    padding: 20px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.04);
}

/* ===== MOBILE ===== */
@media (max-width: 1024px) {
    .dash-wrapper { flex-direction: column; }
    .dash-sidebar { width: 100%; min-width: 100%; }
    .dash-nav-box { display: none; }
    .dash-nav-mobile {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 8px;
        background: white;
        border-radius: 12px;
        border: 1px solid #f3f4f6;
        padding: 12px;
        margin-bottom: 12px;
    }
    .dash-nav-mobile-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 4px;
        padding: 10px 4px;
        border-radius: 10px;
        text-decoration: none;
        color: #4b5563;
        font-size: 0.65rem;
        text-align: center;
        background: #f9fafb;
    }
    .dash-nav-mobile-item.active { background: #eff6ff; color: #2563eb; font-weight: 600; }
    .dash-stats { grid-template-columns: repeat(2, 1fr); }
    .dash-bottom { flex-direction: column; }
    .dash-sidebar-right { width: 100%; min-width: 100%; }
    .dash-table { display: none !important; }
    .dash-mobile-cards { display: block !important; }
    .dash-avatar-circle { width: 56px; height: 56px; min-width: 56px; min-height: 56px; }
}

@media (min-width: 1025px) {
    .dash-nav-mobile { display: none; }
    .dash-mobile-cards { display: none; }
    .dash-table { display: table !important; }
}
</style>

<div class="dash-wrapper">

    {{-- Sidebar --}}
    <div class="dash-sidebar">

        {{-- Avatar --}}
        <div class="dash-avatar">
            <div class="dash-avatar-circle">
                @if(auth()->user()->avatar)
                    <img src="{{ Storage::url(auth()->user()->avatar) }}"
                        style="width:100%;height:100%;object-fit:cover;border-radius:50%;">
                @else
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                @endif
            </div>
            <p style="font-weight:700;font-size:0.875rem;color:#111827;margin:0 0 2px;">{{ auth()->user()->name }}</p>
            <p style="font-size:0.65rem;color:#9ca3af;text-transform:uppercase;font-weight:600;letter-spacing:0.05em;margin:0 0 2px;">Espace Auteur</p>
            <p style="font-size:0.75rem;color:#6b7280;margin:0;">Gérez vos publications</p>
        </div>

        {{-- Nav Desktop --}}
        <div class="dash-nav-box">
            <a href="{{ route('dashboard') }}" class="dash-nav-item active">
                <svg style="width:18px;height:18px;flex-shrink:0;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
                Tableau de bord
            </a>
            <a href="{{ route('posts.mes') }}" class="dash-nav-item">
                <svg style="width:18px;height:18px;flex-shrink:0;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                Mes Articles
            </a>
            <a href="{{ route('posts.create') }}" class="dash-nav-item">
                <svg style="width:18px;height:18px;flex-shrink:0;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Nouvel Article
            </a>
            <a href="{{ route('profile.edit') }}" class="dash-nav-item">
                <svg style="width:18px;height:18px;flex-shrink:0;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
                Mon Profil
            </a>
        </div>

        {{-- Nav Mobile --}}
        <div class="dash-nav-mobile">
            <a href="{{ route('dashboard') }}" class="dash-nav-mobile-item active">
                <svg style="width:20px;height:20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
                Tableau de bord
            </a>
            <a href="{{ route('posts.mes') }}" class="dash-nav-mobile-item">
                <svg style="width:20px;height:20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                Mes Articles
            </a>
            <a href="{{ route('posts.create') }}" class="dash-nav-mobile-item">
                <svg style="width:20px;height:20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Nouvel Article
            </a>
            <a href="{{ route('profile.edit') }}" class="dash-nav-mobile-item">
                <svg style="width:20px;height:20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
                Mon Profil
            </a>
        </div>

        {{-- Bouton publier --}}
        <a href="{{ route('posts.create') }}" class="dash-publish-btn">
            ✏️ Publier maintenant
        </a>
    </div>

    {{-- Contenu principal --}}
    <div class="dash-main">

        {{-- Header --}}
        <div class="dash-header">
            <div>
                <h1 style="font-size:1.875rem;font-weight:800;color:#111827;margin:0 0 4px;">
                    Bienvenue, {{ explode(' ', auth()->user()->name)[0] }}
                </h1>
                <p style="color:#6b7280;font-size:0.875rem;margin:0;">Voici un aperçu de l'impact de vos écrits cette semaine.</p>
            </div>
            <div style="background:white;border:1px solid #e5e7eb;border-radius:8px;padding:8px 14px;font-size:0.75rem;color:#4b5563;display:flex;align-items:center;gap:8px;white-space:nowrap;">
                📅 {{ now()->subDays(7)->format('d M') }} — {{ now()->format('d M Y') }}
            </div>
        </div>

        {{-- Stats --}}
        <div class="dash-stats">
            {{-- Articles --}}
            <div class="dash-stat-card">
                <div class="dash-stat-top">
                    <div class="dash-stat-icon" style="background:#eff6ff;">
                        <svg style="width:20px;height:20px;" fill="none" stroke="#3b82f6" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <span style="color:#10b981;font-size:0.75rem;font-weight:600;">+12%</span>
                </div>
                <p style="font-size:0.65rem;color:#9ca3af;text-transform:uppercase;font-weight:600;letter-spacing:0.05em;margin:0 0 4px;">Total Articles</p>
                <p style="font-size:1.875rem;font-weight:800;color:#111827;margin:0;">{{ $posts->count() }}</p>
            </div>

            {{-- Likes --}}
            <div class="dash-stat-card">
                <div class="dash-stat-top">
                    <div class="dash-stat-icon" style="background:#f0fdf4;">
                        <svg style="width:20px;height:20px;" fill="#10b981" viewBox="0 0 24 24">
                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                        </svg>
                    </div>
                    <span style="color:#10b981;font-size:0.75rem;font-weight:600;">+5%</span>
                </div>
                <p style="font-size:0.65rem;color:#9ca3af;text-transform:uppercase;font-weight:600;letter-spacing:0.05em;margin:0 0 4px;">Total Likes</p>
                <p style="font-size:1.875rem;font-weight:800;color:#111827;margin:0;">{{ $totalLikes }}</p>
            </div>

            {{-- Commentaires --}}
            <div class="dash-stat-card">
                <div class="dash-stat-top">
                    <div class="dash-stat-icon" style="background:#faf5ff;">
                        <svg style="width:20px;height:20px;" fill="none" stroke="#a855f7" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                    </div>
                    <span style="color:#ef4444;font-size:0.75rem;font-weight:600;">-2%</span>
                </div>
                <p style="font-size:0.65rem;color:#9ca3af;text-transform:uppercase;font-weight:600;letter-spacing:0.05em;margin:0 0 4px;">Total Commentaires</p>
                <p style="font-size:1.875rem;font-weight:800;color:#111827;margin:0;">{{ $totalComments }}</p>
            </div>

            {{-- Vues --}}
            <div class="dash-stat-card accent">
                <div class="dash-stat-top">
                    <div class="dash-stat-icon" style="background:#eff6ff;">
                        <svg style="width:20px;height:20px;" fill="none" stroke="#3b82f6" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </div>
                    <span style="color:#10b981;font-size:0.75rem;font-weight:600;">+18%</span>
                </div>
                <p style="font-size:0.65rem;color:#9ca3af;text-transform:uppercase;font-weight:600;letter-spacing:0.05em;margin:0 0 4px;">Vues</p>
                <p style="font-size:1.875rem;font-weight:800;color:#111827;margin:0;">—</p>
            </div>
        </div>

        {{-- Articles + Sidebar droite --}}
        <div class="dash-bottom">

            {{-- Articles --}}
            <div class="dash-articles">
                <div class="dash-card">
                    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">
                        <h2 style="font-size:1.1rem;font-weight:700;color:#111827;margin:0;">Articles Récents</h2>
                        <a href="{{ route('posts.mes') }}" style="color:#3b82f6;font-size:0.875rem;text-decoration:none;">Voir tout</a>
                    </div>

                    {{-- Mobile : cards --}}
                    <div class="dash-mobile-cards" style="display:none;">
                        @forelse($posts as $post)
                        <div style="border:1px solid #f3f4f6;border-radius:10px;padding:12px;margin-bottom:10px;">
                            <div style="display:flex;justify-content:space-between;align-items:flex-start;gap:8px;margin-bottom:8px;">
                                <p style="font-weight:600;color:#111827;font-size:0.875rem;margin:0;flex:1;">{{ Str::limit($post->titre, 45) }}</p>
                                @if($post->statut === 'publie')
                                    <span style="background:#dcfce7;color:#16a34a;font-size:0.65rem;padding:3px 8px;border-radius:20px;font-weight:700;white-space:nowrap;">Publié</span>
                                @elseif($post->statut === 'brouillon')
                                    <span style="background:#f3f4f6;color:#6b7280;font-size:0.65rem;padding:3px 8px;border-radius:20px;font-weight:700;white-space:nowrap;">Brouillon</span>
                                @else
                                    <span style="background:#fef9c3;color:#ca8a04;font-size:0.65rem;padding:3px 8px;border-radius:20px;font-weight:700;white-space:nowrap;">En attente</span>
                                @endif
                            </div>
                            <div style="display:flex;justify-content:space-between;align-items:center;">
                                <span style="color:#9ca3af;font-size:0.75rem;">{{ $post->category->nom ?? '—' }} • {{ $post->created_at->format('d M Y') }}</span>
                                <div style="display:flex;gap:10px;">
                                    <a href="{{ route('posts.edit', $post->id) }}" style="color:#3b82f6;">✏️</a>
                                    <form method="POST" action="{{ route('posts.destroy', $post->id) }}" style="margin:0;">
                                        @csrf @method('DELETE')
                                        <button type="submit" style="background:none;border:none;color:#ef4444;cursor:pointer;padding:0;"
                                            onclick="return confirm('Supprimer ?')">🗑️</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @empty
                        <p style="text-align:center;color:#9ca3af;padding:30px 0;font-size:0.875rem;">Aucun article pour le moment.</p>
                        @endforelse
                    </div>

                    {{-- Desktop : tableau --}}
                    <table class="dash-table" style="width:100%;border-collapse:collapse;">
                        <thead>
                            <tr style="border-bottom:1px solid #f3f4f6;">
                                <th style="text-align:left;padding-bottom:12px;font-size:0.7rem;color:#9ca3af;text-transform:uppercase;font-weight:600;letter-spacing:0.05em;">Titre</th>
                                <th style="text-align:left;padding-bottom:12px;font-size:0.7rem;color:#9ca3af;text-transform:uppercase;font-weight:600;letter-spacing:0.05em;">Statut</th>
                                <th style="text-align:left;padding-bottom:12px;font-size:0.7rem;color:#9ca3af;text-transform:uppercase;font-weight:600;letter-spacing:0.05em;">Catégorie</th>
                                <th style="text-align:left;padding-bottom:12px;font-size:0.7rem;color:#9ca3af;text-transform:uppercase;font-weight:600;letter-spacing:0.05em;">Date</th>
                                <th style="text-align:left;padding-bottom:12px;font-size:0.7rem;color:#9ca3af;text-transform:uppercase;font-weight:600;letter-spacing:0.05em;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($posts as $post)
                            <tr style="border-bottom:1px solid #f9fafb;">
                                <td style="padding:14px 0;font-weight:500;color:#111827;font-size:0.875rem;">{{ Str::limit($post->titre, 30) }}</td>
                                <td style="padding:14px 0;">
                                    @if($post->statut === 'publie')
                                        <span style="background:#dcfce7;color:#16a34a;font-size:0.7rem;padding:4px 10px;border-radius:20px;font-weight:700;text-transform:uppercase;">Publié</span>
                                    @elseif($post->statut === 'brouillon')
                                        <span style="background:#f3f4f6;color:#6b7280;font-size:0.7rem;padding:4px 10px;border-radius:20px;font-weight:700;text-transform:uppercase;">Brouillon</span>
                                    @else
                                        <span style="background:#fef9c3;color:#ca8a04;font-size:0.7rem;padding:4px 10px;border-radius:20px;font-weight:700;text-transform:uppercase;">En attente</span>
                                    @endif
                                </td>
                                <td style="padding:14px 0;color:#6b7280;font-size:0.875rem;">{{ $post->category->nom ?? '—' }}</td>
                                <td style="padding:14px 0;color:#9ca3af;font-size:0.8rem;">{{ $post->created_at->format('d M Y') }}</td>
                                <td style="padding:14px 0;">
                                    <div style="display:flex;gap:8px;align-items:center;">
                                        <a href="{{ route('posts.edit', $post->id) }}" style="color:#3b82f6;text-decoration:none;">✏️</a>
                                        <form method="POST" action="{{ route('posts.destroy', $post->id) }}" style="margin:0;">
                                            @csrf @method('DELETE')
                                            <button type="submit" style="background:none;border:none;color:#ef4444;cursor:pointer;padding:0;"
                                                onclick="return confirm('Supprimer ?')">🗑️</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" style="text-align:center;color:#9ca3af;padding:40px 0;font-size:0.875rem;">Aucun article pour le moment.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Sidebar droite --}}
            <div class="dash-sidebar-right">

                {{-- Brouillon rapide --}}
                <div class="dash-small-card">
                    <h3 style="font-weight:700;color:#111827;font-size:0.9rem;margin:0 0 12px;">Brouillon rapide</h3>
                    <form method="POST" action="{{ route('posts.store') }}">
                        @csrf
                        <input type="hidden" name="statut" value="brouillon">
                        <input type="hidden" name="category_id" value="{{ App\Models\Category::first()->id ?? 1 }}">
                        <input type="text" name="titre" placeholder="Titre de l'idée..."
                            style="width:100%;padding:10px 12px;background:#f9fafb;border:1px solid #e5e7eb;border-radius:8px;font-size:0.8rem;outline:none;box-sizing:border-box;margin-bottom:8px;">
                        <textarea name="contenu" rows="3" placeholder="Qu'avez-vous en tête ?"
                            style="width:100%;padding:10px 12px;background:#f9fafb;border:1px solid #e5e7eb;border-radius:8px;font-size:0.8rem;outline:none;resize:none;box-sizing:border-box;margin-bottom:10px;font-family:inherit;"></textarea>
                        <button type="submit"
                            style="width:100%;background:#2563eb;color:white;padding:10px;border:none;border-radius:8px;font-size:0.8rem;font-weight:600;cursor:pointer;">
                            Enregistrer le brouillon
                        </button>
                    </form>
                </div>

                {{-- Catégories tendances --}}
                <div class="dash-small-card">
                    <h3 style="font-weight:700;color:#111827;font-size:0.9rem;margin:0 0 12px;">Catégories Tendances</h3>
                    @foreach(App\Models\Category::withCount(['posts' => function($q){ $q->where('statut','publie'); }])->orderByDesc('posts_count')->take(3)->get() as $index => $cat)
                    <div style="display:flex;justify-content:space-between;align-items:center;padding:8px 0;border-bottom:1px solid #f9fafb;">
                        <div style="display:flex;align-items:center;gap:8px;">
                            <div style="width:10px;height:10px;border-radius:50%;background:{{ $index === 0 ? '#3b82f6' : ($index === 1 ? '#10b981' : '#9ca3af') }};flex-shrink:0;"></div>
                            <span style="color:#374151;font-size:0.875rem;">{{ $cat->nom }}</span>
                        </div>
                        <span style="color:#6b7280;font-size:0.875rem;font-weight:500;">
                            {{ $cat->posts_count > 0 ? round(($cat->posts_count / max(App\Models\Post::where('statut','publie')->count(), 1)) * 100) : 0 }}%
                        </span>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>

@endsection