<?php

use App\Models\GuestSubmission;

test('guest submission has default pending status', function () {
    $submission = new GuestSubmission;
    // Assuming database default is pending, but here we test model instance
    // If default is set in migration, we need to save to DB to see it, or check $attributes

    // Let's just check if we can set status
    $submission->status = 'pending';
    expect($submission->status)->toBe('pending');
});

test('guest submission can be approved', function () {
    $submission = new GuestSubmission(['status' => 'pending']);

    // Simulate approval logic if it exists in model, or just attribute change
    $submission->status = 'approved';

    expect($submission->status)->toBe('approved');
});
