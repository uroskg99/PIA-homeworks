<?php
include 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>IMDB Copy</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="home.css">

</head>
<body>
    <div class="container-fluid header">
        <a href="home.php">
            <img src="img/imdb-logo.png" class="logo">
        </a>
        
        <span class="login-info"><?php echo "Logged in as user"; ?></span>
        <a href="sign.php">
            <button class="customBtn">Logout</button>
        </a>
    </div>

    <div class="container mt-3">
        <h3 class="text-center">Search any movie</h3>
        <form action="home.php" method="GET">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="search" placeholder="Search">
                <div class="input-group-append">
                    <button class="btn btn-success" type="submit" name="search-submit">Go</button>  
                </div>
            </div>
        </form>
    </div>

    <div class="container mt-3">
        <form action="home.php" method="get">
            <div class="form-group">
                <label for="sel1">Search by genre</label>
                <select class="form-control" id="sel1" name="list">
                    <option>Action</option>
                    <option>adventure</option>
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
                <button type="submit" class="btn btn-primary" name="genre-submit">Submit</button>
            </div>
        </form>
    </div>




    <?php
        if(isset($_GET['search-submit'])){
            $search = mysqli_real_escape_string($conn, $_GET['search']);
            $movie_qry = "SELECT * FROM movies WHERE title LIKE '%$search%' OR description LIKE '%$search%' OR director LIKE '%$search%' OR actors LIKE '%$search%'";
        }
        else{
            $movie_qry = "SELECT * FROM movies"; 
        } 
        $movie_res=mysqli_query($conn, $movie_qry);
        $queryRes = mysqli_num_rows($movie_res);

    ?>

    <?php
    
    /*if(isset($_GET['genre-submit'])){
        $genre = mysqli_real_escape_string($conn, $_GET['list']);
        $movie_qry = "SELECT * FROM movies WHERE genre='$genre'";
        $movie_res = mysqli_query($conn, $movie_qry);
        $queryRes = mysqli_num_rows($movie_res);
        echo mysqli_fetch_assoc($movie_res);
    }*/

    ?>

    <div class="container">
        <div class="row">
            <?php
            if($queryRes <= 0){
                echo "There are no results for";
            }else{
                while($movie_data = mysqli_fetch_assoc($movie_res)){
            ?>
            <div class="col-md-4">
                <div class="card">
                <?php echo "<a href='moviepage.php?title='".$movie_data['title'].">"; ?>
                    <img class="card-img-top" src="movies-img/soul.jpg" alt="Card image">
                <?php echo "</a>"; ?>
                    <div class="card-body">
                      <h4 class="card-title"><?php echo $movie_data['title'];  ?><span> (<?php echo $movie_data['year']; ?>) </span></h4>
                      <p class="card-text"><?php echo $movie_data['genre']; ?></p>
                        <?php echo "<a href='moviepage.php?title=".$movie_data['title']."'>"; ?>
                        <button class="btn btn-dark">See Movie Details</a>
                        <?php echo "</a>"; ?>
                    </div>
                </div>
            </div>
            <?php
            }
            }
            ?>
            
        
        </div>
    </div>



</body>
</html>
