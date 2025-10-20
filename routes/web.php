<?php

use Illuminate\Support\Facades\Route;

// Home/Beranda
Route::get('/', function () {
    return view('home');
})->name('home');

// Profil Desa
Route::get('/tentang-kami', function () {
    return view('about');
})->name('about');

Route::get('/galeri', function () {
    return view('gallery');
})->name('gallery');

Route::get('/berita', function () {
    return view('news');
})->name('news');

Route::get('/berita/{id}', function ($id) {
    return view('news-detail', compact('id'));
})->name('news.detail');

// Layanan
Route::get('/layanan', function () {
    return view('service');
})->name('service');

Route::get('/pengaduan', function () {
    return view('complaint');
})->name('complaint');

Route::get('/transparansi', function () {
    return view('docs');
})->name('docs');

// Produk Desa
Route::get('/produk-desa', function () {
    return view('product');
})->name('product');

// Kontak
Route::get('/kontak', function () {
    return view('contact');
})->name('contact');

// Population/Kependudukan
Route::get('/kependudukan', function () {
    return view('population');
})->name('population');

// Tour (jika ada)
Route::get('/wisata', function () {
    return view('tour');
})->name('tour');
