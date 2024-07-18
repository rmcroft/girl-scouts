<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ __('Create a new Badge') }}</h1>
                <a href="{{ route('badges.index')  }}" class="btn btn-primary">
                    <x-primary-button>
                        {{ __('Vew All Badges') }}
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

                    <form action="{{ route('badges.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="level_id">Select Level</label>
                            <select class="form-control" id="level_id" name="level_id" required>
                                @foreach ($levels as $level)
                                    <option value="{{ $level->id }}" {{ old('level_id') == $level->id ? 'selected' : '' }}>{{ $level->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <x-input-label for="name" :value="__('Badge Name')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block" required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div>
                            <x-input-label for="step1" :value="__('Step 1')" />
                            <x-text-input id="step1" name="step1" type="text" class="mt-1 block" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('step1')" />
                        </div>

                        <div>
                            <x-input-label for="step2" :value="__('Step 2')" />
                            <x-text-input id="step2" name="step2" type="text" class="mt-1 block" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('step2')" />
                        </div>

                        <div>
                            <x-input-label for="step3" :value="__('Step 3')" />
                            <x-text-input id="step3" name="step3" type="text" class="mt-1 block" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('step3')" />
                        </div>

                        <div>
                            <x-input-label for="step4" :value="__('Step 4')" />
                            <x-text-input id="step4" name="step4" type="text" class="mt-1 block" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('step4')" />
                        </div>

                        <div>
                            <x-input-label for="step5" :value="__('Step 5')" />
                            <x-text-input id="step5" name="step5" type="text" class="mt-1 block" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('step5')" />
                        </div>


                        <br>
                        <x-primary-button>{{ __('Create Badge') }}</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>