<?php

use App\Models\News;

use function Pest\Laravel\get;

test('home page can be rendered', function () {
    get(route('home'))
        ->assertStatus(200)
        ->assertSee('Desa Bantengputih');
});

test('home page displays hero slides', function () {
    get(route('home'))
        ->assertSee('Selamat Datang di Desa Bantengputih')
        ->assertSee('Gotong Royong Membangun Desa')
        ->assertSee('Produk Unggulan Desa');
});

test('home page displays statistics', function () {
    get(route('home'))
        ->assertSee('Jumlah Penduduk')
        ->assertSee('1526')
        ->assertSee('Luas Wilayah');
});

test('home page displays latest news', function () {
    // Create dummy news
    $news = News::factory()->create([
        'title' => 'Berita Terkini',
        'slug' => 'berita-terkini',
        'is_featured' => true,
    ]);

    get(route('home'))
        ->assertSee('Berita Terkini');
});
