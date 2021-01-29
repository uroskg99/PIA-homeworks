<?php
include 'config.php';
session_start();

if($_SESSION['role'] == "user"){
    header("location:home.php");
}

if (!isset($_SESSION['username'])) {
    header("location: sign.php");
    exit;
}

$movie_tit = $_GET['title'];
$sql = "SELECT * FROM movies WHERE title='$movie_tit'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$title = $row['title'];
$description = $row['description'];
$genre = $row['genre'];
$scenarist = $row['scenarist'];
$director = $row['director'];
$production = $row['production'];
$actors = $row['actors'];
$year = $row['year'];
$picture = $row['picture'];
$duration = $row['duration'];

if(isset($_POST['update_title'])){
    $title = $_POST['new_title'];

    $sql = " UPDATE movies SET title = '$title' WHERE title = '$movie_tit' ";

    $res = mysqli_query($conn, $sql);

    if ($res) {
        echo '<script language="javascript"> alert("You have successfully updated the movie title") </script>';
    } else {
        echo '<script language="javascript"> alert("Error while updating the movie title") </script>';
    }
}

if(isset($_POST['update_desc'])){
    $description = $_POST['new_desc'];

    $sql = " UPDATE movies SET description = '$description' WHERE title = '$movie_tit' ";

    $res = mysqli_query($conn, $sql);

    if ($res) {
        echo '<script language="javascript"> alert("You have successfully updated the movie description") </script>';
    } else {
        echo '<script language="javascript"> alert("Error while updating the movie description") </script>';
    }
}

if(isset($_POST['update_genre'])){
    $genre = $_POST['new_genre'];

    $sql = " UPDATE movies SET genre = '$genre' WHERE title = '$movie_tit' ";

    $res = mysqli_query($conn, $sql);

    if ($res) {
        echo '<script language="javascript"> alert("You have successfully updated the movie genre") </script>';
    } else {
        echo '<script language="javascript"> alert("Error while updating the movie genre") </script>';
    }
}

if(isset($_POST['update_scenarist'])){
    $scenarist = $_POST['new_scenarist'];

    $sql = " UPDATE movies SET scenarist = '$scenarist' WHERE title = '$movie_tit' ";

    $res = mysqli_query($conn, $sql);

    if ($res) {
        echo '<script language="javascript"> alert("You have successfully updated the movie scenarist(s)") </script>';
    } else {
        echo '<script language="javascript"> alert("Error while updating the movie scenarist(s)") </script>';
    }
}

if(isset($_POST['update_director'])){
    $director = $_POST['new_director'];

    $sql = " UPDATE movies SET director = '$director' WHERE title = '$movie_tit' ";

    $res = mysqli_query($conn, $sql);

    if ($res) {
        echo '<script language="javascript"> alert("You have successfully updated the movie director(s)") </script>';
    } else {
        echo '<script language="javascript"> alert("Error while updating the movie director(s)") </script>';
    }
}

if(isset($_POST['update_production'])){
    $production = $_POST['new_production'];

    $sql = " UPDATE movies SET production = '$production' WHERE title = '$movie_tit' ";

    $res = mysqli_query($conn, $sql);

    if ($res) {
        echo '<script language="javascript"> alert("You have successfully updated the movie production") </script>';
    } else {
        echo '<script language="javascript"> alert("Error while updating the movie production") </script>';
    }
}

if(isset($_POST['update_actors'])){
    $actors = $_POST['new_actors'];

    $sql = " UPDATE movies SET actors = '$actors' WHERE title = '$movie_tit' ";

    $res = mysqli_query($conn, $sql);

    if ($res) {
        echo '<script language="javascript"> alert("You have successfully updated the movie actors") </script>';
    } else {
        echo '<script language="javascript"> alert("Error while updating the movie actors") </script>';
    }
}

if(isset($_POST['update_year'])){
    $year = $_POST['new_year'];

    $sql = " UPDATE movies SET year = '$year' WHERE title = '$movie_tit' ";

    $res = mysqli_query($conn, $sql);

    if ($res) {
        echo '<script language="javascript"> alert("You have successfully updated the movie year") </script>';
    } else {
        echo '<script language="javascript"> alert("Error while updating the movie year") </script>';
    }
}

