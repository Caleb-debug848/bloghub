@extends('layouts.app')
@section('titre', 'Contactez-nous')
@section('contenu')

<div class="max-w-4xl mx-auto">

    <div class="bg-gradient-to-br from-blue-500 to-green-500 rounded-2xl p-10 text-center mb-10">
        <h1 class="text-4xl font-bold text-white mb-3">Contactez-nous</h1>
        <p class="text-white/80 text-lg">Nous sommes là pour vous aider. N'hésitez pas à nous écrire !</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">

        {{-- Infos contact --}}
        <div class="space-y-6">

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-6">Nos coordonnées</h2>

                <div class="flex items-center gap-4 mb-5 pb-5 border-b border-gray-100">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center text-2xl shrink-0">📧</div>
                    <div>
                        <p class="text-xs text-gray-400 uppercase font-semibold mb-1">Email</p>
                        <a href="mailto:calebdaony@gmail.com" class="text-blue-600 font-semibold hover:underline">
                            calebdaony@gmail.com
                        </a>
                    </div>
                </div>

                <div class="flex items-center gap-4 mb-5 pb-5 border-b border-gray-100">
                    <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center text-2xl shrink-0">📱</div>
                    <div>
                        <p class="text-xs text-gray-400 uppercase font-semibold mb-1">Téléphone / WhatsApp</p>
                        <a href="tel:+237695073477" class="text-green-600 font-semibold hover:underline">
                            +237 695 073 477
                        </a>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center text-2xl shrink-0">📍</div>
                    <div>
                        <p class="text-xs text-gray-400 uppercase font-semibold mb-1">Localisation</p>
                        <p class="text-gray-700 font-semibold">Yaoundé, Cameroun 🇨🇲</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <h3 class="font-bold text-gray-800 mb-4">Heures de disponibilité</h3>
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-500">Lundi - Vendredi</span>
                        <span class="font-semibold text-gray-700">8h - 18h (WAT)</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Samedi</span>
                        <span class="font-semibold text-gray-700">9h - 14h (WAT)</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Dimanche</span>
                        <span class="font-semibold text-red-400">Fermé</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Formulaire --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-6">Envoyez-nous un message</h2>

            @if(session('contact_success'))
                <div class="bg-green-100 text-green-700 px-4 py-4 rounded-xl mb-6 text-center">
                    <p class="text-2xl mb-2">✅</p>
                    <p class="font-semibold">Message envoyé avec succès !</p>
                    <p class="text-sm mt-1">Nous vous répondrons dans les plus brefs délais.</p>
                </div>
            @else
                <form method="POST" action="{{ route('contact.send') }}">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-xs font-semibold text-gray-500 uppercase mb-2">Nom complet</label>
                        <input type="text" name="nom" placeholder="Jean Dupont"
                            value="{{ old('nom') }}"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 text-sm">
                    </div>
                    <div class="mb-4">
                        <label class="block text-xs font-semibold text-gray-500 uppercase mb-2">Email</label>
                        <input type="email" name="email" placeholder="nom@exemple.com"
                            value="{{ old('email') }}"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 text-sm">
                    </div>
                    <div class="mb-4">
                        <label class="block text-xs font-semibold text-gray-500 uppercase mb-2">Sujet</label>
                        <select name="sujet"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 text-sm">
                            <option value="">Choisir un sujet</option>
                            <option value="support">Support technique</option>
                            <option value="partenariat">Partenariat</option>
                            <option value="signalement">Signalement de contenu</option>
                            <option value="autre">Autre</option>
                        </select>
                    </div>
                    <div class="mb-6">
                        <label class="block text-xs font-semibold text-gray-500 uppercase mb-2">Message</label>
                        <textarea name="message" rows="5"
                            placeholder="Décrivez votre demande en détail..."
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 text-sm resize-none">{{ old('message') }}</textarea>
                    </div>
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-blue-500 to-green-500 text-white py-3 rounded-lg font-semibold hover:opacity-90 transition-colors">
                        Envoyer le message ✉️
                    </button>
                </form>
            @endif
        </div>
    </div>

    {{-- FAQ --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Questions fréquentes</h2>
        <div class="space-y-4" x-data="{ open: null }">

            <div class="border border-gray-100 rounded-xl overflow-hidden">
                <button @click="open = open === 1 ? null : 1"
                    class="w-full px-6 py-4 text-left font-semibold text-gray-800 flex justify-between items-center hover:bg-gray-50">
                    Comment devenir auteur sur BlogHub ?
                    <span x-text="open === 1 ? '−' : '+'"></span>
                </button>
                <div x-show="open === 1" class="px-6 pb-4 text-gray-600 text-sm">
                    Inscrivez-vous en choisissant le rôle "Auteur". Votre compte sera activé immédiatement et vous pourrez commencer à publier des articles.
                </div>
            </div>

            <div class="border border-gray-100 rounded-xl overflow-hidden">
                <button @click="open = open === 2 ? null : 2"
                    class="w-full px-6 py-4 text-left font-semibold text-gray-800 flex justify-between items-center hover:bg-gray-50">
                    Mes articles sont-ils modérés avant publication ?
                    <span x-text="open === 2 ? '−' : '+'"></span>
                </button>
                <div x-show="open === 2" class="px-6 pb-4 text-gray-600 text-sm">
                    Oui, chaque article est soumis à une modération par notre équipe avant d'être publié. Cela garantit la qualité du contenu sur la plateforme.
                </div>
            </div>

            <div class="border border-gray-100 rounded-xl overflow-hidden">
                <button @click="open = open === 3 ? null : 3"
                    class="w-full px-6 py-4 text-left font-semibold text-gray-800 flex justify-between items-center hover:bg-gray-50">
                    BlogHub est-il gratuit ?
                    <span x-text="open === 3 ? '−' : '+'"></span>
                </button>
                <div x-show="open === 3" class="px-6 pb-4 text-gray-600 text-sm">
                    Oui, BlogHub est entièrement gratuit pour les lecteurs et les auteurs. Créez votre compte et commencez à publier sans frais.
                </div>
            </div>

        </div>
    </div>

</div>

@endsection