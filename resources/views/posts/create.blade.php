@extends('layouts.app')

@section('titre', 'Nouvel Article')

@section('contenu')

<style>
.create-wrapper { display:flex; flex-direction:row; gap:1.5rem; align-items:flex-start; }
.create-sidebar { width:210px; min-width:210px; flex-shrink:0; }
.create-main { flex:1; min-width:0; }

.create-nav-item { display:flex; align-items:center; gap:12px; padding:10px 12px; border-radius:10px; color:#4b5563; font-size:0.875rem; text-decoration:none; margin-bottom:2px; transition:background 0.15s; }
.create-nav-item:hover { background:#f9fafb; }
.create-nav-item.active { background:#eff6ff; color:#2563eb; font-weight:600; }

@media (max-width:1024px) {
    .create-wrapper { flex-direction:column; }
    .create-sidebar { width:100%; min-width:100%; }
    .create-nav-desktop { display:none !important; }
    .create-nav-mobile { display:grid !important; grid-template-columns:repeat(4,1fr); gap:8px; background:white; border-radius:12px; border:1px solid #f3f4f6; padding:12px; margin-bottom:12px; }
    .create-editor-row { flex-direction:column !important; }
    .create-panel { width:100% !important; min-width:100% !important; }
}
@media (min-width:1025px) {
    .create-nav-mobile { display:none; }
    .create-nav-desktop { display:block; }
}
</style>

<div class="create-wrapper">

    {{-- Sidebar --}}
    <div class="create-sidebar">

        {{-- Info + Nav Desktop --}}
        <div style="background:white;border-radius:12px;border:1px solid #f3f4f6;padding:16px;margin-bottom:12px;">
            <div style="display:flex;align-items:center;gap:10px;margin-bottom:16px;">
                <div style="width:36px;height:36px;min-width:36px;border-radius:50%;background:linear-gradient(135deg,#60a5fa,#34d399);display:flex;align-items:center;justify-content:center;color:white;font-weight:700;font-size:0.875rem;">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <div>
                    <p style="font-size:0.65rem;color:#9ca3af;text-transform:uppercase;font-weight:600;margin:0;">Espace Auteur</p>
                    <p style="font-size:0.75rem;color:#6b7280;margin:0;">Gérez vos publications</p>
                </div>
            </div>

            {{-- Nav Desktop --}}
            <div class="create-nav-desktop">
                <a href="{{ route('dashboard') }}" class="create-nav-item">
                    <svg style="width:18px;height:18px;flex-shrink:0;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                    Tableau de bord
                </a>
                <a href="{{ route('posts.mes') }}" class="create-nav-item">
                    <svg style="width:18px;height:18px;flex-shrink:0;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Mes Articles
                </a>
                <a href="{{ route('posts.create') }}" class="create-nav-item active">
                    <svg style="width:18px;height:18px;flex-shrink:0;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Nouvel Article
                </a>
                <a href="{{ route('profile.edit') }}" class="create-nav-item">
                    <svg style="width:18px;height:18px;flex-shrink:0;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    Mon Profil
                </a>
            </div>
        </div>

        {{-- Nav Mobile --}}
        <div class="create-nav-mobile" style="display:none;">
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
            <a href="{{ route('posts.create') }}" style="display:flex;flex-direction:column;align-items:center;gap:4px;padding:10px 4px;border-radius:10px;text-decoration:none;color:#2563eb;font-size:0.65rem;text-align:center;background:#eff6ff;font-weight:600;">
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

        {{-- Bouton publier --}}
        <button onclick="document.getElementById('form-article').submit()"
            style="display:block;width:100%;text-align:center;background:linear-gradient(to right,#3b82f6,#10b981);color:white;padding:12px;border-radius:10px;font-weight:600;font-size:0.875rem;border:none;cursor:pointer;box-sizing:border-box;">
            ✏️ Publier maintenant
        </button>
    </div>

    {{-- Contenu principal --}}
    <div class="create-main">

        {{-- Header --}}
        <div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:1.25rem;flex-wrap:wrap;gap:12px;">
            <div>
                <p style="font-size:0.75rem;color:#9ca3af;margin:0 0 4px;">
                    <a href="{{ route('dashboard') }}" style="color:#9ca3af;text-decoration:none;">Articles</a>
                    <span style="margin:0 6px;">›</span>
                    <span style="color:#3b82f6;">Nouvel Article</span>
                </p>
                <h1 style="font-size:1.5rem;font-weight:800;color:#111827;margin:0;">Éditeur de Publication</h1>
            </div>
            <div style="display:flex;gap:8px;">
                <button type="button" onclick="setStatut('brouillon')"
                    style="background:#f3f4f6;color:#374151;padding:10px 20px;border-radius:8px;font-weight:600;font-size:0.875rem;border:none;cursor:pointer;">
                    Enregistrer
                </button>
                <button type="button" onclick="setStatut('publie')"
                    style="background:#2563eb;color:white;padding:10px 20px;border-radius:8px;font-weight:600;font-size:0.875rem;border:none;cursor:pointer;">
                    Publier
                </button>
            </div>
        </div>

        @if($errors->any())
            <div style="background:#fef2f2;color:#dc2626;padding:12px 16px;border-radius:8px;margin-bottom:16px;font-size:0.875rem;">
                {{ $errors->first() }}
            </div>
        @endif

        <form id="form-article" method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="statut" id="statut-input" value="en_attente">

            {{-- Éditeur + Panneau --}}
            <div class="create-editor-row" style="display:flex;gap:16px;align-items:flex-start;">

                {{-- Éditeur --}}
                <div style="flex:1;min-width:0;">
                    <div style="background:white;border-radius:12px;border:1px solid #f3f4f6;padding:20px;box-shadow:0 1px 3px rgba(0,0,0,0.04);">

                        <p style="font-size:0.65rem;color:#9ca3af;text-transform:uppercase;font-weight:600;letter-spacing:0.05em;margin:0 0 8px;">Titre de l'article</p>
                        <input type="text" name="titre" id="titre"
                            placeholder="Entrez un titre captivant..."
                            value="{{ old('titre') }}"
                            style="width:100%;font-size:1.25rem;font-weight:700;color:#111827;border:none;outline:none;margin-bottom:16px;box-sizing:border-box;background:transparent;"
                            oninput="updateSEO(this.value)">

                        <hr style="border:none;border-top:1px solid #f3f4f6;margin-bottom:16px;">

                        {{-- Toolbar --}}
                        <div style="display:flex;gap:6px;flex-wrap:wrap;margin-bottom:12px;padding-bottom:12px;border-bottom:1px solid #f3f4f6;">
                            <button type="button" onclick="format('bold')"
                                style="width:32px;height:32px;background:#f3f4f6;border:none;border-radius:6px;font-weight:700;color:#374151;cursor:pointer;font-size:0.875rem;">B</button>
                            <button type="button" onclick="format('italic')"
                                style="width:32px;height:32px;background:#f3f4f6;border:none;border-radius:6px;font-style:italic;color:#374151;cursor:pointer;font-size:0.875rem;">I</button>
                            <button type="button" onclick="insertTag('h1')"
                                style="padding:0 8px;height:32px;background:#f3f4f6;border:none;border-radius:6px;font-weight:700;color:#374151;cursor:pointer;font-size:0.75rem;">H1</button>
                            <button type="button" onclick="insertTag('h2')"
                                style="padding:0 8px;height:32px;background:#f3f4f6;border:none;border-radius:6px;font-weight:700;color:#374151;cursor:pointer;font-size:0.75rem;">H2</button>
                            <button type="button" onclick="insertTag('ul')"
                                style="width:32px;height:32px;background:#f3f4f6;border:none;border-radius:6px;color:#374151;cursor:pointer;">≡</button>
                            <button type="button" onclick="insertQuote()"
                                style="width:32px;height:32px;background:#f3f4f6;border:none;border-radius:6px;color:#374151;cursor:pointer;font-size:1rem;">"</button>
                            <button type="button" onclick="insertLink()"
                                style="width:32px;height:32px;background:#f3f4f6;border:none;border-radius:6px;color:#374151;cursor:pointer;">🔗</button>
                        </div>

                        <textarea name="contenu" id="contenu" rows="14"
                            placeholder="Commencez à raconter votre histoire..."
                            style="width:100%;border:none;outline:none;color:#374151;resize:none;font-size:0.9rem;line-height:1.7;box-sizing:border-box;background:transparent;font-family:inherit;">{{ old('contenu') }}</textarea>
                    </div>
                </div>

                {{-- Panneau latéral --}}
                <div class="create-panel" style="width:240px;min-width:240px;flex-shrink:0;display:flex;flex-direction:column;gap:12px;">

                    {{-- Statut + Catégorie + Tags --}}
                    <div style="background:white;border-radius:12px;border:1px solid #f3f4f6;padding:16px;box-shadow:0 1px 3px rgba(0,0,0,0.04);">

                        {{-- Toggle statut --}}
                        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px;">
                            <span style="font-size:0.65rem;color:#9ca3af;text-transform:uppercase;font-weight:600;letter-spacing:0.05em;">Statut</span>
                            <div style="display:flex;align-items:center;gap:8px;cursor:pointer;" onclick="toggleStatut()">
                                <span style="font-size:0.8rem;font-weight:600;color:#374151;" id="label-brouillon">Brouillon</span>
                                <div id="toggle-btn" style="width:40px;height:20px;background:#d1d5db;border-radius:10px;position:relative;transition:background 0.2s;">
                                    <div id="toggle-circle" style="width:16px;height:16px;background:white;border-radius:50%;position:absolute;left:2px;top:2px;transition:left 0.2s;box-shadow:0 1px 3px rgba(0,0,0,0.2);"></div>
                                </div>
                                <span style="font-size:0.8rem;color:#9ca3af;" id="label-publie">Publié</span>
                            </div>
                        </div>

                        {{-- Catégorie --}}
                        <p style="font-size:0.65rem;color:#9ca3af;text-transform:uppercase;font-weight:600;letter-spacing:0.05em;margin:0 0 6px;">Catégorie</p>
                        <select name="category_id"
                            style="width:100%;padding:10px 12px;background:#f9fafb;border:1px solid #e5e7eb;border-radius:8px;font-size:0.85rem;outline:none;box-sizing:border-box;margin-bottom:16px;color:#374151;">
                            <option value="">Choisir une catégorie</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->nom }}
                                </option>
                            @endforeach
                        </select>

                        {{-- Tags --}}
                        <p style="font-size:0.65rem;color:#9ca3af;text-transform:uppercase;font-weight:600;letter-spacing:0.05em;margin:0 0 8px;">Tags</p>
                        <div style="display:flex;flex-wrap:wrap;gap:6px;">
                            @foreach($tags as $tag)
                                <label id="tag-label-{{ $tag->id }}"
                                    style="display:flex;align-items:center;gap:4px;background:#f3f4f6;padding:4px 10px;border-radius:20px;cursor:pointer;transition:background 0.15s;">
                                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                        style="display:none;"
                                        onchange="updateTagStyle({{ $tag->id }})"
                                        {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                                    <span style="font-size:0.75rem;color:#4b5563;" id="tag-text-{{ $tag->id }}">{{ $tag->nom }}</span>
                                    <span style="font-size:0.75rem;color:#9ca3af;" id="tag-x-{{ $tag->id }}">+</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    {{-- Image de couverture --}}
                    <div style="background:white;border-radius:12px;border:1px solid #f3f4f6;padding:16px;box-shadow:0 1px 3px rgba(0,0,0,0.04);">
                        <p style="font-size:0.65rem;color:#9ca3af;text-transform:uppercase;font-weight:600;letter-spacing:0.05em;margin:0 0 10px;">Image de couverture</p>
                        <label style="border:2px dashed #e5e7eb;border-radius:10px;padding:20px;display:flex;flex-direction:column;align-items:center;justify-content:center;cursor:pointer;transition:border-color 0.15s;">
                            <span style="font-size:1.75rem;margin-bottom:6px;">☁️</span>
                            <span style="font-size:0.8rem;font-weight:600;color:#374151;" id="upload-text">Cliquer pour uploader</span>
                            <span style="font-size:0.7rem;color:#9ca3af;margin-top:2px;">PNG, JPG, WEBP (Max. 5MB)</span>
                            <input type="file" name="image" id="image-input" style="display:none;" accept="image/*" onchange="previewImage(event)">
                        </label>
                        <img id="image-preview" src="" style="display:none;width:100%;height:100px;object-fit:cover;border-radius:8px;margin-top:10px;">
                    </div>

                    {{-- Aperçu SEO --}}
                    <div style="background:white;border-radius:12px;border:1px solid #f3f4f6;padding:16px;box-shadow:0 1px 3px rgba(0,0,0,0.04);">
                        <div style="display:flex;align-items:center;gap:6px;margin-bottom:10px;">
                            <span style="color:#3b82f6;">🔵</span>
                            <p style="font-size:0.8rem;font-weight:600;color:#374151;margin:0;">Aperçu Google</p>
                        </div>
                        <p style="color:#1a0dab;font-weight:600;font-size:0.8rem;margin:0 0 2px;" id="seo-titre">Mon nouvel article...</p>
                        <p style="color:#006621;font-size:0.7rem;margin:0 0 4px;">bloghub.com/articles/...</p>
                        <p style="color:#545454;font-size:0.7rem;margin:0;">Le résumé apparaîtra ici.</p>
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
            btn.style.background = '#3b82f6';
            circle.style.left = '22px';
            labelPublie.style.color = '#111827';
            labelPublie.style.fontWeight = '600';
            labelBrouillon.style.fontWeight = '400';
            input.value = 'publie';
        } else {
            btn.style.background = '#d1d5db';
            circle.style.left = '2px';
            labelBrouillon.style.fontWeight = '600';
            labelPublie.style.color = '#9ca3af';
            labelPublie.style.fontWeight = '400';
            input.value = 'brouillon';
        }
    }

    function setStatut(valeur) {
        document.getElementById('statut-input').value = valeur;
        document.getElementById('form-article').submit();
    }

    function updateSEO(val) {
        document.getElementById('seo-titre').textContent = (val || 'Mon nouvel article').substring(0, 55) + '...';
    }

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
            label.style.background = '#dbeafe';
            text.style.color = '#2563eb';
            text.style.fontWeight = '600';
            x.textContent = '×';
        } else {
            label.style.background = '#f3f4f6';
            text.style.color = '#4b5563';
            text.style.fontWeight = '400';
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
            preview.style.display = 'block';
            document.getElementById('upload-text').textContent = file.name;
        };
        reader.readAsDataURL(file);
    }
</script>

@endsection