<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RedBeanPHP\R as R;

class PostStateController extends Controller
{
	public function Continue(Request $req) {
		if(empty($req -> track_no)) {
			return "Track № Yozing";
		}

		if(R::count("posts", "track_no = ?", [$req -> track_no]) == 0) {
			return "Bunaqa Yuk Yoq";
		}

		$post = R::findOne("posts", "track_no = ?", [$req -> track_no]);

		$state = $post -> state;

		if($state == "china") {
			$timestamp = strtotime($post -> china_date);
			$current_time = time();
			$time_diff = $current_time - $timestamp;
			
			if(floor($time_diff / 3600) > 2){
				$post -> state = "uzb";
				$post -> uzbekistan_date = date("Y-m-d H:i:s");
			} else {
				return "Yaratilgan Paytdan yana 2 soat otishi kerak!";
			}
		}

		if($state == "uzb") {
			$timestamp = strtotime($post -> uzbekistan_date);
			$current_time = time();
			$time_diff = $current_time - $timestamp;
			
			if(floor($time_diff / 3600) > 2){
				$post -> state = "cli";
				$post -> client_date = date("Y-m-d H:i:s");
			} else {
				return "Ozgartirilgan Paytdan yana 2 soat otishi kerak!";
			}
		}

		R::store($post);

		return "OK";
	}
}
