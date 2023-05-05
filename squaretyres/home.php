<!DOCTYPE html>
<html lang=en>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Montserrat:wght@100;200;300;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Square Tyres</title>
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
        <h1>What is Square Tyres?</h1>
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
    $sql = "SELECT COUNT(*) FROM artwork"; //For showing current number of pieces in collection
	$query = $pdo->prepare($sql);
	$query->execute();
    $number_of_rows=$query->fetchColumn();
    echo
    '<div class = "intro">
    <h2>Square Tyres is an art project aimed at rendering beloved vehicles from history and pop culture in pixel art. The project was started in December 2022, and there are currently '. $number_of_rows. ' pieces in the collection.</h2>
    </div>';
    echo '<div class="gallery">';
    $sql2='SELECT * FROM artwork';
    $query = $pdo->prepare($sql2);
    $query->execute();
    //Display thumbnails in a row, and have them link to individual artwork detail pages
    while($fetch = $query->fetch()){
        echo 
        '<a href="template-artwork.php?artwork_id='.htmlspecialchars($fetch['artwork_id']).'" target="_blank"><img src='.htmlspecialchars($fetch['thumb_path']).' alt="Thumbnail"></a>';
    }
    echo '</div>';
	?>
    <div class="footer">
  <p>© 2023 Rishi Mudaliar</p>
</div>
</body>
</html>