<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Reg extends BaseController
{
    public function reg(){
        return view('registration/reg');
    }

    public function adduser(){
        $user = DB::table('user')->orderBY('id')->chunk(100, function ($user) {
            foreach ($user as $item) {
                $name = $item->name;
                $email = $item->email;
            }
            dump($name);
//
//            if ($_POST['pass'] == $_POST['passagain']) {
//                if ($name == $_POST['name']) {
//                    dump('false');
//                } else {
//                    if ($email == $_POST['email']) {
//                        dump('false');
//                    } else {
//                        DB::table('user')->insert([
//                            'name' => $_POST['name'],
//                            'email' => $_POST['email'],
//                            'pass' => md5($_POST['pass']),
//                        ]);
//                    }
//                }
//            } else {
//                dump('false');
//            }
        });

    }


}