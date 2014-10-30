<?php

// Resources
Route::resource('sessions', 'SessionController');
Route::resource('user', 'UserController');
Route::resource('project', 'ProjectController');
Route::resource('conversation', 'ConversationController');
Route::resource('message', 'MessageController');

// Logging in/out using Cookie Jar account
Route::get('/', function()
{
    $data = array();

    if (Auth::check()) {
        $data = Auth::user();
    }
    return View::make('pages.home', array('data'=>$data));
});
Route::get('login', 'SessionController@create');
Route::get('logout', function() {
    Auth::logout();
    return Redirect::to('/')->with('message', 'You have been logged out.');
});

// Search routes
Route::post('search', 'SearchController@search');
Route::get('search/results', 'SearchController@results');

// User routes
Route::get('profile', 'UserController@profile');
Route::get('profile/{id}', 'UserController@profilebyid');
Route::get('settings', 'UserController@settings')->before('auth');
Route::get('signup', 'UserController@create');
Route::post('signup', 'UserController@store');

// Project routes
Route::get('projects', 'ProjectController@home');
Route::get('projects/{id}', 'ProjectController@details');
Route::get('projects/{id}/edit', 'ProjectController@edit')->before('auth');
Route::get('questions', 'ProjectController@questionhome');
Route::get('questions/new', 'ProjectController@create')->before('auth');
Route::get('story/{id}', 'ProjectController@story');
Route::get('story/new', 'ProjectController@story')->before('auth');

// Message routes
Route::get('messages', 'MessageController@home');
Route::post('messages/reply', 'MessageController@reply')->before('auth');

// Facebook routes
Route::get('login/fb', function() {
    $facebook = new Facebook(Config::get('facebook'));
    $params = array(
        'redirect_uri' => url('/login/fb/callback'),
        'scope' => 'email',
    );
    return Redirect::away($facebook->getLoginUrl($params));
});

/*
// Display FB user info as object
Route::get('login/fb/callback', function() {
    $code = Input::get('code');
    if (strlen($code) == 0) return Redirect::to('/')->with('message', 'There was an error communicating with Facebook');

    $facebook = new Facebook(Config::get('facebook'));
    $uid = $facebook->getUser();

    if ($uid == 0) return Redirect::to('/')->with('message', 'There was an error');

    $me = $facebook->api('/me');

    dd($me);
});*/

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
        // $user->password = Hash::make($me['id'];
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

    return Redirect::to('/')->with('message', 'Logged in with Facebook. ');
});