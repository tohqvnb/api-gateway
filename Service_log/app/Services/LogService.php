<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

class LogService
{
    public function logUserRegistration($user)
    {
        Log::info('User registered', [
            'user_id' => $user->id,
            'user_name' => $user->name,
            'user_email' => $user->email,
            'registered_at' => $user->created_at,
        ]);
    }
}
