<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="/">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/detail.css" rel="stylesheet">
    <link href="/css/ticket.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,500&display=swap" rel="stylesheet"> 
    <title>Document</title>
</head>
<?
$count = 100;
$table = 1;
$check = 0;
$bool = 0;
$arr = [];
if(DB::connection()) {
    $result = DB::table('ticket')
            ->join('session', 'ticket.session_id', '=', 'session.session_id')
            ->select('ticket.place_number', 'ticket.reservation')
            ->where('session.session_id', '=', $id)
            ->get();
    // $result = DB::select('select m.film_name, s.session_date, m.film_cost, m.film_photo
    // from movie m
    // inner join session s ON s.id_film = m.id_film from movie where m.id_film = '.$id);
    // DB::table('dispatcher')->insert(
    // ['dispatcher_id' => 102, 'login' => 'admin2', 'password' => 'qwe586']
    // );
    foreach ($result as $res) {
        $arr[$bool] = $res->place_number;
        $bool++;
    }
}
?>
<body>

    
    <header>
        <div class="navig">
            <h1 class="head-text">New cinema</h1>
        </div>
    </header>
    <p class="green">Свободно</p>
    <p class="red">Занято</p>
    {{-- <img class="img-ticket" src="img/monik.png" alt="" > --}}
    <div class="dug"></div>
    <p class="monik">Экран</p>
    <div class="ticket-table">
        
        <? for($j = 1; $j <= 10; $j++){?>
        <table class="table-flex">
            <? for($i = 1; $i <= 10; $i++){
                for($k = 0; $k < count($arr); $k++){
                    if($table == $arr[$k])
                    $check = 1;
                }
                if($check == 1){ ?>
                    <td class="ticket-tr" id=""><p class="red"><?echo $table; $table++; $check = 0;?></p></td>
                    <?    
                }
                else{ ?>
                    <td class="ticket-tr" id=""><p class="green"><?echo $table;$table++;?></p></td>
                <?
                } 
                
            }?> 
        </table>
        <?}?>
    </div>
    <form class="buy" action="action" method="get">
        <input type="number" style = " display: none"name="session_id" value="<?echo $id;?>" readonly>
        <p>Место </p> <input type="number" name="number">
        <input type="submit" value="Купить" class='validateBtn'>
    </form>

<footer>
</footer>
<script src="js/script.js"></script>
</body>
</html>