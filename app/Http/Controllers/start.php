<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Start extends BaseController
{
    public function index(){
        $film = DB::table('films')->orderBy("id","DESC")->paginate(5);
        return view('start/films', ['film'=>$film]);
    }
    public function film($id){
        $film = DB::table('films')->where('id',[$id])->get();
        return view("start/film", ['film'=>$film]);
    }
    public function add(){
        return view('start/addform');
    }
    public function add_film(){

        if(($_POST['name'] != '')&&($_POST['options'] != '')&&($_POST['assessment'] != '')&& ($_POST['film'] != '')&&($_POST['img'] != '')&&($_POST['genre'] != '')&& ($_POST['youtube'] != '')){

            DB::table('films')->insert([
                'name'=>$_POST['name'],
                'options'=>$_POST['options'],
                'assessment'=>$_POST['assessment'],
                'film'=>$_POST['film'],
                'img'=>$_POST['img'],
                'genre'=>$_POST['genre'],
                'youtube'=>$_POST['youtube']
            ]);

            return view('start/addform');

        } else {
            dump("Ты канечно прасти дарагой, но не пошло =(");
            return view('start/addform');
        }
    }

    public function search(){
        $film = $film = DB::table('films')->where('name','like',['%'.$_POST['search'].'%'])->paginate(5);

        return view("start/search", ['film'=>$film]);
    }
}
