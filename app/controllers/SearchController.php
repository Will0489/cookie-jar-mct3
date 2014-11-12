<?php

class SearchController extends \BaseController {

// Search based on title of the question
	public function results()
	{
		$data = Auth::user();
		$query = Request::get('q');
		
		if ($query && $query != '')
		{
			$questions = Question::where('title', 'LIKE', "%$query%")->get();
		}
		elseif($query == '')
		{
            return Redirect::to('/questions')->with('message', 'Because you entered an empty search we directed you to the overview page ;)');
		}

		return View::make('search.results', compact('data','query'))->withQuestions($questions);
	}

}