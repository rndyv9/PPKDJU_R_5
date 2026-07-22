<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Operator Kali</title>
</head>
<body>
    <h1>{{ $title ?? 'Hasil' }}</h1>

    <form action="{{ route('store-kali') }}" method="post">
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
</body>
</html>
