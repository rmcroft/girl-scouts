<!-- resources/views/scouts/index.blade.php -->


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ __('Create a new Scout') }}</h1>
                <a href="{{ route('scouts.index')  }}">
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
                            <x-text-input id="name" name="name" type="text" class="mt-1 block" required autofocus autocomplete="name" value="{{ isset($scout) ? $scout->name : ''}}"/>
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div>
                            <x-input-label for="birth_date" :value="__('Birth Date')" />
                            <x-text-input id="birth_date" name="birth_date" type="date" class="mt-1 block" required value="{{ isset($scout) ? $scout->birth_date : ''}}"/>
                            <x-input-error class="mt-2" :messages="$errors->get('birth_date')" />
                        </div>

                        <div>
                            <x-input-label for="level_id" :value="__('Level')" />
                            <select id="level_id" name="level_id" class="form-control" required>
                                @foreach ($levels as $level)
                                    <option value="{{ $level->id }}" {{ isset($scout) && $scout->level->id == $level->id ? 'selected' : ''}}>{{ $level->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('level')" />
                        </div>

                        <input type="hidden" name="id" value="{{isset($scout) ? $scout->id : ''}}">

                        <div>
                            <x-input-label>
                                Badges
                            </x-input-label>
                        </div>

                        @if ($progresses->isEmpty())
                            <p>No badges found.</p>
                        @else

                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">Level</th>
                                        <th scope="col" class="px-6 py-3">Name</th>
                                        <th scope="col" class="px-6 py-3">Step 1</th>
                                        <th scope="col" class="px-6 py-3">Step 2</th>
                                        <th scope="col" class="px-6 py-3">Step 3</th>
                                        <th scope="col" class="px-6 py-3">Step 4</th>
                                        <th scope="col" class="px-6 py-3">Step 5</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($progresses as $progress)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                                {{ $progress->badge->level->name }}
                                            </td>

                                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                                {{ $progress->badge->name }}
                                            </td>

                                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                                @if ($progress->step1_complete)
                                                    <span class="badge badge-success">✓</span>
                                                @endif
                                                {{ $progress->badge->step1 }}
                                            </td>

                                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                                @if ($progress->step2_complete)
                                                    <span class="badge badge-success">✓</span>
                                                @endif
                                                {{ $progress->badge->step2 }}
                                            </td>

                                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                                @if ($progress->step3_complete)
                                                    <span class="badge badge-success">✓</span>
                                                @endif
                                                {{ $progress->badge->step3 }}
                                            </td>

                                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                                @if ($progress->step4_complete)
                                                    <span class="badge badge-success">✓</span>
                                                @endif
                                                {{ $progress->badge->step4 }}
                                            </td>

                                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                                @if ($progress->step5_complete)
                                                    <span class="badge badge-success">✓</span>
                                                @endif
                                                {{ $progress->badge->step5 }}
                                            </td>

                                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                                <a href="{{ route('badgeprogress.manage', ['id' => $progress->id])  }}">
                                                    <x-secondary-button>
                                                        {{ __('Edit Progress') }}
                                                    </x-secondary-button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif

                        <br>
                        <a href="{{ route('scouts.store') }}">
                            <x-primary-button>{{ isset($scout) ? __('Update Scout') : __('Create Scout') }}</x-primary-button>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
