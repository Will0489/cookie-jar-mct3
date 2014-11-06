<?php

class QuestionController extends \BaseController {

	public function index()
	{
        $data = Auth::user();
        $questions = Question::where('answered', '=','0')->with('user','questioncategories');

		return View::make('questions.overview', compact('data', 'questions'));
	}

	public function create()
	{
        $data = Auth::user();
		return View::make('questions.new', compact('data'));
	}

	public function store()
    {
        $data = Input::all();
        $user = Auth::id();

        $rules = [
            'title' => 'required',
            'body' => 'required|max:300',
            'deadline' => 'required'
        ];
        $feedback = [
            'title.required' => 'You need to enter a title.',
            'body.required' => 'You should add some information first.',
            'body.max:300' => 'Your additional info can not be more than 300 characters.',
            'deadline.required' => 'You need to specify a deadline date.'
        ];

        $validator = Validator::make(Input::all(), $rules, $feedback);

        if($validator->fails())
        {
            return Redirect::back()->withInput()->withErrors($validator);
        }
        else
        {
            Question::create([
                'title' => $data['title'],
                'body' => $data['body'],
                'user_id' => $data['user_id'],
                'answered' => 0,
                'deadline' => $data['deadline']
            ]);
        }
        return Redirect::back();
	}

	public function show($id)
	{
        $question = Question::find($id)->with('user', 'questioncategories');

        return View::make('questions.detail', compact('question'));
	}
}
