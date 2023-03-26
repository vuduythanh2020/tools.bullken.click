<?php

namespace Tests\Unit;

use App\Http\Services\UserService;
use App\Models\User;
use Mockery;

it('create user', function () {
    // Mock User model
    $userMock = Mockery::mock(User::class);

    // Expect create() method to be called with correct parameters
    $userMock->shouldReceive('create')->once()->with([
        'name' => 'John Doe',
        'email' => 'johndoe@example.com',
        'password' => '123@abc'
    ]);

    // Call create() method with test data
    $userMock->create([
        'name' => 'John Doe',
        'email' => 'johndoe@example.com',
        'password' => '123@abc'
    ]);
});
