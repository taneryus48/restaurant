@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Ürün Listesi</h1>

    <!-- Arama ve Filtreleme -->
    <form method="GET" action="{{ route('products.index') }}" class="mb-4">
        <div class="row">
            <div class="col-md-6">
                <input type="text" name="search" class="form-control" placeholder="Ürün Ara" value="{{ request('search') }}">
            </div>
            <div class="col-md-4">
                <select name="category_id" class="form-control">
                    <option value="">Tüm Kategoriler</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">Filtrele</button>
            </div>
        </div>
    </form>

    <!-- Ürün Tablosu -->
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>İsim</th>
                <th>Açıklama</th>
                <th>Fiyat</th>
                <th>Kategori</th>
                <th>Resim</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->category->name ?? 'Kategori Yok' }}</td>
                <td>
                    @if ($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="Ürün Resmi" class="img-thumbnail" style="width: 50px;">
                    @else
                    Resim Yok
                    @endif
                </td>
                <td>
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">Düzenle</a>
                    <form method="POST" action="{{ route('products.destroy', $product) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Sil</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Sayfalama -->
    <div class="mt-4">
        {{ $products->links() }}
    </div>
</div>
@endsection
