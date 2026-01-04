<?php

use App\Models\GuestSubmission;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

use function Pest\Laravel\get;
use function Pest\Laravel\post;

test('upload form page can be rendered', function () {
    get(route('guest.upload'))
        ->assertStatus(200)
        ->assertSee('Berbagi Momen Bersama');
});

test('upload submission validates required fields', function () {
    post(route('guest.submit'), [])
        ->assertSessionHasErrors(['name', 'email', 'title', 'type', 'category', 'file', 'terms']);
});

test('upload submission validates file type for photos', function () {
    Storage::fake('public');

    $file = UploadedFile::fake()->create('document.pdf', 100); // Invalid type for photo

    $data = [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'title' => 'My Photo',
        'type' => 'photo',
        'category' => 'Kegiatan',
        'file' => $file,
        'terms' => '1',
    ];

    post(route('guest.submit'), $data)
        ->assertSessionHasErrors(['file']);
});

test('upload submission validates file size for photos', function () {
    Storage::fake('public');

    $file = UploadedFile::fake()->image('photo.jpg')->size(11000); // > 10MB

    $data = [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'title' => 'My Photo',
        'type' => 'photo',
        'category' => 'Kegiatan',
        'file' => $file,
        'terms' => '1',
    ];

    post(route('guest.submit'), $data)
        ->assertSessionHasErrors(['file']);
});

test('upload submission stores file and creates record', function () {
    Storage::fake('public');

    $file = UploadedFile::fake()->image('photo.jpg');

    $data = [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'phone' => '08123456789',
        'title' => 'Beautiful Village',
        'description' => 'A nice view',
        'type' => 'photo',
        'category' => 'Alam',
        'file' => $file,
        'terms' => '1',
    ];

    post(route('guest.submit'), $data)
        ->assertRedirect(route('guest.upload'))
        ->assertSessionHas('success');

    // Assert file stored
    $submission = GuestSubmission::where('email', 'john@example.com')->first();
    Storage::disk('public')->assertExists($submission->file_path);

    // Note: The controller uses time() prefix, so exact name match is tricky in test without mocking time or regex check.
    // But we can check if database record exists.

    $this->assertDatabaseHas('guest_submissions', [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'title' => 'Beautiful Village',
        'type' => 'photo',
        'status' => 'pending',
    ]);
});
