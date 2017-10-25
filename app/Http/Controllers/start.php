<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


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
    public function comment($id){
        $comment = DB::table('films as fm')
            ->select('fm.id', 'cm.usr_id', 'usr.name', 'cm.film_id','cm.date as time', 'cm.text', 'usr.id')
            ->leftJoin('comment as cm', 'cm.film_id', '=', 'fm.id')
            ->leftJoin('users as usr', 'cm.usr_id', '=', 'usr.id')
            ->where('cm.film_id',$id)
            ->orderBy('cm.date', 'DESC')
            ->get();
//            response()->json([$comment]);
        response($comment);
        return view('start/ajax-comment', ['users'=>$comment]);
    }

    public function film($id){
        $film = DB::table('films')->find($id);
        DB::table('films')->where('id',$id)->increment('views');
        $rec = DB::table('films')->orderBy(DB::raw('RAND()'))->limit(14)->get();


        $response = DB::table('films as fm')
            ->select('fm.id', 'cm.usr_id', 'usr.name', 'cm.film_id','cm.date as time', 'cm.text', 'usr.id')
            ->leftJoin('comment as cm', 'cm.film_id', '=', 'fm.id')
            ->leftJoin('users as usr', 'cm.usr_id', '=', 'usr.id')
            ->where('cm.film_id',$id)
            ->orderBy('cm.date', 'DESC')
            ->get();
        $count = DB::table('comment')->where('film_id',$id)->count();
        response()->json([$response]);

        return view("start/film", ['film'=>$film, 'rec'=>$rec , 'keys' => $this->key, 'users'=>$response, 'count'=>$count]);
    }

    public function addcomment($id){

        return response()->json([
            DB::table('comment')->insert([
            'usr_id' => Auth::user()->id,
            'film_id' => $id,
            'date' => time(),
            'text' => $_POST['comment']
             ]),
        ]);
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
        $rec = DB::table('films')->orderBy(DB::raw('RAND()'))->limit(14)->get();


        return view("start/search", ['film'=>$film, 'rec'=>$rec, 'keys'=>$this->key]);
    }

    public function categories($menu){
        $rec = DB::table('films')->orderBy(DB::raw('RAND()'))->limit(14)->get();
        if($menu == 'popular'){$film = DB::table('films')->orderBy('views','DESC')->paginate(5);}
        else if($menu == 'rating'){$film = DB::table('films')->orderBy('assessment','DESC')->paginate(5);}
        else if($menu == '2017'){$film = DB::table('films')->where('year', 2017)->paginate(5);}
        else if($menu == '2016'){$film = DB::table('films')->where('year', 2018)->paginate(5);}
        else if($menu == 'biographies'){$film = DB::table('films')->where('genre','like','%1%')->paginate(5);}
        else if($menu == 'action'){$film = DB::table('films')->where('genre','like','%2%')->paginate(5);}
        else if($menu == 'westerns'){$film = DB::table('films')->where('genre','like','%3%')->paginate(5);}
        else if($menu == 'military'){$film = DB::table('films')->where('genre','like','%4%')->paginate(5);}
        else if($menu == 'detectives'){$film = DB::table('films')->where('genre','like','%5%')->paginate(5);}
        else if($menu == 'documentary'){$film = DB::table('films')->where('genre','like','%6%')->paginate(5);}
        else if($menu == 'dramas'){$film = DB::table('films')->where('genre','like','%7%')->paginate(5);}
        else if($menu == 'historical'){$film = DB::table('films')->where('genre','like','%8%')->paginate(5);}
        else if($menu == 'comedy'){$film = DB::table('films')->where('genre','like','%9%')->paginate(5);}
        else if($menu == 'crime'){$film = DB::table('films')->where('genre','like','%10%')->paginate(5);}
        else if($menu == 'melodramas'){$film = DB::table('films')->where('genre','like','%11%')->paginate(5);}
        else if($menu == 'cartoons'){$film = DB::table('films')->where('genre','like','%12%')->paginate(5);}
        else if($menu == 'musicals'){$film = DB::table('films')->where('genre','like','%13%')->paginate(5);}
        else if($menu == 'adventure'){$film = DB::table('films')->where('genre','like','%14%')->paginate(5);}
        else if($menu == 'family'){$film = DB::table('films')->where('genre','like','%15%')->paginate(5);}
        else if($menu == 'sports'){$film = DB::table('films')->where('genre','like','%16%')->paginate(5);}
        else if($menu == 'thrillers'){$film = DB::table('films')->where('genre','like','%17%')->paginate(5);}
        else if($menu == 'horrors'){$film = DB::table('films')->where('genre','like','%18%')->paginate(5);}
        else if($menu == 'fantastic'){$film = DB::table('films')->where('genre','like','%19%')->paginate(5);}
        else if($menu == 'fantasy'){$film = DB::table('films')->where('genre','like','%20%')->paginate(5);}

        return view('start/films', ['film'=>$film, 'rec'=>$rec,'keys' => $this->key]);
    }
}
