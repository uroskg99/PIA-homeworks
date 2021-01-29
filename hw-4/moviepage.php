<?php
include 'config.php';
session_start();

if($_SESSION['role'] == "admin"){
    header("location:homeadmin.php");
}

if (!isset($_SESSION['username'])) {
    header("location: sign.php");
    exit;
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
    <link rel="stylesheet" type="text/css" href="moviepage2.css">

</head>
<body>
    <div class="container-fluid header">
        <a href="home.php">
            <img src="img/imdb-logo.png" class="logo">
        </a>
        
        <span class="login-info"><?php echo "You are logged in as user ".$_SESSION['username']; ?></span>
        <button class="customBtn" onclick="location.href='logout.php'">Logout</button>
        
    </div>

    <?php 

    $title = mysqli_real_escape_string($conn, $_GET['title']);

    $sql = "SELECT * FROM movies WHERE title='$title'";
    $result = mysqli_query($conn, $sql);
    $query_res = mysqli_num_rows($result);

    while($row = mysqli_fetch_assoc($result)){

    ?>

    <div class="container all-info">
        <div class="title">
            <h2><?php echo $row['title']; ?><span> (<?php echo $row['year']; ?>)</span></h2>
            <span><p class="main-info"><?php echo $row['duration']; ?> </span><span>|</span><span> <?php echo $row['genre']; ?></span></p>
        </div>

        

        <div class="side-info">
            <img class="movie-pic" src=<?php echo $row['picture']; ?> >
        


            <div class="description">
                <p class="desc"><?php echo $row['description']; ?></p>
                <div class="side-info"><span>Director </span>: <?php echo $row['director']; ?></div>
                <div class="side-info"><span>Scenarists </span>: <?php echo $row['scenarist']; ?></div>
                <div class="side-info"><span>List of actors </span>: <?php echo $row['actors']; ?></div>
                <div class="side-info"><span>Production </span>: <?php echo $row['production']; ?></div>

            </div>

        </div>

        <hr>
        <div class="rating">
            <div class="row">
                <div class="col-sm-6">
                    Ocene
                </div>
                <div class="col-sm-6">
                    Ukupne ocene
                </div>
            </div>
        </div>

    </div>

    

<?php
}
?>
    


</body>
</html>
