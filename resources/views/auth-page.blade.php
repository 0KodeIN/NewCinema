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
<body>
    
    <header>
        <div class="navig">
            <h1 class="head-text">New cinema</h1>
            <a href="{{url('/admin/vhod/root')}}" class="entry" >Admin</a>
        </div>
    </header>   
    <hr>
    <?
    if(DB::connection()) {
    echo 'connection';
    $result = DB::select('select * from movie');
    // DB::table('dispatcher')->insert(
    // ['dispatcher_id' => 102, 'login' => 'admin2', 'password' => 'qwe586']
    // );
    foreach ($result as $res) {
    echo  "/img/$res->film_photo ";
    }
    }
    ?>
    <div class="container">
    <?php  foreach ($result as $res) {
        ?>
        <div class="card">
            <a href="" class="def"><?php  echo $res->film_name?></a>
            <img src=<?php echo "/img/$res->film_photo "?> class = "file_img" alt="">
            <div class="text-ticket">
                <p class=""><?php echo $res->film_cost?></p>
                <a href="/detail/<? echo $res->id_film?>/") }}" id =<?php  echo $res->id_film?> target="_blank" class = "ticket-btn">Купить</a>
            </div>           
        </div>
        <?php
    }    
    ?>         
    </div>
    </div>
<hr> 
<footer>
</footer>
</body>
</html>


