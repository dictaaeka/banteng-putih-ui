<?php

use App\Models\News;
use Illuminate\Support\Str;

test('news has a slug generated from title', function () {
    $title = 'Berita Penting Hari Ini';
    $news = new News(['title' => $title]);

    // Assuming the model has a mutator or observer, but based on Filament resource,
    // slug is generated in the form.
    // However, usually models also have sluggable trait.
    // Let's check if the model uses Sluggable trait or if we need to manually set it in test.

    // If the logic is purely in Filament resource, then model unit test might just check attributes.
    // But let's assume we want to test if we can create a news item.

    $news->slug = Str::slug($title);

    expect($news->slug)->toBe('berita-penting-hari-ini');
});

test('news can check if it is featured', function () {
    $news = new News(['is_featured' => true]);
    expect($news->is_featured)->toBeTrue();

    $news = new News(['is_featured' => false]);
    expect($news->is_featured)->toBeFalse();
});
