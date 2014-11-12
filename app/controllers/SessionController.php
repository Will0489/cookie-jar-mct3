<?php

class SessionController extends \BaseController {

	public function create()
	{
        if (Auth::check()) return Redirect::to('/');

		return View::make('sessions.create');
	}

	public function store()
	{
		if (Auth::attempt(Input::only('email', 'password')))
        {
            return Redirect::to('/profile');
        }

        return Redirect::back()->withInput()->withErrors(['Invalid e-mail address or password.']);
    }

	public function destroy()
	{
		Auth::logout();

        return Redirect::route('login');
	}

}