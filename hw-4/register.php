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
        <a href="register.php">
            <img src="img/imdb-logo.png" class="logo">
        </a>
        <a href="register.php">
            <button class="customBtn" id="signUp">Sing Up</button>
        </a>
        <a href="sign.php">
            <button class="customBtn" id="signIn">Sign In</button>
        </a>
    </div>

    <div class="container formSignUp" id="formSignUp">
        <h2>Register</h2>
        <form action="register.php" method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required>
            </div>
            <div class="form-group">
                <label for="surname">Surname:</label>
                <input type="text" class="form-control" id="surname" placeholder="Enter surname" name="surname" required>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" required>
            </div>
            <div class="user-exist">
                
            <?php
            include_once 'config.php';
    
            if(isset($_POST['register'])){
                $name = $_POST['name'];
                $surname = $_POST['surname'];
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['pswd'];

                $query_register = "SELECT username, email FROM users";
                $unique = 0; //user is unique if $unique is 0, else $unique is 1
                $result = mysqli_query($conn, $query_register);
                while($row = mysqli_fetch_array($result)){
                    if($username == $row['username'] || $email == $row['email']){
                        echo "User with the same username or email already exists";
                        $unique = 1;
                        break;
                    }        
                }
                if ($unique == 0){
                    $query = "INSERT INTO users (name,surname,username,email,password) VALUES ('$name', '$surname', '$username', '$email', '$password')";
                    mysqli_query($conn, $query);
                }

            } 
        
            ?>

            </div>
            <div class="form-group text">
            <a href="sign.php">
                <small id="registered">Already registered? Click here to sign in</small>
            </a>
            </div>
            <div class="button1">
                <button type="submit" class="customBtn submit" name="register">Register</button>
            </div>
        </form>
    </div>




</body>
</html>
