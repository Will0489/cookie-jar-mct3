<?php

class UserController extends \BaseController {

    public function profile()
    {
        if(Auth::check())
        {
            $data = Auth::user();
            return View::make('users.profile', array('data' => $data));
        } else {
            return View::make('error.guest');
        }
    }

	public function create()
	{
		return View::make('users.register');
	}

	public function store()
	{
        $rawdata = Input::only(['firstname','lastname','email','photo','password']);
        $storedata['first_name'] = $rawdata['firstname'];
        $storedata['last_name'] = $rawdata['lastname'];
        $storedata['email'] = $rawdata['email'];
        $storedata['photo'] = '';
        $storedata['password'] = $rawdata['password'];
        if(Input::hasFile('photo'))
        {
            $file = Input::file('photo');
            $filename = $file->getClientOriginalName();
            $destpath = 'assets/images/users'.str_random(16).'/';

            $file->move($destpath, $filename);
            $storedata['photo'] = $destpath . $filename;
        } else {
            $storedata['photo'] = 'assets/images/users/no_avatar.jpg';
        }
        $user = User::create($storedata);
        if ($user)
        {
            Auth::login($user);
            return Redirect::to('/profile');
        }

        return Redirect::back()->withInput()->withErrors(['Failed to register.']);
	}
}