<?php

use App\Models\Village;

use function Pest\Laravel\get;
use function Pest\Laravel\post;

beforeEach(function () {
    // Create a dummy village record for phone number
    Village::create([
        'name' => 'Desa Bantengputih',
        'phone' => '628123456789',
        'email' => 'desa@example.com',
        'address' => 'Jl. Raya No. 1',
        'description' => 'Desa Makmur',
    ]);
});

test('complaint page can be rendered', function () {
    get(route('complaints.create'))
        ->assertStatus(200)
        ->assertSee('Pengaduan');
});

test('complaint submission requires validation', function () {
    post(route('complaints.submit'), [])
        ->assertSessionHasErrors(['kategori', 'judul', 'isi']);
});

test('complaint submission redirects to whatsapp', function () {
    $data = [
        'nama' => 'John Doe',
        'kategori' => 'pembangunan',
        'judul' => 'Jalan Rusak',
        'isi' => 'Ada lubang besar di jalan utama.',
    ];

    $response = post(route('complaints.submit'), $data);

    // Expect a redirect to WhatsApp
    $response->assertRedirect();

    $redirectUrl = $response->headers->get('Location');
    expect($redirectUrl)->toContain('wa.me');
    expect($redirectUrl)->toContain('628123456789'); // Phone from Village model
    expect($redirectUrl)->toContain('Jalan+Rusak'); // Title encoded
});

test('complaint submission via ajax returns json', function () {
    $data = [
        'nama' => 'Jane Doe',
        'kategori' => 'sosial',
        'judul' => 'Bantuan Sosial',
        'isi' => 'Mohon info bantuan sosial.',
    ];

    $response = post(route('complaints.submit'), $data, ['X-Requested-With' => 'XMLHttpRequest']);

    $response->assertJson([
        'success' => true,
    ]);

    $json = $response->json();
    expect($json['whatsapp_url'])->toContain('wa.me');
});
