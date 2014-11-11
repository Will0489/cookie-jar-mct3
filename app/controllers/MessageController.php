<?php

class MessageController extends \BaseController {

	public function index()
	{
		if(Auth::check())
        {
            $data = Auth::user();
            $conversations = Conversation::where("owner_id", "=", Auth::id())->orWhere("user_id", "=", Auth::id())->with('messages.user')->get();

            return View::make('messages.overview', compact('data', 'conversations'));
        } else {
            return View::make('error.guest');
        }
	}

	public function store()
	{
		$data = Input::all();
        $user = Auth::user();

        $conversation = Conversation::findOrFail($data['conversation_id'])->with('owner', 'collaborator')->first();


            $message = Message::create([
                'conversation_id' => $conversation->id,
                'sender_id' => $user->id,
                'content' => $data['msg'],
            ]);

            return Redirect::back();


	}
}