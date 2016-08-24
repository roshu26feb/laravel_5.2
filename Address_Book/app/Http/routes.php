<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


// User specific routes

Route::get('/', function () {
    return view('welcome');

});
Route::get('/', array('as' => 'home', function () {
    return View::make('home');
 }));
Route::get('login', array('as' => 'login', function () {
	return View::make('login');
}));
//Route::get('login', array('as' => 'login', function () { }))->before('guest');

Route::post('login', function () {
	$user = array(
            'username' => Input::get('username'),
            'password' => Input::get('password')
        );
        
        if (Auth::attempt($user)) {
            return Redirect::route('home')
                ->with('flash_notice', 'You are successfully logged in.');
        }
        
        // authentication failure! lets go back to the login page
        return Redirect::route('login')
            ->with('flash_error', 'Your username/password combination was incorrect.')
            ->withInput();
});
Route::get('logout', array('as' => 'logout', function () {
	Auth::logout();

    return Redirect::route('home')
        ->with('flash_notice', 'You are successfully logged out.');
	}));
Route::get('profile', array('as' => 'profile', function () { 
return View::make('profile');
}));


// Addressbook specific routes
Route::get('addressbook/create', array('as' => 'profile', 'uses' => 'AddressBookController@create') ,function()
    {

    });

Route::POST('addressbook', array('as' => 'profile', 'uses' => 'AddressBookController@store') ,function()
    {
       
    });

Route::get('addressbook', array('as' => 'list', 'uses' => 'AddressBookController@index') ,function()
    {

    });

Route::get('/addressbook/{id}', array('as' => 'edit', 'uses' => 'AddressBookController@edit') ,function()
    {

    });

Route::POST('/addressbook/{id}', array('as' => 'update', 'uses' => 'AddressBookController@update') ,function()
    {

    });

Route::post('/daddressbook/{id}', array('as' => 'delete', 'uses' => 'AddressBookController@destroy') ,function()
    {

    });
	

	// upload specific routes
	
Route::get('upload', array('as' => 'list', 'uses' => 'UploadController@index') ,function()
{

});

Route::get('upload/create', array('as' => 'create', 'uses' => 'UploadController@create') ,function()
    {

    });

Route::POST('upload', array('as' => 'store', 'uses' => 'UploadController@store') ,function()
    {
       
    });
