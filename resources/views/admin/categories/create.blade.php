@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Yeni Ürün Ekle</h1>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Ürün Adı</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group mt-3">
                <label for="description">Açıklama</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>

            <div class="form-group mt-3">
                <label for="price">Fiyat</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>

            <div class="form-group mt-3">
                <label for="category_id">Kategori</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    <option value="" disabled selected>Kategori Seçin</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mt-3">
                <label for="image">Ürün Resmi</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>

            <button type="submit" class="btn btn-primary mt-3">Kaydet</button>
        </form>
    </div>
@endsection
