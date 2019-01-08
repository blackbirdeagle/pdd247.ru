<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Varianti extends Model {

	protected $table = 'varianti';
	
	protected $fillable = ['vopros', 'verno', 'name'];

}