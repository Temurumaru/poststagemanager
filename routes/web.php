<?php

use Illuminate\Support\Facades\Route;
use RedBeanPHP\R as R;
use RedBeanPHP\Util\DispenseHelper as RDH;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

define('APP_NAME', getenv('APP_NAME'));

$DB_TYPE = getenv('DB_CONNECTION');
$DB_HOST = getenv('DB_HOST');
$DB_NAME = getenv('DB_DATABASE');
$DB_USER = getenv('DB_USERNAME');
$DB_PASS = getenv('DB_PASSWORD');

R::setup($DB_TYPE.':host='.$DB_HOST.';dbname='.$DB_NAME, $DB_USER, $DB_PASS);
RDH::setEnforceNamingPolicy(false);

if(!R::testConnection()) {
  exit("There is no connection to the database :(");
}

unset($DB_TYPE);
unset($DB_HOST);
unset($DB_NAME);
unset($DB_USER);
unset($DB_PASS);

session_start();

$p = "App\\Http\\Controllers\\";


// Views

Route::get('/', function () {
  return view('home');
}) -> name('home');

// Admin segment

Route::get('/sign_in', function () {
  return (@$_SESSION['user']) ? view('admin.admin') : view('admin.sign_in');
}) -> name('sign_in');

Route::get('/admin', function () {
  return (@$_SESSION['user']) ? view('admin.admin') : view('admin.sign_in');
}) -> name('admin');

if(@$_SESSION['user']) {
  Route::get('/admin_profile', function () {
    return view('admin.profile');
  }) -> name('admin_profile');

  Route::get('/admin_client_update', function () {
    $client = R::findOne("clients", "id = ?", [@$_GET['id']]);
    return view('admin.client_update', ['client' => $client]);
  }) -> name('admin_client_update');
}


// Controllers

Route::post(
  '/sign_in_validate',
  $p.'SignInController@SignIn'
) -> name('SignInValidate');

Route::get(
  '/search_client_post',
  $p.'SearchController@ClientPost'
) -> name('SearchClientPost');

if(@$_SESSION['user']) {
  Route::post(
    '/create_client',
    $p.'ClientController@Create'
  ) -> name('CreateClient');

  Route::post(
    '/update_client',
    $p.'ClientController@Update'
  ) -> name('UpdateClient');

  Route::post(
    '/create_post',
    $p.'PostController@Create'
  ) -> name('CreatePost');

	Route::post(
    '/delete_post',
    $p.'PostController@Delete'
  ) -> name('DeletePost');

  Route::get(
    '/search_client',
    $p.'SearchController@Client'
  ) -> name('SearchClient');

  Route::get(
    '/search_post',
    $p.'SearchController@Post'
  ) -> name('SearchPost');

  Route::put(
    '/continue_post',
    $p.'PostStateController@Continue'
  ) -> name('ContinuePost');
}
