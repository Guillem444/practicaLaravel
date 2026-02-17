@extends('layouts.app')

@section('title', 'Crear Projecte')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-6 text-slate-800">Nou Projecte</h1>

    <form action="{{ route('projects.store') }}" method="POST">
        @csrf

        {{-- TÍTULO --}}
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Títol</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" 
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- GRID: AÑO, PRECIO, STOCK --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
            <div>
                <label for="publication_year" class="block text-sm font-medium text-gray-700">Any</label>
                <input type="number" name="publication_year" value="{{ old('publication_year') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                @error('publication_year') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="price" class="block text-sm font-medium text-gray-700">Preu (€)</label>
                <input type="number" step="0.01" name="price" value="{{ old('price') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                @error('price') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
                <input type="number" name="stock" value="{{ old('stock') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                @error('stock') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        {{-- DESCRIPCIÓN --}}
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Descripció</label>
            <textarea name="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('description') }}</textarea>
        </div>

        {{-- SELECT: EQUIPO --}}
        <div class="mb-4">
            <label for="team_id" class="block text-sm font-medium text-gray-700">Equip</label>
            <select name="team_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                <option value="" disabled selected>Selecciona un equip</option>
                @foreach($teams as $team)
                    <option value="{{ $team->id }}" {{ old('team_id') == $team->id ? 'selected' : '' }}>
                        {{ $team->name }}
                    </option>
                @endforeach
            </select>
            @error('team_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- SELECT: PARTNER (Opcional) --}}
        <div class="mb-4">
            <label for="partner_id" class="block text-sm font-medium text-gray-700">Partner (Opcional)</label>
            <select name="partner_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                <option value="">Cap partner</option>
                @foreach($partners as $partner)
                    <option value="{{ $partner->id }}" {{ old('partner_id') == $partner->id ? 'selected' : '' }}>
                        {{ $partner->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- CHECKBOXES: TECNOLOGÍAS --}}
        <div class="mb-6">
            <span class="block text-sm font-medium text-gray-700 mb-2">Tecnologies</span>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
                @foreach($technologies as $tech)
                    <div class="flex items-center">
                        <input type="checkbox" name="technologies[]" value="{{ $tech->id }}" id="tech_{{ $tech->id }}"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm"
                            {{-- Si el ID está en el array 'old', márcalo --}}
                            {{ in_array($tech->id, old('technologies', [])) ? 'checked' : '' }}>
                        <label for="tech_{{ $tech->id }}" class="ml-2 text-sm text-gray-600">{{ $tech->name }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- CHECKBOX: VISIBLE --}}
        <div class="mb-6 flex items-center">
            <input type="checkbox" name="is_visible" id="is_visible" value="1" 
                   class="rounded border-gray-300 text-indigo-600 shadow-sm"
                   {{ old('is_visible') ? 'checked' : '' }}>
            <label for="is_visible" class="ml-2 text-sm text-gray-600">Visible al públic</label>
        </div>

        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md font-semibold text-sm">Crear Projecte</button>
    </form>
</div>
@endsection