<?php 
$number = $_GET['number']; 
$id = $_GET['session_id'];
if(!$_GET['number']){
    header("Location: {$_SERVER['HTTP_REFERER']}");   
    exit();
}
$number_seats = DB::table('ticket')
->join('session', 'session.session_id', '=', 'ticket.session_id')
->select('ticket.place_number')
->where('session.session_id', '=', $id)
->where('ticket.place_number', '=', $number)
->get();
foreach ($number_seats as $num) {
    if($number == $num->place_number){
        header("Location: {$_SERVER['HTTP_REFERER']}");   
        exit();
    }

}
$film; $cost;
    // $result = DB::select("select * from ticket where session_id = ". $id " and place_number = " . $number);
    // foreach ($result as $res) {
    //     if($number == $res->place_number)
    //         echo "Билет уже куплен";
    // }
    $result = DB::table('session')
            ->join('movie', 'movie.id_film', '=', 'session.id_film')
            ->join('hall', 'hall.hall_id', '=', 'session.hall_id')
            ->select('movie.film_name', 'movie.film_cost', 'movie.film_photo', 
            'session.session_date', 'session.session_id', 'hall.hall_number', 'hall.number_of_seats')
            ->where('session.session_id', '=', $id)
            ->get();
    foreach ($result as $res) {
        $film = $res->film_name;
        $cost = $res->film_cost;
        $hall = $res->hall_number;
        $number_seats = $res->number_of_seats;
    }
if($number > $number_seats){
    header("Location: {$_SERVER['HTTP_REFERER']}");   
    exit();
}
DB::table('ticket')->insert([
    'session_id' => $id,
    'dispatcher_id' => 101,
    'place_number' => $number,
    'reservation' => 1
]);
$img='D:\OpenServer\domains\localhost\app\public\img\yellow.png';
$font_file = './sfns-display-thin.ttf';
$image = imagecreatefrompng($img);
$color = imagecolorallocate($image, 0, 0, 0);
$str = `$film." Цена " . $cost . " рублей  Место " . $number`;
imagefttext($image, 40, 0, 50, 140, $color, $font_file, "$film  Цена   $cost  Место $number Зал $hall".PHP_EOL);
imagefttext($image, 40, 0, 50, 50, $color, $font_file, "Ваш билет. Предъявите его кассиру");
imagepng($image, 'D:\OpenServer\domains\localhost\app\public\img\ticket.png');
$result_img = 'D:\OpenServer\domains\localhost\app\public\img\ticket.png';

if (file_exists($result_img)) {

    if (ob_get_level()) {
      ob_end_clean();
    }

    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . basename($result_img));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($result_img));
    readfile($result_img);
    exit;
}
imagedestroy($image);
?>
<script>
window.location.reload();  
</script>

