<?php

class ProjectController extends \BaseController {

	public function index()
	{
        $projects = Project::where('finished', '=','0')->with('user','projectcategories');
		$data = Auth::user();
		return View::make('questions.overview', compact('data', 'projects'));
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