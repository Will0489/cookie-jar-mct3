<?php

class Conversation extends \Eloquent {
	protected $fillable = ['question_id', 'owner_id', 'user_id', 'archived'];

    public function question()
    {
        return $this->belongsTo('Question');
    }

    public function messages()
    {
        return $this->hasMany('Message');
    }

    public function owner()
    {
        return $this->belongsTo('User', 'owner_id');
    }

    public function sender()
    {
        return $this->belongsTo('User', 'user_id');
    }
}