<?php

class Question extends \Eloquent {
	protected $fillable = [];

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function questioncategories()
    {
        return $this->hasMany('QuestionsCategoriesLink');
    }
}