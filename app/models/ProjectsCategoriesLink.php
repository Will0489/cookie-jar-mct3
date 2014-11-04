<?php

class ProjectsCategoriesLink extends \Eloquent {
	protected $fillable = [];

    public function project()
    {
        return $this->belongsTo('Project');
    }

    public function categories()
    {
        return $this->hasMany('Category');
    }
}