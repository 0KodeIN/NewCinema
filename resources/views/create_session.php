<?php
$date = $_POST['date'];
$film = $_POST['film'];
$number = $_POST['number'];
$id = $_POST['time'];
echo $film;
echo $number;
$result = DB::table('session')
    ->join('movie', 'session.id_film', '=', 'movie.id_film')
    ->join('hall', 'hall.hall_id', '=', 'session.hall_id')
    ->select('movie.id_film', 'hall.hall_id')
    ->where('movie.film_name', '=', $film)
    ->where('hall.hall_number', '=', $number)
    ->get();
    foreach ($result as $res) {
        $id_film = $res->id_film;
        $hall_id = $res->hall_id;
    }
DB::table('session')->insert([
    'id_film' => $id_film,
    'hall_id' => $hall_id,
    'session_date' => $date,
    'session_time' => $time
]);
header("Location: {$_SERVER['HTTP_REFERER']}");
exit();