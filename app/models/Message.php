<?php

class Message extends \Eloquent {
	protected $fillable = ['content', 'sender_id', 'conversation_id'];
    
    public function user()
    {
        return $this->belongsTo('User', 'sender_id');
    }

    public function conversation()
    {
        return $this->belongsTo('Conversation');
    }
}