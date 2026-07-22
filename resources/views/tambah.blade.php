@extends('belajar')
@section('content')
    <form action="{{ route('store-tambah') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="">Angka 1</label>
            <input type="number" name="angka1" id="" placeholder="Masukkan angka">
        </div>
        <div class="mb-3">
            <label for="">Angka 2</label>
            <input type="number" name="angka2" id="" placeholder="Masukkan angka">
        </div>
        <br>
        <button type="submit">Simpan</button>
        <a href="{{ route('belajar-laravel') }}">Kembali</a>
    </form>

    <h3>Hasilnya adalah : {{ $jumlah }}</h3>
@endsection
