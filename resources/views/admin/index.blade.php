@extends('layouts.app')

@section('titre', 'Panneau de Modération')

@section('contenu')

<style>
.admin-wrapper { display:flex; flex-direction:row; gap:1.5rem; align-items:flex-start; }
.admin-sidebar { width:210px; min-width:210px; flex-shrink:0; }
.admin-main { flex:1; min-width:0; }

.admin-nav-item { display:flex; align-items:center; gap:12px; padding:10px 12px; border-radius:10px; color:#4b5563; font-size:0.875rem; text-decoration:none; margin-bottom:2px; transition:background 0.15s; }
.admin-nav-item:hover { background:#f9fafb; }
.admin-nav-item.active { background:#eff6ff; color:#2563eb; font-weight:600; }

@media (max-width:1024px) {
    .admin-wrapper { flex-direction:column; }
    .admin-sidebar { width:100%; min-width:100%; }
    .admin-nav-desktop { display:none !important; }
    .admin-nav-mobile { display:grid !important; grid-template-columns:repeat(4,1fr); gap:8px; background:white; border-radius:12px; border:1px solid #f3f4f6; padding:12px; margin-bottom:12px; }
    .admin-stats { grid-template-columns:1fr !important; }
    .admin-table { display:none !important; }
    .admin-cards { display:block !important; }
    .admin-pret { display:none !important; }
}
@media (min-width:1025px) {
    .admin-nav-mobile { display:none; }
    .admin-cards { display:none; }
    .admin-table { display:table !important; }
}
</style>

<div class="admin-wrapper">

    {{-- Sidebar --}}
    <div class="admin-sidebar">

        <div style="background:white;border-radius:12px;border:1px solid #f3f4f6;padding:16px;margin-bottom:12px;">
            <p style="font-size:0.65rem;color:#9ca3af;text-transform:uppercase;font-weight:600;margin:0 0 2px;letter-spacing:0.05em;">Espace Auteur</p>
            <p style="font-size:0.75rem;color:#6b7280;margin:0 0 16px;">Gérez vos publications</p>

            {{-- Nav Desktop --}}
            <div class="admin-nav-desktop">
                <a href="{{ route('dashboard') }}" class="admin-nav-item">
                    <svg style="width:18px;height:18px;flex-shrink:0;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                    Tableau de bord
                </a>
                <a href="{{ route('posts.mes') }}" class="admin-nav-item active">
                    <svg style="width:18px;height:18px;flex-shrink:0;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Mes Articles
                </a>
                <a href="{{ route('posts.create') }}" class="admin-nav-item">
                    <svg style="width:18px;height:18px;flex-shrink:0;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Nouvel Article
                </a>
                <a href="{{ route('profile.edit') }}" class="admin-nav-item">
                    <svg style="width:18px;height:18px;flex-shrink:0;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    Mon Profil
                </a>
            </div>
        </div>

        {{-- Nav Mobile --}}
        <div class="admin-nav-mobile" style="display:none;">
            <a href="{{ route('dashboard') }}" style="display:flex;flex-direction:column;align-items:center;gap:4px;padding:10px 4px;border-radius:10px;text-decoration:none;color:#4b5563;font-size:0.65rem;text-align:center;background:#f9fafb;">
                <svg style="width:20px;height:20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
                Tableau de bord
            </a>
            <a href="{{ route('posts.mes') }}" style="display:flex;flex-direction:column;align-items:center;gap:4px;padding:10px 4px;border-radius:10px;text-decoration:none;color:#2563eb;font-size:0.65rem;text-align:center;background:#eff6ff;font-weight:600;">
                <svg style="width:20px;height:20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                Mes Articles
            </a>
            <a href="{{ route('posts.create') }}" style="display:flex;flex-direction:column;align-items:center;gap:4px;padding:10px 4px;border-radius:10px;text-decoration:none;color:#4b5563;font-size:0.65rem;text-align:center;background:#f9fafb;">
                <svg style="width:20px;height:20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Nouvel Article
            </a>
            <a href="{{ route('profile.edit') }}" style="display:flex;flex-direction:column;align-items:center;gap:4px;padding:10px 4px;border-radius:10px;text-decoration:none;color:#4b5563;font-size:0.65rem;text-align:center;background:#f9fafb;">
                <svg style="width:20px;height:20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
                Mon Profil
            </a>
        </div>

        {{-- Prêt à partager - Desktop --}}
        <div class="admin-pret" style="background:#eff6ff;border-radius:12px;padding:16px;text-align:center;">
            <p style="font-weight:600;color:#111827;font-size:0.875rem;margin:0 0 10px;">Prêt à partager ?</p>
            <a href="{{ route('posts.create') }}"
                style="display:block;background:#2563eb;color:white;padding:10px;border-radius:8px;font-weight:600;font-size:0.8rem;text-decoration:none;">
                Publier maintenant
            </a>
        </div>

    </div>

    {{-- Contenu principal --}}
    <div class="admin-main">

        {{-- Header --}}
        <div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:1.5rem;flex-wrap:wrap;gap:12px;">
            <div>
                <h1 style="font-size:1.875rem;font-weight:800;color:#111827;margin:0 0 4px;">Panneau de Modération</h1>
                <p style="color:#6b7280;font-size:0.875rem;margin:0;">Supervisez le contenu et la communauté BlogHub</p>
            </div>
            <div style="display:flex;align-items:center;gap:12px;">
                <div style="position:relative;">
                    <div style="width:36px;height:36px;background:#f3f4f6;border-radius:50%;display:flex;align-items:center;justify-content:center;cursor:pointer;">
                        🔔
                    </div>
                    @if($postEnAttente->count() > 0)
                        <span style="position:absolute;top:-2px;right:-2px;width:16px;height:16px;background:#ef4444;color:white;font-size:0.6rem;border-radius:50%;display:flex;align-items:center;justify-content:center;font-weight:700;">
                            {{ $postEnAttente->count() }}
                        </span>
                    @endif
                </div>
                <div style="text-align:right;">
                    <p style="font-weight:700;color:#111827;font-size:0.875rem;margin:0;">{{ auth()->user()->name }}</p>
                    <p style="color:#9ca3af;font-size:0.75rem;margin:0;">{{ auth()->user()->email }}</p>
                </div>
                <div style="width:42px;height:42px;min-width:42px;border-radius:50%;background:linear-gradient(135deg,#60a5fa,#34d399);display:flex;align-items:center;justify-content:center;color:white;font-weight:700;font-size:0.9rem;overflow:hidden;">
                    @if(auth()->user()->avatar)
                        <img src="{{ Storage::url(auth()->user()->avatar) }}" style="width:100%;height:100%;object-fit:cover;border-radius:50%;">
                    @else
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    @endif
                </div>
            </div>
        </div>

        {{-- Tabs --}}
        <div x-data="{ tab: 'articles' }">

            {{-- Tabs Desktop --}}
            <div style="display:flex;gap:0;border-bottom:2px solid #f3f4f6;margin-bottom:1.5rem;overflow-x:auto;">
                <button @click="tab = 'articles'"
                    :style="tab === 'articles' ? 'border-bottom:2px solid #2563eb;color:#2563eb;margin-bottom:-2px;' : 'color:#6b7280;'"
                    style="padding:12px 20px;background:none;border:none;border-bottom:2px solid transparent;font-weight:600;font-size:0.875rem;cursor:pointer;display:flex;align-items:center;gap:8px;white-space:nowrap;margin-bottom:-2px;">
                    Articles en attente
                    <span style="background:#dbeafe;color:#2563eb;font-size:0.7rem;padding:2px 8px;border-radius:20px;font-weight:700;">{{ $postEnAttente->count() }}</span>
                </button>
                <button @click="tab = 'comments'"
                    :style="tab === 'comments' ? 'border-bottom:2px solid #2563eb;color:#2563eb;margin-bottom:-2px;' : 'color:#6b7280;'"
                    style="padding:12px 20px;background:none;border:none;border-bottom:2px solid transparent;font-weight:600;font-size:0.875rem;cursor:pointer;display:flex;align-items:center;gap:8px;white-space:nowrap;margin-bottom:-2px;">
                    Commentaires signalés
                    <span style="background:#fee2e2;color:#dc2626;font-size:0.7rem;padding:2px 8px;border-radius:20px;font-weight:700;">{{ $commentsSignales->count() }}</span>
                </button>
                <button @click="tab = 'users'"
                    :style="tab === 'users' ? 'border-bottom:2px solid #2563eb;color:#2563eb;margin-bottom:-2px;' : 'color:#6b7280;'"
                    style="padding:12px 20px;background:none;border:none;border-bottom:2px solid transparent;font-weight:600;font-size:0.875rem;cursor:pointer;white-space:nowrap;margin-bottom:-2px;">
                    Gestion utilisateurs
                </button>
            </div>

            {{-- Stats --}}
            <div class="admin-stats" style="display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-bottom:1.5rem;">
                @php
                    $totalPosts = \App\Models\Post::count();
                    $publies = \App\Models\Post::where('statut','publie')->count();
                    $taux = $totalPosts > 0 ? round(($publies / $totalPosts) * 100, 1) : 0;
                @endphp
                <div style="background:white;border-radius:12px;border-left:4px solid #3b82f6;padding:20px;display:flex;justify-content:space-between;align-items:center;box-shadow:0 1px 3px rgba(0,0,0,0.04);">
                    <div>
                        <p style="font-size:0.65rem;color:#9ca3af;text-transform:uppercase;font-weight:600;letter-spacing:0.05em;margin:0 0 6px;">Taux d'approbation</p>
                        <p style="font-size:1.875rem;font-weight:800;color:#111827;margin:0;">{{ $taux }}%</p>
                    </div>
                    <div style="width:44px;height:44px;background:#dbeafe;border-radius:10px;display:flex;align-items:center;justify-content:center;">
                        <svg style="width:22px;height:22px;" fill="#2563eb" viewBox="0 0 24 24">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" stroke="#2563eb" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
                <div style="background:white;border-radius:12px;border-left:4px solid #10b981;padding:20px;display:flex;justify-content:space-between;align-items:center;box-shadow:0 1px 3px rgba(0,0,0,0.04);">
                    <div>
                        <p style="font-size:0.65rem;color:#9ca3af;text-transform:uppercase;font-weight:600;letter-spacing:0.05em;margin:0 0 6px;">Nouveaux Auteurs</p>
                        <p style="font-size:1.875rem;font-weight:800;color:#111827;margin:0;">+{{ $users->where('role','auteur')->count() }}</p>
                    </div>
                    <div style="width:44px;height:44px;background:#d1fae5;border-radius:10px;display:flex;align-items:center;justify-content:center;">
                        <svg style="width:22px;height:22px;" fill="none" stroke="#10b981" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                </div>
                <div style="background:white;border-radius:12px;border-left:4px solid #ef4444;padding:20px;display:flex;justify-content:space-between;align-items:center;box-shadow:0 1px 3px rgba(0,0,0,0.04);">
                    <div>
                        <p style="font-size:0.65rem;color:#9ca3af;text-transform:uppercase;font-weight:600;letter-spacing:0.05em;margin:0 0 6px;">Alertes Critiques</p>
                        <p style="font-size:1.875rem;font-weight:800;color:#111827;margin:0;">{{ str_pad($commentsSignales->count(), 2, '0', STR_PAD_LEFT) }}</p>
                    </div>
                    <div style="width:44px;height:44px;background:#fee2e2;border-radius:10px;display:flex;align-items:center;justify-content:center;">
                        <svg style="width:22px;height:22px;" fill="none" stroke="#ef4444" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Articles en attente --}}
            <div x-show="tab === 'articles'">
                <div style="background:white;border-radius:12px;border:1px solid #f3f4f6;overflow:hidden;box-shadow:0 1px 3px rgba(0,0,0,0.04);">
                    <div style="display:flex;justify-content:space-between;align-items:center;padding:16px 20px;border-bottom:1px solid #f3f4f6;">
                        <h2 style="font-weight:700;color:#111827;font-size:1rem;margin:0;">Révision des publications</h2>
                        <button style="display:flex;align-items:center;gap:6px;background:#f9fafb;border:1px solid #e5e7eb;color:#374151;padding:6px 14px;border-radius:8px;font-size:0.8rem;font-weight:600;cursor:pointer;">
                            ⚙️ Filtrer
                        </button>
                    </div>

                    {{-- Mobile cards --}}
                    <div class="admin-cards" style="display:none;">
                        @forelse($postEnAttente as $post)
                        <div style="padding:16px;border-bottom:1px solid #f9fafb;">
                            <div style="display:flex;gap:12px;margin-bottom:12px;">
                                <div style="width:44px;height:44px;background:#f3f4f6;border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;overflow:hidden;">
                                    @if($post->image)
                                        <img src="{{ Str::startsWith($post->image,'http') ? $post->image : Storage::url($post->image) }}" style="width:100%;height:100%;object-fit:cover;border-radius:8px;">
                                    @else
                                        <svg style="width:20px;height:20px;" fill="none" stroke="#9ca3af" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                    @endif
                                </div>
                                <div style="flex:1;min-width:0;">
                                    <p style="font-weight:600;color:#111827;font-size:0.875rem;margin:0 0 2px;line-height:1.4;">{{ Str::limit($post->titre, 55) }}</p>
                                    <p style="color:#9ca3af;font-size:0.75rem;margin:0;">{{ str_word_count(strip_tags($post->contenu)) }} mots • {{ $post->user->name }} • {{ $post->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                            <div style="display:flex;gap:8px;">
                                <form method="POST" action="{{ route('admin.posts.approuver', $post->id) }}" style="flex:1;margin:0;">
                                    @csrf @method('PUT')
                                    <button style="width:100%;background:#dcfce7;color:#16a34a;padding:8px;border:none;border-radius:8px;font-size:0.8rem;font-weight:600;cursor:pointer;">✅ Approuver</button>
                                </form>
                                <form method="POST" action="{{ route('admin.posts.rejeter', $post->id) }}" style="flex:1;margin:0;">
                                    @csrf @method('PUT')
                                    <button style="width:100%;background:#fee2e2;color:#dc2626;padding:8px;border:none;border-radius:8px;font-size:0.8rem;font-weight:600;cursor:pointer;">❌ Rejeter</button>
                                </form>
                            </div>
                        </div>
                        @empty
                        <div style="text-align:center;padding:40px;color:#9ca3af;font-size:0.875rem;">Aucun article en attente.</div>
                        @endforelse
                    </div>

                    {{-- Desktop tableau --}}
                    <table class="admin-table" style="width:100%;border-collapse:collapse;">
                        <thead>
                            <tr style="background:#f9fafb;">
                                <th style="text-align:left;padding:12px 20px;font-size:0.7rem;color:#9ca3af;text-transform:uppercase;font-weight:600;letter-spacing:0.05em;">Article</th>
                                <th style="text-align:left;padding:12px 20px;font-size:0.7rem;color:#9ca3af;text-transform:uppercase;font-weight:600;letter-spacing:0.05em;">Auteur</th>
                                <th style="text-align:left;padding:12px 20px;font-size:0.7rem;color:#9ca3af;text-transform:uppercase;font-weight:600;letter-spacing:0.05em;">Date de soumission</th>
                                <th style="text-align:left;padding:12px 20px;font-size:0.7rem;color:#9ca3af;text-transform:uppercase;font-weight:600;letter-spacing:0.05em;">Catégorie</th>
                                <th style="text-align:left;padding:12px 20px;font-size:0.7rem;color:#9ca3af;text-transform:uppercase;font-weight:600;letter-spacing:0.05em;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($postEnAttente as $post)
                            <tr style="border-top:1px solid #f3f4f6;">
                                <td style="padding:16px 20px;">
                                    <div style="display:flex;gap:14px;align-items:flex-start;">
                                        <div style="width:44px;height:44px;background:#f3f4f6;border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;overflow:hidden;">
                                            @if($post->image)
                                                <img src="{{ Str::startsWith($post->image,'http') ? $post->image : Storage::url($post->image) }}" style="width:100%;height:100%;object-fit:cover;border-radius:8px;">
                                            @else
                                                <svg style="width:20px;height:20px;" fill="none" stroke="#9ca3af" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                                </svg>
                                            @endif
                                        </div>
                                        <div>
                                            <p style="font-weight:600;color:#111827;font-size:0.875rem;margin:0 0 4px;">{{ Str::limit($post->titre, 45) }}</p>
                                            <p style="color:#9ca3af;font-size:0.75rem;margin:0;">{{ str_word_count(strip_tags($post->contenu)) }} mots • Lecture {{ ceil(str_word_count(strip_tags($post->contenu)) / 200) }} min</p>
                                        </div>
                                    </div>
                                </td>
                                <td style="padding:16px 20px;">
                                    <div style="display:flex;align-items:center;gap:10px;">
                                        <div style="width:32px;height:32px;min-width:32px;border-radius:50%;background:linear-gradient(135deg,#60a5fa,#34d399);display:flex;align-items:center;justify-content:center;color:white;font-weight:700;font-size:0.75rem;">
                                            {{ strtoupper(substr($post->user->name, 0, 1)) }}
                                        </div>
                                        <span style="font-weight:500;color:#374151;font-size:0.875rem;">{{ $post->user->name }}</span>
                                    </div>
                                </td>
                                <td style="padding:16px 20px;color:#6b7280;font-size:0.875rem;">{{ $post->created_at->diffForHumans() }}</td>
                                <td style="padding:16px 20px;">
                                    <span style="background:#f3f4f6;color:#374151;font-size:0.7rem;padding:4px 10px;border-radius:6px;font-weight:700;text-transform:uppercase;letter-spacing:0.05em;">
                                        {{ strtoupper(substr($post->category->nom ?? '—', 0, 6)) }}
                                    </span>
                                </td>
                                <td style="padding:16px 20px;">
                                    <div style="display:flex;gap:8px;">
                                        <form method="POST" action="{{ route('admin.posts.approuver', $post->id) }}" style="margin:0;">
                                            @csrf @method('PUT')
                                            <button style="background:#dcfce7;color:#16a34a;padding:6px 14px;border:none;border-radius:8px;font-size:0.8rem;font-weight:600;cursor:pointer;">Approuver</button>
                                        </form>
                                        <form method="POST" action="{{ route('admin.posts.rejeter', $post->id) }}" style="margin:0;">
                                            @csrf @method('PUT')
                                            <button style="background:#fee2e2;color:#dc2626;padding:6px 14px;border:none;border-radius:8px;font-size:0.8rem;font-weight:600;cursor:pointer;">Rejeter</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" style="text-align:center;color:#9ca3af;padding:40px;font-size:0.875rem;">Aucun article en attente.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    @if($postEnAttente->count() > 2)
                    <div style="text-align:center;padding:16px;border-top:1px solid #f3f4f6;">
                        <a href="#" style="color:#2563eb;font-size:0.875rem;font-weight:600;text-decoration:none;">
                            Voir les {{ $postEnAttente->count() - 2 }} autres articles en attente
                        </a>
                    </div>
                    @endif
                </div>
            </div>

            {{-- Commentaires signalés --}}
            <div x-show="tab === 'comments'" x-cloak>
                <div style="background:white;border-radius:12px;border:1px solid #f3f4f6;overflow:hidden;box-shadow:0 1px 3px rgba(0,0,0,0.04);">

                    {{-- Mobile --}}
                    <div class="admin-cards" style="display:none;">
                        @forelse($commentsSignales as $comment)
                        <div style="padding:16px;border-bottom:1px solid #f9fafb;">
                            <div style="display:flex;gap:10px;margin-bottom:10px;">
                                <div style="width:32px;height:32px;min-width:32px;border-radius:50%;background:linear-gradient(135deg,#60a5fa,#34d399);display:flex;align-items:center;justify-content:center;color:white;font-weight:700;font-size:0.75rem;">
                                    {{ strtoupper(substr($comment->nom, 0, 1)) }}
                                </div>
                                <div style="flex:1;min-width:0;">
                                    <p style="font-weight:600;color:#111827;font-size:0.875rem;margin:0 0 2px;">{{ $comment->nom }}</p>
                                    <p style="color:#9ca3af;font-size:0.75rem;margin:0;">{{ Str::limit($comment->post->titre ?? '—', 35) }}</p>
                                    <p style="color:#374151;font-size:0.8rem;margin:4px 0 0;">{{ Str::limit($comment->contenu, 70) }}</p>
                                </div>
                            </div>
                            <div style="display:flex;gap:8px;">
                                <form method="POST" action="{{ route('admin.comments.approuver', $comment->id) }}" style="flex:1;margin:0;">
                                    @csrf @method('PUT')
                                    <button style="width:100%;background:#dcfce7;color:#16a34a;padding:8px;border:none;border-radius:8px;font-size:0.8rem;font-weight:600;cursor:pointer;">✅ Approuver</button>
                                </form>
                                <form method="POST" action="{{ route('admin.comments.supprimer', $comment->id) }}" style="flex:1;margin:0;">
                                    @csrf @method('DELETE')
                                    <button style="width:100%;background:#fee2e2;color:#dc2626;padding:8px;border:none;border-radius:8px;font-size:0.8rem;font-weight:600;cursor:pointer;"
                                        onclick="return confirm('Supprimer ?')">🗑️ Supprimer</button>
                                </form>
                            </div>
                        </div>
                        @empty
                        <div style="text-align:center;padding:40px;color:#9ca3af;font-size:0.875rem;">Aucun commentaire signalé.</div>
                        @endforelse
                    </div>

                    {{-- Desktop --}}
                    <table class="admin-table" style="width:100%;border-collapse:collapse;">
                        <thead>
                            <tr style="background:#f9fafb;">
                                <th style="text-align:left;padding:12px 20px;font-size:0.7rem;color:#9ca3af;text-transform:uppercase;font-weight:600;letter-spacing:0.05em;">Commentaire</th>
                                <th style="text-align:left;padding:12px 20px;font-size:0.7rem;color:#9ca3af;text-transform:uppercase;font-weight:600;letter-spacing:0.05em;">Auteur</th>
                                <th style="text-align:left;padding:12px 20px;font-size:0.7rem;color:#9ca3af;text-transform:uppercase;font-weight:600;letter-spacing:0.05em;">Article</th>
                                <th style="text-align:left;padding:12px 20px;font-size:0.7rem;color:#9ca3af;text-transform:uppercase;font-weight:600;letter-spacing:0.05em;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($commentsSignales as $comment)
                            <tr style="border-top:1px solid #f3f4f6;">
                                <td style="padding:16px 20px;color:#374151;font-size:0.875rem;">{{ Str::limit($comment->contenu, 60) }}</td>
                                <td style="padding:16px 20px;color:#374151;font-size:0.875rem;font-weight:500;">{{ $comment->nom }}</td>
                                <td style="padding:16px 20px;color:#9ca3af;font-size:0.875rem;">{{ Str::limit($comment->post->titre ?? '—', 30) }}</td>
                                <td style="padding:16px 20px;">
                                    <div style="display:flex;gap:8px;">
                                        <form method="POST" action="{{ route('admin.comments.approuver', $comment->id) }}" style="margin:0;">
                                            @csrf @method('PUT')
                                            <button style="background:#dcfce7;color:#16a34a;padding:6px 14px;border:none;border-radius:8px;font-size:0.8rem;font-weight:600;cursor:pointer;">Approuver</button>
                                        </form>
                                        <form method="POST" action="{{ route('admin.comments.supprimer', $comment->id) }}" style="margin:0;">
                                            @csrf @method('DELETE')
                                            <button style="background:#fee2e2;color:#dc2626;padding:6px 14px;border:none;border-radius:8px;font-size:0.8rem;font-weight:600;cursor:pointer;"
                                                onclick="return confirm('Supprimer ?')">Supprimer</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" style="text-align:center;color:#9ca3af;padding:40px;font-size:0.875rem;">Aucun commentaire signalé.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Gestion utilisateurs --}}
            <div x-show="tab === 'users'" x-cloak>
                <div style="background:white;border-radius:12px;border:1px solid #f3f4f6;overflow:hidden;box-shadow:0 1px 3px rgba(0,0,0,0.04);">
                    <div style="display:flex;justify-content:space-between;align-items:center;padding:16px 20px;border-bottom:1px solid #f3f4f6;flex-wrap:wrap;gap:12px;">
                        <h2 style="font-weight:700;color:#111827;font-size:1.1rem;margin:0;">Gestion des Utilisateurs</h2>
                        <div style="position:relative;">
                            <svg style="width:16px;height:16px;position:absolute;left:10px;top:50%;transform:translateY(-50%);color:#9ca3af;" fill="none" stroke="#9ca3af" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            <input type="text" placeholder="Rechercher un utilisateur..."
                                style="padding:8px 12px 8px 32px;background:#f9fafb;border:1px solid #e5e7eb;border-radius:8px;font-size:0.8rem;outline:none;width:220px;">
                        </div>
                    </div>

                    {{-- Mobile --}}
                    <div class="admin-cards" style="display:none;">
                        @foreach($users as $user)
                        <div style="padding:16px;border-bottom:1px solid #f9fafb;">
                            <div style="display:flex;align-items:center;gap:12px;margin-bottom:12px;">
                                <div style="width:40px;height:40px;min-width:40px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-weight:700;color:white;font-size:0.8rem;background:{{ $user->role === 'admin' ? '#2563eb' : ($user->role === 'auteur' ? '#10b981' : '#9ca3af') }};">
                                    {{ strtoupper(substr($user->name, 0, 2)) }}
                                </div>
                                <div style="flex:1;min-width:0;">
                                    <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;">
                                        <p style="font-weight:700;color:#111827;font-size:0.875rem;margin:0;">{{ $user->name }}</p>
                                        @if($user->role === 'admin')
                                            <span style="background:#2563eb;color:white;font-size:0.65rem;padding:2px 8px;border-radius:20px;font-weight:700;text-transform:uppercase;">Admin</span>
                                        @elseif($user->role === 'auteur')
                                            <span style="background:#f3f4f6;color:#374151;font-size:0.65rem;padding:2px 8px;border-radius:20px;font-weight:700;text-transform:uppercase;">Auteur</span>
                                        @else
                                            <span style="background:#f3f4f6;color:#9ca3af;font-size:0.65rem;padding:2px 8px;border-radius:20px;font-weight:700;text-transform:uppercase;">Lecteur</span>
                                        @endif
                                    </div>
                                    <p style="color:#9ca3af;font-size:0.75rem;margin:2px 0 0;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">{{ $user->email }}</p>
                                </div>
                            </div>
                            <form method="POST" action="{{ route('admin.users.role', $user->id) }}" style="display:flex;gap:8px;margin:0;">
                                @csrf @method('PUT')
                                <select name="role" style="flex:1;padding:8px 12px;background:#f9fafb;border:1px solid #e5e7eb;border-radius:8px;font-size:0.8rem;outline:none;">
                                    <option value="lecteur" {{ $user->role === 'lecteur' ? 'selected' : '' }}>Lecteur</option>
                                    <option value="auteur" {{ $user->role === 'auteur' ? 'selected' : '' }}>Auteur</option>
                                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                                <button style="background:#dbeafe;color:#2563eb;padding:8px 16px;border:none;border-radius:8px;font-size:0.8rem;font-weight:600;cursor:pointer;">✓</button>
                            </form>
                        </div>
                        @endforeach
                    </div>

                    {{-- Desktop --}}
                    <table class="admin-table" style="width:100%;border-collapse:collapse;">
                        <thead>
                            <tr style="background:#f9fafb;">
                                <th style="text-align:left;padding:12px 20px;font-size:0.7rem;color:#9ca3af;text-transform:uppercase;font-weight:600;letter-spacing:0.05em;">Utilisateur</th>
                                <th style="text-align:left;padding:12px 20px;font-size:0.7rem;color:#9ca3af;text-transform:uppercase;font-weight:600;letter-spacing:0.05em;">Rôle</th>
                                <th style="text-align:left;padding:12px 20px;font-size:0.7rem;color:#9ca3af;text-transform:uppercase;font-weight:600;letter-spacing:0.05em;">Status</th>
                                <th style="text-align:left;padding:12px 20px;font-size:0.7rem;color:#9ca3af;text-transform:uppercase;font-weight:600;letter-spacing:0.05em;">Dernière activité</th>
                                <th style="text-align:left;padding:12px 20px;font-size:0.7rem;color:#9ca3af;text-transform:uppercase;font-weight:600;letter-spacing:0.05em;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr style="border-top:1px solid #f3f4f6;">
                                <td style="padding:16px 20px;">
                                    <div style="display:flex;align-items:center;gap:12px;">
                                        <div style="width:40px;height:40px;min-width:40px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-weight:700;color:white;font-size:0.8rem;background:{{ $user->role === 'admin' ? '#2563eb' : ($user->role === 'auteur' ? '#10b981' : '#9ca3af') }};">
                                            {{ strtoupper(substr($user->name, 0, 2)) }}
                                        </div>
                                        <div>
                                            <p style="font-weight:700;color:#111827;font-size:0.875rem;margin:0;">{{ $user->name }}</p>
                                            <p style="color:#9ca3af;font-size:0.8rem;margin:0;">{{ $user->email }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td style="padding:16px 20px;">
                                    @if($user->role === 'admin')
                                        <span style="background:#2563eb;color:white;font-size:0.7rem;padding:4px 12px;border-radius:20px;font-weight:700;text-transform:uppercase;">Admin</span>
                                    @elseif($user->role === 'auteur')
                                        <span style="background:#f3f4f6;color:#374151;font-size:0.7rem;padding:4px 12px;border-radius:20px;font-weight:700;text-transform:uppercase;">Auteur</span>
                                    @else
                                        <span style="background:#f3f4f6;color:#9ca3af;font-size:0.7rem;padding:4px 12px;border-radius:20px;font-weight:700;text-transform:uppercase;">Lecteur</span>
                                    @endif
                                </td>
                                <td style="padding:16px 20px;">
                                    <div style="display:flex;align-items:center;gap:6px;">
                                        <div style="width:8px;height:8px;border-radius:50%;background:#10b981;"></div>
                                        <span style="color:#374151;font-size:0.875rem;">En ligne</span>
                                    </div>
                                </td>
                                <td style="padding:16px 20px;color:#6b7280;font-size:0.875rem;">{{ $user->updated_at->diffForHumans() }}</td>
                                <td style="padding:16px 20px;">
                                    <form method="POST" action="{{ route('admin.users.role', $user->id) }}" style="display:flex;gap:8px;margin:0;align-items:center;">
                                        @csrf @method('PUT')
                                        <select name="role" style="padding:6px 10px;background:#f9fafb;border:1px solid #e5e7eb;border-radius:8px;font-size:0.8rem;outline:none;">
                                            <option value="lecteur" {{ $user->role === 'lecteur' ? 'selected' : '' }}>Lecteur</option>
                                            <option value="auteur" {{ $user->role === 'auteur' ? 'selected' : '' }}>Auteur</option>
                                            <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                        </select>
                                        <button style="background:#dbeafe;color:#2563eb;padding:6px 14px;border:none;border-radius:8px;font-size:0.8rem;font-weight:600;cursor:pointer;">✓</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection