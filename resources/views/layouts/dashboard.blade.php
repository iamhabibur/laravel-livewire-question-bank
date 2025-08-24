<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Dashboard' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="font-sans antialiased">
    <div x-data="{
            isSidebarOpen: $persist(true),
            openDropdown: '{{ request()->routeIs('questions.*') ? 'mcq' : '' }}'
         }"
         class="flex min-h-screen bg-gray-100">

        {{-- Sidebar and Navigation --}}
        <aside
            class="bg-gray-800 text-gray-300 flex-shrink-0 transition-all duration-300"
            :class="isSidebarOpen ? 'w-64' : 'w-20'">
            
            {{-- ... Sidebar content ... --}}
            <div class="flex items-center justify-between p-4 border-b border-gray-700">
                <a href="{{ route('dashboard') }}" x-show="isSidebarOpen" class="font-bold text-xl text-white">
                    Laravel Starter Kit
                </a>
                <button @click="isSidebarOpen = !isSidebarOpen" class="p-2 rounded-md hover:bg-gray-700 focus:outline-none">
                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" /></svg>
                </button>
            </div>

            <nav class="p-4 space-y-2">
                <span x-show="isSidebarOpen" class="px-4 text-xs font-semibold text-gray-500 uppercase">General</span>
                
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 py-2 px-4 rounded transition duration-200" :class="{ 'bg-gray-900 text-white': {{ request()->routeIs('dashboard') ? 'true' : 'false' }}, 'hover:bg-gray-700 hover:text-white': !{{ request()->routeIs('dashboard') ? 'true' : 'false' }} }">
                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                    <span x-show="isSidebarOpen">Dashboard</span>
                </a>

                <div class="relative" 
                     @mouseenter="if (!isSidebarOpen) { openDropdown = 'mcq' }"
                     @mouseleave="if (!isSidebarOpen) { openDropdown = '' }">
                    
                    <button 
                        @click="if (isSidebarOpen) { openDropdown = (openDropdown === 'mcq' ? '' : 'mcq') }" 
                        class="w-full flex items-center justify-between py-2 px-4 rounded transition duration-200"
                        :class="{ 'bg-gray-700 text-white': openDropdown === 'mcq', 'hover:bg-gray-700 hover:text-white': openDropdown !== 'mcq' }">
                        
                        <div class="flex items-center space-x-3">
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg>
                            <span x-show="isSidebarOpen">MCQ</span>
                        </div>
                        <svg x-show="isSidebarOpen" class="h-5 w-5 transform transition-transform" :class="{ 'rotate-90': openDropdown === 'mcq' }" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    </button>
                    
                    <div x-show="openDropdown === 'mcq'" x-transition
                         :class="{
                            'absolute left-full top-0 z-10 w-48 ml-2 bg-gray-700 rounded-md shadow-lg': !isSidebarOpen,
                            'mt-1 pl-8': isSidebarOpen
                         }">
                        <a href="#" class="block py-2 px-4 text-sm rounded hover:bg-gray-600">All Questions</a>
                        <a href="{{ route('questions') }}" 
                           class="block py-2 px-4 text-sm rounded"
                           :class="{ 'text-white bg-blue-600': {{ request()->routeIs('questions') ? 'true' : 'false' }}, 'hover:bg-gray-600': !{{ request()->routeIs('questions.create') ? 'true' : 'false' }} }">Add New</a>
                        <a href="#" class="block py-2 px-4 text-sm rounded hover:bg-gray-600">Categories</a>
                    </div>
                </div>

            </nav>
        </aside>

        <div class="flex-1 flex flex-col transition-all duration-300">
            @include('layouts.navigation')
            <main class="flex-1 p-6">
                {{ $slot }}
            </main>
        </div>
    </div>
    @livewireScripts
</body>
</html>