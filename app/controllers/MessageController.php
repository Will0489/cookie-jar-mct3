<?php

class MessageController extends \BaseController {

	public function index()
	{
		if(Auth::check())
        {
            $data = Auth::user();
            $conversations = Conversation::where("owner_id", "=", Auth::id())->with('messages.user')->get();

            return View::make('messages.overview', compact('data', 'conversations'));
        } else {
            return View::make('error.guest');
        }
	}

	public function store()
	{
		$data = Input::all();
        $conversation = Conversation::findOrFail($data['conversation_id'])->with('question')->get();



	}
}