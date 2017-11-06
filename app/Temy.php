<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Temy extends Model {

	protected $table = 'temy';
	
	protected $fillable = ['name, keywords, description, seokey'];

}