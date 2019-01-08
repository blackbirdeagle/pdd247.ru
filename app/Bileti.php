<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Bileti extends Model {

	protected $table = 'bileti';
	
	protected $fillable = ['name', 'keywords', 'description'];

}