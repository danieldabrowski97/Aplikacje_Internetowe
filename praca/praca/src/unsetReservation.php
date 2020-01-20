<?php

function unsetReservation($param)
{
    require_once('../db/sql_connect.php');   // points to the correct file
    $sql = "DELETE FROM reservations WHERE id = ?";
    if ($statement = $mysqli->prepare($sql)) {
        if ($statement->bind_param('i', $param['id_reservation'])) {
            $statement->execute();
            if ($mysqli->query("UPDATE books set is_reserved = 0 WHERE id = " . $param['id_book'])) {
                echo json_encode("OK");
            }
        }
    }
}