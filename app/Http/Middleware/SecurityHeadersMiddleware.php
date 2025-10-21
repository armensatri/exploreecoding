<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SecurityHeadersMiddleware
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle(Request $request, Closure $next)
  {
    $response = $next($request);

    // Content Security Policy (CSP) dengan sumber yang dipercaya
    $csp = "default-src 'self'; ";
    $csp .= "script-src 'self' https://cdn.jsdelivr.net https://cdnjs.cloudflare.com; ";
    $csp .= "style-src 'self' https://cdn.jsdelivr.net; ";
    $csp .= "img-src 'self' data:; ";
    $csp .= "font-src 'self' https://fonts.googleapis.com https://fonts.gstatic.com;";

    $response->headers->set(
      'Content-Security-Policy',
      $csp
    );

    // Cegah Clickjacking
    $response->headers->set(
      'X-Frame-Options',
      'SAMEORIGIN'
    );

    // Cegah MIME sniffing
    $response->headers->set(
      'X-Content-Type-Options',
      'nosniff'
    );

    // Paksa HTTPS
    $response->headers->set(
      'Strict-Transport-Security',
      'max-age=31536000; includeSubDomains'
    );

    // Kontrol referrer
    $response->headers->set(
      'Referrer-Policy',
      'no-referrer-when-downgrade'
    );

    // Kontrol fitur browser yang diizinkan
    $response->headers->set(
      'Permissions-Policy',
      'geolocation=(), microphone=(), camera=()'
    );

    return $response;
  }
}
