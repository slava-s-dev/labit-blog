<?php

namespace App\Http\Controllers;

use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Sentinel, Session, Redirect, Request, Validator;

class LoginController extends Controller
{

	public function showIndexPage()
	{
		if (Sentinel::check()) {
			return Redirect::intended (route('admin_index'));
		}

		return view('login.index');
	}

	public function auth()
	{
		if ($this->validation()) {
			try {

				$user = Sentinel::authenticate (
					array (
						'email' => Request::get ('email'),
						'password' => Request::get ('password')
					)
				);

				if (!$user) {

					Session::flash ("login_error", "Пользователь не найден");

					return Redirect::route ("login");
				}

				return Redirect::intended (route('admin_index'));

			} catch (ThrottlingException $e) {
				Session::flash ("login_not_found", "Превышено количество возможных попыток входа");

				return Redirect::route ("login");
			} catch (NotActivatedException $e) {

				Session::flash ("login_error", "Пользователь не активирован");

				return Redirect::route ("login");
			}
		} else {
			Session::flash("login_error", "Некорректные данные запроса");

			return Redirect::route("login");
		}
	}

	private function validation()
	{
		$rules = array(
			'email' => 'required|email|max:50',
			'password'=> 'required|min:6|max:20',
		);

		$validator = Validator::make(Request::all(), $rules);

		if ($validator->fails()) {
			return false;
		} else {
			return true;
		}
	}

	public function logout()
	{
		Sentinel::logout();

		return Redirect::route("login");
	}
}