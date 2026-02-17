@extends('layouts.app')

@section('title', 'Editar projecte')

@section('content')
    <section class="mb-6">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-wide text-slate-500">Editar projecte</p>
                <h1 class="text-3xl font-semibold text-slate-900">Actualitza la informacio</h1>
                <p class="text-slate-600">Modifica les dades principals i la configuracio de visibilitat.</p>
            </div>
            <div class="flex flex-wrap gap-3">
                <a class="rounded-full border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-700 hover:border-slate-400" href="#">Torna al llistat</a>
                <a class="rounded-full border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-700 hover:border-slate-400" href="#">Veure detall</a>
            </div>
        </div>
    </section>

    <form class="grid gap-6 lg:grid-cols-3" action="#" method="post">
        <section class="rounded-3xl border border-slate-200 bg-white/80 p-6 shadow-sm lg:col-span-2">
            <h2 class="text-lg font-semibold text-slate-900">Dades principals</h2>
            <div class="mt-5 grid gap-4 md:grid-cols-2">
                <div class="md:col-span-2">
                    <label class="text-sm font-medium text-slate-700" for="title">Titol del projecte</label>
                    <input class="mt-2 w-full rounded-2xl border border-slate-200 px-4 py-2 text-sm focus:border-slate-400 focus:outline-none" id="title" name="title" placeholder="Nom del projecte" type="text" value="Nova intranet corporativa">
                </div>
                <div>
                    <label class="text-sm font-medium text-slate-700" for="publication_year">Any de publicacio</label>
                    <input class="mt-2 w-full rounded-2xl border border-slate-200 px-4 py-2 text-sm focus:border-slate-400 focus:outline-none" id="publication_year" name="publication_year" placeholder="2024" type="number" value="2024">
                </div>
                <div>
                    <label class="text-sm font-medium text-slate-700" for="price">Preu</label>
                    <input class="mt-2 w-full rounded-2xl border border-slate-200 px-4 py-2 text-sm focus:border-slate-400 focus:outline-none" id="price" name="price" placeholder="0.00" type="number" value="2400">
                </div>
                <div>
                    <label class="text-sm font-medium text-slate-700" for="stock">Stock</label>
                    <input class="mt-2 w-full rounded-2xl border border-slate-200 px-4 py-2 text-sm focus:border-slate-400 focus:outline-none" id="stock" name="stock" placeholder="0" type="number" value="34">
                </div>
                <div>
                    <label class="text-sm font-medium text-slate-700" for="publisher_id">Partner</label>
                    <select class="mt-2 w-full rounded-2xl border border-slate-200 px-4 py-2 text-sm focus:border-slate-400 focus:outline-none" id="publisher_id" name="publisher_id">
                        <option value="">Selecciona un partner</option>
                        <option value="1" selected>TechNova</option>
                        <option value="2">CloudPath</option>
                    </select>
                </div>
                <div class="md:col-span-2">
                    <label class="text-sm font-medium text-slate-700" for="description">Descripcio</label>
                    <textarea class="mt-2 min-h-[140px] w-full rounded-2xl border border-slate-200 px-4 py-2 text-sm focus:border-slate-400 focus:outline-none" id="description" name="description">Resum del projecte amb les notes principals i les iteracions previstes.</textarea>
                </div>
            </div>
        </section>

        <aside class="space-y-6">
            <section class="rounded-3xl border border-slate-200 bg-white/80 p-6 shadow-sm">
                <h3 class="text-lg font-semibold text-slate-900">Assignacio</h3>
                <div class="mt-4 space-y-4">
                    <div>
                        <label class="text-sm font-medium text-slate-700" for="team_id">Equip</label>
                        <select class="mt-2 w-full rounded-2xl border border-slate-200 px-4 py-2 text-sm focus:border-slate-400 focus:outline-none" id="team_id" name="team_id">
                            <option value="">Selecciona equip</option>
                            <option value="1">Equip Nord</option>
                            <option value="2" selected>Equip Delta</option>
                            <option value="3">Equip Sol</option>
                        </select>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-slate-700">Tecnologies</p>
                        <div class="mt-3 space-y-2 text-sm text-slate-700">
                            <label class="flex items-center gap-2">
                                <input class="h-4 w-4 rounded border-slate-300 text-slate-900" type="checkbox" name="technologies[]" checked>
                                Laravel
                            </label>
                            <label class="flex items-center gap-2">
                                <input class="h-4 w-4 rounded border-slate-300 text-slate-900" type="checkbox" name="technologies[]" checked>
                                Vue
                            </label>
                            <label class="flex items-center gap-2">
                                <input class="h-4 w-4 rounded border-slate-300 text-slate-900" type="checkbox" name="technologies[]">
                                React
                            </label>
                        </div>
                    </div>
                    <div class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-600">
                        Mantingues actualitzada la pila tecnica.
                    </div>
                </div>
            </section>

            <section class="rounded-3xl border border-slate-200 bg-white/80 p-6 shadow-sm">
                <h3 class="text-lg font-semibold text-slate-900">Visibilitat</h3>
                <div class="mt-4 flex items-center gap-3 text-sm text-slate-700">
                    <input class="h-4 w-4 rounded border-slate-300 text-slate-900" id="is_visible" name="is_visible" type="checkbox" checked>
                    <label for="is_visible">Projecte visible al llistat public</label>
                </div>
            </section>

            <section class="rounded-3xl border border-slate-200 bg-white/80 p-6 shadow-sm">
                <div class="flex flex-col gap-3">
                    <button class="rounded-2xl bg-slate-900 px-4 py-2 text-sm font-semibold text-white hover:bg-slate-800" type="submit">Guardar canvis</button>
                    <button class="rounded-2xl border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-700 hover:border-slate-400" type="button">Cancelar</button>
                </div>
            </section>
        </aside>
    </form>
@endsection
