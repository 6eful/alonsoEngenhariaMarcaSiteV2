<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\User\UserServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\User;


class UserController extends Controller {

    public function index(){
      if (UserServiceProvider::verifyLoginUser()) {
        return redirect()->route('user.homePanel');
      } else {
        return view('welcome');
      }
    }

    public function DoSignin(Request $request){
      $data = $request->all();
      $userLogado = UserServiceProvider::Signin($data);
      if($userLogado){
         Auth::loginUsingId($userLogado->id);
         return redirect()->route('user.homePanel');
       } else {
         return view('welcome');
       }
    }

    public function DoLogout() {
      UserServiceProvider::out();
      return redirect()->route('welcome');
    }

    public function homePanel(){
      if (UserServiceProvider::verifyLoginUser()) {
        return view('restricted.modules.homePanel');
      } else {
        return view('welcome');
      }
    }

    public function showusers(){
      // $data = $allusers = User::paginate(2)->all();
      $data = UserServiceProvider::showall();
      return view('restricted.modules.users.users', compact('data'));
    }

    public function createUsers() {
      return view('restricted.modules.users.create');
    }

    public function salvarUsers(Request $request){
      $dado = $request->all();
      UserServiceProvider::AddUsers($dado);
      return redirect()->route('user.all');
    }

    public function editUsers($id){
      $dado = UserServiceProvider::getInformationbyID($id);
      return view('restricted.modules.users.edit', compact('dado'));
    }

    public function updateUsers(Request $request, $id){
      $dado = $request->all();
      UserServiceProvider::UpdateUser($dado, $id);
      return redirect()->route('user.all');
    }

    public function removeUsers($id){
      UserServiceProvider::deletebyID($id);
      return back();
    }
}
