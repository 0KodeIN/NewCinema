<?php
$file = $_FILES['file'];
$fileName = $file['name'];
$name = $_POST['name'];
$genre = $_POST['genre'];
$year = $_POST['year'];
$date_begin = $_POST['date_begin'];
$date_end = $_POST['date_end'];
$cost = $_POST['cost'];
$duration = $_POST['duration'];
$path = 'D:\OpenServer\domains\localhost\app\public\img\ '. $fileName;
move_uploaded_file($file['tmp_name'], $path);
DB::table('movie')->insert([
    'film_name' => $name,
    'film_genre' => $genre,
    'year_of_issue' => $year,
    'start_date' => $date_begin,
    'end_date' => $date_end,
    'duration' => $duration,
    'film_cost' => $cost,
    'film_photo' => $fileName
]);
header("Location: {$_SERVER['HTTP_REFERER']}");
exit();

