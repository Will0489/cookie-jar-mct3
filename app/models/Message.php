<?php

class Message extends \Eloquent {
	protected $fillable = [];
    
    public function user()
    {
        return $this->belongsTo('User');
    }

    public function conversation()
    {
        return $this->belongsTo('Conversation');
    }
}