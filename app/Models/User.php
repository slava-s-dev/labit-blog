<?php

namespace App\Models;

// use Illuminate\Foundation\Auth\User as Authenticatable;

use Cartalyst\Sentinel\Users\EloquentUser;

class User extends EloquentUser
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

	public static $rules = [
		'email' => 'required|email|max:50|unique:users,email,',
	];

	public static $messages = [
		'email.required' => 'Нужно заполнить email',
		'email.email' => 'Email не вылидный',
		'email.unique' => "Пользователь с таким email уже существует",
	];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
