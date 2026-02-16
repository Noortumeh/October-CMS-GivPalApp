<?php

namespace Noor\Content\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        $locale = $request->header('Accept-Language')
            ?? $request->get('locale')
            ?? 'ar';
        App::setLocale($locale);

        return $next($request);
    }
}
