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

