<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Pdd extends Model {

	protected $table = 'pdd';
	
	protected $fillable = ['name, keywords, description, seokey'];

}