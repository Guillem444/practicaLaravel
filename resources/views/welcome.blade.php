@extends('layouts.app')

@section('title', 'Benvinguda')

@section('content')
    <section class="rounded-3xl border border-slate-200 bg-white/80 p-8 shadow-sm">
        <div class="grid gap-8 lg:grid-cols-2 lg:items-center">
            <div>
                <p class="text-sm font-semibold uppercase tracking-wide text-slate-500">Examen MVC</p>
                <h1 class="mt-3 text-4xl font-semibold text-slate-900">Gestor de projectes de programari</h1>
                <p class="mt-4 text-slate-600">
                    Disseny de pantalles per gestionar projectes, equips, tecnologies i proveidors des d'una unica interfície.
                </p>
                <div class="mt-6 flex flex-wrap gap-3">
                    <a class="rounded-full bg-slate-900 px-5 py-2 text-sm font-semibold text-white hover:bg-slate-800" href="{{ route('login') }}">Entrar</a>
                    <a class="rounded-full border border-slate-300 bg-white px-5 py-2 text-sm font-semibold text-slate-700 hover:border-slate-400" href="{{ route('dashboard') }}">Veure projectes</a>
                </div>
            </div>
            <div class="grid gap-4">
                <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5">
                    <p class="text-sm font-semibold text-slate-900">Seccions disponibles</p>
                    <ul class="mt-3 space-y-2 text-sm text-slate-700">
                        <li>Projectes: llistat, detall, creacio i edicio</li>
                        <li>Filtres per titol, equip i tecnologia</li>
                        <li>Gestio de proveidors i estoc</li>
                        <li>Control de visibilitat i favorits</li>
                    </ul>
                </div>
                <div class="rounded-2xl border border-slate-200 bg-white p-5">
                    <p class="text-sm font-semibold text-slate-900">Pantalles clau</p>
                    <div class="mt-3 grid gap-3 md:grid-cols-2">
                        <a class="rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm font-semibold text-slate-700 hover:border-slate-300" href="#">Index de projectes</a>
                        <a class="rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm font-semibold text-slate-700 hover:border-slate-300" href="#">Detall del projecte</a>
                        <a class="rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm font-semibold text-slate-700 hover:border-slate-300" href="#">Formulari de creacio</a>
                        <a class="rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm font-semibold text-slate-700 hover:border-slate-300" href="#">Formulari d'edicio</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
