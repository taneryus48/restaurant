@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <!-- Menüyü Görüntüle Butonu -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Yönetim Paneli</h1>
        <a href="{{ route('menu.index') }}" class="btn btn-primary">Menüyü Görüntüle</a>
    </div>

    <!-- Sol Menü ve İçerik -->
    <div class="row">
        <!-- Sidebar -->
        <!-- İçerik -->
        <div class="col-md-9">
            <!-- Ürün Listesi -->
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Ürünler</h5>
                    <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm">Yeni Ürün Ekle</a>
                </div>
                <div class="card-body">
                    @if ($products->isEmpty())
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

            <!-- Kategori Yönetimi -->
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Kategoriler</h5>
                    <a href="{{ route('categories.create') }}" class="btn btn-success btn-sm">Yeni Kategori Ekle</a>
                </div>
                <div class="card-body">
                    @if ($categories->isEmpty())
                        <p class="text-center">Henüz kategori eklenmedi.</p>
                    @else
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kategori Adı</th>
                                    <th>İşlemler</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Düzenle</a>
                                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
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
        </div>
    </div>
</div>
@endsection
