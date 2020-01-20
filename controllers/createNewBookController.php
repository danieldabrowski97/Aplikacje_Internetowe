<?php
require_once('../src/createNewBook.php');
$method = $_SERVER["REQUEST_METHOD"];
if ($method == "POST" && isset($_POST["title"])) {
    createNewBook($_POST);
}
