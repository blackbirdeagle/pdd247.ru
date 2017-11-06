<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Voprosi extends Model {

	protected $table = 'voprosi';
	
	protected $fillable = ['name', 'tema', 'bilet', 'poradok', 'image', 'otvet'];
	
}