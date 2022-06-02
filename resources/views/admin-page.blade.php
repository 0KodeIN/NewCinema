<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="/">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/form.css" rel="stylesheet">  
    <title>Document</title>
</head>
<body>

    <form  action="{{url('/admin/vhod')}}" class="form" id="form1">
        <h1>Вход</h1>
        <a class="close" id="exit"></a>
        <div class="input-form">
            <input type="text" placeholder="Логин" name="Name">
        </div>
        <div class="input-form">
            <input type="password" placeholder="Пароль" name="Password">
        </div>
        <div class="input-form" id="enter">
            <input type="submit" value="Войти" class='validateBtn'>
        </div>

        <a href="#" class="forget" onclick="showRegistr()">Регистрация</a>
    </form>


    {{-- <form action = "/admin/auth" class="form" id="form1" method="post">
        @csrf
        <h1>Вход</h1>
        <a class="close" id="exit"></a>
        <div class="input-form">
            <input type="text" placeholder="Логин">
        </div>
        <div class="input-form">
            <input type="password" placeholder="Пароль">
        </div>
        <div class="input-form" id="enter">
            <input type="submit" value="Войти" class='validateBtn'>
        </div>

        <a  class="forget" onclick="showRegistr()">Регистрация</a>
    </form> --}}
    
{{-- <script src="js/script.admin.js"></script>
<script src="js/inputmask.min.js"></script> --}}
</body>
</html>