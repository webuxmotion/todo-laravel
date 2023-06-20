<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Edit Todo') }}
        </h2>
    </header>

    <form method="post" action="{{ route('todos.update', [
        'todo' => $todo->id
    ]) }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="title" :value="__('Current Password')" />
            <x-text-input 
            value="{{$todo->title}}"
            id="title" name="title" type="text" class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('title')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="body" :value="__('Confirm Password')" />
            <x-text-input 
            value="{{$todo->body}}"
            id="body" name="body" type="text" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('body')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
