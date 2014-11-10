<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $table = 'users';
    protected $fillable = ['first_name', 'last_name', 'email', 'password', 'photo'];
	protected $hidden = array('password', 'remember_token');
    public $timestamps = true;

    public function profiles()
    {
        return $this->hasMany('Profile');
    }

    public function categories()
    {
        return $this->belongsToMany('Category', 'userscategorieslink', 'user_id', 'category_id');
    }

    public function questions()
    {
        return $this->hasMany('Question');
    }

    public function messages()
    {
        return $this->hasMany('Message');
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

}
