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
   if(isset($_POST['Submit']))
   {
    $name=$_POST['name'];
    $type=$_POST['type'];
    $rate=$_POST['rate'];
$remarks=$_POST['remarks'];
    $sql="INSERT INTO watch(user_id,name,rate,type,remarks)
    values('$user_id','$name','$rate','$type','$remarks')";
     mysqli_query($conn, $sql);
 
 }
     $sql2 = "SELECT watch_id,name, type, rate, remarks FROM watch WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $sql2);
if (isset($_POST['delete'])) {
    $watch_id = $_POST['watch_id']; 
    $sql3 = "DELETE FROM watch WHERE watch_id = $watch_id AND user_id = '$user_id'";
    mysqli_query($conn, $sql3);
}
?>
    <form method="POST">
        <label>Name</label>
        <input type="text" name="name" required>
        <label>Type</label>
        <select name="type">
            <option value="anime">Anime</option>
            <option value="k-drama">K-drama</option>
            <option value="series">Series</option>
            <option value="Movie">Movie</option>
        </select>
<label>Remarks</label>
<input type="text" name="remarks" >
        <label>Rating</label>
    <input type="number" name="rate" placeholder="rating" required >
    <button type="submit" name="Submit">Submit</button><br>
    </form>
    <?php if ($result && mysqli_num_rows($result) > 0):  ?>
    <table>
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Rating</th>
            <th>Remarks</th>
            <th>Delete</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['type']) ?></td>
                <td><?= htmlspecialchars($row['rate']) ?></td>
                <td><?= htmlspecialchars($row['remarks']) ?></td>
                <td><form method="post">
                 <input type="hidden" name="watch_id" value="<?= htmlspecialchars($row['watch_id']) ?>">
                    <button type="submit" name="delete">Delete</button>
                </form></td>
            </tr>
        <?php endwhile; ?>
        <?php endif; ?>
    </table>
</body>
</html>