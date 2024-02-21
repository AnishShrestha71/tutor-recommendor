<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>

<?php
    require('Sdb.php');
    // When form submitted, inserting values into the database.

    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $Location = stripslashes($_REQUEST['Location']);
        $Location = mysqli_real_escape_string($con, $Location);
        $create_datetime = date("Y-m-d H:i:s");


      



        $sql = mysqli_query($con, "SELECT `username` FROM `student` WHERE username = '".$username."'");
        if (mysqli_num_rows($sql)>0) 
        { 
            die ("Username taken Try next username<a href='StudentReg.php'>registration again</a>."); 
        } 

        $query    = "INSERT into `student` (username, password, email,  Location, create_datetime)
                     VALUES ('$username', '" . md5($password) . "', '$email', '$Location', '$create_datetime')";
        $result   = mysqli_query($con, $query);

        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='StudentLogin.php'>Login</a></p>
                  </div>";

                  
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='StudentReg.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="text" class="login-input" name="email" placeholder="Email Adress">
        <input type="password" class="login-input" name="password" placeholder="Password">
        
        <input type="text" class="login-input" name="Location" placeholder="Location">
       

        
        <input type="submit" name="submit" value="Register" class="login-button">

        <p class="link"><a href="StudentLogin.php">Click to Login</a></p>
    </form>
<?php
    }
?>
</body>
</html>