<?php
function getAllAuthors(){
    require_once('../db/sql_connect.php');
        $sql = "SELECT authors.*, (SELECT COUNT(*) FROM books b WHERE authors.id = b.id_author ) as number_of_books FROM authors";
        $result = $mysqli->query($sql);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        return $rows;
    }