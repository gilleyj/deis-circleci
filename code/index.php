<?php

	$post = file_get_contents('php://input');
	$server = json_encode($_SERVER);

	$DB_HOST = getenv('DB_HOST');
	$DB_PORT = getenv('DB_PORT');
	$DB_USER = getenv('DB_USER');
	$DB_PASS = getenv('DB_PASS');
	$DB_NAME = getenv('DB_NAME');

	$payload = $post . $server;

	$DB = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	$STATEMENT = $DB->prepare('INSERT INTO notification ( recieved, payload ) VALUES (NOW(), ?)');
	$STATEMENT->bind_param( 's', $payload);
	$STATEMENT->execute();
	$DB->close();

	/*

	$DB = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

	if ($DB->connect_error) die("Connection failed: " . $DB->connect_error);

foreach ($data as $user) {
	$firstname = $user['firstname'];
	$lastname = $user['lastname'];
	$gender = $user['firstname'];
	$username = $user['username'];

	// preparing statement for insert query
	$st = mysqli_prepare($connection, 'INSERT INTO users(firstname, lastname, gender, username) VALUES (?, ?, ?, ?)');

	// bind variables to insert query params
	mysqli_stmt_bind_param($st, 'ssss', $firstname, $lastname, $gender, $username);

	// executing insert query
	mysqli_stmt_execute($st);
}

	$sql = "SELECT * FROM posts LEFT JOIN authors ON posts.author_id = authors.id ORDER BY posts.date DESC";
	$result = $DB->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$title = $row["title"];
			$date = $row["date"];
			$by = $row["first_name"]. " " . $row["last_name"];
			$content = $row["content"];
			echo "<div class='article'>";
			echo "<span class='date'>".$date."</span><br/>";
			echo "<span class='title'>".$title."</span><br/>";
			echo "<span class='by'>".$by."</span> <br/>";
			echo "<p class='content'>".$content."</p>";
			echo "</div>";
		}
	} else {
		echo "0 results";
	}

	$DB->close();
	*/