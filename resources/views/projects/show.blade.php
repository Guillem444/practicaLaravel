@extends('layouts.app')

@section('title', 'Detall del projecte')

@section('content')
    <section class="mb-6">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-wide text-slate-500">Projecte</p>
                <h1 class="text-3xl font-semibold text-slate-900">{{ $project->title }}</h1>
                <p class="text-slate-600">Vista detallada amb equip, tecnologies i stock disponible.</p>
            </div>
            <div class="flex flex-wrap gap-3">
                <a class="rounded-full border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-700 hover:border-slate-400" href="#">Torna al llistat</a>
                <a class="rounded-full bg-slate-900 px-5 py-2 text-sm font-semibold text-white hover:bg-slate-800" href="#">Editar</a>
            </div>
        </div>
    </section>

    <div class="grid gap-6 lg:grid-cols-3">
        <section class="rounded-3xl border border-slate-200 bg-white/80 p-6 shadow-sm lg:col-span-2">
            <div class="flex items-start justify-between">
                <div>
                    <h2 class="text-xl font-semibold text-slate-900">Fitxa principal</h2>
                    <p class="text-sm text-slate-600">Informacio general del projecte.</p>
                </div>
                <span class="rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-800">Visible</span>
            </div>
            <div class="mt-6 grid gap-4 md:grid-cols-2">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Any de publicacio</p>
                    <p class="mt-1 text-base font-semibold text-slate-900">{{ $project->publication_year }}</p>
                </div>
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Preu</p>
                    <p class="mt-1 text-base font-semibold text-slate-900">{{ $project->price }}€</p>
                </div>
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Stock</p>
                    <p class="mt-1 text-base font-semibold text-slate-900">{{ $project->stock }}</p>
                </div>
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Partner</p>
                    <p class="mt-1 text-base font-semibold text-slate-900">{{ $project->partner }}</p>
                </div>
            </div>
            <div class="mt-6">
                <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Descripcio</p>
                <p class="mt-2 text-sm leading-relaxed text-slate-700">
                    {{ $project->description }}
                </p>
            </div>
        </section>

        <aside class="space-y-6">
            <section class="rounded-3xl border border-slate-200 bg-white/80 p-6 shadow-sm">
                <h3 class="text-lg font-semibold text-slate-900">Equip responsable</h3>
                <p class="mt-2 text-sm text-slate-600">Equip Delta · Valencia</p>
                <p class="mt-3 text-sm text-slate-700">
                    Bio resumida de l'equip, especialitzacions i focus de treball.
                </p>
            </section>

            <section class="rounded-3xl border border-slate-200 bg-white/80 p-6 shadow-sm">
                <h3 class="text-lg font-semibold text-slate-900">Tecnologies</h3>
                <div class="mt-3 flex flex-wrap gap-2">
                    <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-700">Laravel</span>
                    <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-700">Vue</span>
                    <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-700">Tailwind</span>
                </div>
            </section>

            <section class="rounded-3xl border border-slate-200 bg-white/80 p-6 shadow-sm">
                <h3 class="text-lg font-semibold text-slate-900">Accions rapides</h3>
                <div class="mt-3 flex flex-col gap-3 text-sm">
                    <button class="rounded-2xl border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-700 hover:border-slate-400" type="button">Duplicar projecte</button>
                    <button class="rounded-2xl border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-700 hover:border-slate-400" type="button">Marcar favorit</button>
                    <button class="rounded-2xl bg-rose-50 px-4 py-2 text-sm font-semibold text-rose-700" type="button">Eliminar projecte</button>
                </div>
            </section>
        </aside>
    </div>
@endsection
