@extends('layouts.base')

@section('body')
{{--    <body class="dark:bg-darkBg text-tahiti scrollbar-none" x-data="{nav: false, dark: $persist(false)}" :class="{'dark': dark}">--}}
    <div class="dark:bg-darkBg flex h-screen text-tahiti scrollbar-none"
         x-data="{nav: false, dark: $persist(false)}" :class="{'dark': dark, 'overflow-hidden': nav}"
{{--         :class="{ 'overflow-hidden': nav }"--}}
    >
        <div x-cloak
             x-show="nav"
             x-transition:enter="transition ease-in-out duration-150"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in-out duration-150"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
        ></div>
        <livewire:admin.sidebar-component />
        <div class="flex flex-col flex-1 w-full">
            <livewire:admin.header-component />
            <main class="h-full overflow-y-auto dark:bg-darkBg">
                <div class="m-2">
{{--                    <div class="flex justify-between gap-4 mb-2">--}}
{{--                        <p class="text-gray-700 dark:text-gray-200 text-xl font-semibold">Dashboard v2</p>--}}
{{--                        <div class="flex text-sm gap-1">--}}
{{--                            <span class="text-blue-500 dark:text-blue-400">Home</span>--}}
{{--                            <span class="text-gray-500 dark:text-gray-200">/</span>--}}
{{--                            <span class="text-gray-500 dark:text-gray-300">Dashboard v2</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    @yield('content')
                    @isset($slot)
                        {{ $slot }}
                    @endisset

                </div>
            </main>
        </div>
    </div>
@endsection
