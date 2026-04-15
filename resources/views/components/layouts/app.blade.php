<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-background text-ink antialiased">
    <div class="flex h-screen overflow-hidden">
        {{-- Sidebar Component --}}
        <x-layouts.partials.sidebar />

        <div class="flex flex-col flex-1 overflow-hidden">
            {{-- Header Component --}}
            <x-layouts.partials.header />

            <main class="flex-1 overflow-y-auto p-6">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>

</html>
