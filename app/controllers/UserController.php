<?php

class UserController extends \BaseController {

    public function profile()
    {
        if(Auth::check())
        {
            $data = Auth::user();
            $questions = Question::where("user_id", "=", Auth::id())->get();

            return View::make('users.profile', compact('data', 'questions'));
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
            // $file->crop(200,200);
            $filename = $file->getClientOriginalName();
            $destpath = '/images/'.str_random(16).'/';

            $file->move($destpath, $filename);
            $storedata['photo'] = $destpath . $filename;
        } else {
            $storedata['photo'] = '/images/no_avatar.jpg';
        }
        $user = User::create($storedata);
        if ($user)
        {
            Auth::login($user);
            return Redirect::to('/profile');
        }

        return Redirect::back()->withInput()->withErrors(['Failed to register.']);
	}

    public function edit()
    {
        $data = Auth::user();

        if(!Auth::check())
        {
            return Redirect::back()->withErrors(['You need to log in to edit your profile']);
        }

        return View::make('users.edit', compact('data'));
    }

    public function update()
    {
        $data = Input::all();
        $user = Auth::id();

        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required'
        ];
        $feedback = [
            'first_name.required' => 'Please enter your first name.',
            'last_name.required' => 'Please enter your last name.',
            'email.required' => 'Please enter a valid email address.',
        ];

        $validator = Validator::make(Input::all(), $rules, $feedback);

        if($validator->fails())
        {
            return Redirect::back()->withInput()->withErrors($validator);
        }
        elseif(!isset($data['tagvalues']))
        {
            return Redirect::back()->withInput()->withErrors('Please enter at least one tag for your skills/passions.');
        }
        else
        {
            $user = User::findOrFail(Auth::id());

            $user->first_name = $data['first_name'];
            $user->last_name = $data['last_name'];
            $user->email = $data['email'];

            foreach($data['tagvalues'] as $tag)
            {
                if(is_numeric($tag)) {
                    $user->categories()->attach($tag);
                } else {
                    $category = Category::create([
                        'name' => $tag,
                        'image_url' => null,
                        'description' => ''
                    ]);

                    $user->categories()->attach($category->id);
                }
            }
        }
        return Redirect::back();
    }
}