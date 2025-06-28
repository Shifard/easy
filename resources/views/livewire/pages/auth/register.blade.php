<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $name = '';
    public string $username = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'lowercase', 'alpha', 'max:255', 'unique:'.User::class],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        $this->redirect(route('home'), navigate: true);
    }
}; ?>

<div>
    <main class="flex flex-col items-center justify-center w-full px-4" style="min-height: calc(100vh - 100px);">
        
        <!-- Register Card -->
        <div class="bg-white rounded-2xl shadow-lg p-8 sm:p-10 md:p-12 w-full max-w-md">
            
            <h1 class="text-3xl font-bold brand-purple mb-8">Register</h1>

            <form wire:submit="register" class="space-y-5">
                
                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" class="!text-sm !font-medium !text-gray-600 !mb-1" />
                    <x-text-input wire:model="name" id="name" type="text" name="name" required autofocus autocomplete="name" placeholder="Enter your Name"
                                  class="w-full px-4 py-2.5 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-300 transition" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Username -->
                <div>
                    <x-input-label for="username" :value="__('Username')" class="!text-sm !font-medium !text-gray-600 !mb-1" />
                    <x-text-input wire:model="username" id="username" type="text" name="username" required autocomplete="username" placeholder="Enter your Username"
                                  class="w-full px-4 py-2.5 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-300 transition" />
                    <x-input-error :messages="$errors->get('username')" class="mt-2" />
                </div>
                
                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="!text-sm !font-medium !text-gray-600 !mb-1" />
                    <x-text-input wire:model="email" id="email" type="email" name="email" required autocomplete="username" placeholder="Enter your Email"
                                  class="w-full px-4 py-2.5 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-300 transition" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                
                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" class="!text-sm !font-medium !text-gray-600 !mb-1" />
                    <x-text-input wire:model="password" id="password" type="password" name="password" required autocomplete="new-password" placeholder="Enter your Password"
                                  class="w-full px-4 py-2.5 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-300 transition" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="!text-sm !font-medium !text-gray-600 !mb-1" />
                    <x-text-input wire:model="password_confirmation" id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Re-enter your Password"
                                  class="w-full px-4 py-2.5 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-300 transition" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
                
                <!-- Register Button -->
                <div class="!mt-8">
                     <x-primary-button class="w-full !justify-center !py-3 !px-4 !rounded-lg !text-base !font-semibold !bg-brand-purple !hover:bg-brand-purple-dark !focus:bg-brand-purple-dark !focus:ring-purple-500">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>

            <!-- Login Link -->
            <div class="text-center mt-8">
                <p class="text-sm text-gray-600">
                    {{ __('Have an account?') }}
                    <a class="font-semibold brand-purple hover:underline" href="{{ route('login') }}" wire:navigate>
                        {{ __('Sign In') }}
                    </a>
                </p>
            </div>
        </div>
    </main>
</div>
