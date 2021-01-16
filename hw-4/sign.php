<!DOCTYPE html>
<html>
<head>
    <title>IMDB Copy</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="registersign.css">
</head>

<body>

    <div class="container-fluid header">
        <a href="index.html">
            <img src="img/imdb-logo.png" class="logo">
        </a>
        <a href="register.php">
            <button class="customBtn" id="signUp">Sing Up</button>
        </a>
        <a href="sign.php">
            <button class="customBtn" id="signIn">Sign In</button>
        </a>    
    </div>
    
    <div class="container formSignIn" id="formSignIn">
        <h2>Sign In</h2>
        <form action="sign.php" method="POST">
          <div class="form-group">
            <label for="user">Email or username:</label>
            <input type="text" class="form-control" id="user" placeholder="Enter email or username" name="user" required>
          </div>
          <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
          </div>
            <div class="button2">
                <button type="submit" class="customBtn btn2" name="sign">Sign in</button>
            </div>
        </form>
    </div>

    <?php

    include('config.php');
    session_start();

    if(isset($_POST['sign'])){
        $login = $_REQUEST['user'];
        $password = $_REQUEST['password'];
        $query = "SELECT * FROM `users` WHERE ( username='$login' OR email = '$login') and password='$password'";
        $result = mysqli_query($conn, $query);
        $row = $result->fetch_assoc();
        

        session_regenerate_id();
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];
        session_write_close();

        if($result->num_rows==1 && $_SESSION['role'] == "user"){
            header("location:home.php");
        }
        else if($result->num_rows==1 && $_SESSION['role'] == "admin"){
            header("location:homeadmin.php");
        }


    }
    

    ?>

</body>
</html>
