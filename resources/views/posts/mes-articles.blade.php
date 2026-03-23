@extends('layouts.app')
@section('titre', 'Mes Articles')
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
                    class="flex flex-col lg:flex-row items-center lg:items-center gap-1 lg:gap-3 px-2 lg:px-3 py-3 lg:py-2 rounded-xl bg-blue-50 text-blue-600 font-semibold text-center lg:text-left transition-colors">
                    <span class="text-xl lg:text-base">📄</span>
                    <span class="text-xs lg:text-sm leading-tight">Mes Articles</span>
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
    </div>

    {{-- Contenu --}}
    <div class="flex-1 min-w-0">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-3">
            <h1 class="text-2xl lg:text-3xl font-bold text-gray-800">Mes Articles</h1>
            <a href="{{ route('posts.create') }}"
                class="bg-gradient-to-r from-blue-500 to-green-500 text-white px-4 py-2 rounded-lg font-semibold hover:opacity-90 text-sm shrink-0">
                ➕ Nouvel Article
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 lg:p-6">

            {{-- Mobile : cards --}}
            <div class="block lg:hidden space-y-3">
                @forelse($posts as $post)
                <div class="border border-gray-100 rounded-xl p-4">
                    <div class="flex justify-between items-start gap-2 mb-2">
                        <p class="font-semibold text-gray-800 text-sm leading-tight flex-1">{{ Str::limit($post->titre, 55) }}</p>
                        @if($post->statut === 'publie')
                            <span class="bg-green-100 text-green-600 text-xs px-2 py-0.5 rounded-full font-semibold shrink-0">Publié</span>
                        @elseif($post->statut === 'brouillon')
                            <span class="bg-gray-100 text-gray-600 text-xs px-2 py-0.5 rounded-full font-semibold shrink-0">Brouillon</span>
                        @else
                            <span class="bg-yellow-100 text-yellow-600 text-xs px-2 py-0.5 rounded-full font-semibold shrink-0">En attente</span>
                        @endif
                    </div>
                    <p class="text-xs text-gray-400 mb-3">
                        {{ $post->category->nom ?? '—' }} • {{ $post->created_at->format('d M Y') }}
                    </p>
                    <div class="flex gap-2">
                        <a href="{{ route('posts.edit', $post->id) }}"
                            class="flex-1 text-center bg-blue-50 text-blue-600 px-3 py-2 rounded-lg text-sm font-semibold hover:bg-blue-100">
                            ✏️ Modifier
                        </a>
                        <form method="POST" action="{{ route('posts.destroy', $post->id) }}" class="flex-1">
                            @csrf @method('DELETE')
                            <button type="submit"
                                class="w-full bg-red-50 text-red-600 px-3 py-2 rounded-lg text-sm font-semibold hover:bg-red-100"
                                onclick="return confirm('Supprimer cet article ?')">
                                🗑️ Supprimer
                            </button>
                        </form>
                    </div>
                </div>
                @empty
                <div class="text-center py-10">
                    <p class="text-3xl mb-3">📭</p>
                    <p class="text-gray-400 text-sm">Aucun article pour le moment.</p>
                    <a href="{{ route('posts.create') }}" class="text-blue-500 text-sm hover:underline mt-2 inline-block">
                        Créer mon premier article →
                    </a>
                </div>
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
                            <td class="py-4 text-gray-800 font-medium">{{ Str::limit($post->titre, 50) }}</td>
                            <td class="py-4">
                                @if($post->statut === 'publie')
                                    <span class="bg-green-100 text-green-600 text-xs px-3 py-1 rounded-full font-semibold">Publié</span>
                                @elseif($post->statut === 'brouillon')
                                    <span class="bg-gray-100 text-gray-600 text-xs px-3 py-1 rounded-full font-semibold">Brouillon</span>
                                @else
                                    <span class="bg-yellow-100 text-yellow-600 text-xs px-3 py-1 rounded-full font-semibold">En attente</span>
                                @endif
                            </td>
                            <td class="py-4 text-gray-500 text-sm">{{ $post->category->nom ?? '—' }}</td>
                            <td class="py-4 text-gray-400 text-sm">{{ $post->created_at->format('d M Y') }}</td>
                            <td class="py-4">
                                <div class="flex gap-2">
                                    <a href="{{ route('posts.edit', $post->id) }}"
                                        class="bg-blue-50 text-blue-600 px-3 py-1 rounded-lg text-sm font-semibold hover:bg-blue-100">✏️</a>
                                    <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-50 text-red-600 px-3 py-1 rounded-lg text-sm font-semibold hover:bg-red-100"
                                            onclick="return confirm('Supprimer ?')">🗑️</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-gray-400 py-10 text-sm">Aucun article pour le moment.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">{{ $posts->links() }}</div>
        </div>
    </div>
</div>

@endsection