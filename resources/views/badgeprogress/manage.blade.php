<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ __('Edit Progress') }}</h1>
                <a href="{{ route('scouts.manage', ['id' => $progress->scout->id])  }}">
                    <x-primary-button>
                        {{ __('Back to Scout') }}
                    </x-primary-button>
                </a>
            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form method="POST">
                        @csrf
                        <table>
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
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    {{ $progress->badge->level->name }}
                                </td>

                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    {{ $progress->badge->name }}
                                </td>

                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    <input class="form-check-input" name="step1_complete" value="1" type="checkbox" id="{{ $progress->id }}" {{ $progress->step1_complete == 1 ? "checked":"" }}>
                                        {{ $progress->badge->step1 }}
                                    </input>
                                </td>

                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    <input class="form-check-input" name="step2_complete" value="1" type="checkbox" id="{{ $progress->id }}" {{ $progress->step2_complete == 1 ? "checked":"" }}>
                                        {{ $progress->badge->step2 }}
                                    </input>
                                </td>

                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    <input class="form-check-input" name="step3_complete" value="1" type="checkbox" id="{{ $progress->id }}" {{ $progress->step3_complete == 1 ? "checked":"" }}>
                                        {{ $progress->badge->step3 }}
                                    </input>
                                </td>

                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    <input class="form-check-input" name="step4_complete" value="1" type="checkbox" id="{{ $progress->id }}" {{ $progress->step4_complete == 1 ? "checked":"" }}>
                                        {{ $progress->badge->step4 }}
                                    </input>
                                </td>

                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    <input class="form-check-input" name="step5_complete" value="1" type="checkbox" id="{{ $progress->id }}" {{ $progress->step5_complete == 1 ? "checked":"" }}>
                                        {{ $progress->badge->step5 }}
                                    </input>
                                </td>
                            </tbody>
                        </table>
                        <a>
                            <x-primary-button>{{ __('Update Progress') }}</x-primary-button>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>