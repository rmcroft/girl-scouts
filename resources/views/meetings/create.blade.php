<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ __('Create a new Meeting') }}</h1>
                <a href="{{ route('meetings.index')  }}" class="btn btn-primary">
                    <x-primary-button>
                        {{ __('Vew All Meeting') }}
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

                    <form action="{{ route('meetings.store') }}" method="POST">
                        @csrf
                        <div>
                            <x-input-label for="title" :value="__('Meeting Title')" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block" required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>

                        <div>
                            <x-input-label for="date" :value="__('Date')" />
                            <x-text-input id="date" name="date" type="date" class="mt-1 block" required/>
                            <x-input-error class="mt-2" :messages="$errors->get('date')" />
                        </div>

                        <ul class="nav nav-tabs" role="tablist">
                            @foreach ($levels as $level)
                                @if ($level->badges->isNotEmpty())
                                    <li class="nav-item">
                                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#level_{{ $level->id }}" role="tab">{{ $level->name }}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>

                        <div class="tab-content">

                            @foreach ($levels as $level)

                                @if ($level->badges->isNotEmpty())
                                    <div id="level_{{ $level->id }}" class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" role="tabpanel">

                                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">Name</th>
                                                    <th scope="col" class="px-6 py-3">Step 1</th>
                                                    <th scope="col" class="px-6 py-3">Step 2</th>
                                                    <th scope="col" class="px-6 py-3">Step 3</th>
                                                    <th scope="col" class="px-6 py-3">Step 4</th>
                                                    <th scope="col" class="px-6 py-3">Step 5</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($level->badges as $badge)
                                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                
                                                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            {{ $badge->name }}
                                                        </td>
                
                                                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            <input class="form-check-input" type="checkbox" name="{{ $badge->id }}_step_1" id="{{ $badge->id }}_step_1" value="">
                                                            {{ $badge->step1 }}
                                                        </td>
                
                                                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            <input class="form-check-input" type="checkbox" name="{{ $badge->id }}_step_2" id="{{ $badge->id }}_step_2" value="">
                                                            {{ $badge->step2 }}
                                                        </td>
                
                                                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            <input class="form-check-input" type="checkbox" name="{{ $badge->id }}_step_3" id="{{ $badge->id }}_step_3" value="">
                                                            {{ $badge->step3 }}
                                                        </td>
                
                                                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            <input class="form-check-input" type="checkbox" name="{{ $badge->id }}_step_4" id="{{ $badge->id }}_step_4" value="">
                                                            {{ $badge->step4 }}
                                                        </td>
                
                                                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            <input class="form-check-input" type="checkbox" name="{{ $badge->id }}_step_5" id="{{ $badge->id }}_step_5" value="">
                                                            {{ $badge->step5 }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                                    
                            @endforeach

                        </div>


                        <br>
                        <x-primary-button>{{ __('Create Meeting') }}</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>