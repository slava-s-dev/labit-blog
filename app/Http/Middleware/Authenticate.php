<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Sentinel, Session, Request, Response, Closure;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
	    try {
		    if (!Sentinel::check()) {
			    if (Request::ajax()) {
				    $data = array(
					    "status" => "error",
					    "code" => "401",
					    "message" => "Unauthorized"
				    );
				    return Response::json($data, "401");
			    } else {
				    return redirect()->guest('login');
			    }
		    }
		    //check access
		    $user = Sentinel::getUser();
		    if(!$user->hasAccess(['admin.access'])) {
			    Session::flash("login_not_found", "Нет прав на вход в админку");
			    Sentinel::logout();
			    return Redirect::route("login_show");
		    }
	    } catch (\Cartalyst\Sentinel\Checkpoints\NotActivatedException $e) {
		    Session::flash ("login_not_found", "Пользователь не активирован");
		    Sentinel::logout();

		    return Redirect::route("login");
	    }

//        if (Auth::guard($guard)->guest()) {
//            if ($request->ajax() || $request->wantsJson()) {
//                return response('Unauthorized.', 401);
//            } else {
//                return redirect()->guest('login');
//            }
//        }

        return $next($request);
    }
}
