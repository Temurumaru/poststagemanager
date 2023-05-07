<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RedBeanPHP\R as R;

class PostController extends Controller
{
	public function Create(Request $req) {
		$req -> validate([
			"clid" => "required",
			"track_no" => "required|min:4|max:50"
		]);

		if(R::count("posts", "track_no = ?", [$req -> track_no]) > 0) {
			return redirect() -> back() -> withErrors(['track_no' => "Bunaqa Track № bor."]);
		}

		$post = R::dispense("posts");

		$post -> clid = $req -> clid;
		$post -> track_no = $req -> track_no;
		$post -> state = "china";
		$post -> china_date = date("Y-m-d H:i:s");

		R::store($post);

		return redirect() -> route('admin_profile', ['id' => $req -> clid]) -> with('success', "Yuk Yaratoldi!");

	}

	public function Delete(Request $req) {
		$req -> validate([
      "id" => "required|numeric",
      "clid" => "required|numeric"
    ]);

    $post = R::findOne('posts', 'id = ?', [$req -> id]);

    R::trash($post);

		return redirect() -> route('admin_profile', ['id' => $req -> clid]) -> with('success', "Yuk ochirildi!");
	}
}
