<?php

class QuestionController extends \BaseController {

	public function index()
	{
        $questions = Question::where('answered', '=','0')->with('user','questioncategories');

		$data = Auth::user();
		return View::make('questions.overview', compact('data', 'questions'));
	}

	public function create()
	{
		$data = Auth::user();
		return View::make('questions.new', array('data' => $data));
	}

	public function store()
	{
		//
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		//
	}

	public function update($id)
	{
		//
	}

	public function destroy($id)
	{
		//
	}

}
