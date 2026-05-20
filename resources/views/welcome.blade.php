<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head', ['title' => 'Bem-vindo'])
    </head>
    <body class="min-h-screen bg-zinc-50 text-zinc-900 dark:bg-zinc-950 dark:text-white">
        <main class="mx-auto flex min-h-screen max-w-5xl flex-col justify-center px-6 py-12">
            <nav class="mb-16 flex items-center justify-between">
                <div class="text-lg font-semibold">{{ config('app.name', 'Laravel') }}</div>
                <div class="flex gap-3">
                    @auth
                        <a href="{{ route('dashboard') }}" class="rounded-md bg-zinc-900 px-4 py-2 text-sm font-medium text-white dark:bg-white dark:text-zinc-900">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="rounded-md border border-zinc-300 px-4 py-2 text-sm font-medium dark:border-zinc-700">Login</a>
                        <a href="{{ route('register') }}" class="rounded-md bg-zinc-900 px-4 py-2 text-sm font-medium text-white dark:bg-white dark:text-zinc-900">Registro</a>
                    @endauth
                </div>
            </nav>

            <section class="max-w-3xl">
                <p class="mb-3 text-sm font-semibold uppercase text-zinc-500">Gerenciamento de tarefas</p>
                <h1 class="text-4xl font-bold leading-tight md:text-6xl">Organize tarefas, prioridades, categorias e status em um só lugar.</h1>
                <p class="mt-6 max-w-2xl text-lg text-zinc-600 dark:text-zinc-300">
                    Sistema To-Do em Laravel com autenticação, dashboard, CRUDs protegidos, busca, filtros e paginação.
                </p>
            </section>
        </main>
    </body>
</html>
