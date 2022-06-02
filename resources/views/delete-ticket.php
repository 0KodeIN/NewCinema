<?php
echo $_GET['ticket'];
$ticket = $_GET['ticket'];
$deleted = DB::table('ticket')->where('ticket_id', '=', $ticket)->delete();
header("Location: {$_SERVER['HTTP_REFERER']}");
exit();
