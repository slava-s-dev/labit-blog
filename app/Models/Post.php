<?php

namespace App\Models;

use Eloquent;

class Post extends Eloquent
{
	protected $fillable = ['title', 'short_description', 'description', 'slug', 'user_id', 'created_at', 'image_url'];

	public $table = 'posts';

	public static $rules = [
		'title' => 'required',
		'slug' => 'required|unique:posts',
		'short_description' => 'max:255',
		'description' => 'required',
	];

	public function getImg($width)
	{
		$img_res = $this->getImgPath();

		return  '<img class="img-responsive img-hover" width="'. $width . '" src = "'.$img_res.'" title = "'.$this->title.'" alt = "'.$this->title.'">';
	} // end getImg

	public function getImgPath() {

		if ($this->image_url) {
			$picture = $this->image_url;
		} else {
			$picture = '/img/no-photo.png';
		}


		return  $picture;
	}


}