@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Yeni Ürün Ekle</h1>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Ürün Adı</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Açıklama</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="price">Fiyat</label>
                <input type="number" name="price" id="price" step="0.01" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="image">Ürün Görseli</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Ekle</button>
        </form>
    </div>
@endsection
