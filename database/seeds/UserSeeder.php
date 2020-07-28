<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
      $data = [
        'UserName'    =>    "alonso",
        'email'       =>    "alonso@gmail.com",
        'password'    =>    "123456",
        'admin'       =>    true,
      ];

      if(User::where('email','=',$data['email'])->count()){
        $UserData = User::where('email','=',$data['email'])->first();
        $UserData->update($data);
        echo "Usuario Alterado!";
      }else{
        User::create($data);
        echo "Usuario Criado!";
      }

    }
}
