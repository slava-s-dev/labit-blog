<?php
/**
 * Created by PhpStorm.
 * User: slairis
 * Date: 16.09.16
 * Time: 04:30
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Post;
use Request, Sentinel, Redirect, Session, Validator, URL, Image;

class PostController extends Controller
{

	public function showList()
	{
		$posts = Post::orderBy('created_at', 'desc')->get();
		return view('admin.pages.posts', compact('posts'));
	}

	public function showEditPostForm($id)
	{
		$post = Post::find($id);

		return view('admin.pages.post_edit', compact('post'));
	}

	public function showCreatePostForm()
	{
		return view('admin.pages.post_create');
	}


	public function doDeletePost($id)
	{
		Post::find($id)->delete();

		return Redirect::to(URL::previous());
	}

	public function doUpdatePost($id)
	{
		$file = Request::file('image_url');

		$post = Post::find($id);

		$rules = Post::$rules;

		if (!$post) {
			Session::flash('update_error', 'Cтатья не найдена');
			return Redirect::to(URL::previous());
		}

		$post->title = Request::get('title');

		if ($post->slug !== Request::get('slug')) {
			$post->slug = Request::get('slug');
		} else {
			unset($rules['slug']);
		}

		$post->short_description = Request::get('short_description');
		$post->description = Request::get('description');

		if ($file) {
			$url = $this->saveImage($file);
			$post->image_url = $url;
		}

		$validator = Validator::make(Request::all(), $rules);

		if ($validator->fails()) {
			Session::flash('update_error', $validator->messages()->getMessages());
			return Redirect::to(URL::previous());
		}

		if ($post->save()) {
			Session::flash('update_success', 'Успешно обновлено');
			return Redirect::to(URL::previous());
		}

		Session::flash('update_error', 'Ошибка обновления');
		return Redirect::to(URL::previous());

	}

	public function doCreatePost()
	{

		$data = Request::all();
		$file = Request::file('image_url');

		$url = '';

		if ($file) {
			$url = $this->saveImage($file);
		}

		$validator = Validator::make($data, Post::$rules);

		if ($validator->fails()) {
			Session::flash('create_error', $validator->messages()->getMessages());
			return Redirect::to(URL::previous());
		}

		try {
			Post::create([
				'title' => Request::get('title'),
				'slug' => Request::get('slug'),
				'short_description' => Request::get('short_description'),
				'description' => Request::get('description'),
				'user_id' => Sentinel::getUser()->getUserId(),
				'image_url' => $url,
			]);
		} catch (\Exception $e) {
			Session::flash('create_error', 'Произошла ошибка добавления записи');
			return Redirect::to(URL::previous());
		}

		Session::flash('create_success', 'Запись успешно добавлена');
		return Redirect::to(URL::previous());
	}

	public function saveImage($file)
	{
		$destinationPath = "/img/posts/";
		$dirToSave = public_path(). $destinationPath;
		$ext = $file->getClientOriginalExtension();
		$image_url = $file->getFilename() . '.' . $ext;
		$save_path = $dirToSave . $image_url;

		if (!file_exists($dirToSave)) {
			mkdir($dirToSave);
		}

		Image::make($file->getRealPath())->resize(200, null, function ($constraint) {
			$constraint->aspectRatio();
		})->save($save_path);

		return $destinationPath . $image_url;

	}

}