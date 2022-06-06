<?php
$ticket = $_GET['ticket'];
echo $ticket;
DB::update('update ticket set reservation = 0 where ticket_id = ?', [$ticket]);
header("Location: {$_SERVER['HTTP_REFERER']}");
exit();