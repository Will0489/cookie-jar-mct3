<?php

class MessageController extends \BaseController {

	public function index()
	{
		if(Auth::check())
        {
            $data = Auth::user();
            $questions = Question::where("user_id", "=", Auth::id())->get();

            return View::make('messages.overview', compact('data', 'questions'));
        } else {
            return View::make('error.guest');
        }
	}

	public function store()
	{
		//TODO: Add new message
	}
}