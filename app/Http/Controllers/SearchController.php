<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RedBeanPHP\R as R;

class SearchController extends Controller
{
	
	public function Client(Request $req) {
		
		if(isset($req -> search)) {
			$clients = array_reverse(R::find("clients", "token = ? OR phone LIKE ? OR username LIKE ?", [$req -> search, $req -> search."%", "%".$req -> search."%"]));

			return json_encode($clients);

		} else {
			$clients = array_reverse(R::findAll("clients"));

			return json_encode($clients);
		}

	}

	public function Post(Request $req) {
		
		if(isset($req -> search)) {
			$clients = array_reverse(R::find("posts", "clid = ? AND track_no = ?", [$req -> id, $req -> search]));

			return json_encode($clients);

		} else {
			$clients = array_reverse(R::find("posts", "clid = ?", [$req -> id]));

			return json_encode($clients);
		}

	}

	public function ClientPost(Request $req) {
		
		if(isset($req -> search) && strlen(@$req -> search) > 2) {
			if(R::count("clients", "token = ?", [$req -> search]) > 0) {
				$clients = R::findOne("clients", "token = ?", [$req -> search]);

				$posts = array_reverse(R::find("posts", "clid = ?", [$clients -> id]));
				
				$pst = [];
				foreach($posts as $val)	{
					$val["token"] = $clients -> token;
					array_push($pst, $val);
				}

				return json_encode($posts);
			} else if(R::count("posts", "track_no = ?", [$req -> search]) > 0) {
				$posts = array_reverse(R::find("posts", "track_no = ?", [$req -> search]));

				$pst = [];
				foreach($posts as $val)	{
					$client = R::findOne("clients", "id = ?", [$val['clid']]);
					$val["token"] = $client -> token;
					array_push($pst, $val);
				}
				return json_encode($pst);
			}

			return "NOT_HAVE";
		} else {
			return "NO";
		}

	}

}
