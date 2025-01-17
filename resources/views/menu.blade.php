@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-center flex-grow">Menümüz</h1>

        <!-- Giriş Yapmış Kullanıcılar için -->
        @auth
        <div class="d-flex">
            <a href="{{ route('dashboard') }}" class="btn btn-primary mx-2">Panele Dön</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger">Çıkış Yap</button>
            </form>
        </div>
        @endauth
    </div>

    <!-- Kategori Butonları -->
    <div class="d-flex flex-wrap justify-content-center gap-2 mb-5">
        <a href="{{ route('menu.popular') }}" class="btn btn-success {{ request()->routeIs('menu.popular') ? 'active' : '' }}">Popüler Ürünler</a>
        <a href="{{ route('menu.index') }}" class="btn btn-warning {{ request()->routeIs('menu.index') ? 'active' : '' }}">Tümü</a>
        @foreach ($categories as $category)
            <a href="{{ route('menu.filter', $category->id) }}" 
               class="btn btn-warning {{ request()->routeIs('menu.filter') && request('category_id') == $category->id ? 'active' : '' }}">
                {{ $category->name }}
            </a>
        @endforeach
    </div>

    <!-- Ürünler -->
    <div class="row">
        @if(isset($popularProducts) && $popularProducts->isNotEmpty())
            <!-- Popüler Ürünler -->
            <h2 class="col-12 mb-4 text-center text-success">Popüler Ürünler</h2>
            @foreach ($popularProducts as $product)
                <div class="col-12 col-sm-6 col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top img-fluid" alt="{{ $product->name }}">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text text-muted">{{ $product->description }}</p>
                            <p class="mt-auto text-success fw-bold">{{ number_format($product->price, 2) }} ₺</p>
                        </div>
                    </div>
                </div>
            @endforeach
        @elseif(isset($filteredCategory))
            <!-- Kategoriye Göre Filtrelenmiş Ürünler -->
            <h2 class="col-12 mb-4 text-center text-warning">{{ $filteredCategory->name }} Ürünleri</h2>
            @foreach ($filteredCategory->products as $product)
                <div class="col-12 col-sm-6 col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top img-fluid rounded" alt="{{ $product->name }}">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text text-muted">{{ $product->description }}</p>
                            <p class="mt-auto text-success fw-bold">{{ number_format($product->price, 2) }} ₺</p>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <!-- Tüm Ürünler -->
            <h2 class="col-12 mb-4 text-center text-warning">Tüm Ürünler</h2>
            @foreach ($categories as $category)
                @foreach ($category->products as $product)
                    <div class="col-12 col-sm-6 col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top img-fluid rounded" alt="{{ $product->name }}">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text text-muted">{{ $product->description }}</p>
                                <p class="mt-auto text-success fw-bold">{{ number_format($product->price, 2) }} ₺</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        @endif
    </div>
</div>
@endsection
