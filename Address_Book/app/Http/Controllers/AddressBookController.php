<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\AddressBook;
use Auth;
use Illuminate\Support\Facades\Redirect;

class AddressBookController extends Controller
{
   /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $address = AddressBook::all();
    $user = Auth::user();
    $userid = $user->id;
    $address = AddressBook::where('user_id', '=', $userid)->get();
    return \View::make('addressbook.index', compact('address'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return \View::make('addressbook.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store()
  {
     $input = Input::all();
        $validation = Validator::make($input, AddressBook::$rules);

        if ($validation->passes())
        {
          $user = Auth::user();
        if(isset($user)) {
          $userid = $user->id;
        }
            $input['user_id'] = $userid;
            AddressBook::create($input);

           // return Redirect::route('addressbook/create');
            
              return redirect()->action('AddressBookController@index');
        }

        return Redirect::route('addressbook/create')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
            
          
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    $address = AddressBook::find($id);
        if (is_null($address))
        {
            
              return redirect()->action('AddressBookController@index');
        }
        return \View::make('addressbook.edit', compact('address'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
        $input = Input::all();
        $validation = Validator::make($input, AddressBook::$rules);
        if ($validation->passes())
        {
            $user = AddressBook::find($id);
            $user->update($input);
           // return Redirect('addressbook/index');
            return redirect()->action('AddressBookController@index');
        }
        return Redirect::route('addressbook.index', $id)
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    AddressBook::find($id)->delete();
       return redirect()->action('AddressBookController@index');
  }
  
  
  
}
