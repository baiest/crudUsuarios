<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResouce;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return UserResouce::collection(User::all());
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $user = new User();
    $user->id = $request->get('id');
    $user->username = $request->get('username');
    $user->name = $request->get('name');
    $user->last_name = $request->get('last_name');
    $user->id_type = $request->get('id_type');
    $user->email = $request->get('email');
    $user->password = $request->get('password');

    $formato = 'Y-m-!d H:i:s';
    $birthdate = DateTime::createFromFormat($formato, '2009-02-15 15:16:17');
    $user->birthdate = $birthdate;
    $user->save();
    return http_response_code(201);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    return new UserResouce(User::findOrFail($id));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $user = User::findOrFail($id);
    $data = new UserResouce($user);
    $data['password'] = $user->password;
    return $data;
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $user = User::findOrFail($id);
    $user->username = $request->get('username');
    $user->name = $request->get('name');
    $user->last_name = $request->get('last_name');
    $user->id_type = $request->get('id_type');
    $user->birthdate = $request->get('birthdate');
    $user->email = $request->get('email');

    $formato = 'Y-m-!d H:i:s';
    $birthdate = DateTime::createFromFormat($formato, '2009-02-15 15:16:17');
    $user->birthdate = $birthdate;
    $user->save();
    return http_response_code(204);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $user = User::findOrFail($id);
    $user->delete();
    return http_response_code(204);
  }
}
