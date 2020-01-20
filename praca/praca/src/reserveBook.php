<?php
    function reserveBook($param){
        require_once('../db/sql_connect.php');   // points to the correct file
        $sql = "INSERT INTO reservations (`id_client`,`id_book`,`reserved_to`) VALUES (?,?,?)";
        if($statement = $mysqli->prepare($sql)){
            if($statement->bind_param('iis',$param['id_client'],$param['book_id'],$param['reserved_to'])){
                $statement->execute();
                $mysqli->query("UPDATE books SET is_reserved = 1 WHERE id = ".$param['book_id'] ); 
                echo json_encode("OK");    
            }
        }
    }
?>