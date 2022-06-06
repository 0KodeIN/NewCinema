<?
$value = session()->get('admin');
if($value != 'Kodein'){
    header("Location: {$_SERVER['HTTP_REFERER']}");
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
<?

if(DB::connection()) {
    $movies = DB::select('select * from movie');
    $sessions = DB::table('session')
        ->join('movie', 'session.id_film', '=', 'movie.id_film')
        ->select('movie.film_name', 'session.session_date', 'session.session_id')
        ->get();
    $tickets = DB::table('ticket')
        ->join('session', 'session.session_id', '=', 'ticket.session_id')
        ->select('ticket.ticket_id', 'session.session_date','ticket.reservation','ticket.place_number' )
        ->get();
}
    ?>
<body>

    <header>
        <div class="navig">
            <h1 class="head-text">New cinema</h1>
            <div class="vhod">
                <a href="{{url('/admin/vhod/root/report')}}" class="entry" >Отчет</a>
                <a href="{{url('/admin')}}" class="entry" >Выход</a>
            </div>            
        </div>
    </header>   
    <hr>
    <div class="navigation-root">
        <a class ="root-p" href="{{url('/movie')}}">Добавить фильм</a>
        <a class ="root-p" href="{{url('/session')}}">Добавить сеанс</a>
        <a class ="root-p" href="{{url('/ticket')}}">Добавить билет</a>  
    </div>
    <div class="admin">
        <p>Фильм</p>
        <?php  $count = 1; foreach ($movies as $movie) { ?>
        <div class="admin-form">

                    <p class="admin-p"><?php if($count<10) echo "0$count"; else echo $count;?></p>
                    <p class="admin-text">Название:</p>
                    <p class="admin-p"><?php  echo $movie->film_name?></p>
                    <p class="admin-text">Жанр:</p>
                    <p class="admin-p"><?php echo $movie->film_genre?></p>
                    <p class="admin-text">Год:</p>
                    <p class="admin-p"><?php echo $movie->year_of_issue?></p>
                    <p class="admin-text">Дата:</p>
                    <p class="admin-p"><?php echo $movie->start_date?></p>
                    <p class="admin-p"><?php echo $movie->end_date?></p>
                    <p class="admin-text">Время:</p>
                    <p class="admin-p"><?php echo $movie->duration . " минут"?></p>
                    <p class="admin-text">Путь к фото:</p>
                    <p class="admin-p"><?php echo $movie->film_photo?></p>          
                <?php $count++;
           ?>
        </div>
        <?
    }    
        ?>
    </div>
    <form class="delete-form" action="{{url("/film")}}">
        <p class="delete-p">Фильм</p>
        <input type="text" name="film">
        <input type="submit" value="Удалить" class="delete-btn">
    </form>
    <div class="admin">
        <p>Сеанс</p>
        <?php  $count = 1; foreach ($sessions as $session) { ?>
        <div class="admin-form">

                    <p class="admin-p"><?php if($count<10) echo "0$count"; else echo $count;?></p>
                    <p class="admin-p" style="color: orange">ID</p>
                    <p class="admin-p"><?php  echo $session->session_id?></p>
                    <p class="admin-text">Фильм:</p>
                    <p class="admin-p"><?php  echo $session->film_name?></p>
                    <p class="admin-text">Дата:</p>
                    <p class="admin-p"><?php  echo $session->session_date?></p>         
                <?php $count++;
           ?>
        </div>
        <?
    }    
        ?>
    </div>
    <form class="delete-form" action="{{url("/del-session")}}">
        <p class="delete-p">ID</p>
        <input type="text" name="session">
        <input type="submit" value="Удалить" class="delete-btn"> 
    </form>

    <div class="admin">
        <p>Билет</p>
        <?php  $count = 1; foreach ($tickets as $ticket) { ?>
            <div class="admin-form"> 
                <p class="admin-p"><?php if($count<10) echo "0$count"; else echo $count;?></p>
                <p class="admin-p" style="color: orange">ID</p>
                <p class="admin-p"><?php  echo $ticket->ticket_id?></p>
                <p class="admin-text">Дата:</p>
                <p class="admin-p"><?php  echo $ticket->session_date?></p>
                <p class="admin-text">Бронь</p>
                <p class="admin-p"><?php  echo $ticket->reservation?></p>
                <p class="admin-text">Место</p>
                <p class="admin-p"><?php  echo $ticket->place_number?></p>          
            <?php $count++;
       ?>
    </div>
        <?
    }    
        ?>
    </div>
    <form class="delete-form" action="{{url("/ticket-d")}}">
        <p class="delete-p">ID</p>
        <input type="text" name="ticket">
        <input type="submit" value="Удалить" class="delete-btn"> 
    </form>
    <form class="delete-form" action="{{url("/ticket-bron")}}">
        <p class="delete-p">ID</p>
        <input type="text" name="ticket">
        <input type="submit" name="" id="" value="Снять бронь" class="update-btn">  
    </form>

 
<hr> 
<footer>
</footer>
</body>
</html>
