@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Kategorileer</h1>
        <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm float-end">Yeni Kategori Ekle</a>
        <img src="{{ asset('images/Lokmalade.svg') }}" alt="Logo" class="w-32 h-auto mx-auto">
        <table class="table table-bordered">
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
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-warning">Düzenle</a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Sil</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
