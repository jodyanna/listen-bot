<?php
// Global Variables
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "listen-bot";

  /****************************** Create Posts Table ******************************/
  function create_posts_table() {
    global $servername, $username, $password, $db_name;
    $conn = new mysqli($servername, $username, $password, $db_name);
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

    $sql = "CREATE TABLE posts(
                               post_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                               post_text VARCHAR(255),
                               post_date DATETIME DEFAULT CURRENT_TIMESTAMP
                               );";
    echo (!$conn->query($sql)) ? "err {create_posts_table}: " . $conn->error : "posts table created.";

    $conn->close();
  }

  create_posts_table();
