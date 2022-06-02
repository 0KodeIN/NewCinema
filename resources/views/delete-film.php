<?php
$film = $_GET['film'];
$deleted = DB::table('movie')->where('film_name', '=', $film)->delete();
header("Location: {$_SERVER['HTTP_REFERER']}");
exit();