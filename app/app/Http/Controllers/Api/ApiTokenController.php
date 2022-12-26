<?php

namespace App\Http\Controllers\Api;

use App\Models\ApiToken;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ApiTokenController extends Controller
{
    public function store(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user_id = Auth::user()->id;
            $api_token = ApiToken::updateOrCreate(
                [
                    'user_id' => $user_id,
                ],
                [
                    'user_id' => $user_id,
                    'token' => Str::random(60),
                ]
            );

            return [
                'token' => $api_token->token,
            ];
        }

        return [
            'message' => 'access denied',
        ];
    }
}
