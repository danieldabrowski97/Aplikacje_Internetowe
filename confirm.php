<?php
if(isset($_GET['confirm'])){
    require_once('./db/sql_connect.php');

    $sql = "SELECT id FROM clients WHERE code ='".strval($_GET['confirm'])."' AND active = 0";
    $result = $mysqli->query($sql);
    $row = $result->fetch_row();
    if(count($row)){
        $sql = "UPDATE clients SET active = 1 WHERE id =".$row[0];
        if($mysqli->query($sql)){
            header("Location: login.php?done=Konto zostało aktywowane");
        }
    } else {
        header("Location: login.php?fail=Niepoprawny kod");
    }
}
//$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
//echo $url;