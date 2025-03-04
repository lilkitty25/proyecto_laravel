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
        if($request->headers->get('Accept') !== 'application/json')
        return response()->json([
            'errors' => [
                "status" => 500,
                "title" => "Error en la base de datos",
                "detail" => "La base de datos no responde"
            ]);
    }
}
