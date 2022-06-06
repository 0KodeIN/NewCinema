<?
$value = session()->get('admin');
if($value != 'Kodein'){
    header("Location: /localhost/admin");
    exit();
}
?>
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
            <div class="vhod">
                <a href="{{url('/admin/vhod/root')}}" class="entry" >Admin</a>
                <a href="{{url('/admin')}}" class="entry" >Выход</a>
            </div>            
        </div>
    </header>   
    <hr>
    <?
    // session()->flush();
    // $value = session()->get('admin');
    // if(!($value = session()->get('admin'))){
    //     echo 'error';
    // }
    // if($ses!='Kodein'){
    //     header("Location: http://localhost/admin/panel");
    // }
    // dd(session()->all());
    // dd($ses);
    //echo $value;
    if(DB::connection()) {
    $result = DB::select('select * from movie');
    foreach ($result as $res) {
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


