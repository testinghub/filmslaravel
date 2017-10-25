@extends('layout.layout')

@section('right')

    <h1 class="h1">Форма добавления фильма</h1>

    <form class="add" method="post" action="/admin/add/films">
        <label>Имя</label><div class="hint" data-title="Название фильма (без года если имеется)">?</div><br>
        <input type="text" name="name"><br><br>
        <label>О фильме</label><div class="hint" data-title="Информация о фильме">?</div><br>
        <input type="text" name="options"><br><br>
        <label>Оценка</label><div class="hint" data-title="Оценка фильма по 5 бальной шкале">?</div><br>
        <input type="number" name="assessment"><br><br>
        <label>Ссылка на фильм</label><div class="hint" data-title="Прямая ссылка на фильм с приставкой .mp4">?</div><br>
        <input type="text" name="film"><br><br>
        <label>Ссылка на картинку</label><div class="hint" data-title="Прямая ссылка на картинку">?</div><br>
        <input type="text" name="img"><br><br>
        <label>Жанр</label><div class="hint" data-title="Биографии 1, Боевики 2, Вестерны 3, Военные 4, Детективы 5, Документальные 6, Драмы  7, Исторические 8, Комедии 9, Криминал 10, Мелодрамы 11, Мультфильмы 12, Мюзиклы 13, Приключения 14, Семейные 15, Cпортивные 16, Триллеры 17, Ужасы 18, Фантастика 19, Фэнтези 20">?</div><br>
        <input type="text" name="genre"><br><br>
        <label>Ссылка на трейлер с ютуба</label><div class="hint" data-title="Часть с ссылки после watch?v=">?</div><br>
        <input type="text" name="youtube"><br><br>
        <label>Год</label><div class="hint" data-title="Год выпуска фильма">?</div><br>
        <input type="text" name="year"><br><br>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <button type="submit">Отправить фильм</button>
    </form>

@endsection