<?php

class PagesController extends \BaseController {

	public function about()
	{
        $data = Auth::user();
		return View::make('pages.about', compact('data'));
	}

	public function help()
	{
        $data = Auth::user();
		return View::make('pages.help', compact('data'));
	}

	public function tos()
	{
        $data = Auth::user();
		return View::make('pages.tos', compact('data'));
	}

	public function story()
	{
        $data = Auth::user();
		return View::make('pages.story', compact('data'));
	}

}