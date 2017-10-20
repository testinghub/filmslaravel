<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Start extends BaseController
{
    public function index(){
        $film = DB::table('films')->orderBy("id","DESC")->paginate(5);

        $rec = DB::table('films')->limit(15)->get();

        return view('start/films', ['film'=>$film, 'rec'=>$rec]);
    }
    public function film($id){
        $film = DB::table('films')->where('id',[$id])->first();

        DB::table('films')->where('id',[$id])->update([
            'views' => $film->views+1
        ]);

        $key = array(
            'Приключения' => 1,
            'Семейное' => 2,
            'asdasd' => 4
        );

        return view("start/film", ['film'=>$film, 'keys'=>$key]);
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
