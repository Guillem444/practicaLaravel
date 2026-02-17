@extends('layouts.app')

@section('title', 'Projectes')

@section('content')
    <section class="mb-8">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-3xl font-semibold text-slate-900">Projectes</h1>
                <p class="text-slate-600">Llistat general amb estat de visibilitat i paginacio.</p>
            </div>
            <div class="flex flex-wrap gap-3">
                <button class="rounded-full border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-700 hover:border-slate-400" type="button">Exporta</button>
                @auth
                    <a href="{{ route('projects.create') }}" class="btn btn-primary">Nou Projecte</a>
                @endauth            
            </div>
        </div>
    </section>

    <section class="rounded-3xl border border-slate-200 bg-white/80 p-6 shadow-sm">
        <div class="flex items-center justify-between">
            <h2 class="text-lg font-semibold text-slate-900">Resultats</h2>
            <span class="rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-800">12 projectes</span>
        </div>
        <div class="mt-6 overflow-hidden rounded-2xl border border-slate-200">
            <table class="min-w-full divide-y divide-slate-200 text-sm">
                <thead class="bg-slate-50 text-left text-xs font-semibold uppercase tracking-wide text-slate-600">
                    <tr>
                        <th class="px-4 py-3">Projecte</th>
                        <th class="px-4 py-3">Equip</th>
                        <th class="px-4 py-3">Tecnologies</th>
                        <th class="px-4 py-3">Partner</th>
                        <th class="px-4 py-3">Stock</th>
                        <th class="px-4 py-3">Preu</th>
                        <th class="px-4 py-3">Visible</th>
                        <th class="px-4 py-3 text-right">Accions</th>
                    </tr>
                </thead>
                @forelse($projects as $project)
                <tbody class="divide-y divide-slate-100 bg-white">
                    <tr>
                        
                        <td class="px-4 py-4">
                            <p class="font-semibold text-slate-900">{{ $project->title }}</p>
                        </td>
                        <td class="px-4 py-4 text-slate-700">{{ ($project->team)->name }}</td>
                        <td class="px-4 py-4 text-slate-700">Laravel, Vue</td>
                        <td class="px-4 py-4 text-slate-700">TechNova</td>
                        <td class="px-4 py-4 text-slate-700">{{ $project->stock }}</td>
                        <td class="px-4 py-4 text-slate-700">{{ $project->price }}€</td>
                        <td class="px-4 py-4">
                            <span class="rounded-full bg-emerald-100 px-2.5 py-1 text-xs font-semibold text-emerald-700">{{ $project->is_visible }}</span>
                        </td>
                        <td class="px-4 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <a class="rounded-full border border-slate-200 px-3 py-1 text-xs font-semibold text-slate-700 hover:border-slate-400" href="{{ route('details', $project) }}">Veure</a>
                                <a class="rounded-full border border-slate-200 px-3 py-1 text-xs font-semibold text-slate-700 hover:border-slate-400" href="{{ route('edit') }}">Editar</a>
                                @can('delete', $project)
                                <form action="{{ route('projects.destroy', $project) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button type="submit">Eliminar</button>
                                </form>
                            @endcan
                            </div>
                        </td>
                        @empty
                        <p>Sin proyectos</p>
                        @endforelse
                    </tr>
                    
                </tbody>
            </table>
            <div class="p-4">
            {{ $projects->links() }}
        </div>
        </div>
    </section>
@endsection
