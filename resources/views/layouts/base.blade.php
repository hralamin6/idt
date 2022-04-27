<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @php
            $setup = \App\Models\Setup::first();
        @endphp
        <title>@yield('title', 'Home Page') - {{config('app.name')}}</title>
        <meta name="description" content="@yield('description', 'This is site Description') - {{config('app.name')}}">

        <meta property="og:title" content="@yield('title', 'Home Page') - {{config('app.name')}}" />
        <meta property="og:description" content="@yield('description', 'This is site Description') - {{config('app.name')}}" />
        <meta property="og:url" content="@yield('url', config('app.url'))" />
        <meta property="og:image" content="@yield('image', $setup->getFirstMediaUrl('logo'))" />
        <meta property="og:image:secure_url" content="@yield('image', $setup->getFirstMediaUrl('logo'))" />
        <meta property="og:site_name" content="{{config('app.name')}}" />
        <meta property="og:image:width" content="1536" />
        <meta property="og:image:height" content="1024" />
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:description" content="@yield('description', 'This is site Description') - {{config('app.name')}}" />
        <meta name="twitter:title" content="@yield('title', 'Home Page') - {{config('app.name')}}" />
        <meta name="twitter:image" content="@yield('image', $setup->getFirstMediaUrl('logo'))" />

        <link rel="shortcut icon" href="{{$setup->getFirstMediaUrl('logo')}}" type="image/x-icon">
        <link rel="icon" href="{{$setup->getFirstMediaUrl('logo')}}" type="image/x-icon">
{{--        <link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">--}}
{{--        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">--}}
        <link rel="stylesheet" href="{{ asset('css/tw.css') }}">
        <link rel="stylesheet" href="{{ url(mix('css/app.css')) }}">
        @stack('css')
        @livewireStyles
        <script src="{{ url(mix('js/app.js')) }}" defer></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @stack('js')
    </head>

    <body>
        @yield('body')
        @livewireScripts
{{--        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>--}}
        <script src="{{ asset('js/sa.js') }}"></script>
        <x-livewire-alert::scripts />
        <script src="{{ asset('js/spa.js') }}" data-turbolinks-eval="false"></script>

    </body>
</html>
