<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateHeaderMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the 'Accept' header is present and is 'application/json'
        if ($request->headers->get('Accept') !== 'application/vnd.api+json') {
            // Return a 406 Not Acceptable response with an error message
            return response()->json([
                'errors' => [
                    "status" => 406,
                    "title" => "Invalid Accept Header",
                    "detail" => "The Accept header must be 'application/json'."
                ]
            ], 406);
        }

        // If the header is valid, proceed with the request
        return $next($request);
    }
}

