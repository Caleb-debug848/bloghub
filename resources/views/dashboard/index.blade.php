@extends('layouts.app')

@section('titre', 'Dashboard')

@section('contenu')

<div class="flex flex-col lg:flex-row gap-6">

    {{-- Sidebar --}}
    <div class="w-full lg:w-64 shrink-0">

        {{-- Avatar --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 text-center mb-4">
<div class="w-20 h-20 bg-gradient-to-br from-blue-400 to-green-400 rounded-full flex items-center justify-center text-white text-2xl font-bold mx-auto mb-3 overflow-hidden" style="min-width:80px; min-height:80px; max-width:80px; max-height:80px;">                @if(auth()->user()->avatar)
                    <img src="{{ Storage::url(auth()->user()->avatar) }}" class="w-full h-full object-cover">
                @else
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                @endif
            </div>
            <p class="font-bold text-gray-800 text-sm lg:text-base">{{ auth()->user()->name }}</p>
            <p class="text-xs text-gray-400 uppercase font-semibold mt-1">Espace Auteur</p>
            <p class="text-xs text-gray-500 mt-0.5">Gérez vos publications</p>
        </div>

        {{-- Nav --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 mb-4">
            {{-- Mobile : grille 2x2 | Desktop : liste verticale --}}
            <nav class="grid grid-cols-2 gap-2 lg:flex lg:flex-col lg:gap-1">
                <a href="{{ route('dashboard') }}"
                    class="flex flex-col lg:flex-row items-center lg:items-center gap-1 lg:gap-3 px-2 lg:px-3 py-3 lg:py-2 rounded-xl bg-blue-50 text-blue-600 font-semibold text-center lg:text-left transition-colors">
                    <span class="text-xl lg:text-base">📊</span>
                    <span class="text-xs lg:text-sm leading-tight">Tableau de bord</span>
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
                    class="flex flex-col lg:flex-row items-center lg:items-center gap-1 lg:gap-3 px-2 lg:px-3 py-3 lg:py-2 rounded-xl bg-gray-50 text-gray-600 hover:bg-gray-100 text-center lg:text-left transition-colors">
                    <span class="text-xl lg:text-base">👤</span>
                    <span class="text-xs lg:text-sm font-medium leading-tight">Mon Profil</span>
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
                <div class="flex justify-between items-start mb-2">
                    <div class="w-9 h-9 lg:w-11 lg:h-11 bg-blue-100 rounded-xl flex items-center justify-center text-lg lg:text-xl">📄</div>
                    <span class="text-green-500 text-xs font-semibold">+12%</span>
                </div>
                <p class="text-xs text-gray-400 uppercase font-semibold mb-1">Articles</p>
                <p class="text-2xl lg:text-3xl font-bold text-gray-800">{{ $posts->count() }}</p>
            </div>
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
                <div class="flex justify-between items-start mb-2">
                    <div class="w-9 h-9 lg:w-11 lg:h-11 bg-green-100 rounded-xl flex items-center justify-center text-lg lg:text-xl">❤️</div>
                    <span class="text-green-500 text-xs font-semibold">+5%</span>
                </div>
                <p class="text-xs text-gray-400 uppercase font-semibold mb-1">Likes</p>
                <p class="text-2xl lg:text-3xl font-bold text-gray-800">{{ $totalLikes }}</p>
            </div>
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
                <div class="flex justify-between items-start mb-2">
                    <div class="w-9 h-9 lg:w-11 lg:h-11 bg-purple-100 rounded-xl flex items-center justify-center text-lg lg:text-xl">💬</div>
                    <span class="text-red-500 text-xs font-semibold">-2%</span>
                </div>
                <p class="text-xs text-gray-400 uppercase font-semibold mb-1">Commentaires</p>
                <p class="text-2xl lg:text-3xl font-bold text-gray-800">{{ $totalComments }}</p>
            </div>
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 border-l-4 border-l-blue-500">
                <div class="flex justify-between items-start mb-2">
                    <div class="w-9 h-9 lg:w-11 lg:h-11 bg-blue-100 rounded-xl flex items-center justify-center text-lg lg:text-xl">👁️</div>
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
                            <div class="flex justify-between items-start mb-2 gap-2">
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
                                    <a href="{{ route('posts.edit', $post->id) }}" class="text-blue-500 text-sm">✏️</a>
                                    <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-500 text-sm"
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
                                    <th class="text-left pb-3">Titre</th>
                                    <th class="text-left pb-3">Statut</th>
                                    <th class="text-left pb-3">Catégorie</th>
                                    <th class="text-left pb-3">Date</th>
                                    <th class="text-left pb-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($posts as $post)
                                <tr class="border-b border-gray-50 hover:bg-gray-50">
                                    <td class="py-4 text-gray-800 font-medium text-sm">{{ Str::limit($post->titre, 35) }}</td>
                                    <td class="py-4">
                                        @if($post->statut === 'publie')
                                            <span class="bg-green-100 text-green-600 text-xs px-2 py-1 rounded-full font-semibold">Publié</span>
                                        @elseif($post->statut === 'brouillon')
                                            <span class="bg-gray-100 text-gray-600 text-xs px-2 py-1 rounded-full font-semibold">Brouillon</span>
                                        @else
                                            <span class="bg-yellow-100 text-yellow-600 text-xs px-2 py-1 rounded-full font-semibold">En attente</span>
                                        @endif
                                    </td>
                                    <td class="py-4 text-gray-500 text-sm">{{ $post->category->nom ?? '—' }}</td>
                                    <td class="py-4 text-gray-400 text-sm">{{ $post->created_at->format('d M Y') }}</td>
                                    <td class="py-4">
                                        <div class="flex gap-2">
                                            <a href="{{ route('posts.edit', $post->id) }}" class="text-blue-500 hover:text-blue-700">✏️</a>
                                            <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700"
                                                    onclick="return confirm('Supprimer ?')">🗑️</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center text-gray-400 py-8 text-sm">Aucun article.</td>
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
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 lg:p-5">
                    <h3 class="font-bold text-gray-800 mb-3 text-sm">Brouillon rapide</h3>
                    <form method="POST" action="{{ route('posts.store') }}">
                        @csrf
                        <input type="hidden" name="statut" value="brouillon">
                        <input type="hidden" name="category_id" value="{{ App\Models\Category::first()->id ?? 1 }}">
                        <input type="text" name="titre" placeholder="Titre de l'idée..."
                            class="w-full px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 mb-2">
                        <textarea name="contenu" rows="3" placeholder="Qu'avez-vous en tête ?"
                            class="w-full px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 mb-3 resize-none"></textarea>
                        <button type="submit"
                            class="w-full bg-blue-600 text-white py-2 rounded-lg text-sm font-semibold hover:bg-blue-700">
                            Enregistrer le brouillon
                        </button>
                    </form>
                </div>

                {{-- Catégories tendances --}}
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 lg:p-5">
                    <h3 class="font-bold text-gray-800 mb-3 text-sm">Catégories Tendances</h3>
                    @foreach(App\Models\Category::withCount(['posts' => function($q){ $q->where('statut','publie'); }])->orderByDesc('posts_count')->take(3)->get() as $index => $cat)
                    <div class="flex justify-between items-center py-2 border-b border-gray-50 last:border-0">
                        <div class="flex items-center gap-2">
                            <div class="w-2.5 h-2.5 rounded-full {{ $index === 0 ? 'bg-blue-500' : ($index === 1 ? 'bg-green-500' : 'bg-gray-400') }}"></div>
                            <span class="text-gray-700 text-sm">{{ $cat->nom }}</span>
                        </div>
                        <span class="text-gray-400 text-sm font-medium">
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