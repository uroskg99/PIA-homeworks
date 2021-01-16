<!DOCTYPE html>
<html>
<head>
    <title>IMDB Copy</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="style.css">
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
        /*if($result){
            while($row=mysqli_fetch_array($result)){
                header('Location: home.php');
            }
            $msgWrong = "Sorry, your password or email are incorrect";
        }*/

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


    /*if($_SERVER["REQUEST_METHOD"] == "POST"){

        $myuser = mysql_real_escape_string($db, $_POST['user']);
        $mypassword = mysql_real_escape_string($db, $_POST['password']);

        $sql = "SELECT id FROM admin WHERE username = '$myuser' and password = '$mypassword'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $active = $row['active'];

        $count = mysqli_num_rows($result);

        if($count == 1){
            session_register("myuser");
            $_SESSION['login_user'] = $myuser;

            header("location: welcome.php");
        }else{
            $error = "invalid username or password";
        }
    }

    $username = $_POST['user'];
    $password = $_POST['password'];

    $username = stripcslashes($username);
    $password = stripcslashes($password);

    $username = mysql_real_escape_string($username);
    $password = mysql_real_escape_string($password);

    mysql_connect("localhost", "root", "");
    mysql_select_db("users");

    $result = mysql_query("select * from users where username = '$username' and password = '$password'")
        or die("Failed to query database ".mysql_error());

    $row = mysql_fetch_array($result);

    if($row['username'] == $username && $row['password'] == $password){
        echo "login successfully, welcome".$row['username'];
    }else{
        echo "failed to login";
    }

    $username = $_POST['user'];
    $password = $_POST['password'];

    $s = " select * from users where username = '$username'";
    $result = mysqli_query($con, $s);

    $num = mysqli_num_rows($result);

    if($num == 1){
        echo "";
    }*/

    ?>

</body>
</html>