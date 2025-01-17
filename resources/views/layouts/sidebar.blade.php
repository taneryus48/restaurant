<div class="flex flex-col h-screen bg-gray-800 text-white">
    <!-- Başlık -->
    <div class="p-4 text-center font-bold text-lg border-b border-gray-700">
        Yönetim Paneli
    </div>

    <!-- Menü -->
    <nav class="flex-1 p-4 space-y-2">
        <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-700 {{ request()->routeIs('dashboard') ? 'bg-gray-700' : '' }}">
            Panel
        </a>
        <a href="{{ route('products.index') }}" class="block px-4 py-2 rounded hover:bg-gray-700 {{ request()->routeIs('products.index') ? 'bg-gray-700' : '' }}">
            Ürünler
        </a>
        <a href="{{ route('menu.index') }}" class="block px-4 py-2 rounded hover:bg-gray-700 {{ request()->routeIs('menu.index') ? 'bg-gray-700' : '' }}">
            Menü
        </a>
        <a href="{{ route('categories.index') }}" class="block px-4 py-2 rounded hover:bg-gray-700 {{ request()->routeIs('menu.index') ? 'bg-gray-700' : '' }}">
            Kategoriler
        </a>

    </nav>
</div>
