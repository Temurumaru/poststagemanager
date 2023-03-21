<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignInController extends Controller
{
	public function SignIn(Request $req) {
		$req -> validate([
			'login' => 'required|min:4|max:16',
			'password' => 'required|min:4|max:16'
		]);

		if($req -> login != "admin" || $req -> password != '!Q@W#E$R%T^Y') return redirect() -> back() -> withErrors(['login' => "Noto'gri login yoki parol."]);

		$_SESSION['user'] = 'login=admin|password=!Q@W#E$R%T^Y';

		return redirect() -> route('admin');
	}
}
