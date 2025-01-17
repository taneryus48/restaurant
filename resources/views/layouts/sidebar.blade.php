<div id="sidebar" class="bg-gray-800 text-white w-36 h-screen fixed top-0 left-0 z-50 lg:block hidden">
    <nav class="p-3">
        <h4 class="text-lg font-semibold mb-4 text-right">Panel</h4>
        <ul class="space-y-3">
            <!-- Dashboard -->
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link hover:bg-gray-700 px-2 py-1 rounded-md block text-center">
                    Dashboard
                </a>
            </li>

            <!-- Ürünler -->
            <li class="nav-item">
                <a href="{{ route('products.index') }}" class="nav-link hover:bg-gray-700 px-2 py-1 rounded-md block text-center">
                    Ürünler
                </a>
            </li>

            <!-- Kategoriler -->
            <li class="nav-item">
                <a href="{{ route('categories.index') }}" class="nav-link hover:bg-gray-700 px-2 py-1 rounded-md block text-center">
                    Kategoriler
                </a>
            </li>

            <!-- Menü -->
            <li class="nav-item">
                <a href="{{ route('menu.index') }}" class="nav-link hover:bg-gray-700 px-2 py-1 rounded-md block text-center">
                    Menü
                </a>
            </li>

            <!-- Oturum Açmış Kullanıcı İşlemleri -->
            <li class="nav-item mt-auto">
                @auth
                    <a href="{{ route('dashboard') }}" class="btn btn-primary bg-blue-500 text-white px-2 py-1 rounded-md w-full text-center">Panele Dön</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-danger bg-red-500 text-white px-2 py-1 rounded-md mt-2 w-full text-center">Çıkış Yap</button>
                    </form>
                @endauth
            </li>
        </ul>
    </nav>
</div>
