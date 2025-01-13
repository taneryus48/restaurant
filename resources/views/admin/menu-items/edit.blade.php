@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Menü Öğesini Düzenle</h1>
    <form action="{{ route('menu-items.update', $menuItem) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">İsim</label>
            <input type="text" name="name" class="form-control" value="{{ $menuItem->name }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Açıklama</label>
            <textarea name="description" class="form-control">{{ $menuItem->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Fiyat</label>
            <input type="number" step="0.01" name="price" class="form-control" value="{{ $menuItem->price }}" required>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori</label>
            <select name="category_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $menuItem->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Resim</label>
            <input type="file" name="image" class="form-control">
            @if($menuItem->image)
                <p>Mevcut Resim: <img src="{{ asset('storage/' . $menuItem->image) }}" alt="{{ $menuItem->name }}" width="100"></p>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Güncelle</button>
    </form>
</div>
@endsection
