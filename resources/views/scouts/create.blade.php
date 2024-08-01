<!-- resources/views/scouts/index.blade.php -->


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ __('Create a new Scout') }}</h1>
                <a href="{{ route('scouts.index')  }}" class="btn btn-primary">
                    <x-primary-button>
                        {{ __('Vew All Scouts') }}
                    </x-primary-button>
                </a>
            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('scouts.store') }}" method="POST">
                        @csrf

                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block" required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div>
                            <x-input-label for="birth_date" :value="__('Birth Date')" />
                            <x-text-input id="birth_date" name="birth_date" type="date" class="mt-1 block" required/>
                            <x-input-error class="mt-2" :messages="$errors->get('birth_date')" />
                        </div>

                        <div>
                            <x-input-label for="level_id" :value="__('Level')" />
                            <select id="level_id" name="level_id" class="form-control" required>
                                @foreach ($levels as $level)
                                    <option value="{{ $level->id }}">{{ $level->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('level')" />
                        </div>
                        <br>
                        <x-primary-button>{{ __('Create Scout') }}</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
