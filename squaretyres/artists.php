<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Montserrat:wght@100;200;300;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Artists</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav>
        <a href="home.php">home</a>
        <a href="requests.php">requests</a>
        <a href="form.php">submit</a>
        <a href="artists.php">artists</a>
    </nav>
    <div class="header">
        <h1>Artists</h1>
    </div>
<?php
	require_once 'login.php';
    try
    {
        $pdo = new PDO($attr, $user, $pass, $opts);
    }
    catch (PDOException $e)
    {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }
        $sql = "SELECT * FROM artist";
		$query = $pdo->prepare($sql);
		$query->execute();
        echo'<div class="artistdetails">';
        while($fetch = $query->fetch()){
            echo '<img src='.htmlspecialchars($fetch['portrait_path']).' alt="Artist Portrait">';
            echo '<h1>'.htmlspecialchars($fetch['fname']).' '.htmlspecialchars($fetch['lname']).'</h1>';
            echo '<h4>'.htmlspecialchars($fetch['email']).'</h4>';
            echo '<p>'.htmlspecialchars($fetch['artist_desc']).'</p>';
            echo '<a href='.htmlspecialchars($fetch['website']).' target="_blank">'.htmlspecialchars($fetch['fname'])."'s Website</a>";
            }
        echo '</div>';
        ?>
        <div class="footer">
  <p>© 2023 Rishi Mudaliar</p>
</div>
    </body>
    </html>
