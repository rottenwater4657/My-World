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
   $conn=conntodb();
   $user_id = $_SESSION['user_id'];
  //initialization
   if (!isset($_SESSION['day'])) {
    $_SESSION['day'] = 1;
}
 if(isset($_POST['increment']))
 {
    $_SESSION['day']++;
 }
if(isset($_POST['decrement']))
 {
    $_SESSION['day']--;
 }
   ?>
       <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
<form method="POST">
       <h1>Day <?php echo $_SESSION['day'] ?></h1><datalist></datalist>
       <button type="submit" name="increment">Increment</button>
        <button type="submit" name="decrement">Decrement</button>
</form> 
    </body>
</html>