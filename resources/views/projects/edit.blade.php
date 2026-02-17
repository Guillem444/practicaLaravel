@extends('layouts.app')

@section('title', 'Editar Projecte')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-6 text-slate-800">Editar: {{ $project->title }}</h1>

    {{-- IMPORTANTE: Ruta update y pasar el proyecto --}}
    <form action="{{ route('projects.update', $project) }}" method="POST">
        @csrf
        @method('PUT') {{-- IMPORTANTE: Simulamos PUT --}}

        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Títol</label>
            {{-- Usamos old() con segundo parámetro para cargar el dato existente --}}
            <input type="text" name="title" value="{{ old('title', $project->title) }}" 
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
            <div>
                <label for="publication_year" class="block text-sm font-medium text-gray-700">Any</label>
                <input type="number" name="publication_year" value="{{ old('publication_year', $project->publication_year) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>
            <div>
                <label for="price" class="block text-sm font-medium text-gray-700">Preu (€)</label>
                <input type="number" step="0.01" name="price" value="{{ old('price', $project->price) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>
            <div>
                <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
                <input type="number" name="stock" value="{{ old('stock', $project->stock) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Descripció</label>
            <textarea name="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('description', $project->description) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="team_id" class="block text-sm font-medium text-gray-700">Equip</label>
            <select name="team_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                @foreach($teams as $team)
                    <option value="{{ $team->id }}" {{ old('team_id', $project->team_id) == $team->id ? 'selected' : '' }}>
                        {{ $team->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="partner_id" class="block text-sm font-medium text-gray-700">Partner</label>
            <select name="partner_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                <option value="">Cap partner</option>
                @foreach($partners as $partner)
                    <option value="{{ $partner->id }}" {{ old('partner_id', $project->partner_id) == $partner->id ? 'selected' : '' }}>
                        {{ $partner->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-6">
            <span class="block text-sm font-medium text-gray-700 mb-2">Tecnologies</span>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
                @foreach($technologies as $tech)
                    <div class="flex items-center">
                        <input type="checkbox" name="technologies[]" value="{{ $tech->id }}" id="tech_{{ $tech->id }}"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm"
                            {{-- LÓGICA COMPLEJA:
                                1. Si hay 'old' input (error de validación), usa eso.
                                2. Si no, mira si el proyecto YA tiene esa tecnología guardada en la BBDD.
                            --}}
                            {{ in_array($tech->id, old('technologies', $project->technologies->pluck('id')->toArray())) ? 'checked' : '' }}>
                        <label for="tech_{{ $tech->id }}" class="ml-2 text-sm text-gray-600">{{ $tech->name }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mb-6 flex items-center">
            <input type="checkbox" name="is_visible" id="is_visible" value="1" 
                   class="rounded border-gray-300 text-indigo-600 shadow-sm"
                   {{ old('is_visible', $project->is_visible) ? 'checked' : '' }}>
            <label for="is_visible" class="ml-2 text-sm text-gray-600">Visible al públic</label>
        </div>

        <button type="submit" class="px-4 py-2 bg-indigo-600 text-black rounded-md font-semibold text-sm">Guardar Canvis</button>
    </form>
</div>
@endsection