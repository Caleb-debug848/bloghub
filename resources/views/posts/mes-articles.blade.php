@extends('layouts.app')
@section('titre', 'Mes Articles')
@section('contenu')

<style>
.mes-wrapper { display:flex; flex-direction:row; gap:1.5rem; align-items:flex-start; }
.mes-sidebar { width:210px; min-width:210px; flex-shrink:0; }
.mes-main { flex:1; min-width:0; }

.mes-nav-box { background:white; border-radius:12px; border:1px solid #f3f4f6; padding:12px; margin-bottom:12px; }
.mes-nav-item { display:flex; align-items:center; gap:12px; padding:10px 12px; border-radius:10px; color:#4b5563; font-size:0.875rem; text-decoration:none; margin-bottom:2px; transition:background 0.15s; }
.mes-nav-item:hover { background:#f9fafb; }
.mes-nav-item.active { background:#eff6ff; color:#2563eb; font-weight:600; }

@media (max-width:1024px) {
    .mes-wrapper { flex-direction:column; }
    .mes-sidebar { width:100%; min-width:100%; }
    .mes-nav-box { display:none; }
    .mes-nav-mobile { display:grid !important; grid-template-columns:repeat(4,1fr); gap:8px; background:white; border-radius:12px; border:1px solid #f3f4f6; padding:12px; margin-bottom:12px; }
    .mes-table { display:none !important; }
    .mes-cards { display:block !important; }
}
@media (min-width:1025px) {
    .mes-nav-mobile { display:none; }
    .mes-cards { display:none; }
    .mes-table { display:table !important; }
}
</style>

<div class="mes-wrapper">

    {{-- Sidebar --}}
    <div class="mes-sidebar">
        <div style="background:white;border-radius:12px;border:1px solid #f3f4f6;padding:16px;margin-bottom:12px;">
            <p style="font-size:0.65rem;color:#9ca3af;text-transform:uppercase;font-weight:600;letter-spacing:0.05em;margin:0 0 2px;">Espace Auteur</p>
            <p style="font-size:0.75rem;color:#6b7280;margin:0 0 16px;">Gérez vos publications</p>

            {{-- Nav Desktop --}}
            <div class="mes-nav-box" style="padding:8px;margin:0;">
                <a href="{{ route('dashboard') }}" class="mes-nav-item">
                    <svg style="width:18px;height:18px;flex-shrink:0;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                    Tableau de bord
                </a>
                <a href="{{ route('posts.mes') }}" class="mes-nav-item active">
                    <svg style="width:18px;height:18px;flex-shrink:0;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Mes Articles
                </a>
                <a href="{{ route('posts.create') }}" class="mes-nav-item">
                    <svg style="width:18px;height:18px;flex-shrink:0;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Nouvel Article
                </a>
                <a href="{{ route('profile.edit') }}" class="mes-nav-item">
                    <svg style="width:18px;height:18px;flex-shrink:0;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    Mon Profil
                </a>
            </div>

            {{-- Nav Mobile --}}
            <div class="mes-nav-mobile" style="display:none;">
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
        </div>
    </div>

    {{-- Contenu --}}
    <div class="mes-main">

        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1.5rem;flex-wrap:wrap;gap:12px;">
            <h1 style="font-size:1.875rem;font-weight:800;color:#111827;margin:0;">Mes Articles</h1>
            <a href="{{ route('posts.create') }}"
                style="background:linear-gradient(to right,#3b82f6,#10b981);color:white;padding:10px 20px;border-radius:10px;font-weight:600;font-size:0.875rem;text-decoration:none;white-space:nowrap;">
                ➕ Nouvel Article
            </a>
        </div>

        <div style="background:white;border-radius:12px;border:1px solid #f3f4f6;padding:24px;box-shadow:0 1px 3px rgba(0,0,0,0.04);">

            {{-- Mobile : cards --}}
            <div class="mes-cards" style="display:none;">
                @forelse($posts as $post)
                <div style="border:1px solid #f3f4f6;border-radius:10px;padding:14px;margin-bottom:10px;">
                    <div style="display:flex;justify-content:space-between;align-items:flex-start;gap:8px;margin-bottom:8px;">
                        <p style="font-weight:600;color:#111827;font-size:0.875rem;margin:0;flex:1;">{{ Str::limit($post->titre, 55) }}</p>
                        @if($post->statut === 'publie')
                            <span style="background:#dcfce7;color:#16a34a;font-size:0.65rem;padding:3px 8px;border-radius:20px;font-weight:700;white-space:nowrap;">Publié</span>
                        @elseif($post->statut === 'brouillon')
                            <span style="background:#f3f4f6;color:#6b7280;font-size:0.65rem;padding:3px 8px;border-radius:20px;font-weight:700;white-space:nowrap;">Brouillon</span>
                        @else
                            <span style="background:#fef9c3;color:#ca8a04;font-size:0.65rem;padding:3px 8px;border-radius:20px;font-weight:700;white-space:nowrap;">En attente</span>
                        @endif
                    </div>
                    <p style="color:#9ca3af;font-size:0.75rem;margin:0 0 12px;">
                        {{ $post->category->nom ?? '—' }} • {{ $post->created_at->format('d M Y') }}
                    </p>
                    <div style="display:flex;gap:8px;">
                        <a href="{{ route('posts.edit', $post->id) }}"
                            style="flex:1;text-align:center;background:#eff6ff;color:#2563eb;padding:8px;border-radius:8px;font-size:0.8rem;font-weight:600;text-decoration:none;">
                            ✏️ Modifier
                        </a>
                        <form method="POST" action="{{ route('posts.destroy', $post->id) }}" style="flex:1;margin:0;">
                            @csrf @method('DELETE')
                            <button type="submit"
                                style="width:100%;background:#fef2f2;color:#ef4444;padding:8px;border:none;border-radius:8px;font-size:0.8rem;font-weight:600;cursor:pointer;"
                                onclick="return confirm('Supprimer cet article ?')">
                                🗑️ Supprimer
                            </button>
                        </form>
                    </div>
                </div>
                @empty
                <div style="text-align:center;padding:40px 0;">
                    <p style="font-size:2rem;margin-bottom:8px;">📭</p>
                    <p style="color:#9ca3af;font-size:0.875rem;margin:0 0 12px;">Aucun article pour le moment.</p>
                    <a href="{{ route('posts.create') }}" style="color:#3b82f6;font-size:0.875rem;">Créer mon premier article →</a>
                </div>
                @endforelse
            </div>

            {{-- Desktop : tableau --}}
            <table class="mes-table" style="width:100%;border-collapse:collapse;">
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
                        <td style="padding:14px 0;font-weight:500;color:#111827;font-size:0.875rem;">{{ Str::limit($post->titre, 45) }}</td>
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
                                <a href="{{ route('posts.edit', $post->id) }}"
                                    style="background:#eff6ff;color:#2563eb;padding:6px 12px;border-radius:8px;font-size:0.8rem;font-weight:600;text-decoration:none;">✏️</a>
                                <form method="POST" action="{{ route('posts.destroy', $post->id) }}" style="margin:0;">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                        style="background:#fef2f2;color:#ef4444;padding:6px 12px;border-radius:8px;font-size:0.8rem;font-weight:600;border:none;cursor:pointer;"
                                        onclick="return confirm('Supprimer ?')">🗑️</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" style="text-align:center;color:#9ca3af;padding:40px 0;font-size:0.875rem;">
                            Aucun article pour le moment.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <div style="margin-top:16px;">{{ $posts->links() }}</div>
        </div>
    </div>
</div>

@endsection