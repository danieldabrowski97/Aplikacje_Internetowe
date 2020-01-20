<?php
function getAllReservations(){
    require_once('../db/sql_connect.php');
        $sql = "SELECT books.*,reservations.*,authors.name,authors.surname,clients.name AS client_name,clients.surname AS client_surname,clients.phone_number FROM books INNER JOIN reservations ON books.id = reservations.id_book INNER JOIN authors ON books.id_author = authors.id INNER JOIN clients ON reservations.id_client = clients.id WHERE books.is_reserved = 1 ORDER BY reservations.reserved_to";
        $result = $mysqli->query($sql);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        return $rows;
    }