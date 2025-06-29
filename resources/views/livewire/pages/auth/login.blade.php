<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $user = auth()->user();

        $this->redirectIntended(default: route('home'), navigate: true);
    }
}; ?>

<div>

    <main class="flex flex-col items-center justify-center w-full px-4" style="min-height: calc(100vh - 100px);">
        
        <!-- Login Card -->
        <div class="bg-white rounded-2xl shadow-lg p-8 sm:p-10 md:p-12 w-full max-w-md">
            
            <h1 class="text-3xl font-bold brand-purple mb-8">Login</h1>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form wire:submit="login" class="space-y-5">
                
                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email address')" class="!text-sm !font-medium !text-gray-600 !mb-1" />
                    <x-text-input wire:model="form.email" id="email" type="email" name="email" required autofocus autocomplete="username" placeholder="Enter your email" 
                                  class="w-full px-4 py-2.5 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-300 transition" />
                    <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
                </div>
                
                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" class="!text-sm !font-medium !text-gray-600 !mb-1" />
                    <x-text-input wire:model="form.password" id="password" type="password" name="password" required autocomplete="current-password" placeholder="Enter your Password"
                                  class="w-full px-4 py-2.5 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-300 transition" />
                    <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
                </div>
                
                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between !mt-6">
                    <label for="remember" class="flex items-center">
                        <input wire:model="form.remember" id="remember" type="checkbox" class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded" name="remember">
                        <span class="ml-2 text-sm text-gray-700">{{ __('Remember me') }}</span>
                    </label>
                    
                    @if (Route::has('password.request'))
                        <div class="text-sm">
                            <a href="{{ route('password.request') }}" wire:navigate class="font-medium text-gray-700 underline hover:text-gray-900">
                                {{ __('Forgot your password?') }}
                            </a>
                        </div>
                    @endif
                </div>
                
                <!-- Login Button -->
                <div class="!mt-8">
                    <x-primary-button class="w-full !justify-center !py-3 !px-4 !rounded-lg !text-base !font-semibold !bg-brand-purple !hover:bg-brand-purple-dark !focus:bg-brand-purple-dark !focus:ring-purple-500">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>

            <!-- Registration Link -->
            <div class="text-center mt-8">
                <p class="text-sm text-gray-600">
                    {{ __("Don't have an account?") }}
                    <a href="{{ route('register') }}" wire:navigate class="font-semibold brand-purple hover:underline">
                        {{ __('Register Now') }}
                    </a>
                </p>
            </div>
        </div>
    </main>
</div>
