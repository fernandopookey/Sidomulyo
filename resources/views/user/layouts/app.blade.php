<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    {{-- Style --}}
    @stack('prepend-style')
    @include('user.includes.style')
    @stack('addon-style')

</head>

<body>
    {{-- Header --}}
    @include('user.includes.header')

    {{-- Floating --}}
    @include('user.includes.floating')

    {{-- Notify --}}
    @include('sweetalert::alert')
    @include('notify::messages')
    <x:notify-messages />
    @notifyJs

    {{-- Page Content --}}
    @yield('content')

    {{-- Footer --}}
    @include('user.includes.footer')

    {{-- Last Footer --}}
    @include('user.includes.last-footer')

    {{-- Script --}}
    @stack('prepend-script')
    @include('user.includes.script')
    @stack('addon-script')

    {{-- Symbol --}}
    @include('user.includes.symbol')

</body>

</html>