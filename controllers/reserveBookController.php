<?php
session_start();
    require_once('../src/reserveBook.php'); // points to the correct file
    $method = $_SERVER["REQUEST_METHOD"];
    if($method == "POST"){
        $param = array_merge($_POST,['id_client' => $_SESSION['loggedUser']]);
        reserveBook($param);
    }
