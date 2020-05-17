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
  // define variables and set to empty values
  $fNameErr = $lNameErr = $emailErr = $userErr = $passwordErr = "";
  $fName =$lName = $email = $user = $password = "";

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    if (empty($_POST["fName"])) {
      $fNameErr = "First name is required";
    } else {
      $fName = test_input($_POST["fName"]);
    }

    if (empty($_POST["lName"])) {
      $lName = "";
    } else {
      $lName = test_input($_POST["lName"]);
    }

    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } else {
      $email = test_input($_POST["email"]);
    }

    if (empty($_POST["user"])) {
      $userErr = "Username is required";
    } else {
      $user = test_input($_POST["user"]);
    }

    if (empty($_POST["password"])) {
      $passwordErr = "Password is required";
    } else if (empty($_POST["password-r"])){
      $passwordErr = "This field is required";
    } else if (($_POST["password"]) != ($_POST["password-r"])){
      $passwordErr = "Passwords do not match";
    } else {
      $password = test_input($_POST["password"]);
    }
  }
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  ?>

  <div id="container">
    <div id="title">Sign Up</div>
    <form method="post" action="signup.php">

      <div class="row" style="overflow: hidden">
        <ul style="display:block; padding: 0px; margin: 0px; width: 100%">
          <li style="display:inline-block; width:45%; float: left">
            <input type="text" name="fName" placeholder="First Name*" class="text-input">
            <span class="error"><?php echo $fNameErr;?></span>
          </li>
          <li style="display:inline-block;  width:45%; float: right">
            <input type="text" name="lName" placeholder="Last Name*" class="text-input">
            <span class="error"><?php echo $lNameErr;?></span>
          </li>
        </ul>
      </div>


      <div class="row">
        <input type="text" name="email" placeholder="Email*" class="text-input">
        <span class="error"><?php echo $emailErr;?></span>
      </div>

      <div class="row">
        <input type="text" name="user" placeholder="Username*" class="text-input">
        <span class="error"><?php echo $userErr;?></span>
      </div>

      <div class="row">
        <input type="text" name="password" placeholder="Password*" class="text-input">
        <span class="error"><?php echo $passwordErr;?></span>
      </div>

      <div class="row">
        <input type="text" name="password-r" placeholder="Repeat Password*" class="text-input">
        <span class="error"><?php echo $passwordErr;?></span>
      </div>

      <div class="row">
        <input type="submit" name="submit" class="button-input">
      </div>

      Already have an account? <a href="login.php">Log in</a>
    </form>
  </div>

  <?php
  echo "<h2>Your Input:</h2>";
  echo $fName;
  echo "<br>";
  echo $lName;
  echo "<br>";
  echo $email;
  echo "<br>";
  echo $user;
  echo "<br>";
  echo $password;

  $servername = "sql107.epizy.com";
  $serverusername = "epiz_24750853";
  $serverpassword = "b0wJ3MqisvR2M";
  $dbname = "epiz_24750853_Users";

  // Create connection
  $conn = new mysqli($servername, $serverusername, $serverpassword, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  $sql = "INSERT INTO UserData (firstname, lastname, email, username, password)
  VALUES ('{$fName}', '{$lName}', '{$email}', '{$user}', '{$password}')";

  if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
  ?>

</body>
</html>
