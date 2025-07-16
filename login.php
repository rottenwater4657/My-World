<?php
session_start();
include("sql.php");

 if (isset($_POST['submit']))
{
   $conn= conntodb();
      $username=$_POST['username'];
    $pass=$_POST['password'];

  $sql="select * from login where username=?";
     $stmt = mysqli_prepare($conn, $sql);// prepares,avoids malicious input
     if ($stmt) {

        mysqli_stmt_bind_param($stmt, "s", $username);//username lai mathi ko '?' sanga bind garxa, s= string

        mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($pass, $row['password'])) {
           
           $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            header("Location: myworld.php");

            exit();
        } else {
            echo "Wrong Username Or Password";
        }
    }
    mysqli_stmt_close($stmt);
    } else {
        echo "Query preparation failed.";
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
     <h1>Welcome To My World</h1>
    USERNAME: <input type="text" name= "username" required><br>
    PASSWORD:<input type="password" name= "password" required><br>
    <button type="submit" name="submit">Enter</button><br>
    </form>
</body>
</html>