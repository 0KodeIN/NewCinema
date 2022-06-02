<?php
$session = $_GET['session'];
$deleted = DB::table('session')->where('session_id', '=', $session)->delete();
header("Location: {$_SERVER['HTTP_REFERER']}");
exit();