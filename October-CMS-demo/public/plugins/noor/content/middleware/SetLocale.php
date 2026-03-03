<?php

namespace Noor\Content\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use RainLab\Translate\Classes\Translator;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        $locale = $request->header('Accept-Language')
            ?? $request->locale
            ?? 'ar';
        App::setLocale($locale);
        
        Translator::instance()->setLocale($locale);

        return $next($request);
    }
}
