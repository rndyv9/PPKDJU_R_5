<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BelajarController extends Controller
{
    public function index() {
        $title = "Belajar matematika dasar";
        // return "Halo kami sedang belajar laravel";
        return view('belajar', compact('title'));
    }
    public function tambah() {
        $jumlah = 0;
        $title = "Penjumlahan";
        return view('tambah', compact('jumlah', 'title'));
    }

    public function storeTambah(Request $request) {
        // $request = new request()
        $angka1 = $request->angka1;
        $angka2 = $request->input('angka2');

        $jumlah = $angka1 + $angka2;
        // return $jumlah;
        return view('tambah', compact('jumlah'));
        // return view('tambah', [
        //     'jumlah' => $jumlah,
        //     'title'  => 'Penjumlahan'
        // ]);
    }

    public function kurang() {
        $jumlah = 0;
        $title = "Pengurangan";
        return view('kurang', compact('jumlah', 'title'));
    }

    public function storeKurang(Request $request) {
        $angka1 = $request->angka1;
        $angka2 = $request->input('angka2');

        $jumlah = max(0, $angka1 - $angka2);
        // $jumlah = $angka1 - $angka2;
        // return $jumlah;
        return view('kurang', compact('jumlah'));
    }

    public function Kali() {
        $jumlah = 0;
        $title = "Perkalian";
        return view('kali', compact('jumlah', 'title'));
    }

    public function storeKali(Request $request) {
        $angka1 = $request->angka1;
        $angka2 = $request->input('angka2');

        $jumlah = $angka1 * $angka2;
        // return $jumlah;
        return view('kali', compact('jumlah'));
    }

    public function Bagi() {
        $jumlah = 0;
        $title = "Pembagian";
        return view('bagi', compact('jumlah', 'title'));
    }

    public function storeBagi(Request $request) {
        $angka1 = $request->angka1;
        $angka2 = $request->input('angka2');

        $jumlah = $angka1 / $angka2;
        // return $jumlah;
        return view('bagi', compact('jumlah'));
    }
}
