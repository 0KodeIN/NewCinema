<?php
$date = $_POST['date'];
$film = $_POST['film'];
$number = $_POST['number'];
$time = $_POST['time'];
echo $film;
echo $number;
$movie = DB::table('movie')
    ->select('id_film')
    ->where('film_name', '=', $film)
    ->get();
    foreach ($movie as $m) {
        $id_film = $m->id_film;
    }
$hall = DB::table('hall')
    ->select('hall_id')
    ->where('hall_number', '=', $number)
    ->get();   
    foreach ($hall as $h) {
        $hall_id = $h->hall_id;
    }
// $result = DB::table('session')
//     ->join('movie', 'session.id_film', '=', 'movie.id_film')
//     ->join('hall', 'hall.hall_id', '=', 'session.hall_id')
//     ->select('movie.id_film', 'hall.hall_id')
//     ->where('movie.film_name', '=', $film)
//     ->where('hall.hall_number', '=', $number)
//     ->get();
//     foreach 
// $result = DB::table('session')
//     ->join('movie', 'session.id_film', '=', 'movie.id_film')
//     ->join('hall', 'hall.hall_id', '=', 'session.hall_id')
//     ->select('movie.id_film', 'hall.hall_id')
//     ->where('movie.film_name', '=', $film)
//     ->where('hall.hall_number', '=', $number)
//     ->get();
//     foreach ($result as $res) {
//         $id_film = $res->id_film;
//         $hall_id = $res->hall_id;
//     }
DB::table('session')->insert([
    'id_film' => $id_film,
    'hall_id' => $hall_id,
    'session_date' => $date,
    'session_time' => $time
]);
header("Location: {$_SERVER['HTTP_REFERER']}");
exit();