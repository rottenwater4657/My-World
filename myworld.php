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
 if (isset($_POST['set_day'])) {
    $newDay = $_POST['day_value'];
    $_SESSION['day'] = $newDay;
}
   ?>
       <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
<div name= "view"> <form method="POST">
       <h1>Day <?php echo $_SESSION['day'] ?></h1>
      <?php  
      $sql1="SELECT content 
      FROM diary 
WHERE user_id = $user_id AND day =".$_SESSION['day'];//'day' breaks the query
$res1=mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_assoc($res1);
    echo $row1['content'];
    ?>
    <br>
       <button type="submit" name="increment">Increment</button>
        <button type="submit" name="decrement">Decrement</button><br>
      
</form> 
<form method="POST">
 <label>Set Day: </label>
    <input type="number" name="day_value" placeholder="Enter day" >
    <button type="submit" name="set_day">Set Day</button><br>
</form>
</div>
<div name ="write">
    <form method="POST">
        <br>
       <?php  
       $sql="SELECT MAX(day) AS largest_day 
FROM diary 
WHERE user_id = $user_id";
$res=mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);
?>
   <h1><?php echo "Day: " . $row['largest_day']+1;?></h1>
   <?php if(isset($_POST['submit']))
    {
          $content=$_POST['content'];
    $day=$row['largest_day']+1;
    
      $sql2="INSERT INTO diary(day,content,user_id)
           VALUES('$day','$content','$user_id')";
           mysqli_query($conn, $sql2);
    }
   
?>
 <br>
 <input type ="text" name="content" required>
 <button type="submit" name="submit">Submit</button>
    </form>
</div>
    </body>
</html>