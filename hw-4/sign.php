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

<?php   
    $message = '';
    include('config.php');
    session_start();

    
        
    if(isset($_POST['sign'])){
        $login = $_POST['user'];
        $pass = $_POST['password'];
        $qry = "SELECT username, email, password, role FROM users";
        $res = mysqli_query($conn, $qry);

        while($row=mysqli_fetch_array($res)){
            $username = $row['username'];
            $email = $row['email'];
            $password = $row['password'];
            $role = $row['role'];
            if($login == $row['username'] or $login == $row['email']){
                if($pass == $row['password']){
                    if($role == "admin"){
                        header("location:homeadmin.php");
                    }else{
                        header("location:home.php");                      
                    }
                    $_SESSION['username'] = $row['username'];
                }
            }else{
                $message = "<br>Wrong user informations or password";
            }
        }
    }
  

?>

<body>

    <div class="container-fluid header">
        <a href="sign.php">
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
        <p>
            <?php echo $message; ?>
        </p>
    </div>

    

</body>
</html>
