<?php

// Resources
Route::resource('sessions', 'SessionController');
Route::resource('question', 'QuestionController');
Route::resource('user', 'UserController');
Route::resource('message', 'MessageController');

// Search routes
Route::post('search', 'SearchController@search');
Route::get('search', array('as' => 'results', 'uses' => 'SearchController@results'));

// User routes
Route::get('profile', 'UserController@profile');
Route::get('profile/{id}', 'UserController@show');
Route::get('signup', 'UserController@create');
Route::post('signup', 'UserController@store');
Route::get('edit', 'UserController@edit');

// Question routes
Route::get('questions', 'QuestionController@index');
Route::get('questions/new', 'QuestionController@create');
Route::get('questions/{id}/help', 'QuestionController@help');
Route::get('questions/{id}/done', 'QuestionController@done');
Route::get('questions/tags', 'QuestionController@tags');

// Message routes
Route::get('messages', 'MessageController@index');
Route::post('messages/reply', 'MessageController@reply')->before('auth'); // TODO: Implement AJAX/WebSockets messaging

// Static page routes
Route::get('help', 'PagesController@help');
Route::get('tos', 'PagesController@tos');
Route::get('about', 'PagesController@about');
Route::get('story', 'PagesController@story');

// Authentication routes
Route::get('/', function()
{
    $data = array();
    $latest_top = Question::orderBy('created_at', 'desc')->with('user', 'categories')->take(3)->get();
    $latest_bot = Question::orderBy('created_at', 'desc')->with('user', 'categories')->take(3)->skip(3)->get();

    if (Auth::check()) {
        $data = Auth::user();
    }
    return View::make('pages.home', compact('data', 'latest_top', 'latest_bot'));
});

Route::get('logout', function() {
    Auth::logout();
    return Redirect::to('/')->with('message', 'You have been logged out.');
});

Route::get('login', 'SessionController@create');

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

    $profile = Profile::whereUid($uid)->first();
    if (empty($profile)) {

        $user = new User;
        $user->first_name = $me['first_name'];
        $user->last_name = $me['last_name'];
        $user->email = $me['email'];
        //TODO: Store FB avatar locally
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