<?php
if(!isset($_SESSION)) 
    {     //SESSION START 
        session_start(); 
		
  
  }
  
?>

<!DOCTYPE html>
<html>
<head>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
     <style>
    
     li{
          padding:12px;
     }
     .btn {
  background-color: #f4511e;
  border: none;
  color: black;
  padding: 16px 32px;
  text-align: center;
  font-size: 16px;
  margin: 4px 2px;
  opacity: 0.6;
  transition: 0.3s;
  }
     </style>
</head>
<body>
<br /><br />

<form  method="POST" action="search_result.php">
<div class="container" style="width:500px;margin-top: 50px">
<label for="">Search Teacher</label><br>
<input type= "text" name="subject" id="subject" placeholder="Enter the subject for your tutor"><br>
<input type="text" name="country" id="country" class="form-control" placeholder="Enter your location" autocomplete="off"/><br>


 <button   class="btn">search</button>
     </div>
   </form>
</body>
</html>