<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model {

	protected $table = 'video';
	
	protected $fillable = ['name', 'keywords', 'description', 'h1', 'text', 'link', 'seokey'];

}