<?php
require_once('../src/deleteBook.php'); // points to the correct file
$method = $_SERVER["REQUEST_METHOD"];
if($method == "POST" && isset($_POST["id_book"])){
    deleteBook($_POST);
}