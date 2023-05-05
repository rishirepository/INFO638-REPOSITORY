<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Montserrat:wght@100;200;300;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Artwork Details</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    
    <nav>
    
        <a href="home.php">home</a>
        <a href="requests.php">requests</a>
        <a href="form.php">submit</a>
        <a href="artists.php">artists</a>
 
    </nav>
	

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

// Var for any error messages
$message = NULL; 

// Check to make sure we have an artwork id in the query string
if (isset($_GET["artwork_id"]) && !empty($_GET["artwork_id"])) {

	try { // Wrap in try/catch in case queryfails 

		//$stmt = $pdo->prepare('SELECT * FROM artwork WHERE artwork_id = ?');
		$stmt = $pdo->prepare('SELECT * FROM artwork INNER JOIN artist ON artist.artist_id=artwork.artist_id JOIN reference ON reference.reference_id = artwork.reference_id LEFT JOIN request on request.request_id=artwork.request_id JOIN origin ON origin.origin_id=reference.origin_id WHERE artwork_id = ?');
		$stmt->bindParam(1, $artwork_id, PDO::PARAM_STR, 13);
		$artwork_id = sanitizeString($_GET["artwork_id"]);
		$stmt->execute();

		$result = $stmt->fetchAll();

		if (!$result) $message = "Artwork not found.";

		foreach ($result as $row)
		echo '<div class= "artdetails">';
			{
			
			echo '<img src=' . htmlspecialchars($row['img_path']) . '>';
			echo '<h1>' . htmlspecialchars($row['title']) . '</h1>';
			echo '<h4>' . htmlspecialchars($row['px_width']) . ' x ' . htmlspecialchars($row['px_height']) . ' pixels </h4>';
            echo '<p>This artwork was created by '.htmlspecialchars($row['fname']). ' on '.htmlspecialchars($row['date_created']).'. It is based on the '.htmlspecialchars($row['name']).' vehicle from the '.htmlspecialchars($row['origin_type']).' '.htmlspecialchars($row['origin_name']).
			'. The vehicle made its debut in '.htmlspecialchars($row['first_appearance']).'.</p>'; 

			if ($row['request_id']!=NULL){
				echo '<p>It was requested by '.htmlspecialchars($row['requester_fname']). ' '.htmlspecialchars($row['requester_lname']).'. They said: </p>';
				echo '<p class=reason>"'.htmlspecialchars($row['request_reason']).'"</p>';
			}
		
		
		
		}
		echo '</div>';

	} catch (PDOException $e) {
		$message = "Error encountered.";
	}
} else {
	$message = "Missing Artwork ID.";
}

echo <<<_END
<h2>$message</h2>
_END;

// Functions 

function sanitizeString($var)
{
  $var = stripslashes($var);
  $var = strip_tags($var);
  $var = htmlentities($var);
  return $var;
}

?>
<div class="footer">
  <p>© 2023 Rishi Mudaliar</p>
</div>
</body>
</html>