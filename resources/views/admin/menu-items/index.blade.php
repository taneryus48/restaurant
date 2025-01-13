@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Menü Öğeleri</h1>
    <a href="{{ route('menu-items.create') }}" class="btn btn-primary mb-3">Yeni Menü Öğesi Ekle</a>
    @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

    <table class="table-auto border-collapse border border-gray-300 w-full text-left">
    <thead>
        <tr class="bg-gray-200">
            <th class="border border-gray-300 px-4 py-2">ID</th>
            <th class="border border-gray-300 px-4 py-2">İsim</th>
            <th class="border border-gray-300 px-4 py-2">Fiyat</th>
            <th class="border border-gray-300 px-4 py-2">Kategori</th>
            <th class="border border-gray-300 px-4 py-2">İşlemler</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($menuItems as $menuItem)
            <tr>
                <td class="border border-gray-300 px-4 py-2">{{ $menuItem->id }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $menuItem->name }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $menuItem->price }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $menuItem->category->name }}</td>
                <td class="border border-gray-300 px-4 py-2 flex gap-2">
                    <a href="{{ route('menu-items.edit', $menuItem) }}" class="text-blue-500">Düzenle</a>
                    <form action="{{ route('menu-items.destroy', $menuItem) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500">Sil</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="mt-4">
    {{ $menuItems->links() }}
</div>

</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteForms = document.querySelectorAll('form[method="POST"]');
        deleteForms.forEach(form => {
            form.addEventListener('submit', function (e) {
                if (!confirm('Bu öğeyi silmek istediğinizden emin misiniz?')) {
                    e.preventDefault();
                }
            });
        });
    });
</script>

@endsection
