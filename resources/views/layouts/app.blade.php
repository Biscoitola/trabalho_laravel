<x-layouts::app.sidebar :title="$title ?? null">
    @if (session('success'))
        <div class="fixed right-4 top-4 z-50 w-[min(360px,calc(100vw-2rem))]" aria-live="polite" aria-atomic="true">
            <div
                class="grid grid-cols-[auto_1fr_auto] items-start gap-3 overflow-hidden rounded-lg border border-emerald-200 bg-emerald-50 p-4 text-emerald-950 shadow-2xl shadow-zinc-950/20 dark:border-emerald-800 dark:bg-emerald-950 dark:text-emerald-50"
                role="status"
                data-success-reminder
            >
                <span class="grid size-8 place-items-center rounded-full bg-emerald-600 text-sm font-bold text-white" aria-hidden="true">&check;</span>

                <div>
                    <strong class="block text-sm font-semibold">Concluido</strong>
                    <p class="mt-1 text-sm text-emerald-800 dark:text-emerald-100">{{ session('success') }}</p>
                </div>

                <button
                    type="button"
                    class="-mt-1 rounded-md px-1 text-xl leading-none text-emerald-700 hover:bg-emerald-100 dark:text-emerald-100 dark:hover:bg-emerald-900"
                    aria-label="Fechar aviso"
                    data-success-reminder-close
                >
                    &times;
                </button>

                <span class="absolute inset-x-0 bottom-0 h-1 origin-left bg-emerald-600 [animation:success-countdown_4s_linear_forwards]" aria-hidden="true"></span>
            </div>
        </div>
    @endif

    <flux:main>
        {{ $slot }}
    </flux:main>

    <style>
        @keyframes success-countdown {
            to {
                transform: scaleX(0);
            }
        }
    </style>

    <script>
        document.querySelectorAll('[data-success-reminder]').forEach((reminder) => {
            const close = reminder.querySelector('[data-success-reminder-close]');
            const hide = () => reminder.remove();

            close?.addEventListener('click', hide);
            window.setTimeout(hide, 4000);
        });
    </script>
</x-layouts::app.sidebar>
