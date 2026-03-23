@extends('layouts.app')

@section('titre', 'Nouvel Article')

@section('contenu')

<div class="flex flex-col lg:flex-row gap-6">

    {{-- Sidebar --}}
    <div class="w-full lg:w-56 shrink-0">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 mb-4">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-9 h-9 bg-gradient-to-br from-blue-400 to-green-400 rounded-full flex items-center justify-center text-white font-bold text-sm shrink-0">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <div class="min-w-0">
                    <p class="text-xs text-gray-400 uppercase font-semibold truncate">Espace Auteur</p>
                    <p class="text-xs text-gray-500 truncate">Gérez vos publications</p>
                </div>
            </div>
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
                    class="flex flex-col lg:flex-row items-center lg:items-center gap-1 lg:gap-3 px-2 lg:px-3 py-3 lg:py-2 rounded-xl bg-blue-50 text-blue-600 font-semibold text-center lg:text-left transition-colors">
                    <span class="text-xl lg:text-base">➕</span>
                    <span class="text-xs lg:text-sm leading-tight">Nouvel Article</span>
                </a>
                <a href="{{ route('profile.edit') }}"
                    class="flex flex-col lg:flex-row items-center lg:items-center gap-1 lg:gap-3 px-2 lg:px-3 py-3 lg:py-2 rounded-xl bg-gray-50 text-gray-600 hover:bg-gray-100 text-center lg:text-left transition-colors">
                    <span class="text-xl lg:text-base">👤</span>
                    <span class="text-xs lg:text-sm font-medium leading-tight">Mon Profil</span>
                </a>
            </nav>
        </div>
        <button onclick="document.getElementById('form-article').submit()"
            class="w-full block text-center bg-gradient-to-r from-blue-500 to-green-500 text-white px-4 py-3 rounded-lg font-semibold hover:opacity-90 text-sm">
            ✏️ Publier maintenant
        </button>
    </div>

    {{-- Contenu --}}
    <div class="flex-1 min-w-0">

        {{-- Header --}}
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-5 gap-3">
            <div>
                <p class="text-xs text-gray-400 mb-1">
                    <a href="{{ route('dashboard') }}" class="hover:text-blue-500">Articles</a>
                    <span class="mx-1">›</span>
                    <span class="text-blue-500">Nouvel Article</span>
                </p>
                <h1 class="text-xl lg:text-2xl font-bold text-gray-800">Éditeur de Publication</h1>
            </div>
            <div class="flex gap-2 shrink-0">
                <button type="button" onclick="setStatut('brouillon')"
                    class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg font-semibold hover:bg-gray-200 text-sm">
                    Enregistrer
                </button>
                <button type="button" onclick="setStatut('publie')"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-blue-700 text-sm">
                    Publier
                </button>
            </div>
        </div>

        @if($errors->any())
            <div class="bg-red-100 text-red-600 px-4 py-3 rounded-lg mb-4 text-sm">{{ $errors->first() }}</div>
        @endif

        <form id="form-article" method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="statut" id="statut-input" value="en_attente">

            {{-- Sur mobile : tout empilé | Sur desktop : éditeur + panneau côte à côte --}}
            <div class="flex flex-col lg:flex-row gap-4">

                {{-- Éditeur --}}
                <div class="flex-1 min-w-0">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 lg:p-6">
                        <label class="block text-xs text-gray-400 uppercase font-semibold mb-2">Titre</label>
                        <input type="text" name="titre" id="titre"
                            placeholder="Entrez un titre captivant..."
                            value="{{ old('titre') }}"
                            class="w-full text-lg lg:text-2xl font-bold text-gray-700 placeholder-gray-300 border-0 focus:outline-none focus:ring-0 mb-3">
                        <hr class="border-gray-100 mb-3">

                        {{-- Toolbar --}}
                        <div class="flex gap-1 flex-wrap mb-3 pb-3 border-b border-gray-100">
                            <button type="button" onclick="format('bold')"
                                class="w-8 h-8 flex items-center justify-center bg-gray-100 rounded font-bold text-gray-600 hover:bg-blue-100 hover:text-blue-600 text-sm">B</button>
                            <button type="button" onclick="format('italic')"
                                class="w-8 h-8 flex items-center justify-center bg-gray-100 rounded italic text-gray-600 hover:bg-blue-100 hover:text-blue-600 text-sm">I</button>
                            <button type="button" onclick="insertTag('h1')"
                                class="px-2 h-8 flex items-center justify-center bg-gray-100 rounded text-gray-600 hover:bg-blue-100 hover:text-blue-600 font-bold text-xs">H1</button>
                            <button type="button" onclick="insertTag('h2')"
                                class="px-2 h-8 flex items-center justify-center bg-gray-100 rounded text-gray-600 hover:bg-blue-100 hover:text-blue-600 font-bold text-xs">H2</button>
                            <button type="button" onclick="insertTag('ul')"
                                class="w-8 h-8 flex items-center justify-center bg-gray-100 rounded text-gray-600 hover:bg-blue-100 hover:text-blue-600">≡</button>
                            <button type="button" onclick="insertQuote()"
                                class="w-8 h-8 flex items-center justify-center bg-gray-100 rounded text-gray-600 hover:bg-blue-100 hover:text-blue-600">"</button>
                            <button type="button" onclick="insertLink()"
                                class="w-8 h-8 flex items-center justify-center bg-gray-100 rounded text-gray-600 hover:bg-blue-100 hover:text-blue-600">🔗</button>
                        </div>

                        <textarea name="contenu" id="contenu" rows="10"
                            placeholder="Commencez à raconter votre histoire..."
                            class="w-full border-0 focus:outline-none focus:ring-0 text-gray-700 resize-none leading-relaxed text-sm lg:text-base">{{ old('contenu') }}</textarea>
                    </div>
                </div>

                {{-- Panneau --}}
                <div class="w-full lg:w-60 shrink-0 flex flex-col gap-4">

                    {{-- Statut + Catégorie + Tags --}}
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">

                        {{-- Toggle statut --}}
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-xs text-gray-400 uppercase font-semibold">Statut</span>
                            <div class="flex items-center gap-2 cursor-pointer" onclick="toggleStatut()">
                                <span class="text-xs font-semibold text-gray-600" id="label-brouillon">Brouillon</span>
                                <div id="toggle-btn" class="w-10 h-5 bg-gray-300 rounded-full relative transition-colors duration-200">
                                    <div id="toggle-circle" class="w-4 h-4 bg-white rounded-full absolute left-0.5 top-0.5 transition-all duration-200 shadow"></div>
                                </div>
                                <span class="text-xs text-gray-400" id="label-publie">Publié</span>
                            </div>
                        </div>

                        {{-- Catégorie --}}
                        <label class="block text-xs text-gray-400 uppercase font-semibold mb-1">Catégorie</label>
                        <select name="category_id"
                            class="w-full px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400 mb-4 text-sm">
                            <option value="">Choisir une catégorie</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->nom }}
                                </option>
                            @endforeach
                        </select>

                        {{-- Tags --}}
                        <label class="block text-xs text-gray-400 uppercase font-semibold mb-2">Tags</label>
                        <div class="flex flex-wrap gap-2">
                            @foreach($tags as $tag)
                                <label id="tag-label-{{ $tag->id }}"
                                    class="flex items-center gap-1 bg-gray-100 px-2 py-1 rounded-full cursor-pointer hover:bg-blue-100 transition-colors">
                                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                        class="hidden"
                                        onchange="updateTagStyle({{ $tag->id }})"
                                        {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                                    <span class="text-xs text-gray-600" id="tag-text-{{ $tag->id }}">{{ $tag->nom }}</span>
                                    <span class="text-gray-400 text-xs" id="tag-x-{{ $tag->id }}">+</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    {{-- Image --}}
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
                        <label class="block text-xs text-gray-400 uppercase font-semibold mb-2">Image de couverture</label>
                        <label class="border-2 border-dashed border-gray-200 rounded-xl p-5 flex flex-col items-center justify-center cursor-pointer hover:border-blue-400 transition-colors">
                            <span class="text-2xl mb-1">☁️</span>
                            <span class="text-gray-600 font-semibold text-xs" id="upload-text">Cliquer pour uploader</span>
                            <span class="text-gray-400 text-xs mt-1">PNG, JPG, WEBP (Max. 5MB)</span>
                            <input type="file" name="image" id="image-input" class="hidden" accept="image/*" onchange="previewImage(event)">
                        </label>
                        <img id="image-preview" src="" class="hidden w-full h-28 object-cover rounded-lg mt-3">
                    </div>

                    {{-- Aperçu SEO --}}
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="text-blue-500 text-sm">🔵</span>
                            <p class="text-xs font-semibold text-gray-700">Aperçu Google</p>
                        </div>
                        <p class="text-blue-600 font-semibold text-xs mb-1" id="seo-titre">Mon nouvel article...</p>
                        <p class="text-green-600 text-xs mb-1">bloghub.com/articles/...</p>
                        <p class="text-gray-400 text-xs">Le résumé apparaîtra ici pour les moteurs de recherche.</p>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>

<script>
    let estPublie = false;
    function toggleStatut() {
        estPublie = !estPublie;
        const btn = document.getElementById('toggle-btn');
        const circle = document.getElementById('toggle-circle');
        const labelPublie = document.getElementById('label-publie');
        const labelBrouillon = document.getElementById('label-brouillon');
        const input = document.getElementById('statut-input');
        if (estPublie) {
            btn.classList.replace('bg-gray-300','bg-blue-500');
            circle.style.left = '1.25rem';
            labelPublie.classList.add('font-semibold','text-gray-700');
            labelPublie.classList.remove('text-gray-400');
            labelBrouillon.classList.remove('font-semibold');
            input.value = 'publie';
        } else {
            btn.classList.replace('bg-blue-500','bg-gray-300');
            circle.style.left = '0.125rem';
            labelBrouillon.classList.add('font-semibold');
            labelPublie.classList.remove('font-semibold','text-gray-700');
            labelPublie.classList.add('text-gray-400');
            input.value = 'brouillon';
        }
    }
    function setStatut(valeur) {
        document.getElementById('statut-input').value = valeur;
        document.getElementById('form-article').submit();
    }
    document.getElementById('titre').addEventListener('input', function() {
        document.getElementById('seo-titre').textContent = (this.value || 'Mon nouvel article').substring(0, 55) + '...';
    });
    function format(cmd) {
        const t = document.getElementById('contenu');
        const s = t.selectionStart, e = t.selectionEnd;
        const sel = t.value.substring(s, e) || 'texte';
        const result = cmd === 'bold' ? `**${sel}**` : `*${sel}*`;
        t.value = t.value.substring(0, s) + result + t.value.substring(e);
        t.focus();
    }
    function insertTag(tag) {
        const t = document.getElementById('contenu');
        const s = t.selectionStart;
        const sel = t.value.substring(s, t.selectionEnd) || 'Titre';
        const map = { h1: `\n# ${sel}\n`, h2: `\n## ${sel}\n`, ul: `\n- ${sel}\n` };
        t.value = t.value.substring(0, s) + map[tag] + t.value.substring(t.selectionEnd);
        t.focus();
    }
    function insertQuote() {
        const t = document.getElementById('contenu');
        const s = t.selectionStart;
        const sel = t.value.substring(s, t.selectionEnd) || 'Citation';
        t.value = t.value.substring(0, s) + `\n> ${sel}\n` + t.value.substring(t.selectionEnd);
        t.focus();
    }
    function insertLink() {
        const url = prompt('URL du lien :');
        if (!url) return;
        const t = document.getElementById('contenu');
        const s = t.selectionStart;
        const sel = t.value.substring(s, t.selectionEnd) || 'lien';
        t.value = t.value.substring(0, s) + `[${sel}](${url})` + t.value.substring(t.selectionEnd);
        t.focus();
    }
    function updateTagStyle(id) {
        const cb = document.querySelector(`#tag-label-${id} input`);
        const label = document.getElementById(`tag-label-${id}`);
        const text = document.getElementById(`tag-text-${id}`);
        const x = document.getElementById(`tag-x-${id}`);
        if (cb.checked) {
            label.classList.replace('bg-gray-100','bg-blue-100');
            text.classList.add('text-blue-600','font-semibold');
            text.classList.remove('text-gray-600');
            x.textContent = '×';
        } else {
            label.classList.replace('bg-blue-100','bg-gray-100');
            text.classList.remove('text-blue-600','font-semibold');
            text.classList.add('text-gray-600');
            x.textContent = '+';
        }
    }
    function previewImage(event) {
        const file = event.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = e => {
            const preview = document.getElementById('image-preview');
            preview.src = e.target.result;
            preview.classList.remove('hidden');
            document.getElementById('upload-text').textContent = file.name;
        };
        reader.readAsDataURL(file);
    }
</script>

@endsection