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
    <form  action="{{url('/create_ticket')}}"  class="form"  method="post">
        @csrf
        <a class="close" id="exit"></a>
        <div class="input-form">
            <input type="text" placeholder="Название фильма" name="film">
        </div>
        <div class="input-form">
            <input type="number" placeholder="Номер зала" name="number_hall">
        </div>
        <div class="input-form">
            <input type="text" placeholder="Дата сеанса" name="date">
        </div>
        <div class="input-form">
            <input type="text" placeholder="Время сеанса" name="time">
        </div>
        <div class="input-form">
            <input type="text" placeholder="Выбранное место" name="number">
        </div>
        <div class="input-form" id="enter">
            <input type="submit" value="Добавить" class='validateBtn'>
        </div>
        <div class="input-form" id="enter">
            <a href={{url('/admin/vhod/root')}}>Назад</a>
        </div>
    </form>