<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="description" content="@yield('meta_description')" />
<meta name="keywords" content="" />


{{-- Facebook Meta --}}
{{-- share post, need these:  url image 和 title --}}
<meta property="og:url" content="{{ url()->current() }}" />
<meta property='og:image' content="{{ config('app.url') }}/@yield('og:image')">
<meta property='og:title' content="@yield('og:title')" />



<!-- Fonts -->
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

<!-- Scripts -->
@vite(['resources/css/app.css', 'resources/js/app.js'])

<title>@yield('title', 'Blog')</title>

<!-- Styles -->
@livewireStyles
