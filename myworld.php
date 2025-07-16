<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
   include("sql.php");
   session_start();
   $user_id = $_SESSION['user_id'];
   
   ?>
       <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
</body>
</html>