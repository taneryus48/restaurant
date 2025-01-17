@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Ürün Yönetimi Dashboard</h1>

    <!-- Ürünleri Listeleme -->
    <div class="card mb-4">
        <div class="card-header">
            Ürünler
            <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm float-end">Yeni Ürün Ekle</a>
        </div>
        <div class="card-body">
            @if($products->isEmpty())
                <p class="text-center">Henüz ürün eklenmedi.</p>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Ürün Adı</th>
                            <th>Kategori</th>
                            <th>Fiyat</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category->name ?? 'Kategori Yok' }}</td>
                                <td>{{ $product->price }} ₺</td>
                                <td>
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Düzenle</a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Sil</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

    <!-- Kategori Ekleme -->
    <div class="card">
        <div class="card-header">
            <a href="{{ route('categories.create') }}" class="btn btn-success">Kategori Ekle</a>
        </div>
    </div>
</div>
@endsection
