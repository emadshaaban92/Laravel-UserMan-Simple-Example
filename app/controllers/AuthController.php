<?php namespace App\Controllers;

use Auth, BaseController, Form, Input, Redirect, Sentry, View;

class AuthController extends BaseController {

	/**
	 * Display the login page
	 * @return View
	 */
	public function getLogin()
	{
		return View::make('auth.login');
	}

	/**
	 * Display the register page
	 * @return View
	 */
	public function getRegister()
	{
		return View::make('auth.register');
	}

	/**
	 * Login action
	 * @return Redirect
	 */
	public function postLogin()
	{
		$credentials = array(
			'email'    => Input::get('email'),
			'password' => Input::get('password')
		);

		try
		{
			$user = Sentry::authenticate($credentials, false);

			if ($user)
			{
				return Redirect::route('MemberHome');
			}
		}
		catch(\Exception $e)
		{
			return Redirect::route('login')->withErrors(array('login' => $e->getMessage()));
		}
	}

	/**
	 * Login action
	 * @return Redirect
	 */
	public function postRegister()
	{

		$password1 = Input::get('password1');
		$password2 = Input::get('password2');

		if ($password1 != $password2){ 
			return Redirect::route('register')->withErrors(array('register' => "password didn't match"));
		}

		$credentials = array(
			'first_name'    => Input::get('fname'),
			'last_name' => Input::get('lname'),
			'email'    => Input::get('email'),
			'password' => $password1,
			'activated' => 1
		);

		try
		{
			$user = Sentry::getUserProvider()->create($credentials);

			if ($user)
			{
				return Redirect::route('login');
			}
		}
		catch(\Exception $e)
		{
			return Redirect::route('register')->withErrors(array('register' => $e->getMessage()));
		}
	}


	/**
	 * Logout action
	 * @return Redirect
	 */
	public function getLogout()
	{
		Sentry::logout();

		return Redirect::route('login');
	}

}
