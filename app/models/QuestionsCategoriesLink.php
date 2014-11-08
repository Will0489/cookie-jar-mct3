<?php

class QuestionsCategoriesLink extends \Eloquent {
	protected $fillable = ['question_id', 'category_id'];
    protected $table = 'questionscategorieslink';

    public function question()
    {
        return $this->belongsTo('Question');
    }

    public function categories()
    {
        return $this->hasMany('Category');
    }
}