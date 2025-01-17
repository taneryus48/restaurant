@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-3xl font-semibold mb-6">Yönetim Paneli</h1>

    <!-- Grid Yapısı: İki Kolonlu Tasarım -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        <!-- Ürünler -->
        <div class="bg-white shadow-md rounded-lg p-4">
            <h2 class="text-xl font-semibold mb-4">Ürünler</h2>
            <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm float-end">Ürün Ekle</a>
            @if ($products->isEmpty())
                <p class="text-center">Henüz ürün eklenmedi.</p>
            @else
                <table class="table-auto w-full">
                    <thead>
                        <tr class="border-b">
                            <th class="px-4 py-2 text-left">#</th>
                            <th class="px-4 py-2 text-left">Ürün Adı</th>
                            <th class="px-4 py-2 text-left">Kategori</th>
                            <th class="px-4 py-2 text-left">Fiyat</th>
                            <th class="px-4 py-2 text-left">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr class="border-b">
                                <td class="px-4 py-2">{{ $product->id }}</td>
                                <td class="px-4 py-2">{{ $product->name }}</td>
                                <td class="px-4 py-2">{{ $product->category->name ?? 'Kategori Yok' }}</td>
                                <td class="px-4 py-2">{{ $product->price }} ₺</td>
                                <td class="px-4 py-2">
                                    <a href="{{ route('products.edit', $product->id) }}" class="text-yellow-500">Düzenle</a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500">Sil</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

        <!-- Kategoriler -->
        <div class="bg-white shadow-md rounded-lg p-4">
            <h2 class="text-s font-semibold mb-4">Kategoriler</h2>
            <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm float-end">Kategori Ekle</a>
            @if ($categories->isEmpty())
                <p class="text-center">Henüz kategori eklenmedi.</p>
            @else
                <table class="table-auto w-full">
                    <thead>
                        <tr class="border-b">
                            <th class="px-4 py-2 text-left">#</th>
                            <th class="px-4 py-2 text-left">Kategori Adı</th>
                            <th class="px-4 py-2 text-left">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr class="border-b">
                                <td class="px-4 py-2">{{ $category->id }}</td>
                                <td class="px-4 py-2">{{ $category->name }}</td>
                                <td class="px-4 py-2">
                                    <a href="{{ route('categories.edit', $category->id) }}" class="text-yellow-500">Düzenle</a>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500">Sil</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

    </div>
</div>
@endsection
