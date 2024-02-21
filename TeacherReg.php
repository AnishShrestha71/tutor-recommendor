<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>

<?php
    require('Tdb.php');
    // When form submitted, insert values into the database.

    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $Subject  = stripslashes($_REQUEST['Subject']);
        $Subject = mysqli_real_escape_string($con, $Subject);
        $Location = stripslashes($_REQUEST['Location']);
        $Location = mysqli_real_escape_string($con, $Location);
        $Experience = stripslashes($_REQUEST['Experience']);
        $Experience = mysqli_real_escape_string($con, $Experience);
        $SLC = stripslashes($_REQUEST['SLC']);
        $SLC = mysqli_real_escape_string($con, $SLC);
        $Plus2 = stripslashes($_REQUEST['Plus2']);
        $Plus2 = mysqli_real_escape_string($con, $Plus2);
        $Bachelor = stripslashes($_REQUEST['Bachelor']);
        $Bachelor = mysqli_real_escape_string($con, $Bachelor);
        $create_datetime = date("Y-m-d H:i:s");

        if($Bachelor == null){
            $Average = ($SLC + $Plus2)/2 ;
        }
        else{
            $Average = ($SLC + $Plus2 + $Bachelor)/3 ;
        }
        

        

        $sql = mysqli_query($con, "SELECT `username` FROM `treg` WHERE username = '".$username."'");
        if (mysqli_num_rows($sql)>0) 
        { 
            die ("Username taken Try next username<a href='TeacherReg.php'>registration again</a>."); 
        } 

        $query    = "INSERT into `treg` (username, password, email, Subject, Location, Experience, SLC, Plus2, Bachelor, Average, create_datetime)
                     VALUES ('$username', '" . md5($password) . "', '$email', '$Subject','$Location', '$Experience' , '$SLC', '$Plus2','$Bachelor', '$Average',  '$create_datetime')";
        $result   = mysqli_query($con, $query);

        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='TeacherLogin.php'>Login</a></p>
                  </div>";
                  //echo $Average ;
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='TeacherReg.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="text" class="login-input" name="email" placeholder="Email Adress">
        <input type="password" class="login-input" name="password" placeholder="Password">
        <input type="text" class="login-input" name="Subject" placeholder="Subject">
        <input type="text" class="login-input" name="Location" placeholder="Location">
        <input type="text" class="login-input" name="Experience" placeholder="Experience">
        <input type="text" class="login-input" name="SLC" placeholder="SLC">
        <input type="text" class="login-input" name="Plus2" placeholder="+2">
        <input type="text" class="login-input" name="Bachelor" placeholder="Bachelor">
        
        <input type="submit" name="submit" value="Register" class="login-button">

        <p class="link"><a href="TeacherLogin.php">Click to Login</a></p>
    </form>
<?php
    }
?>
</body>
</html>