if(isset($_POST['update_picture'])){
    $picture = $_FILES['picture']['name'];
    $target = "movies-img/".basename($picture);

    if(!move_uploaded_file($_FILES['picture']['tmp_name'], $target)){
        echo "ERROR";
    }

    $sql = " UPDATE movies SET picture = '$picture' WHERE title = '$movie_tit' ";

    $res = mysqli_query($conn, $sql);

    if ($res) {
        echo '<script language="javascript"> alert("You have successfully updated the movie picture") </script>';
    } else {
        echo '<script language="javascript"> alert("Error while updating the movie picture") </script>';
    }
}
    
if(isset($_POST['update_duration'])){
    $duration = $_POST['new_duration'];

    $sql = " UPDATE movies SET duration = '$duration' WHERE title = '$movie_tit' ";

    $res = mysqli_query($conn, $sql);

    if ($res) {
        echo '<script language="javascript"> alert("You have successfully updated the movie duration") </script>';
    } else {
        echo '<script language="javascript"> alert("Error while updating the movie duration") </script>';
    }
}

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
    <link rel="stylesheet" type="text/css" href="editmovie2.css">

</head>
<body>
    <div class="container-fluid header">
        <a href="homeadmin.php">
            <img src="img/imdb-logo.png" class="logo">
        </a>

        <button class="customBtn back" onclick="location.href='homeadmin.php'">Home</button>
        
        <span class="login-info"><?php echo "You are logged in as admin ".$_SESSION['username']; ?></span>
        <button class="customBtn" onclick="location.href='addmovie.php'">Add Movie</button>
        <button class="customBtn" onclick="location.href='logout.php'">Logout</button>
        
    </div>

    <div class="container edit">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Title:</label>
                <?php echo "<input type=text class=form-control name=new_title value =\"" . $title . "\" required>" ; ?>
                <button class="update-button" name="update_title" onclick='return checkedit()'>Update title</button>
            </div>
        
            <div class="form-group">
                <label for="desc">Description:</label>
                <?php echo "<textarea type=text class=form-control cols=55 rows=4 name=new_desc required>$description</textarea>" ; ?>
                <button class="update-button" name="update_desc" onclick='return checkedit()'>Update description</button>
            </div>

            <div class="form-group">
                <label for="genre">Genre:</label>
                <?php echo "<input type=text class=form-control name=new_genre value =\"" . $genre . "\" required>" ; ?>
                <button class="update-button" name="update_genre" onclick='return checkedit()'>Update genre</button>
            </div>

            <div class="form-group">
                <label for="scenarist">Scenarist(s):</label>
                <?php echo "<textarea type=text class=form-control cols=55 rows=4 name=new_scenarist required>$scenarist</textarea>" ; ?>
                <button class="update-button" name="update_scenarist" onclick='return checkedit()'>Update scenarist(s)</button>
            </div>

            <div class="form-group">
                <label for="director">Director(s):</label>
                <?php echo "<textarea type=text class=form-control cols=55 rows=4 name=new_director required>$director</textarea>" ; ?>
                <button class="update-button" name="update_director" onclick='return checkedit()'>Update director(s)</button>
            </div>

            <div class="form-group">
                <label for="production">Production:</label>
                <?php echo "<input type=text class=form-control name=new_production value =\"" . $production . "\" required>" ; ?>
                <button class="update-button" name="update_production" onclick='return checkedit()'>Update production</button>
            </div>

            <div class="form-group">
                <label for="actors">Actors:</label>
                <?php echo "<textarea type=text class=form-control cols=55 rows=4 name=new_actors required>$actors</textarea>" ; ?>
                <button class="update-button" name="update_actors" onclick='return checkedit()'>Update actors</button>
            </div>

            <div class="form-group">
                <label for="year">Year:</label>
                <?php echo "<input type=text class=form-control name=new_year value =\"" . $year . "\" required>" ; ?>
                <button class="update-button" name="update_year" onclick='return checkedit()'>Update year</button>
            </div>

            <div class="form-group">
                <label for="picture" class="file-upload">Picture:</label>
                <?php echo "<input type=file name=picture>" ; ?>
                <button class="update-button" name="update_picture" onclick='return checkedit()'>Update picture</button>
            </div>

            <div class="form-group">
                <label for="duration">Duration in minutes (example 120min):</label>
                <?php echo "<input type=text class=form-control name=new_duration value =\"" . $duration . "\" required>" ; ?>
                <button class="update-button" name="update_duration" onclick='return checkedit()'>Update duration</button>
            </div>

        </form>

    </div>

    <?php
    
    ?>

<script>
    function checkedit(){
        return confirm('Please, confirm if You are sure You want to edit this movie');
    }
</script>
</body>
</html>
