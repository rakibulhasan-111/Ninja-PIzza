<?php 
    $conn = mysqli_connect('localhost', 'ninja', 'netninja', 'ninja_pizza');

    if (!$conn){
        echo 'error!' . mysqli_connect_error();
    }
?>