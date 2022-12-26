<?php

namespace App\Http\Middleware;

use App\Models\ApiToken as ApiTokenModel;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($token = $request->token) {
            $api_token = ApiTokenModel::where('token', $token)->first();

            if ($api_token) {
                $user = Auth::loginUsingId($api_token->user_id);

                return $next($request);
            }
        }

        abort(403, 'access denied');
    }
}
