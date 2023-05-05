<!DOCTYPE html>
<html lang="en">
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

        $email = sanitizeString($_POST['email']);
		$requester_fname = sanitizeString($_POST['requester_fname']);
		$requester_lname = sanitizeString($_POST['requester_lname']);
		$request_name = sanitizeString($_POST['request_name']);
		$request_reason = sanitizeString($_POST['request_reason']);

        $pdoquery = "INSERT INTO `request`(`email`, `requester_fname`, `requester_lname`, `request_name`, `request_reason`) 
        VALUES (:email, :requester_fname, :requester_lname, :request_name, :request_reason)";

        $pdoresult=$pdo->prepare($pdoquery);
        $pdoexec = $pdoresult->execute(array(":email"=>$email, ":requester_fname"=>$requester_fname, ":requester_lname"=>$requester_lname,
        ":request_name"=>$request_name, ":request_reason"=>$request_reason));

        echo '<div class = "feedback">';

        if($pdoexec)
        {
            echo '<p>Your request has been submitted.</p>';
        }
        else
        {
            echo '<p>Your request has not been submitted.</p>';
        }
        echo '</div>';

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


        
