<?php

// Logging in/out using Cookie Jar account
Route::get('login', 'SessionController@create');
//Route::get('logout', 'SessionController@destroy');
Route::resource('sessions', 'SessionController');

// Search routes
Route::get('search', 'SearchController@home');
Route::get('search/results', 'SearchController@results');

// User routes
Route::get('profile', 'UserController@profile');
Route::get('settings', 'UserController@settings')->before('auth');
Route::get('register', 'UserController@register');

// Project routes
Route::get('projects', 'ProjectController@home');
Route::get('projects/details', 'ProjectController@details');
Route::get('projects/story', 'ProjectController@story'); // Public review of a finished project

// Message routes
Route::get('messages', 'MessageController@home');

// Question routes
Route::get('questions', 'QuestionController@home');
Route::get('questions/details', 'QuestionController@details');
Route::get('questions/add-new', 'QuestionController@create');

// Facebook routes
Route::get('/', function()
{
    $data = array();

    if (Auth::check()) {
        $data = Auth::user();
    }
    return View::make('user', array('data'=>$data));
});

Route::get('logout', function() {
    Auth::logout();
    return Redirect::to('/');
});

Route::get('login/fb', function() {
    $facebook = new Facebook(Config::get('facebook'));
    $params = array(
        'redirect_uri' => url('/login/fb/callback'),
        'scope' => 'email',
    );
    return Redirect::away($facebook->getLoginUrl($params));
});

Route::get('login/fb/callback', function() {
    $code = Input::get('code');
    if (strlen($code) == 0) return Redirect::to('/')->with('message', 'There was an error communicating with Facebook');

    $facebook = new Facebook(Config::get('facebook'));
    $uid = $facebook->getUser();

    if ($uid == 0) return Redirect::to('/')->with('message', 'There was an error');

    $me = $facebook->api('/me');

    dd($me);
});

Route::get('login/fb/callback', function() {
    $code = Input::get('code');
    if (strlen($code) == 0) return Redirect::to('/')->with('message', 'There was an error communicating with Facebook');

    $facebook = new Facebook(Config::get('facebook'));
    $uid = $facebook->getUser();

    if ($uid == 0) return Redirect::to('/')->with('message', 'There was an error');

    $me = $facebook->api('/me');

    $profile = Profile::whereUid($uid)->first();
    if (empty($profile)) {

        $user = new User;
        $user->username = $me['first_name'].' '.$me['last_name'];
        $user->email = $me['email'];
        $user->photo = 'https://graph.facebook.com/'.$me['id'].'/picture?type=large';

        $user->save();

        $profile = new Profile();
        $profile->uid = $uid;
        $profile = $user->profiles()->save($profile);
    }

    $profile->access_token = $facebook->getAccessToken();
    $profile->save();

    $user = $profile->user;

    Auth::login($user);

    return Redirect::to('/')->with('message', 'Logged in with Facebook');
});