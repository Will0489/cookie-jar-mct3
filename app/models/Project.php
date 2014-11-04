<?php

class Project extends \Eloquent {
	protected $fillable = [];

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function projectcategories()
    {
        return $this->hasMany('ProjectCategoriesLink');
    }
}