<?php

class UsersCategoriesLink extends \Eloquent {
	protected $fillable = [];

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function categories()
    {
        return $this->hasMany('Category');
    }
}