<?php
require_once('../src/unsetReservation.php'); // points to the correct file
$method = $_SERVER["REQUEST_METHOD"];
if($method == "POST" && isset($_POST["id_reservation"])){
    unsetReservation($_POST);
}
