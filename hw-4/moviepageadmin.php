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
    <link rel="stylesheet" type="text/css" href="moviepageadmin.css">

</head>
<body>
    <div class="container-fluid header">
        <a href="homeadmin.php">
            <img src="img/imdb-logo.png" class="logo">
        </a>
        
        <span class="login-info"><?php echo "You are logged in as admin ".$_SESSION['username']; ?></span>
        <button class="customBtn" onclick="location.href='addmovie.php'">Add Movie</button>
        <button class="customBtn" onclick="location.href='logout.php'">Logout</button>
        

    </div>

    <?php 

    $title = mysqli_real_escape_string($conn, $_GET['title']);

    $sql = "SELECT * FROM movies WHERE title='$title'";
    $result = mysqli_query($conn, $sql);
    $query_res = mysqli_num_rows($result);

    while($row = mysqli_fetch_assoc($result)){
        
        $title_new = $row['title'];
        
    ?>

    <div class="container all-info">
        <div class="title">
            <h2><?php echo $row['title']; ?><span> (<?php echo $row['year']; ?>)</span></h2>
            <span><p class="main-info"><?php echo $row['duration']; ?> </span><span>|</span><span> <?php echo $row['genre']; ?></span></p>
            <div class="admin-button">
                <?php echo "<a href='edit.php?title=".$row['title']."'>"; ?>
                    <button class="customBtn">Edit</button>
                <?php echo "</a>"; ?>
                <?php echo "<a href='delete.php?title=".$row['title']."' onclick='return checkdelete()'>"; ?>
                    <button class="customBtn delete">Delete</button>
                <?php echo "</a>"; ?>
            </div>
        </div>

        

        <div class="side-info">
            <img class="movie-pic" src=<?php echo "movies-img/".$row['picture']; ?> >
        


            <div class="description">
                <p class="desc"><?php echo $row['description']; ?></p>
                <div class="side-info"><span>Director </span>: <?php echo $row['director']; ?></div>
                <div class="side-info"><span>Scenarists </span>: <?php echo $row['scenarist']; ?></div>
                <div class="side-info"><span>List of actors </span>: <?php echo $row['actors']; ?></div>
                <div class="side-info"><span>Production </span>: <?php echo $row['production']; ?></div>

            </div>

        </div>

        <?php 

        $qry_rate = "SELECT * FROM rating WHERE title = '$title_new' ";
        $res_rate = mysqli_query($conn, $qry_rate);

        $sum = 0;
        $n = 0;
        $currentUser = $_SESSION['username'];
        $msg = '';
        $msg2 = '';
        $currentRate = 'Enter';


        while($row_rate = mysqli_fetch_assoc($res_rate)){
            $sum += $row_rate['rate'];
            $n++;


            if($row_rate['user'] == $currentUser && $row_rate['title'] == $row['title']){
                $msg = "You have already rate this movie, you can change your rate!";
                $currentRate = $row_rate['rate'];
                
            }
        }

        if($n>0){
            $sumFinal = round(($sum / $n), 2);
            $msg2 = $sumFinal."/10";
        }else{
            $msg2 = "No results";
        }

        ?>

        <hr>
        <div class="rating">
            <div class="row">
                <div class="col-xl-6">
                    You can't rate movie as admin!
                </div>
                <div class="col-xl-6">
                    Rating : <span class="bold-class"><?php echo $msg2; ?></span> | Number of rates : <span class="bold-class"><?php echo $n; ?></span>
                </div>
            </div>
        </div>

    </div>

    
<?php

} 

?>
    
<script>

    function checkdelete(){
        return confirm('Please, confirm if You are sure You want to delete this movie');
    }

</script>

</body>
</html>
