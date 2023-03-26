<?php

namespace App\Http\Services;

use App\Models\User;
use Arr;

class UserService
{
    /**
     * @return array
     */
    public function ruleRegisterUser(): array
    {
        return [
            'name' => 'required|string|min:5|max:20',
            'email' => 'required|string|email|max:200',
            'password' => ['required', 'string', 'min:8']
        ];
    }

    /**
     * @param array $inputs
     * @return User
     */
    public function create(array $inputs): User
    {
        return User::create([
            'name' => $inputs['name'],
            'email' => $inputs['email'],
            'password' => bcrypt($inputs['password'])
        ]);
    }
}
