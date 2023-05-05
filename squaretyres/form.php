<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Montserrat:wght@100;200;300;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Submit a Request</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<nav>
    
    <a href="home.php">home</a>
    <a href="requests.php">requests</a>
    <a href="contact.asp">submit</a>
    <a href="artists.php">artists</a>

</nav>
	<div class="req">
		<h1>Submit a Request</h1>
		<form action="insert2.php" method="post">
			

			<label for="email">Email:</label>
			<input type="text" name="email" id="email">
			

			

			<label for="requester_fname">First Name:</label>
			<input type="text" name="requester_fname" id="requester_fname">
			

			

			<label for="requester_lname">Last Name:</label>
			<input type="text" name="requester_lname" id="requester_lname">
			

			

			<label for="request_name">Request:</label>
			<input type="text" name="request_name" id="request_name">
			

			

			<label for="request_reason">Reason:</label>
			<input type="text" name="request_reason" id="request_reason">
			

			<input type="submit" value="Submit">
		</form>
</div>
<div class="footer">
  <p>© 2023 Rishi Mudaliar</p>
</div>
</body>
</html>
