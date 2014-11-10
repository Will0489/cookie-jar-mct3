<?php

class Question extends \Eloquent {
	protected $fillable = ['title', 'body', 'user_id', 'answered', 'deadline'];

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function categories()
    {
        return $this->belongsToMany('Category', 'questionscategorieslink', 'question_id', 'category_id');
    }

    public function questioncategories()
    {
        return $this->hasMany('QuestionsCategoriesLink');
    }
}