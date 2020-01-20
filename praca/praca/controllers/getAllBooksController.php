<?php
require_once('../src/getAllBooks.php');
    $method = $_SERVER["REQUEST_METHOD"];
    if($method == "GET"){
       echo json_encode(getAllBooks());
    }

