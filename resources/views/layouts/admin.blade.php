<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudyMatch - Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans">

{{-- Overlay mobile --}}
<div id="overlay" onclick="closeSidebar()"
     class="fixed inset-0 bg-black bg-opacity-50 z-20 hidden lg:hidden"></div>

<div class="flex min-h-screen">

    {{-- Sidebar --}}
    <aside id="sidebar"
           class="fixed lg:static inset-y-0 left-0 z-30 w-64 bg-blue-800 text-white flex flex-col
                  transform -translate-x-full lg:translate-x-0 transition-transform duration-300">
        <div class="p-6 text-2xl font-bold border-b border-blue-700 flex items-center justify-between">
            <div>
                StudyMatch
                <p class="text-xs font-normal text-blue-300 mt-1">Panel Admin</p>
            </div>
            <button onclick="closeSidebar()" class="lg:hidden text-blue-300 hover:text-white text-xl">✕</button>
        </div>
        <nav class="flex-1 p-4 space-y-1">
            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-blue-700 {{ request()->routeIs('admin.dashboard') ? 'bg-blue-700' : '' }}">
                Dashboard
            </a>
            <a href="{{ route('admin.majors.index') }}"
               class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-blue-700 {{ request()->routeIs('admin.majors.*') ? 'bg-blue-700' : '' }}">
                Data Jurusan
            </a>
            <a href="{{ route('admin.criterias.index') }}"
               class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-blue-700 {{ request()->routeIs('admin.criterias.*') ? 'bg-blue-700' : '' }}">
                Kriteria TOPSIS
            </a>
            <a href="{{ route('admin.users.index') }}"
               class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-blue-700 {{ request()->routeIs('admin.users.*') ? 'bg-blue-700' : '' }}">
                Data Siswa
            </a>
        </nav>
        <div class="p-4 border-t border-blue-700">
            <p class="text-sm text-blue-300 mb-2">{{ auth()->user()->name }}</p>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-sm text-white hover:underline">Logout</button>
            </form>
        </div>
    </aside>

    {{-- Main Content --}}
    <div class="flex-1 flex flex-col min-w-0">

        {{-- Topbar mobile --}}
        <header class="lg:hidden bg-white border-b border-gray-200 px-4 py-3 flex items-center gap-4 sticky top-0 z-10">
            <button onclick="openSidebar()" class="text-gray-600 hover:text-gray-900">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
            <span class="font-bold text-blue-700 text-lg">StudyMatch</span>
        </header>

        <main class="flex-1 p-4 lg:p-8">
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif
            @yield('content')
        </main>
    </div>
</div>

<script>
    function openSidebar() {
        document.getElementById('sidebar').classList.remove('-translate-x-full');
        document.getElementById('overlay').classList.remove('hidden');
    }
    function closeSidebar() {
        document.getElementById('sidebar').classList.add('-translate-x-full');
        document.getElementById('overlay').classList.add('hidden');
    }
</script>

</body>
</html>