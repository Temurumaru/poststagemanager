<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RedBeanPHP\R as R;

class ClientController extends Controller
{
	public function Create(Request $req) {

		$req -> validate([
			"fio" => "required|min:4|max:50",
			"phone" => "required|min:4|max:50",
			"clid" => "required|min:2|max:50",
		]);

		if(R::count("clients", "fio = ?", [$req -> fio]) > 0) {
			return redirect() -> back() -> withErrors(['fio' => "Bunaqa F.I.O bor."]);
		}

		if(R::count("clients", "phone = ?", [$req -> phone]) > 0) {
			return redirect() -> back() -> withErrors(['phone' => "Bunaqa Telefon Nomer bor."]);
		}
		
		if(R::count("clients", "token = ?", [$req -> clid]) > 0) {
			return redirect() -> back() -> withErrors(['clid' => "Bunaqa ID bor."]);
		}

		$client = R::dispense("clients");

		$client -> token = $req -> clid;
		$client -> phone = $req -> phone;
		$client -> username = $req -> fio;

		R::store($client);

		return redirect() -> route('admin') -> with('success', "Client Yaratildi!");

	}


	public function Update(Request $req) {

		$req -> validate([
			"id" => "required",
			"fio" => "required|min:4|max:50",
			"phone" => "required|min:4|max:50",
		]);
		
		if(R::count("clients", "id = ?", [$req -> id]) == 0) {
			return redirect() -> back() -> withErrors(['id' => "Bunaqa ID yoq."]);
		}

		if(R::count("clients", "id != ? AND fio = ?", [$req -> id, $req -> fio]) > 0) {
			return redirect() -> back() -> withErrors(['fio' => "Bunaqa F.I.O bor."]);
		}

		if(R::count("clients", "id != ? AND phone = ?", [$req -> id, $req -> phone]) > 0) {
			return redirect() -> back() -> withErrors(['phone' => "Bunaqa Telefon Nomer bor."]);
		}

		$client = R::findOne("clients", "id = ?", [$req -> id]);

		$client -> phone = $req -> phone;
		$client -> username = $req -> fio;

		R::store($client);

		return redirect() -> route('admin') -> with('success', "Client Ozgartirildi!");

	}
}