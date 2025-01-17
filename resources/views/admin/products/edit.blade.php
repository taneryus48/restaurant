@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6">
    <h1 class="text-2xl font-bold mb-4">Ürün Düzenle</h1>

    <form method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Ürün Adı -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Ürün Adı</label>
            <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Ürün Açıklaması -->
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Açıklama</label>
            <textarea name="description" id="description"
                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('description', $product->description) }}</textarea>
            @error('description')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Fiyat -->
        <div class="mb-4">
            <label for="price" class="block text-sm font-medium text-gray-700">Fiyat</label>
            <input type="number" name="price" id="price" step="0.01" value="{{ old('price', $product->price) }}"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            @error('price')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Kategori -->
        <div class="mb-4">
            <label for="category_id" class="block text-sm font-medium text-gray-700">Kategori</label>
            <select name="category_id" id="category_id"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Popüler Ürün -->
        <div class="mb-4">
    <label for="is_popular" class="block text-sm font-medium text-gray-700">Popüler Ürün</label>
    <input type="checkbox" name="is_popular" id="is_popular" value="1" {{ $product->is_popular ? 'checked' : '' }}>
</div>

        <!-- Durum -->
        <div class="mb-4">
            <label for="status" class="block text-sm font-medium text-gray-700">Durum</label>
            <select name="status" id="status"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                <option value="draft" {{ old('status', $product->status) == 'draft' ? 'selected' : '' }}>Taslak</option>
                <option value="published" {{ old('status', $product->status) == 'published' ? 'selected' : '' }}>Yayında</option>
            </select>
            @error('status')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Görsel -->
        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Ürün Görseli</label>
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="mb-2 w-32 h-32 object-cover">
            @endif
            <input type="file" name="image" id="image"
                   class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
        </div>

        <!-- Kaydet Butonu -->
        <div>
            <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">
                Kaydet
            </button>
        </div>
    </form>
</div>
@endsection
