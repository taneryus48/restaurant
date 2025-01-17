@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Yeni Kategori Ekle</h1>
        <form action="{{ route('categories.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Kategori Adı</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                    placeholder="Kategori adını girin" 
                    required>
            </div>

            <div class="flex items-center justify-between">
                <button 
                    type="submit" 
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Kaydet
                </button>
            </div>
        </form>
    </div>
@endsection
