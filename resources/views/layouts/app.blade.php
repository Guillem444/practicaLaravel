<!doctype html>
<html lang="ca">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Gestor de Projectes')</title>
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body class="min-h-screen bg-gradient-to-br from-amber-50 via-sky-50 to-emerald-50 text-slate-900">
        <div class="relative">
            <div class="absolute inset-0 opacity-60">
                <div class="h-full w-full bg-[radial-gradient(circle_at_15%_15%,#fde68a,transparent_40%),radial-gradient(circle_at_85%_20%,#bae6fd,transparent_45%),radial-gradient(circle_at_50%_85%,#bbf7d0,transparent_45%)]"></div>
            </div>
            <div class="relative">
                <header class="border-b border-slate-200/70 bg-white/70 backdrop-blur">
                    <div class="mx-auto flex max-w-6xl items-center justify-between px-6 py-5">
                        <div class="flex items-center gap-3">
                            <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-slate-900 text-white">GP</span>
                            <div>
                                <p class="text-lg font-semibold">Gestor de Projectes</p>
                                <p class="text-sm text-slate-600">Examen Laravel</p>
                            </div>
                        </div>
                        <nav class="hidden items-center gap-6 text-sm font-medium text-slate-700 md:flex">
                            <a class="hover:text-slate-900" href="#">Projectes</a>
                            <a class="hover:text-slate-900" href="#">Equips</a>
                            <a class="hover:text-slate-900" href="#">Tecnologies</a>
                            <a class="hover:text-slate-900" href="#">Partners</a>
                        </nav>
                        <div class="flex items-center gap-3">
                            @auth
                                <span class="rounded-full border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-700">
                                    {{ auth()->user()->name }}
                                </span>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button class="rounded-full bg-slate-900 px-4 py-2 text-sm font-semibold text-white hover:bg-slate-800" type="submit">Logout</button>
                                </form>
                            @else
                                <a class="rounded-full border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-700 hover:border-slate-400" href="{{ route('login') }}">Entrar</a>
                            @endauth
                        </div>
                    </div>
                </header>
                <main class="mx-auto max-w-6xl px-6 py-10">
                    @yield('content')
                </main>
                <section class="mx-auto max-w-6xl px-6 pb-10">
                    <details class="rounded-3xl border border-slate-200 bg-white/80 p-6 shadow-sm">
                        <summary class="cursor-pointer text-sm font-semibold uppercase tracking-wide text-slate-500">README</summary>
                        <div class="mt-4 max-h-80 overflow-auto rounded-2xl border border-slate-200 bg-slate-50 p-4 text-xs text-slate-700">
                            <pre class="whitespace-pre-wrap">{{ file_get_contents(base_path('README.md')) }}</pre>
                        </div>
                    </details>
                </section>
                <footer class="border-t border-slate-200/70 bg-white/70">
                    <div class="mx-auto flex max-w-6xl flex-col items-start justify-between gap-4 px-6 py-6 text-sm text-slate-600 md:flex-row md:items-center">
                        <p>Gestor de projectes de programari per a l'examen MVC.</p>
                        <div class="flex flex-wrap gap-4">
                            <a class="hover:text-slate-900" href="{{ asset('README.md') }}">README</a>
                            <a class="hover:text-slate-900" href="{{ asset('documentacio/apunts/03MVC_Laravel.md') }}">Apunts 03</a>
                            <a class="hover:text-slate-900" href="{{ asset('documentacio/apunts/04dades_Laravel.md') }}">Apunts 04</a>
                            <a class="hover:text-slate-900" href="{{ asset('documentacio/apunts/05seguretat_Laravel.md') }}">Apunts 05</a>
                            <a class="hover:text-slate-900" href="{{ asset('documentacio/docs/index.md') }}">Documentació Laravel</a>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </body>
</html>
