<?php
include("config.php");

$movie_tit = $_GET['title'];
$qry = "DELETE FROM movies WHERE title = '$movie_tit' ";

$data = mysqli_query($conn, $qry);

if($data){
    header("location:homeadmin.php");
}else{
    echo "ERORR WHILE TRYING TO DELETE MOVIE";
}

?>