@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ürünler</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Yeni Ürün Ekle</a>

    @if ($products->isEmpty())
        <p>Henüz ürün eklenmedi.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Adı</th>
                    <th>Fiyat</th>
                    <th>Kategori</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->category->name ?? 'Kategori Yok' }}</td>
                        <td>
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm">Düzenle</a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Sil</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $products->links() }}
    @endif
</div>
@endsection
