<?php
    require_once('../src/getAllRentedBooks.php');
    $method = $_SERVER["REQUEST_METHOD"];
    if($method == "GET"){
       echo json_encode(getAllRentedBooks());
    }
