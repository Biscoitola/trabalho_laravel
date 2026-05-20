<x-layouts::auth :title="__('Registro')">
    <div class="flex flex-col gap-6">
        <x-auth-header :title="__('Criar uma conta')" :description="__('Informe seus dados para criar sua conta')" />

        <!-- Session Status -->
        <x-auth-session-status class="text-center" :status="session('status')" />

        <form method="POST" action="{{ route('register.store') }}" class="flex flex-col gap-6">
            @csrf
            <!-- Nome -->
            <flux:input
                name="name"
                :label="__('Nome')"
                :value="old('name')"
                type="text"
                required
                autofocus
                autocomplete="name"
                :placeholder="__('Nome completo')"
            />

            <!-- Email -->
            <flux:input
                name="email"
                :label="__('Email')"
                :value="old('email')"
                type="email"
                required
                autocomplete="email"
                placeholder="email@example.com"
            />

            <!-- Senha -->
            <flux:input
                name="password"
                :label="__('Senha')"
                type="password"
                required
                autocomplete="new-password"
                :placeholder="__('Senha')"
                passwordrules="{{ \Illuminate\Validation\Rules\Password::defaults()->toPasswordRulesString() }}"
                viewable
            />

            <!-- Confirmar senha -->
            <flux:input
                name="password_confirmation"
                :label="__('Confirmar senha')"
                type="password"
                required
                autocomplete="new-password"
                :placeholder="__('Confirmar senha')"
                passwordrules="{{ \Illuminate\Validation\Rules\Password::defaults()->toPasswordRulesString() }}"
                viewable
            />

            <div class="flex items-center justify-end">
                <flux:button type="submit" variant="primary" class="w-full" data-test="register-user-button">
                    {{ __('Criar conta') }}
                </flux:button>
            </div>
        </form>

        <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-600 dark:text-zinc-400">
            <span>{{ __('Ja tem uma conta?') }}</span>
            <flux:link :href="route('login')" wire:navigate>{{ __('Entrar') }}</flux:link>
        </div>
    </div>
</x-layouts::auth>
