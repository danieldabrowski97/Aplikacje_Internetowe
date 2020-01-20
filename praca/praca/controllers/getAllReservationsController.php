<?php
    require_once('../src/getAllReservations.php');
    $method = $_SERVER["REQUEST_METHOD"];
    if($method == "GET"){
       echo json_encode(getAllReservations());
    }

