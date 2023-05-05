<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Montserrat:wght@100;200;300;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Requests</title>
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
        <h1>Submitted Requests</h1>
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
        $sql = "SELECT * FROM request";
		$query = $pdo->prepare($sql);
		$query->execute();
        echo'<table class="requests">
        <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Vehicle Requested</th>
        <th>Reason</th>
        </tr>';
        while($fetch = $query->fetch()){
            echo '<tr>';
            echo '<td>'.htmlspecialchars($fetch['requester_fname']).'</td>';
            echo '<td>'.htmlspecialchars($fetch['requester_lname']).'</td>';
            echo '<td>'.htmlspecialchars($fetch['request_name']).'</td>';
            echo '<td>"'.htmlspecialchars($fetch['request_reason']).'"</td>';
            echo '</tr>';
        }
        echo '</table>';
        ?>
    <div class="footer">
  <p>© 2023 Rishi Mudaliar</p>
</div>
    </body>
    </html>
