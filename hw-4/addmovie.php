<?php
include("config.php");
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>IMDB Copy</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="addmovie.css">

</head>

<body>
    
    <div class="container-fluid header">
        <a href="homeadmin.php">
            <img src="img/imdb-logo.png" class="logo">
        </a>
        
        <span class="login-info"><?php echo "You are logged in as admin ".$_SESSION['username']; ?></span>
        <button class="customBtn" onclick="location.href='addmovie.php'">Add Movie</button>
        <button class="customBtn" onclick="location.href='sign.php'">Logout</button>
        

    </div>

    <div class="container formSignUp" id="formSignUp">
        <h2>Add Movie</h2>
        <form action="addmovie.php" method="POST">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" placeholder="Enter title" name="title" required>
            </div>
            <div class="form-group">
                <label for="description">Shorter description:</label>
                <textarea class="form-control" name="description" cols="55" rows="5" placeholder="Enter short description" required></textarea>
            </div>
            <div class="form-group">
                <label for="genre">Genre:</label>
                <input type="text" class="form-control" placeholder="Enter genre(s)" name="genre" required>
            </div>
            <div class="form-group">
                <label for="scenarist">Scenarist:</label>
                <textarea class="form-control" name="scenarist" cols="55" rows="4" placeholder="Enter scenarist(s)" required></textarea>
            </div>
            <div class="form-group">
                <label for="director">Director:</label>
                <textarea class="form-control" name="director" cols="55" rows="4" placeholder="Enter director(s)" required></textarea>
            </div>
            <div class="form-group">
                <label for="production">Production:</label>
                <input type="text" class="form-control" placeholder="Enter procution house(s)" name="production" required>
            </div>
            <div class="form-group">
                <label for="actors">List of actors:</label>
                <textarea class="form-control" name="actors" cols="55" rows="4" placeholder="Enter actors"></textarea>
            </div>
            <div class="form-group">
                <label for="year">Year:</label>
                <input type="text" class="form-control" placeholder="Enter year" name="years" required>
            </div>
            <div class="form-group">
                <label for="picture">Picture:</label>
                <input type="text" class="form-control" placeholder="Enter picture" name="picture" required>
            </div>
            <div class="form-group">
                <label for="duration">Duration in minutes (example 120min):</label>
                <input type="text" class="form-control" placeholder="Enter duration in minutes" name="duration" required>
            </div>
            <div class="user-exist">
                
            <?php

            

            if(isset($_POST['add'])){
                $title = $_POST['title'];
                $description = $_POST['description'];
                $genre = $_POST['genre'];
                $scenarist = $_POST['scenarist'];
                $director = $_POST['director'];
                $production = $_POST['production'];
                $actors = $_POST['actors'];
                $year = $_POST['years'];
                $picture = $_POST['picture'];
                $duration = $_POST['duration'];

                $query_movie = "SELECT title FROM movies";
                $unique = 0; //user is unique if $unique is 0, else $unique is 1
                $result = mysqli_query($conn, $query_movie);
                while($row = mysqli_fetch_array($result)){
                    if($title == $row['title']){
                        echo "<script>alert('This movie already exist')</script>";
                        $unique = 1;
                        break;
                    }        
                }
                if ($unique == 0){
                    $query = "INSERT INTO movies (title, description, genre, scenarist, director, production, actors, year, picture, duration)
                     VALUES ('$title', '$description', '$genre', '$scenarist', '$director', '$production', '$actors', '$year', '$picture', '$duration')";
                    mysqli_query($conn, $query);
                    header("location:homeadmin.php");
                }

            } 

            if(isset($_POST['add_another'])){
                $title = $_POST['title'];
                $description = $_POST['description'];
                $genre = $_POST['genre'];
                $scenarist = $_POST['scenarist'];
                $director = $_POST['director'];
                $production = $_POST['production'];
                $actors = $_POST['actors'];
                $year = $_POST['years'];
                $picture = $_POST['picture'];
                $duration = $_POST['duration'];

                $query_movie = "SELECT title FROM movies";
                $unique = 0; //user is unique if $unique is 0, else $unique is 1
                $result = mysqli_query($conn, $query_movie);
                while($row = mysqli_fetch_array($result)){
                    if($title == $row['title']){
                        echo "<script>alert('This movie already exist')</script>";
                        $unique = 1;
                        break;
                    }        
                }
                if ($unique == 0){
                    $query = "INSERT INTO movies (title, description, genre, scenarist, director, production, actors, year, picture, duration)
                     VALUES ('$title', '$description', '$genre', '$scenarist', '$director', '$production', '$actors', '$year', '$picture', '$duration')";
                    mysqli_query($conn, $query);
                    header("location:addmovie.php");
                }

            } 
        
            ?>

            </div>
            
            <div class="button1">
                <button type="submit" class="customBtn" name="add">Add Movie</button>
                <button type="submit" class="customBtn" name="add_another">Add More Movies</button>
            </div>
        </form>
    </div>



</body>
</html>
