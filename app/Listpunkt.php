<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Listpunkt extends Model {

	protected $table = 'listpunkt';
	
	protected $fillable = ['name, text'];

}