<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="/">
    <link href="/css/main.css" rel="stylesheet"> 
    <title>New Cinema</title>
</head>
    <form  action="{{url('/create_film')}}" enctype="multipart/form-data" class="form" id="form1" method="post">
        @csrf
        <a class="close" id="exit"></a>
        <div class="input-form">
            <input type="text" placeholder="Название фильма" name="name">
        </div>
        <div class="input-form">
            <input type="text" placeholder="Жанр" name="genre">
        </div>
        <div class="input-form">
            <input type="number" placeholder="Год" name="year">
        </div>
        <div class="input-form">
            <input type="text" placeholder="Начало показа" name="date_begin">
        </div>
        <div class="input-form">
            <input type="text" placeholder="Конец показа" name="date_end">
        </div>
        <div class="input-form">
            <input type="text" placeholder="Время" name="duration">
        </div>
        <div class="input-form">
            <input type="text" placeholder="Цена" name="cost">
        </div>
        <div class="input-form">
            <p style="color:white">Загрузка фото</p>
        </div>
        <p>Загрузка изображения <input type="file" name="file">
        <div class="input-form" id="enter">
            <input type="submit" value="Добавить" class='validateBtn'>
        </div>
        <div class="input-form" id="enter">
            <a href={{url('/admin/vhod/root')}}>Назад</a>
        </div>
    </form>
    {{-- <form action="{{url('/create_film')}}" enctype="multipart/form-data" method="post">
        @csrf
        <p><input type="file" name="file">
        <input type="submit" value="Загрузить"></p>
    </form> --}}
