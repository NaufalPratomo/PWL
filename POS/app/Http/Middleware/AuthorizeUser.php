<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthorizeUser
{
	/**
	 * Handle an incoming request.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param \Closure $next
	 * @param string $role
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function handle(Request $request, Closure $next, $role): Response
	{
		$user = $request->user(); // Retrieve the logged-in user

		// Check if the user has the required role
		if ($user->hasRole($role)) {
			return $next($request);
		}

		// If the user does not have the role, return a 403 error
		abort(403, 'Forbidden. Kamu tidak punya akses ke halaman ini.');
	}
}