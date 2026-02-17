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
                
                {{-- Botón SUPERIOR: Solo se ve si estás logueado --}}
                @auth
                    <a href="{{ route('projects.create') }}" class="rounded-full bg-indigo-600 px-4 py-2 text-sm font-bold text-white hover:bg-indigo-700">Nou Projecte</a>
                @endauth            
            </div>
        </div>
    </section>

    <section class="rounded-3xl border border-slate-200 bg-white/80 p-6 shadow-sm">
        <div class="flex items-center justify-between">
            {{-- Contador dinámico --}}
            <h2 class="text-lg font-semibold text-slate-900">Resultats</h2>
            <span class="rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-800">{{ $projects->total() }} projectes</span>
        </div>
        
        <div class="mt-6 overflow-hidden rounded-2xl border border-slate-200">
            <table class="min-w-full divide-y divide-slate-200 text-sm">
                <thead class="bg-slate-50 text-left text-xs font-semibold uppercase tracking-wide text-slate-600">
                    <tr>
                        <th class="px-4 py-3">Projecte</th>
                        <th class="px-4 py-3">Equip</th>
                        <th class="px-4 py-3">Partner</th>
                        <th class="px-4 py-3">Tecnologies</th>
                        <th class="px-4 py-3">Stock</th>
                        <th class="px-4 py-3">Preu</th>
                        <th class="px-4 py-3">Visible</th>
                        <th class="px-4 py-3 text-right">Accions</th>
                    </tr>
                </thead>
                
                {{-- CORRECCIÓN 1: El tbody envuelve al bucle, no al revés --}}
                <tbody class="divide-y divide-slate-100 bg-white">
                    @forelse($projects as $project)
                    <tr>
                        <td class="px-4 py-4">
                            <p class="font-semibold text-slate-900">{{ $project->title }}</p>
                        </td>
                        
                        {{-- CORRECCIÓN 2: Uso de optional() por si se borra el equipo --}}
                        <td class="px-4 py-4 text-slate-700">{{ optional($project->team)->name }}</td>

                        {{-- CORRECCIÓN 3: Partner dinámico (antes tenías "TechNova" fijo) --}}
                        <td class="px-4 py-4 text-slate-700">
                            {{ $project->partner ? $project->partner->name : '-' }}
                        </td>

                        {{-- CORRECCIÓN 4: Tecnologías dinámicas (antes tenías "Laravel, Vue" fijo) --}}
                        <td class="px-4 py-4 text-slate-700">
                            @foreach($project->technologies as $tech)
                                <span class="inline-block bg-gray-100 rounded px-1 text-xs">{{ $tech->name }}</span>
                            @endforeach
                        </td>

                        <td class="px-4 py-4 text-slate-700">{{ $project->stock }}</td>
                        <td class="px-4 py-4 text-slate-700">{{ $project->price }}€</td>
                        
                        <td class="px-4 py-4">
                             @if($project->is_visible)
                                <span class="rounded-full bg-emerald-100 px-2.5 py-1 text-xs font-semibold text-emerald-700">Sí</span>
                            @else
                                <span class="rounded-full bg-gray-100 px-2.5 py-1 text-xs font-semibold text-gray-700">No</span>
                            @endif
                        </td>
                        
                        <td class="px-4 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <a class="text-blue-600 hover:underline" href="{{ route('projects.show', $project) }}">Veure</a>
                                
                                {{-- Solo mostramos editar si está logueado (opcional, el controlador ya protege) --}}
                                <a class="text-indigo-600 hover:underline" href="{{ route('projects.edit', $project) }}">Editar</a>
                                
                                @can('delete', $project)
                                <form action="{{ route('projects.destroy', $project) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline ml-2">Eliminar</button>
                                </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="p-4 text-center">No hi ha projectes.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            
            {{-- CORRECCIÓN 5: Quitamos el botón roto de aquí abajo --}}
            
            <div class="p-4">
                {{ $projects->links() }}
            </div>
        </div>
    </section>
@endsection