<?php
/*
* Copyright by Alexander Afanasyev
* E-mail: blackbirdeagle@mail.ru
* Skype: al_sidorenko1
* */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model {

	protected $table = 'comments';
	
	protected $fillable = ['name', 'city', 'comment'];

}

