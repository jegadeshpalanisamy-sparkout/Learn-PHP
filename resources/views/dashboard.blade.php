<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}

                    @can('isAdmin')
                        <h1 class="text-center">Welcome Admin page</h1>
                    @endcan

                    @can('isUser')
                        <h1 class="text-center">Welcome User page</h1>
                    @endcan

                    @can('isEditor')
                        <h1 class="text-center">Welcome Editor page</h1>
                    @endcan

                    <h3>See Posts</h3>
                    <a href="{{ route('post.index') }}" class="text-blue-500 hover:text-blue-700 font-bold">View</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
