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
    <link rel="stylesheet" type="text/css" href="home.css">

</head>
<body>
    <div class="container-fluid fixed-top header">
        <a href="home.php">
            <img src="img/imdb-logo.png" class="logo">
        </a>
        
        <span class="login-info"><?php echo "You are logged in as user ".$_SESSION['username']; ?></span>
        <a href="logout.php">
            <button class="customBtn">Logout</button>
        </a>
    </div>

    




    <div class="container searchbox">
        <h3 class="text-center">Search any movie</h3>
        <form action="home.php" method="GET">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="search" placeholder="Search">
                <div class="input-group-append">
                    <button class="btn btn-search" type="submit" name="search-submit">Go</button>  
                </div>
            </div>
        </form>
    </div>

    <div class="container searchbox">
        <form action="home.php" method="GET">
            <div class="form-group selectbox">
                <label for="sel1">Search by genre</label>
                <select class="form-control" id="sel1" name="list">
                    <option disabled selected>Search movie by genre: </option>
                    <option>Action</option>
                    <option>Adventure</option>
                    <option>Animation</option>
                    <option>Comedy</option>
                    <option>Crime</option>
                    <option>Drama</option>
                    <option>Family</option>
                    <option>Fantasy</option>
                    <option>Historical</option>
                    <option>Horror</option>
                    <option>Mystery</option>
                    <option>Romance</option>
                    <option>Saga</option>
                    <option>Thriller</option>
                    <option>Urban</option>
                    <option>Western</option>
                </select>
            </div>
            <div class="input-group-append">
                <button type="submit" class="btn btn-genre btn-search" name="genre-submit">Search</button>
            </div>
        </form>
    </div>




    <?php
        if(isset($_GET['search-submit'])){
            $search = mysqli_real_escape_string($conn, $_GET['search']);
            $movie_qry = "SELECT * FROM movies WHERE title LIKE '%$search%' OR description LIKE '%$search%' OR director LIKE '%$search%' OR actors LIKE '%$search%'";
        }
        else if(isset($_GET['list'])){
            $search = mysqli_real_escape_string($conn, $_GET['list']);
            $movie_qry = "SELECT * FROM movies WHERE genre LIKE '%$search%'";
        }
        else{
            $movie_qry = "SELECT * FROM movies";
        }
        $movie_res=mysqli_query($conn, $movie_qry);
        $queryRes = mysqli_num_rows($movie_res);

    ?>

    <div class="container all-movies">
        <?php
        if($queryRes <= 0){
            echo "There are no results for";
        }else{
            while($movie_data = mysqli_fetch_assoc($movie_res)){
        ?>

        
            <div class="container-fluid col-sm-12 movie-box">
             
                <?php echo "<a href='moviepage.php?title=".$movie_data['title']."'>"; ?>
                    <img src=<?php echo "movies-img/".$movie_data['picture']; ?> class="movie-pic">
                <?php echo "</a>"; ?>

                <?php echo "<a href='moviepage.php?title=".$movie_data['title']."' style='text-decoration-color:white'>"; ?>
                <h2 class="title"> <?php echo $movie_data['title'];  ?>  <span class="year"> (<?php echo $movie_data['year']; ?>)  </span></h2>
                <?php echo "</a>"; ?>

                <p class="desc"><?php echo $movie_data['description'];  ?></p>
                <div class="genre"><?php echo $movie_data['genre']; ?></div>
                <div class="duration"><?php echo $movie_data['duration']; ?></div>

            </div>

        <?php
            }
        }
        ?>

    </div>



</body>
</html>
