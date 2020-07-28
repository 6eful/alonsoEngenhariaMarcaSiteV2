<?php

namespace App\Providers\User;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    static function verifyLoginUser(){
      if (Auth::check()) {
        return true;
      } else {
        return false;
      }
    }

    static function Signin($dados) {
      $user = User::where('email', '=', $dados['email'])
                     ->where('password','=', $dados['password'])
                     ->first();
      return $user;
    }

    static function out(){
      Auth::logout();
    }

    static function showall(){
      $allusers = User::where('admin', '<>', '1')->get();
      return $allusers;
    }

    static function AddUsers($dados){
      $newUser = new User;
      $newUser->remember_token = $dados['_token'];
      $newUser->UserName       = $dados['name'];
      $newUser->email          = $dados['email'];
      $newUser->password       = $dados['password'];
      $newUser->save();
    }

    static function getInformationbyID($id){
      $DadoUser = User::find($id);
      return $DadoUser;
    }

    static function UpdateUser($dados, $id){
      $newData = [
        'remember_token' => $dados['_token'],
        'UserName'       => $dados['name'],
        'email'          => $dados['email'],
      ];

      if ($dados['password'] <> "") {
        $newData['password'] = $dados['password'];
      }

      $UserSelected = User::find($id);
      $UserSelected->update($newData);
    }

    static function deletebyID($id){
      $user = User::find($id)->delete();
    }
}
