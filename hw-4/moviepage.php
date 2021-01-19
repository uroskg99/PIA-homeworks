<?php
include 'config.php';
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
    <link rel="stylesheet" type="text/css" href="moviepage.css">

</head>
<body>
    <div class="container-fluid header">
        <a href="home.php">
            <img src="img/imdb-logo.png" class="logo">
        </a>
        
        <span class="login-info"><?php echo "You are logged in as user ".$_SESSION['username']; ?></span>
        <a href="sign.php">
            <button class="customBtn">Logout</button>
        </a>
    </div>

    <?php 

    $title = mysqli_real_escape_string($conn, $_GET['title']);

    $sql = "SELECT * FROM movies WHERE title='$title'";
    $result = mysqli_query($conn, $sql);
    $query_res = mysqli_num_rows($result);

    while($row = mysqli_fetch_assoc($result)){

    ?>
    <div class="all-info">
        <div class="container table-movie">
            <h2><?php echo $row['title']; ?></h2>
            <p class="desc"><?php echo $row['description']; ?></p>
            <table class="table table-hover">
                <tbody>
                <tr class="table-secondary">
                    <td class="information">Genre</td>
                    <td><?php echo $row['genre']; ?></td>
                </tr>    
                <tr class="table-secondary">
                    <td class="information">Scenarist</td>
                    <td><?php echo $row['scenarist']; ?></td>
                </tr> 
                <tr class="table-secondary">
                    <td class="information">Director</td>
                    <td><?php echo $row['director']; ?></td>
                </tr> 
                <tr class="table-secondary">
                    <td class="information">Production</td>
                    <td><?php echo $row['production']; ?></td>
                </tr> 
                <tr class="table-secondary">
                    <td class="information">Actors</td>
                    <td><?php echo $row['actors']; ?></td>
                </tr> 
                <tr class="table-secondary">
                    <td class="information">Year</td>
                    <td><?php echo $row['year']; ?></td>
                </tr> 
                <tr class="table-secondary">
                    <td class="information">Duration</td>
                    <td><?php echo $row['duration']; ?></td>
                </tr> 
                
                </tbody>
            </table>
        </div>

        <img class="movie-pic" src=<?php echo $row['picture']; ?> >
    </div>

<?php
}
?>
    


</body>
</html>
