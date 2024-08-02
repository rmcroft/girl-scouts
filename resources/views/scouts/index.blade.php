<!-- resources/views/scouts/index.blade.php -->


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ __('List of Scouts') }}</h1>
                <a href="{{ route('scouts.create')  }}">
                    <x-primary-button>
                        {{ __('Add Scout') }}
                    </x-primary-button>
                </a>
            </div>
        </h2>
    </x-slot>

    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if ($scouts->isEmpty())
                            <p>No scouts found.</p>
                        @else

                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">Name</th>
                                        <th scope="col" class="px-6 py-3">Birth Date</th>
                                        <th scope="col" class="px-6 py-3">Level</th>
                                        <th scope="col">
                                        <th scope="col">
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($scouts as $scout)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $scout->name }}
                                            </td>

                                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $scout->birth_date }}
                                            </td>

                                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $scout->level->name }}
                                            </td>

                                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <a href="{{ route('scouts.manage', ['id'=>$scout->id]) }}">
                                                    <x-primary-button>
                                                        Manage Scout
                                                    </x-primary-button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


