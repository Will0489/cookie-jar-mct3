<?php

class Conversation extends \Eloquent {
	protected $fillable = [];

    public function collaboration()
    {
        return $this->belongsTo('Collaboration');
    }

    public function messages()
    {
        return $this->hasMany('Message');
    }
}