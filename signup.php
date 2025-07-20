<?php
include("sql.php");
 if (isset($_POST['submit']))
{
   $conn= conntodb();
    
    $username=$_POST['username'];
    $pass=$_POST['password'];
     $password=password_hash($pass,PASSWORD_DEFAULT);
     $sql="INSERT INTO login(username,password)
           VALUES('$username','$password')";
           
  
    if(  mysqli_query($conn,$sql))
    {
     echo   "user is now registered";
       $id = mysqli_insert_id($conn);//gets the id of registered user
     $sql2="INSERT INTO diary(user_id,day)
           VALUES('$id',0)";
           mysqli_query($conn, $sql2);

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
    <h1>Wanna Be A Part Of My World?</h1>
    USERNAME: <input type="text" name= "username" required><br>
    PASSWORD:<input type="password" name= "password" required><br>
    <button type="submit" name="submit">Enter</button><br>
    Already Part Of My World? 
    <a href="login.php">Login</a>
    </form>
    
</body>
</html>