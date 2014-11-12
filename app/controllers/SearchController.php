<?php

class SearchController extends \BaseController {

// Search based on title of the question
	public function results()
	{
		$data = Auth::user();
		$query = Request::get('q');
		
		if ($query) 
		{
			$questions = Question::where('title', 'LIKE', "%$query%")->get();
		}
		else
		{
			return "There is nothing like this:( ";
		}

		return View::make('search.results', compact('data','query'))->withQuestions($questions);
	}

}