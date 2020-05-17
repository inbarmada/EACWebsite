<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <style>
    .error {color: #FF0000;}
    </style>
</head>
<body>

  <?php

    // Initialize the session
    session_start();

    // Check if the user is already logged in, if yes then redirect him to welcome page
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: welcome.php");
        exit;
    }

    // Include config file
    // require_once "config.php";

    define('DB_SERVER', 'sql107.epizy.com');
    define('DB_USERNAME', 'epiz_24750853');
    define('DB_PASSWORD', 'b0wJ3MqisvR2M');
    define('DB_NAME', 'epiz_24750853_Users');

    // Create connection
    $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    // Check connection
    if (mysqli_connect_error()) {
        die("Database connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully ";

    // Define variables and initialize with empty values
    $username = $password = "";
    $username_err = $password_err = "";

    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        // Check if username is empty
        if(empty(trim($_POST["username"]))){
            $username_err = "Please enter username.";
        } else{
            $username = trim($_POST["username"]);
        }

        // Check if password is empty
        if(empty(trim($_POST["password"]))){
            $password_err = "Please enter your password.";
        } else{
            $password = trim($_POST["password"]);
        }

        echo "all is well <br>";

        if (mysqli_connect_error()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }else{
            echo "stuff";
        }

        // Validate credentials
        if(empty($username_err) && empty($password_err)){
            echo "ayyyy <br>";
            // Prepare a select statement
            //$sql = "SELECT password FROM UserData WHERE username = '$username' ";
            $sql = "SELECT id, username, password FROM UserData WHERE username = ? ";
            echo "still here <br>";

            if($stmt = $mysqli->prepare($sql)){
                $stmt->bind_param("s", $param_username);
                $param_username = $username;

                if($stmt->execute()){
                    $stmt->store_result();
                    if($stmt->num_rows == 1){
                        $stmt->bind_result($id, $username, $hashed_password);
                        if($stmt->fetch()){
                            echo " hola " . $password . "nihao" . $hashed_password . "ciao";
                            if($password == $hashed_password){
                                echo "yayayyay";
                                session_start();

                                $_SESSION["loggedin"] = true;
                                $_SESSION["id"] = $id;
                                $_SESSION["username"] = $username;

                                // Redirect user to welcome page
                                header("location: home.php");

                            }else{
                                echo "password err";
                            }
                        }else{
                            echo "no fetch";
                        }
                    }else{
                        echo "username err";
                    }
                }else{
                    echo "oops";
                }
            }else{ echo "uh oh "; }

            $stmt->close();

        }else{
            echo "errors";
        }

        $mysqli->close();
    }

  ?>

  <div id="container">
    <div id="title">Log In</div>
    <form method="post" action="login.php">

      <div class="row">
        <input type="text" name="username" placeholder="Username*" class="text-input">
         <span class="error"><?php /*echo $usernameErr;*/?></span>
      </div>

      <div class="row">
        <input type="text" name="password" placeholder="Password*" class="text-input">
        <span class="error"><?php /*echo $passwordErr;*/?></span>
      </div>

      <div class="row">
        <input type="submit" name="submit" class="button-input">
      </div>

      Don't have an account? <a href="signup.php">Sign up</a>
    </form>
  </div>

</body>
</html>
