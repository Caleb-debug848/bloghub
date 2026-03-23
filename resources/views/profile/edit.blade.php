@extends('layouts.app')

@section('titre', 'Mon Profil')

@section('contenu')

<div class="flex flex-col lg:flex-row gap-6">

    {{-- Sidebar --}}
    <div class="w-full lg:w-56 shrink-0">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 mb-4">
            <p class="text-xs text-gray-400 uppercase font-semibold mb-1">Espace Auteur</p>
            <p class="text-xs text-gray-500 mb-4">Gérez vos publications</p>
            <nav class="grid grid-cols-2 gap-2 lg:flex lg:flex-col lg:gap-1">
                <a href="{{ route('dashboard') }}"
                    class="flex flex-col lg:flex-row items-center lg:items-center gap-1 lg:gap-3 px-2 lg:px-3 py-3 lg:py-2 rounded-xl bg-gray-50 text-gray-600 hover:bg-gray-100 text-center lg:text-left transition-colors">
                    <span class="text-xl lg:text-base">📊</span>
                    <span class="text-xs lg:text-sm font-medium leading-tight">Tableau de bord</span>
                </a>
                <a href="{{ route('posts.mes') }}"
                    class="flex flex-col lg:flex-row items-center lg:items-center gap-1 lg:gap-3 px-2 lg:px-3 py-3 lg:py-2 rounded-xl bg-gray-50 text-gray-600 hover:bg-gray-100 text-center lg:text-left transition-colors">
                    <span class="text-xl lg:text-base">📄</span>
                    <span class="text-xs lg:text-sm font-medium leading-tight">Mes Articles</span>
                </a>
                <a href="{{ route('posts.create') }}"
                    class="flex flex-col lg:flex-row items-center lg:items-center gap-1 lg:gap-3 px-2 lg:px-3 py-3 lg:py-2 rounded-xl bg-gray-50 text-gray-600 hover:bg-gray-100 text-center lg:text-left transition-colors">
                    <span class="text-xl lg:text-base">➕</span>
                    <span class="text-xs lg:text-sm font-medium leading-tight">Nouvel Article</span>
                </a>
                <a href="{{ route('profile.edit') }}"
                    class="flex flex-col lg:flex-row items-center lg:items-center gap-1 lg:gap-3 px-2 lg:px-3 py-3 lg:py-2 rounded-xl bg-blue-50 text-blue-600 font-semibold text-center lg:text-left transition-colors">
                    <span class="text-xl lg:text-base">👤</span>
                    <span class="text-xs lg:text-sm leading-tight">Mon Profil</span>
                </a>
            </nav>
        </div>
    </div>

    {{-- Contenu --}}
    <div class="flex-1 min-w-0">

        <h1 class="text-2xl lg:text-3xl font-bold text-gray-800 mb-5">Mon Profil</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg mb-5 text-sm">
                ✅ {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 text-red-600 px-4 py-3 rounded-lg mb-5 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        {{-- Informations personnelles --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 lg:p-8 mb-5">
            <h2 class="text-lg font-bold text-gray-800 mb-5">Informations personnelles</h2>

            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf @method('PUT')

                {{-- Avatar --}}
                <div class="flex flex-col sm:flex-row items-center sm:items-start gap-4 mb-5">
                    <div class="w-20 h-20 bg-gradient-to-br from-blue-400 to-green-400 rounded-full flex items-center justify-center text-white text-2xl font-bold shrink-0 overflow-hidden">
                        @if(auth()->user()->avatar)
                            <img src="{{ Storage::url(auth()->user()->avatar) }}" class="w-full h-full object-cover">
                        @else
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        @endif
                    </div>
                    <div class="text-center sm:text-left">
                        <p class="font-semibold text-gray-800 mb-1">{{ auth()->user()->name }}</p>
                        <p class="text-gray-400 text-sm mb-2">{{ auth()->user()->email }}</p>
                        <label class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg cursor-pointer hover:bg-gray-200 font-semibold text-sm inline-block">
                            📷 Changer l'avatar
                            <input type="file" name="avatar" class="hidden" accept="image/*">
                        </label>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase mb-2">Nom complet</label>
                        <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 text-sm">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase mb-2">Email</label>
                        <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 text-sm">
                    </div>
                </div>

                <div class="mb-5">
                    <label class="block text-xs font-semibold text-gray-500 uppercase mb-2">Bio</label>
                    <textarea name="bio" rows="3"
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 text-sm resize-none"
                        placeholder="Parlez-nous de vous...">{{ old('bio', auth()->user()->bio) }}</textarea>
                </div>

                <button type="submit"
                    class="w-full sm:w-auto bg-gradient-to-r from-blue-500 to-green-500 text-white px-6 py-3 rounded-lg font-semibold hover:opacity-90 text-sm">
                    💾 Mettre à jour le profil
                </button>
            </form>
        </div>

        {{-- Mot de passe --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 lg:p-8">
            <h2 class="text-lg font-bold text-gray-800 mb-5">Changer le mot de passe</h2>

            <form method="POST" action="{{ route('profile.password') }}">
                @csrf @method('PUT')

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-5">
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase mb-2">Mot de passe actuel</label>
                        <div class="relative">
                            <input type="password" name="current_password" id="current_password"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 text-sm pr-10">
                            <button type="button" onclick="togglePwd('current_password','eye1')"
                                class="absolute right-3 top-3 text-gray-400 hover:text-gray-600">
                                <span id="eye1">👁️</span>
                            </button>
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase mb-2">Nouveau mot de passe</label>
                        <div class="relative">
                            <input type="password" name="password" id="new_password"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 text-sm pr-10">
                            <button type="button" onclick="togglePwd('new_password','eye2')"
                                class="absolute right-3 top-3 text-gray-400 hover:text-gray-600">
                                <span id="eye2">👁️</span>
                            </button>
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase mb-2">Confirmer</label>
                        <div class="relative">
                            <input type="password" name="password_confirmation" id="confirm_password"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 text-sm pr-10">
                            <button type="button" onclick="togglePwd('confirm_password','eye3')"
                                class="absolute right-3 top-3 text-gray-400 hover:text-gray-600">
                                <span id="eye3">👁️</span>
                            </button>
                        </div>
                    </div>
                </div>

                <button type="submit"
                    class="w-full sm:w-auto bg-gray-800 text-white px-6 py-3 rounded-lg font-semibold hover:bg-gray-900 text-sm">
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