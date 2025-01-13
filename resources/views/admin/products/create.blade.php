@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">{{ isset($product) ? 'Ürün Güncelle' : 'Yeni Ürün Ekle' }}</h1>
    <form action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($product))
            @method('PUT')
        @endif
        <div class="mb-3">
            <label for="name" class="form-label">Ürün Adı</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori</label>
            <select class="form-select" id="category_id" name="category_id" required>
                <option value="">Kategori Seçin</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ (isset($product) && $product->category_id == $category->id) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Açıklama</label>
            <textarea class="form-control" id="description" name="description">{{ old('description', $product->description ?? '') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Fiyat</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $product->price ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Ürün Resmi</label>
            <input type="file" class="form-control" id="image" name="image">
            @if(isset($product) && $product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="Mevcut Resim" width="100" class="mt-2">
            @endif
        </div>
        <button type="submit" class="btn btn-success">{{ isset($product) ? 'Güncelle' : 'Ekle' }}</button>
    </form>
</div>
@endsection
