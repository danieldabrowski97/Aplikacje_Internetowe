<?php
require_once('../src/deleteAuthor.php'); // points to the correct file
$method = $_SERVER["REQUEST_METHOD"];
if($method == "POST" && isset($_POST["id_author"])){
    deleteAuthor($_POST);
}
