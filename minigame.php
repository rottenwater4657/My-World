<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Number Guessing Game</title>
</head>
<body>
    <?php
    session_start();
    if (!isset($_SESSION['n'])) {
        $_SESSION['n'] = 10;
    }
     if (!isset($_SESSION['tries'])) {
        $_SESSION['tries'] = 0; 
    }
    if (isset($_POST['Easy'])) {
        $_SESSION['n'] = 10;
        unset($_SESSION['target']); 
         $_SESSION['tries'] = 0;
    }
    if (isset($_POST['Medium'])) {
        $_SESSION['n'] = 100;
        unset($_SESSION['target']);
         $_SESSION['tries'] = 0;
    }
    if (isset($_POST['Hard'])) {
        $_SESSION['n'] = 1000;
        unset($_SESSION['target']);
         $_SESSION['tries'] = 0;
    }

    if (!isset($_SESSION['target'])) {
        $_SESSION['target'] = rand(1, $_SESSION['n']);
         $_SESSION['tries'] = 0;
    }

    if (isset($_POST['submit'])) {
        $guess = (int) $_POST['num'];
         $_SESSION['tries']++;
        if ($guess == $_SESSION['target']) {
            echo "<p>You guessed the number</p>";
            unset($_SESSION['target']);
             $_SESSION['tries'] = 0;
        } elseif ($guess < $_SESSION['target']) {
            echo "<p>Guess Higher</p>";
        } else {
            echo "<p> Guess Lower</p>";
        }
    }
    ?>
    
    <h2>Choose Difficulty</h2>
    <form method="POST">
        <button type="submit" name="Easy">Easy</button>
        <button type="submit" name="Medium">Medium</button>
        <button type="submit" name="Hard">Hard</button>
    </form>

    <form method="POST">
        <h1>Enter a number (From 1 to <?php echo $_SESSION['n']; ?>)</h1>
        <input type="number" name="num" required>
        <button type="submit" name="submit">Enter</button>
    </form>
      <p>Number of tries: <?php echo $_SESSION['tries']; ?></p>
</body>
</html>