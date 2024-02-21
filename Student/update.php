

<?php
    session_start();
    include('Sdb.php');
    include('header.php');
    
    $location = $_GET['location'];
    $email = $_GET['email'];
  

?>
<h1>make your update</h1>
<form action="" method="get">
    Email:<input type="text" name="updatedEmail" value="<?php echo "$email" ?>"><br><br>
    Location:<input type="text" name="updatedLocation" value="<?php echo "$location" ?>"><br><br>
    <button type="submit" id="submit" name="submit">Update</button>
</form>

<?php 
    if(isset($_GET["submit"]))
    {
        $uemail = $_GET['updatedEmail'];
        $uloc = $_GET['updatedLocation'];
        $name = $_SESSION['username'];
        echo $name;

       $query = "UPDATE student SET email = '$uemail' , Location = '$uloc' WHERE username = '$name'  ";
       $data = mysqli_query($con,$query);
       if($data)
       {
        
        

        header('Location:dashboard.php');
       }


        
        
    
    }

?>