<?php

class PagesController extends \BaseController {

	public function about()
    {
        return View::make('pages.about');
    }

    public function help()
    {
        return View::make('pages.help');
    }

    public function tos()
    {
        return View::make('pages.tos');
    }

}