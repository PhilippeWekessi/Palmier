@php
    $user = auth()->user();
@endphp

<header class="flex h-16 items-center justify-between border-b border-gray-200 bg-white px-6">
    <div class="flex items-center gap-4">
        {{-- Bouton Toggle Mobile si besoin --}}
        <h1 class="text-lg font-semibold text-gray-900">@yield('page_title', 'Administration')</h1>
    </div>

    <div class="flex items-center gap-4">
        {{-- Notification --}}
        <div class="relative">
            <button type="button" class="relative rounded-full p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-600 transition" aria-label="Notifications">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                </svg>
                <span class="absolute right-1.5 top-1.5 h-2 w-2 rounded-full bg-gold"></span>
            </button>
        </div>

        {{-- Profil Administrateur Dropdown --}}
        <div x-data="{ open: false }" class="relative" @click.outside="open = false">
            <button type="button" @click="open = !open" class="flex items-center gap-3 rounded-lg p-1.5 hover:bg-gray-50 transition">
                <div class="flex h-9 w-9 items-center justify-center rounded-full bg-primary text-sm font-bold text-white">
                    {{ strtoupper(substr($user->name ?? 'A', 0, 1)) }}
                </div>
                <div class="hidden text-left sm:block">
                    <p class="text-sm font-medium text-gray-800">{{ $user->name ?? 'Administrateur' }}</p>
                    <p class="text-xs text-gray-400">Admin</p>
                </div>
                <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg>
            </button>

            <div x-show="open" x-cloak x-transition
                 class="absolute right-0 mt-2 w-48 rounded-xl bg-white py-1 shadow-lg ring-1 ring-black/5 z-50">
                <div class="px-4 py-2 border-b border-gray-100">
                    <p class="text-xs text-gray-400">Connecté en tant que</p>
                    <p class="text-sm font-medium text-gray-800 truncate">{{ $user->email }}</p>
                </div>

                <a href="{{ route('account') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Profil</a>
                
                <div class="border-t border-gray-100 my-1"></div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                        Se déconnecter
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>
