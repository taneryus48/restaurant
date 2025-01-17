@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Yeni Ürün Ekle</h1>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="name">Ürün Adı</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="description">Açıklama</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="form-group mb-3">
            <label for="price">Fiyat</label>
            <input type="number" name="price" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="category_id">Kategori</label>
            <select name="category_id" class="form-control">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="image">Resim</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Kaydet</button>
    </form>
</div>
@endsection
