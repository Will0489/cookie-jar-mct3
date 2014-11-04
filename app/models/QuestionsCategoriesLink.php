<?php

class QuestionsCategoriesLink extends \Eloquent {
	protected $fillable = [];

    public function question()
    {
        return $this->belongsTo('Question');
    }

    public function categories()
    {
        return $this->hasMany('Category');
    }
}