@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Ürün Düzenle</h1>

    <form method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">İsim:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $product->name) }}">
        </div>

        <div class="form-group">
            <label for="description">Açıklama:</label>
            <textarea name="description" id="description" class="form-control">{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Fiyat:</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $product->price) }}">
        </div>

        <div class="form-group">
            <label for="category_id">Kategori:</label>
            <select name="category_id" id="category_id" class="form-control">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="image">Resim:</label>
            <input type="file" name="image" id="image" class="form-control-file">
        </div>

        @if ($product->image)
        <div class="mb-3">
            <img src="{{ asset('storage/' . $product->image) }}" alt="Ürün Resmi" class="img-thumbnail" style="width: 150px;">
            <form method="POST" action="{{ route('products.removeImage', $product) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger mt-2">Resmi Sil</button>
            </form>
        </div>
        @endif

        <button type="submit" class="btn btn-primary">Güncelle</button>
    </form>
</div>
@endsection
