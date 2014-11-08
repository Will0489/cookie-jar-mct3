<?php

class Question extends \Eloquent {
	protected $fillable = ['title', 'body', 'user_id', 'answered', 'deadline'];

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function questioncategories()
    {
        return $this->hasMany('QuestionsCategoriesLink');
    }
}