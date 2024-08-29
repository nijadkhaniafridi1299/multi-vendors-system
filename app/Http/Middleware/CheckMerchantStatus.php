<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckMerchantStatus
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
        if(Auth::guard('merchant')->check()){
            $merchant = auth()->guard('merchant')->user();
            if ($merchant->status  && $merchant->ev  && $merchant->sv  && $merchant->tv) {
                return $next($request);
            } else {
                return redirect()->route('merchant.authorization');
            }
        }
        abort(403);
    }
}
