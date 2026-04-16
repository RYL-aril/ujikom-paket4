<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Set HTTP caching headers untuk frontend assets dan data
 */
class CacheHeaders
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // ✅ Static assets: Cache for 1 year (Vite fingerprints them)
        if ($this->isStaticAsset($request->path())) {
            $response->headers->set('Cache-Control', 'public, max-age=31536000, immutable');
            $response->headers->set('Expires', now()->addYear()->toRfc2822String());
        }
        
        // ✅ HTML pages: Cache validation only (no cache, validate with 304)
        elseif ($response->headers->get('Content-Type') === 'text/html; charset=UTF-8') {
            $response->headers->set('Cache-Control', 'public, max-age=0, must-revalidate');
            $response->headers->set('ETag', md5($response->getContent()));
        }

        // ✅ API responses: No cache
        elseif ($request->is('api/*')) {
            $response->headers->set('Cache-Control', 'no-cache, no-store, must-revalidate');
        }

        return $response;
    }

    private function isStaticAsset(string $path): bool
    {
        return preg_match('/\.(js|css|png|jpg|jpeg|gif|svg|woff2|woff|ttf)(\?.*)?$/', $path) === 1;
    }
}
