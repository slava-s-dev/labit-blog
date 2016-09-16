<?php

namespace App\Http\Controllers;

use App\Models\Post;

class BlogController extends Controller
{

	private $user;

	public function __construct()
	{
		$this->user = \Sentinel::getUser();
	}

	public function showIndexPage()
	{
		$posts = Post::orderBy('created_at', 'desc')->get();

		return view('blog.index', compact('posts'));
	}

	public function showPostPage ($slug)
	{
		$post = Post::where('slug', $slug)->first();


		return view('blog.post', compact('post'));
	}
}