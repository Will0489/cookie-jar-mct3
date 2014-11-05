<?php

class QuestionController extends \BaseController {

	public function index()
	{
<<<<<<< HEAD:app/controllers/ProjectController.php
		$projects = Project::where('finished', '=','0')->with('user','projectcategories');
=======
        $questions = Question::where('finished', '=','0')->with('user','projectcategories');
>>>>>>> ab3870c7e803e99460a1f6dc18248f1223290557:app/controllers/QuestionController.php
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