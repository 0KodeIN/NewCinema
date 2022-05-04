<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="/">
    <link href="/css/main.css" rel="stylesheet"> 
    <title>Document</title>
</head>
<body>
    
    <header>
        <div class="navig">
            <h1 class="head-text">New cinema</h1>
        </div>
    </header>
 

    
    <hr>
    @yield('content')
    </div>
    <div class="form" id="form1">
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

        <a href="#" class="forget" onclick="showRegistr()">Регистрация</a>
    </div>
    <form class="form" id="form2" action="register.php" method="post">
        <h1>Регистрация</h1>
        <a class="close" id="exit_reg"></a>
        <div class="input-form">
            <input type="text" class="test" placeholder="Имя" name="Name" id="name-input">
        </div>
        <div class="input-form">
            <input type="email" class="test" data-validate-field="email" placeholder="Email" name="Email" id="email-input">
        </div>
        <div class="input-form">
            <input type="tel" class="test" placeholder="Телефон" name="Tel" id="tel-input">
        </div>
        <div class="input-form">
            <input type="password" class="test" placeholder="Пароль" name="Password" id="pw1">
        </div>
        <div class="input-form">
            <input type="password" class="test" placeholder="Повторите пароль" name="PasswordSecond" id="pw2">
        </div>
        <div class="check-box">
            <button class="checkbox-button" id="checkBtn">
                <i class='check' id = "Icheck"></i>
            </button>
            <p class="checkbox-text">Я согласен на обработку персональных данных</p>
        </div>
        <div class="input-form" id="reg">
            <input type="submit" value="Зарегистрироваться">
        </div>

</form>

<hr> 
<footer>
</footer>
<script src="js/script.js"></script>
</body>
</html>