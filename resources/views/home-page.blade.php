@extends('layout')
@section('content')
<?
if(DB::connection()) {
    echo 'connection';
    $result = DB::select('select * from movie');
    // DB::table('dispatcher')->insert(
    // ['dispatcher_id' => 102, 'login' => 'admin2', 'password' => 'qwe586']
    // );
    foreach ($result as $res) {
    echo  "/img/$res->film_photo ";
    }
}
?>
<div class="container">
    <?php  foreach ($result as $res) {
        ?>
        <div class="card">
            <a href="" class="def"><?php  echo $res->film_name?></a>
            <img src=<?php echo "/img/$res->film_photo "?> class = "file_img" alt="">
            <div class="text-ticket">
                <p class="def"><?php echo $res->film_cost?></p>
                <a href="" target="_blank" class = "ticket-btn">Купить</a>
            </div>           
        </div>
        <?php
    }    
    ?>         
</div>


    {{-- // $conn = new PDO('pgsql:host=localhost;port=5433;dbname=zxc;');
    // $sql = "SELECT * FROM table1 ";
    // $result = $conn->query($sql);
    // echo $result;
//     $get_count = $result->rowCount();
//     $sql = "SELECT user.id_user, user.login, files.file_id, files.file_name, files.file_url,files.description FROM user
//     INNER JOIN files ON user.id_user = files.id_user  LIMIT $offset, $count";
//     $result = $conn->query($sql);
// $connection = pg_connect("host=127.0.0.1 dbname=postgres user=postgres password=zxc");
//     if($connection) {
//     echo 'connected';
//     } else {
//     echo 'there has been an error connecting';
// } ?> --}}

@endsection