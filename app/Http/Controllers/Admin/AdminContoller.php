<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

class AdminController extends Controller
{

	public function showIndexPage()
	{
		return view('admin.pages.index');
	}

	public function showPostsPage()
	{
		return view('admin.pages.posts');
	}

}