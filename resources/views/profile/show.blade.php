<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
            @livewire('profile.update-profile-information-form')

            <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
            <div class="mt-10 sm:mt-0">
                @livewire('profile.update-password-form')
            </div>

            <x-section-border />
            @endif



            <div class="mt-10 sm:mt-0">
                @livewire('save-address')
            </div>

            <x-section-border />

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
            <div class="mt-10 sm:mt-0">
                @livewire('profile.two-factor-authentication-form')
            </div>

            <x-section-border />
            @endif

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
            <x-section-border />

            <div class="mt-10 sm:mt-0">
            @livewire('delete-user' , ['user' => $user ] , key($userId->id))

            @livewire('profile.delete-user-form')
            </div>



            @endif
        </div>
        
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 500)" x-show="show" class="alert alert-success">
        {{ session('message') }}
    </div>
    <div x-data="{ isOpen: false, message: '' }" x-init="() => { 
    Livewire.on('ContactDetails', (newMessage) => {
        isOpen = true;
        message = newMessage;
        setTimeout(() => {
            isOpen = false;
        }, 2000); // Close the popup after 2 seconds
    });
}">
        <!-- Popup -->
        <div x-show="isOpen" class="fixed top-0 right-0 left-0 align-center text-center  m-4 p-4 bg-green-500 text-white rounded shadow">
            <p x-text="message"></p>
        </div>
    </div>
    </div>
</x-app-layout>

