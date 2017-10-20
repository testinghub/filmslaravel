<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Start extends BaseController
{

    public $key = array(
        'Биографии' => 1,
        'Боевики' => 2,
        'Вестерны' => 3,
        'Военные' => 4,
        'Детективы' => 5,
        'Документальные' => 6,
        'Драмы' => 7,
        'Исторические' => 8,
        'Комедии' => 9,
        'Криминал' => 10,
        'Мелодрамы' => 11,
        'Мультфильмы' => 12,
        'Мюзиклы' => 13,
        'Приключения' => 14,
        'Семейные' => 15,
        'Cпортивные' => 16,
        'Триллеры' => 17,
        'Ужасы' => 18,
        'Фантастика' => 19,
        'Фэнтези' => 20
    );

    public function index(){
        $film = DB::table('films')->orderBy("id","DESC")->paginate(5);

        $rec = DB::table('films')->orderBy(DB::raw('RAND()'))->limit(14)->get();

        return view('start/films', ['film'=>$film, 'rec'=>$rec,'keys' => $this->key]);
    }

    public function film($id){
        $film = DB::table('films')->find($id);
        DB::table('films')->where('id',$id)->increment('views');

        return view("start/film", ['film'=>$film, 'keys' => $this->key]);
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
