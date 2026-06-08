<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Closure;

class CheckUser
{
    public function handle(Request $request, Closure $next)
    {
        // login corect
        if (Auth::check()) {
            return $next($request);
        }

        // logine non corecte
        return redirect()->route('stagair.login')
            ->with('ereur', 'logine et important');
    }
}