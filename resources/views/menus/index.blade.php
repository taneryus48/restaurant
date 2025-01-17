@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold mb-8 text-center">Restoran Menüsü</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @foreach($products as $product)
        <div class="bg-white shadow rounded-lg overflow-hidden">
            @if ($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
            @else
            <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500">
                Resim Yok
            </div>
            @endif
            <div class="p-4">
                <h2 class="text-lg font-bold mb-2">{{ $product->name }}</h2>
                <p class="text-gray-700 text-sm mb-4">{{ $product->description }}</p>
                <div class="text-lg font-semibold text-blue-500">₺{{ number_format($product->price, 2) }}</div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
