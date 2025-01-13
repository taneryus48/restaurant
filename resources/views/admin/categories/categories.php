@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Kategoriler</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Yeni Kategori Ekle</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>İsim</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning btn-sm">Düzenle</a>
                    <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Emin misiniz?')" class="btn btn-danger btn-sm">Sil</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
