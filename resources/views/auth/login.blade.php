@extends('layouts.app')

@section('title', 'Entrar')

@section('content')
    <div class="mx-auto max-w-xl">
        <section class="rounded-3xl border border-slate-200 bg-white/80 p-8 shadow-sm">
            <div class="text-center">
                <p class="text-sm font-semibold uppercase tracking-wide text-slate-500">Acces</p>
                <h1 class="mt-2 text-3xl font-semibold text-slate-900">Inicia sessio</h1>
                <p class="mt-2 text-slate-600">Introdueix les teues credencials per gestionar projectes.</p>
            </div>
            @if (session('status'))
                <div class="mt-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                    {{ session('status') }}
                </div>
            @endif
            <form class="mt-8 space-y-5" action="{{ route('login') }}" method="post">
                @csrf
                <div>
                    <label class="text-sm font-medium text-slate-700" for="email">Correu</label>
                    <input class="mt-2 w-full rounded-2xl border border-slate-200 px-4 py-2 text-sm focus:border-slate-400 focus:outline-none" id="email" name="email" placeholder="admin@example.test" type="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                    @error('email')
                        <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="text-sm font-medium text-slate-700" for="password">Contrasenya</label>
                    <input class="mt-2 w-full rounded-2xl border border-slate-200 px-4 py-2 text-sm focus:border-slate-400 focus:outline-none" id="password" name="password" placeholder="********" type="password" required autocomplete="current-password">
                    @error('password')
                        <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex items-center justify-between text-sm text-slate-600">
                    <label class="flex items-center gap-2">
                        <input class="h-4 w-4 rounded border-slate-300 text-slate-900" type="checkbox" name="remember" @checked(old('remember'))>
                        Recorda'm
                    </label>
                    @if (Route::has('password.request'))
                        <a class="font-semibold text-slate-700 hover:text-slate-900" href="{{ route('password.request') }}">He oblidat la contrasenya</a>
                    @endif
                </div>
                <button class="w-full rounded-2xl bg-slate-900 px-4 py-2 text-sm font-semibold text-white hover:bg-slate-800" type="submit">Entrar</button>
            </form>
        </section>
    </div>
@endsection
