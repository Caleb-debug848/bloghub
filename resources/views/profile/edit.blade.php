@extends('layouts.app')

@section('titre', 'Mon Profil')

@section('contenu')

<style>
.profile-wrapper { display:flex; flex-direction:row; gap:1.5rem; align-items:flex-start; }
.profile-sidebar { width:210px; min-width:210px; flex-shrink:0; }
.profile-main { flex:1; min-width:0; }

.profile-nav-item { display:flex; align-items:center; gap:12px; padding:10px 12px; border-radius:10px; color:#4b5563; font-size:0.875rem; text-decoration:none; margin-bottom:2px; transition:background 0.15s; }
.profile-nav-item:hover { background:#f9fafb; }
.profile-nav-item.active { background:#eff6ff; color:#2563eb; font-weight:600; }

@media (max-width:1024px) {
    .profile-wrapper { flex-direction:column; }
    .profile-sidebar { width:100%; min-width:100%; }
    .profile-nav-desktop { display:none !important; }
    .profile-nav-mobile { display:grid !important; grid-template-columns:repeat(4,1fr); gap:8px; background:white; border-radius:12px; border:1px solid #f3f4f6; padding:12px; margin-bottom:12px; }
    .profile-grid { grid-template-columns:1fr !important; }
}
@media (min-width:1025px) {
    .profile-nav-mobile { display:none; }
    .profile-nav-desktop { display:block; }
}
</style>

<div class="profile-wrapper">

    {{-- Sidebar --}}
    <div class="profile-sidebar">

        <div style="background:white;border-radius:12px;border:1px solid #f3f4f6;padding:16px;margin-bottom:12px;">
            <p style="font-size:0.65rem;color:#9ca3af;text-transform:uppercase;font-weight:600;margin:0 0 2px;">Espace Auteur</p>
            <p style="font-size:0.75rem;color:#6b7280;margin:0 0 16px;">Gérez vos publications</p>

            {{-- Nav Desktop --}}
            <div class="profile-nav-desktop">
                <a href="{{ route('dashboard') }}" class="profile-nav-item">
                    <svg style="width:18px;height:18px;flex-shrink:0;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                    Tableau de bord
                </a>
                <a href="{{ route('posts.mes') }}" class="profile-nav-item">
                    <svg style="width:18px;height:18px;flex-shrink:0;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Mes Articles
                </a>
                <a href="{{ route('posts.create') }}" class="profile-nav-item">
                    <svg style="width:18px;height:18px;flex-shrink:0;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Nouvel Article
                </a>
                <a href="{{ route('profile.edit') }}" class="profile-nav-item active">
                    <svg style="width:18px;height:18px;flex-shrink:0;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    Mon Profil
                </a>
            </div>
        </div>

        {{-- Nav Mobile --}}
        <div class="profile-nav-mobile" style="display:none;">
            <a href="{{ route('dashboard') }}" style="display:flex;flex-direction:column;align-items:center;gap:4px;padding:10px 4px;border-radius:10px;text-decoration:none;color:#4b5563;font-size:0.65rem;text-align:center;background:#f9fafb;">
                <svg style="width:20px;height:20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
                Tableau de bord
            </a>
            <a href="{{ route('posts.mes') }}" style="display:flex;flex-direction:column;align-items:center;gap:4px;padding:10px 4px;border-radius:10px;text-decoration:none;color:#4b5563;font-size:0.65rem;text-align:center;background:#f9fafb;">
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
            <a href="{{ route('profile.edit') }}" style="display:flex;flex-direction:column;align-items:center;gap:4px;padding:10px 4px;border-radius:10px;text-decoration:none;color:#2563eb;font-size:0.65rem;text-align:center;background:#eff6ff;font-weight:600;">
                <svg style="width:20px;height:20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
                Mon Profil
            </a>
        </div>

    </div>

    {{-- Contenu --}}
    <div class="profile-main">

        <h1 style="font-size:1.875rem;font-weight:800;color:#111827;margin:0 0 1.5rem;">Mon Profil</h1>

        @if(session('success'))
            <div style="background:#f0fdf4;color:#16a34a;padding:12px 16px;border-radius:8px;margin-bottom:1.5rem;font-size:0.875rem;border:1px solid #bbf7d0;">
                ✅ {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div style="background:#fef2f2;color:#dc2626;padding:12px 16px;border-radius:8px;margin-bottom:1.5rem;font-size:0.875rem;">
                {{ $errors->first() }}
            </div>
        @endif

        {{-- Informations personnelles --}}
        <div style="background:white;border-radius:12px;border:1px solid #f3f4f6;padding:24px;box-shadow:0 1px 3px rgba(0,0,0,0.04);margin-bottom:1.5rem;">
            <h2 style="font-size:1.1rem;font-weight:700;color:#111827;margin:0 0 20px;">Informations personnelles</h2>

            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf @method('PUT')

                {{-- Avatar --}}
                <div style="display:flex;flex-wrap:wrap;align-items:center;gap:20px;margin-bottom:20px;padding-bottom:20px;border-bottom:1px solid #f3f4f6;">
                    <div style="width:72px;height:72px;min-width:72px;border-radius:50%;background:linear-gradient(135deg,#60a5fa,#34d399);display:flex;align-items:center;justify-content:center;color:white;font-size:1.5rem;font-weight:700;overflow:hidden;">
                        @if(auth()->user()->avatar)
                            <img src="{{ Storage::url(auth()->user()->avatar) }}"
                                style="width:72px;height:72px;object-fit:cover;border-radius:50%;">
                        @else
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        @endif
                    </div>
                    <div>
                        <p style="font-weight:700;color:#111827;margin:0 0 2px;">{{ auth()->user()->name }}</p>
                        <p style="color:#9ca3af;font-size:0.8rem;margin:0 0 10px;">{{ auth()->user()->email }}</p>
                        <label style="background:#f3f4f6;color:#374151;padding:8px 16px;border-radius:8px;cursor:pointer;font-weight:600;font-size:0.8rem;display:inline-block;">
                            📷 Changer l'avatar
                            <input type="file" name="avatar" style="display:none;" accept="image/*">
                        </label>
                    </div>
                </div>

                {{-- Champs --}}
                <div class="profile-grid" style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:16px;">
                    <div>
                        <p style="font-size:0.65rem;color:#9ca3af;text-transform:uppercase;font-weight:600;letter-spacing:0.05em;margin:0 0 6px;">Nom complet</p>
                        <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}"
                            style="width:100%;padding:10px 14px;background:#f9fafb;border:1px solid #e5e7eb;border-radius:8px;font-size:0.875rem;outline:none;box-sizing:border-box;color:#111827;">
                    </div>
                    <div>
                        <p style="font-size:0.65rem;color:#9ca3af;text-transform:uppercase;font-weight:600;letter-spacing:0.05em;margin:0 0 6px;">Email</p>
                        <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}"
                            style="width:100%;padding:10px 14px;background:#f9fafb;border:1px solid #e5e7eb;border-radius:8px;font-size:0.875rem;outline:none;box-sizing:border-box;color:#111827;">
                    </div>
                </div>

                <div style="margin-bottom:20px;">
                    <p style="font-size:0.65rem;color:#9ca3af;text-transform:uppercase;font-weight:600;letter-spacing:0.05em;margin:0 0 6px;">Bio</p>
                    <textarea name="bio" rows="3"
                        placeholder="Parlez-nous de vous..."
                        style="width:100%;padding:10px 14px;background:#f9fafb;border:1px solid #e5e7eb;border-radius:8px;font-size:0.875rem;outline:none;resize:none;box-sizing:border-box;color:#111827;font-family:inherit;">{{ old('bio', auth()->user()->bio) }}</textarea>
                </div>

                <button type="submit"
                    style="background:linear-gradient(to right,#3b82f6,#10b981);color:white;padding:10px 24px;border:none;border-radius:8px;font-size:0.875rem;font-weight:600;cursor:pointer;">
                    💾 Mettre à jour le profil
                </button>
            </form>
        </div>

        {{-- Changer mot de passe --}}
        <div style="background:white;border-radius:12px;border:1px solid #f3f4f6;padding:24px;box-shadow:0 1px 3px rgba(0,0,0,0.04);">
            <h2 style="font-size:1.1rem;font-weight:700;color:#111827;margin:0 0 20px;">Changer le mot de passe</h2>

            <form method="POST" action="{{ route('profile.password') }}">
                @csrf @method('PUT')

                <div class="profile-grid" style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:16px;margin-bottom:20px;">

                    {{-- Mot de passe actuel --}}
                    <div>
                        <p style="font-size:0.65rem;color:#9ca3af;text-transform:uppercase;font-weight:600;letter-spacing:0.05em;margin:0 0 6px;">Mot de passe actuel</p>
                        <div style="position:relative;">
                            <input type="password" name="current_password" id="pwd1"
                                style="width:100%;padding:10px 40px 10px 14px;background:#f9fafb;border:1px solid #e5e7eb;border-radius:8px;font-size:0.875rem;outline:none;box-sizing:border-box;color:#111827;">
                            <button type="button" onclick="togglePwd('pwd1','eye1')"
                                style="position:absolute;right:10px;top:50%;transform:translateY(-50%);background:none;border:none;cursor:pointer;color:#9ca3af;font-size:1rem;">
                                <span id="eye1">👁️</span>
                            </button>
                        </div>
                    </div>

                    {{-- Nouveau --}}
                    <div>
                        <p style="font-size:0.65rem;color:#9ca3af;text-transform:uppercase;font-weight:600;letter-spacing:0.05em;margin:0 0 6px;">Nouveau mot de passe</p>
                        <div style="position:relative;">
                            <input type="password" name="password" id="pwd2"
                                style="width:100%;padding:10px 40px 10px 14px;background:#f9fafb;border:1px solid #e5e7eb;border-radius:8px;font-size:0.875rem;outline:none;box-sizing:border-box;color:#111827;">
                            <button type="button" onclick="togglePwd('pwd2','eye2')"
                                style="position:absolute;right:10px;top:50%;transform:translateY(-50%);background:none;border:none;cursor:pointer;color:#9ca3af;font-size:1rem;">
                                <span id="eye2">👁️</span>
                            </button>
                        </div>
                    </div>

                    {{-- Confirmer --}}
                    <div>
                        <p style="font-size:0.65rem;color:#9ca3af;text-transform:uppercase;font-weight:600;letter-spacing:0.05em;margin:0 0 6px;">Confirmer</p>
                        <div style="position:relative;">
                            <input type="password" name="password_confirmation" id="pwd3"
                                style="width:100%;padding:10px 40px 10px 14px;background:#f9fafb;border:1px solid #e5e7eb;border-radius:8px;font-size:0.875rem;outline:none;box-sizing:border-box;color:#111827;">
                            <button type="button" onclick="togglePwd('pwd3','eye3')"
                                style="position:absolute;right:10px;top:50%;transform:translateY(-50%);background:none;border:none;cursor:pointer;color:#9ca3af;font-size:1rem;">
                                <span id="eye3">👁️</span>
                            </button>
                        </div>
                    </div>
                </div>

                <button type="submit"
                    style="background:#111827;color:white;padding:10px 24px;border:none;border-radius:8px;font-size:0.875rem;font-weight:600;cursor:pointer;">
                    🔒 Changer le mot de passe
                </button>
            </form>
        </div>

    </div>
</div>

<script>
function togglePwd(inputId, eyeId) {
    const input = document.getElementById(inputId);
    const eye = document.getElementById(eyeId);
    if (input.type === 'password') {
        input.type = 'text';
        eye.textContent = '🙈';
    } else {
        input.type = 'password';
        eye.textContent = '👁️';
    }
}
</script>

@endsection