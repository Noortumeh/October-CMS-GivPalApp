<?php

namespace Noor\Content\Middleware;

use Closure;
use Illuminate\Http\Request;
use RainLab\Translate\Classes\Translator;

class SetLocale
{
    /**
     * Set the active locale for the current API request.
     *
     * Priority:
     *  1. Accept-Language header (e.g. Accept-Language: ar)
     *  2. ?locale= query parameter (e.g. /api/home-contents?locale=ar)
     *  3. Default locale configured in RainLab Translate settings
     *
     * The locale must be registered in the rainlab_translate_locales table.
     * If the requested locale is not found, it silently falls back to the default.
     */
    public function handle(Request $request, Closure $next)
    {
        $translator = Translator::instance();

        // Determine the requested locale from header or query string
        $locale = $request->header('Accept-Language')
            ?? $request->query('locale') ?? 'ar';

        if ($locale) {
            // setLocale() returns false if the locale is not registered in the DB
            $set = $translator->setLocale($locale);
            app()->setLocale($locale);

            if (!$set) {
                // Requested locale is not registered — fall back to default silently
                $locale = $translator->getDefaultLocale();
                $translator->setLocale($locale);
                app()->setLocale($locale);
            }
        }

        return $next($request);
    }
}
