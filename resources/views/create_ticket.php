<?php
$date = $_POST['date'];
$film = $_POST['film'];
$number_hall = $_POST['number_hall'];
$number = $_POST['number'];
$time = $_POST['time'];
echo $date; echo $film; echo $number_hall; echo $number; echo $time;
$result = DB::table('session')
   ->select( 'session_id')
   ->where('session.session_time', '=', $time)
   ->where('session.session_date', '=', $date)
    ->get();
    foreach ($result as $res) {
        $session = $res->session_id;
        echo $session;
    }
DB::select("CALL new_ticket(
    ' $session '::integer,
	101::integer,
	' $number '::integer,
	0::smallint
)");
// DB::table('session')->insert([
//     'id_film' => $id_film,
//     'hall_id' => $hall_id,
//     'session_date' => $date,
// ]);
header("Location: {$_SERVER['HTTP_REFERER']}");
exit();
    // ->join('session', 'session.session_id', '=', 'ticket.session_id')
    // ->join('movie', 'movie.id_film', '=', 'session.id_film')
    // ->join('hall', 'session.hall_id', '=', 'hall.hall_id')
        // ->where('movie.film_name', '=', $film)
    // ->where('hall.hall_number', '=', $number_hall)
        // ->where('session.session_date', '=', $date)