<?php 

include 'connection.php';

$id = $_GET['id'];
delete($id);

function delete($id){
    $conn = connection();
    $sql = "DELETE FROM employees WHERE id = $id";
    if ($conn->query($sql)) {
        header('location: index.php');
        exit;
    } else {
        echo "Error: ". $sql. "<br>". $conn->error;
    }
}