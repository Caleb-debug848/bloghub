@extends('layouts.app')

@section('titre', 'Dashboard')

@section('contenu')

<div class="flex flex-col lg:flex-row gap-6">

    {{-- Sidebar --}}
    <div class="w-full lg:w-52 shrink-0">

        {{-- Avatar --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 text-center mb-4">
            <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-green-400 rounded-full flex items-center justify-center text-white text-xl font-bold mx-auto mb-3 overflow-hidden"
                style="width:64px;height:64px;min-width:64px;min-height:64px;border-radius:50%;">
                @if(auth()->user()->avatar)
                    <img src="{{ Storage::url(auth()->user()->avatar) }}"
                        style="width:64px;height:64px;object-fit:cover;border-radius:50%;">
                @else
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                @endif
            </div>
            <p class="font-bold text-gray-800 text-sm">{{ auth()->user()->name }}</p>
            <p class="text-xs text-gray-400 uppercase font-semibold mt-1">Espace Auteur</p>
            <p class="text-xs text-gray-500">Gérez vos publications</p>
        </div>

        {{-- Nav --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-3 mb-4">

            {{-- Mobile : grille 2x2 --}}
            <nav class="grid grid-cols-2 gap-2 lg:hidden">
                <a href="{{ route('dashboard') }}"
                    class="flex flex-col items-center gap-1 px-2 py-3 rounded-xl bg-blue-50 text-blue-600 font-semibold text-center">
                    <span class="text-xl">📊</span>
                    <span class="text-xs leading-tight">Tableau de bord</span>
                </a>
                <a href="{{ route('posts.mes') }}"
                    class="flex flex-col items-center gap-1 px-2 py-3 rounded-xl bg-gray-50 text-gray-600 hover:bg-gray-100 text-center">
                    <span class="text-xl">📄</span>
                    <span class="text-xs leading-tight">Mes Articles</span>
                </a>
                <a href="{{ route('posts.create') }}"
                    class="flex flex-col items-center gap-1 px-2 py-3 rounded-xl bg-gray-50 text-gray-600 hover:bg-gray-100 text-center">
                    <span class="text-xl">➕</span>
                    <span class="text-xs leading-tight">Nouvel Article</span>
                </a>
                <a href="{{ route('profile.edit') }}"
                    class="flex flex-col items-center gap-1 px-2 py-3 rounded-xl bg-gray-50 text-gray-600 hover:bg-gray-100 text-center">
                    <span class="text-xl">👤</span>
                    <span class="text-xs leading-tight">Mon Profil</span>
                </a>
            </nav>

            {{-- Desktop : liste verticale comme la maquette --}}
            <nav class="hidden lg:flex lg:flex-col lg:gap-1">
                <a href="{{ route('dashboard') }}"
                    class="flex items-center gap-3 px-3 py-2.5 rounded-xl bg-blue-50 text-blue-600 font-semibold">
                    <span class="text-lg">📊</span>
                    <span class="text-sm">Tableau de bord</span>
                </a>
                <a href="{{ route('posts.mes') }}"
                    class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600 hover:bg-gray-50">
                    <span class="text-lg">📄</span>
                    <span class="text-sm">Mes Articles</span>
                </a>
                <a href="{{ route('posts.create') }}"
                    class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600 hover:bg-gray-50">
                    <span class="text-lg">➕</span>
                    <span class="text-sm">Nouvel Article</span>
                </a>
                <a href="{{ route('profile.edit') }}"
                    class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600 hover:bg-gray-50">
                    <span class="text-lg">👤</span>
                    <span class="text-sm">Mon Profil</span>
                </a>
            </nav>
        </div>

        <a href="{{ route('posts.create') }}"
            class="w-full block text-center bg-gradient-to-r from-blue-500 to-green-500 text-white px-4 py-3 rounded-lg font-semibold hover:opacity-90 text-sm">
            ✏️ Publier maintenant
        </a>
    </div>

    {{-- Contenu principal --}}
    <div class="flex-1 min-w-0">

        {{-- Header --}}
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-3">
            <div>
                <h1 class="text-2xl lg:text-3xl font-bold text-gray-800">
                    Bienvenue, {{ explode(' ', auth()->user()->name)[0] }}
                </h1>
                <p class="text-gray-500 text-sm">Voici un aperçu de l'impact de vos écrits cette semaine.</p>
            </div>
            <div class="bg-white border border-gray-200 rounded-lg px-3 py-2 text-xs text-gray-600 flex items-center gap-2 shrink-0">
                📅 {{ now()->subDays(7)->format('d M') }} — {{ now()->format('d M Y') }}
            </div>
        </div>

        {{-- Stats --}}
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 mb-6">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
                <div class="flex justify-between items-start mb-3">
                    <div class="w-10 h-10 bg-blue-50 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <span class="text-green-500 text-xs font-semibold">+12%</span>
                </div>
                <p class="text-xs text-gray-400 uppercase font-semibold mb-1">Total Articles</p>
                <p class="text-2xl lg:text-3xl font-bold text-gray-800">{{ $posts->count() }}</p>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
                <div class="flex justify-between items-start mb-3">
                    <div class="w-10 h-10 bg-green-50 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                        </svg>
                    </div>
                    <span class="text-green-500 text-xs font-semibold">+5%</span>
                </div>
                <p class="text-xs text-gray-400 uppercase font-semibold mb-1">Total Likes</p>
                <p class="text-2xl lg:text-3xl font-bold text-gray-800">{{ $totalLikes }}</p>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
                <div class="flex justify-between items-start mb-3">
                    <div class="w-10 h-10 bg-purple-50 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                    </div>
                    <span class="text-red-500 text-xs font-semibold">-2%</span>
                </div>
                <p class="text-xs text-gray-400 uppercase font-semibold mb-1">Total Commentaires</p>
                <p class="text-2xl lg:text-3xl font-bold text-gray-800">{{ $totalComments }}</p>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 border-l-4 border-l-blue-500">
                <div class="flex justify-between items-start mb-3">
                    <div class="w-10 h-10 bg-blue-50 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </div>
                    <span class="text-green-500 text-xs font-semibold">+18%</span>
                </div>
                <p class="text-xs text-gray-400 uppercase font-semibold mb-1">Vues</p>
                <p class="text-2xl lg:text-3xl font-bold text-gray-800">—</p>
            </div>
        </div>

        {{-- Articles + Sidebar droite --}}
        <div class="flex flex-col lg:flex-row gap-6">

            {{-- Articles récents --}}
            <div class="flex-1 min-w-0">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 lg:p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-bold text-gray-800">Articles Récents</h2>
                        <a href="{{ route('posts.mes') }}" class="text-blue-500 text-sm hover:underline">Voir tout</a>
                    </div>

                    {{-- Mobile : cards --}}
                    <div class="block lg:hidden space-y-3">
                        @forelse($posts as $post)
                        <div class="border border-gray-100 rounded-xl p-3">
                            <div class="flex justify-between items-start gap-2 mb-2">
                                <p class="font-semibold text-gray-800 text-sm leading-tight flex-1">{{ Str::limit($post->titre, 45) }}</p>
                                @if($post->statut === 'publie')
                                    <span class="bg-green-100 text-green-600 text-xs px-2 py-0.5 rounded-full font-semibold shrink-0">Publié</span>
                                @elseif($post->statut === 'brouillon')
                                    <span class="bg-gray-100 text-gray-600 text-xs px-2 py-0.5 rounded-full font-semibold shrink-0">Brouillon</span>
                                @else
                                    <span class="bg-yellow-100 text-yellow-600 text-xs px-2 py-0.5 rounded-full font-semibold shrink-0">En attente</span>
                                @endif
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-xs text-gray-400">{{ $post->category->nom ?? '—' }} • {{ $post->created_at->format('d M Y') }}</span>
                                <div class="flex gap-3">
                                    <a href="{{ route('posts.edit', $post->id) }}" class="text-blue-500">✏️</a>
                                    <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-500"
                                            onclick="return confirm('Supprimer ?')">🗑️</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @empty
                        <p class="text-center text-gray-400 py-6 text-sm">Aucun article pour le moment.</p>
                        @endforelse
                    </div>

                    {{-- Desktop : tableau --}}
                    <div class="hidden lg:block">
                        <table class="w-full">
                            <thead>
                                <tr class="text-xs text-gray-400 uppercase border-b border-gray-100">
                                    <th class="text-left pb-3 font-semibold">Titre</th>
                                    <th class="text-left pb-3 font-semibold">Statut</th>
                                    <th class="text-left pb-3 font-semibold">Catégorie</th>
                                    <th class="text-left pb-3 font-semibold">Date</th>
                                    <th class="text-left pb-3 font-semibold">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($posts as $post)
                                <tr class="border-b border-gray-50 hover:bg-gray-50">
                                    <td class="py-4 text-gray-800 font-medium text-sm">{{ Str::limit($post->titre, 35) }}</td>
                                    <td class="py-4">
                                        @if($post->statut === 'publie')
                                            <span class="bg-green-100 text-green-700 text-xs px-3 py-1 rounded-full font-semibold uppercase">Publié</span>
                                        @elseif($post->statut === 'brouillon')
                                            <span class="bg-gray-100 text-gray-600 text-xs px-3 py-1 rounded-full font-semibold uppercase">Brouillon</span>
                                        @else
                                            <span class="bg-yellow-100 text-yellow-600 text-xs px-3 py-1 rounded-full font-semibold uppercase">En attente</span>
                                        @endif
                                    </td>
                                    <td class="py-4 text-gray-500 text-sm">{{ $post->category->nom ?? '—' }}</td>
                                    <td class="py-4 text-gray-400 text-sm">{{ $post->created_at->format('d M Y') }}</td>
                                    <td class="py-4">
                                        <div class="flex gap-2">
                                            <a href="{{ route('posts.edit', $post->id) }}"
                                                class="text-blue-400 hover:text-blue-600 text-lg">✏️</a>
                                            <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                                                @csrf @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-400 hover:text-red-600 text-lg"
                                                    onclick="return confirm('Supprimer ?')">🗑️</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center text-gray-400 py-10 text-sm">
                                        Aucun article pour le moment.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Sidebar droite --}}
            <div class="w-full lg:w-60 shrink-0 flex flex-col gap-4">

                {{-- Brouillon rapide --}}
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
                    <h3 class="font-bold text-gray-800 mb-3 text-sm">Brouillon rapide</h3>
                    <form method="POST" action="{{ route('posts.store') }}">
                        @csrf
                        <input type="hidden" name="statut" value="brouillon">
                        <input type="hidden" name="category_id" value="{{ App\Models\Category::first()->id ?? 1 }}">
                        <input type="text" name="titre" placeholder="Titre de l'idée..."
                            class="w-full px-3 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 mb-2">
                        <textarea name="contenu" rows="3" placeholder="Qu'avez-vous en tête ?"
                            class="w-full px-3 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 mb-3 resize-none"></textarea>
                        <button type="submit"
                            class="w-full bg-blue-600 text-white py-2.5 rounded-lg text-sm font-semibold hover:bg-blue-700">
                            Enregistrer le brouillon
                        </button>
                    </form>
                </div>

                {{-- Catégories tendances --}}
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
                    <h3 class="font-bold text-gray-800 mb-3 text-sm">Catégories Tendances</h3>
                    @foreach(App\Models\Category::withCount(['posts' => function($q){ $q->where('statut','publie'); }])->orderByDesc('posts_count')->take(3)->get() as $index => $cat)
                    <div class="flex justify-between items-center py-2 border-b border-gray-50 last:border-0">
                        <div class="flex items-center gap-2">
                            <div class="w-2.5 h-2.5 rounded-full {{ $index === 0 ? 'bg-blue-500' : ($index === 1 ? 'bg-green-500' : 'bg-gray-400') }}"></div>
                            <span class="text-gray-700 text-sm">{{ $cat->nom }}</span>
                        </div>
                        <span class="text-gray-500 text-sm font-medium">
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