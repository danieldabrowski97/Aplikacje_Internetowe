<?php
    require_once('../src/getAllFreeBooks.php');
    $method = $_SERVER["REQUEST_METHOD"];
    if($method == "GET"){
       echo json_encode(getAllFreeBooks());
    }
