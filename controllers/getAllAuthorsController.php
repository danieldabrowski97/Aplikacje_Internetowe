<?php
require_once('../src/getAllAuthors.php');
    $method = $_SERVER["REQUEST_METHOD"];
    if($method == "GET"){
       echo json_encode(getAllAuthors());
    }

