<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="/">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,500&display=swap" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/detail.css" rel="stylesheet"> 
    <title>New cinema</title>
</head>
<?
if(DB::connection()) {
    $result = DB::table('movie')
            ->join('session', 'movie.id_film', '=', 'session.id_film')
            ->select('movie.film_name', 'movie.film_cost', 'movie.film_photo',
            'movie.start_date', 'movie.end_date', 'movie.film_genre', 'movie.year_of_issue',
            'movie.duration', 'session.session_date', 'session.session_id')
            ->where('movie.id_film', '=', $id)
            ->get();
        
    // $result = DB::select('select m.film_name, s.session_date, m.film_cost, m.film_photo
    // from movie m
    // inner join session s ON s.id_film = m.id_film from movie where m.id_film = '.$id);
    // DB::table('dispatcher')->insert(
    // ['dispatcher_id' => 102, 'login' => 'admin2', 'password' => 'qwe586']
    // );
    foreach ($result as $res) {

    }
}
?>
<body>
    
    <header>
        <div class="navig">
            <h1 class="head-text">New cinema</h1>
        </div>
    </header>
    <?
    ?>
    <div class="detail-container">

        <a href="" class="detail-def"><?php  echo $res->film_name?></a>
        <img src=<?php echo "/img/$res->film_photo "?> class = "detail_img" alt="">
        <ul class="detail-ul">
            <li><?php echo "Жанр: $res->film_genre"?></li>
            <li><?php echo "Период показа: $res->start_date - $res->end_date"?></li>
            <li><?php echo "Цена: $res->film_cost Рублей"?></li>
            <li><?php echo "Год выпуска: $res->year_of_issue"?></li>
            <li><?php echo "Продолжительность: $res->duration минут"?></li>
        </ul>
        <div class="session">
            <p>Доступные сеансы</p>
            <?php foreach ($result as $res) { ?>
            <a class = "session-a" href="/ticket/<?echo $res->session_id?>" id = <?echo $res->session_id?> ><?php echo $res->session_date ?></a>
            <?php } ?>
        </div>                                
    </div>
<footer>
</footer>
<script src="js/script.js"></script>
</body>
</html>