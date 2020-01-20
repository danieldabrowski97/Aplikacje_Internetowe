<?php
require_once('../src/createNewAuthor.php'); // points to the correct file
$method = $_SERVER["REQUEST_METHOD"];
if ($method == "POST" && isset($_POST["name"])) {
    createNewAuthor($_POST);
}
