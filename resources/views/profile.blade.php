@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Profil Bilgileri</h1>
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="name">Ad Soyad</label>
            <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}" required>
        </div>

        <div class="form-group mt-3">
            <label for="email">E-posta</label>
            <input type="email" name="email" class="form-control" value="{{ auth()->user()->email }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Güncelle</button>
    </form>
</div>
@endsection
